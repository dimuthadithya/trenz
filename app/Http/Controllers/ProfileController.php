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

    public function payments()
    {
        return view('profile.payments');
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

    public function returns()
    {
        return view('profile.returns');
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
}
