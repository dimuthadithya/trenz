<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\OrderItem;
use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function index(Request $request)
    {
        $currentUser = Auth::user();
        $orderId = $currentUser->orders()->pluck('id');
        $orderItems = OrderItem::whereIn('order_id', $orderId)->get();

        return view('profile.index', compact('orderItems'));
    }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        Auth::user()->fill($request->validated());

        if (Auth::user()->isDirty('email')) {
            Auth::user()->email_verified_at = null;
        }

        Auth::user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function address()
    {
        $addresses = Auth::user()->addresses;
        return view('profile.address', compact('addresses'));
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'type' => 'required|in:home,work,other',
            'is_default' => 'boolean'
        ]);

        $address = new Address($request->all());
        $address->user_id = Auth::id();

        // If this is the first address or is_default is checked, make it default
        if ($request->is_default || Auth::user()->addresses()->count() === 0) {
            Auth::user()->addresses()->update(['is_default' => false]);
            $address->is_default = true;
        }

        $address->save();

        return redirect()->route('profile.address')->with('success', 'Address added successfully');
    }

    /**
     * Display the user's payment methods.
     */
    public function payments(Request $request): View
    {
        $user = $request->user();
        $paymentMethods = $user->paymentMethods()->get();

        return view('profile.payments', [
            'paymentMethods' => $paymentMethods
        ]);
    }

    /**
     * Store a new payment method.
     */
    public function storePayment(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'card_number' => 'required|string',
            'expiry_month' => 'required|numeric|min:1|max:12',
            'expiry_year' => 'required|numeric|min:2023',
            'cvv' => 'required|numeric',
            'is_default' => 'boolean'
        ]);

        $user = $request->user();

        // In a real app, you would use a payment gateway like Stripe here
        $paymentMethod = $user->paymentMethods()->create([
            'type' => $this->detectCardType($validated['card_number']),
            'last_four' => substr($validated['card_number'], -4),
            'expiry_month' => $validated['expiry_month'],
            'expiry_year' => $validated['expiry_year'],
            'is_default' => $validated['is_default'] ?? false
        ]);

        if ($validated['is_default']) {
            $user->paymentMethods()->where('id', '!=', $paymentMethod->id)->update(['is_default' => false]);
        }

        return Redirect::route('profile.payments')->with('status', 'payment-method-added');
    }

    /**
     * Delete a payment method.
     */
    public function deletePayment(Request $request, $id): RedirectResponse
    {
        $paymentMethod = $request->user()->paymentMethods()->findOrFail($id);
        $paymentMethod->delete();

        return Redirect::route('profile.payments')->with('status', 'payment-method-deleted');
    }

    /**
     * Set a payment method as default.
     */
    public function setDefaultPayment(Request $request, $id): RedirectResponse
    {
        $user = $request->user();
        $paymentMethod = $user->paymentMethods()->findOrFail($id);

        $user->paymentMethods()->update(['is_default' => false]);
        $paymentMethod->update(['is_default' => true]);

        return Redirect::route('profile.payments')->with('status', 'payment-method-updated');
    }

    public function orders(Request $request)
    {
        $query = Auth::user()->orders()->with(['orderItems.product', 'address']);

        // Filter by status
        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search functionality
        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                    ->orWhereHas('orderItems.product', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        $orders = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('profile.orders', compact('orders'));
    }



    public function cancellations()
    {
        return view('profile.cancellations');
    }

    public function reviews()
    {
        return view('profile.reviews');
    }

    public function wishlist()
    {
        $wishlistItems = Auth::user()->wishlist()->with('product')->get();
        return view('profile.wishlist', compact('wishlistItems'));
    }

    /**
     * Cancel a processing order
     */
    public function cancelOrder(Request $request, $orderId)
    {
        $order = Auth::user()->orders()->findOrFail($orderId);

        if ($order->status !== 'processing') {
            return back()->with('error', 'Only processing orders can be cancelled.');
        }

        $order->status = 'cancelled';
        $order->save();

        return back()->with('success', 'Order has been cancelled successfully.');
    }

    // Helper function to detect card type
    private function detectCardType($number)
    {
        $number = preg_replace('/[^\d]/', '', $number);

        if (preg_match('/^4/', $number)) return 'visa';
        if (preg_match('/^5[1-5]/', $number)) return 'mastercard';
        if (preg_match('/^3[47]/', $number)) return 'amex';
        if (preg_match('/^6(?:011|5)/', $number)) return 'discover';

        return 'other';
    }
}
