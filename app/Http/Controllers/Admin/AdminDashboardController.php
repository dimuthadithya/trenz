<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersCount = User::where('role', 'customer')->count();
        $adminsCount = User::where('role', 'admin')->count();
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $newUsers = User::where('role', 'customer')->orderBy('created_at', 'desc')->take(5)->get();



        return view('pages.admin.index', compact('usersCount', 'adminsCount', 'productsCount', 'ordersCount', 'newUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.admin.create');
    }
    public function viewAdmins()
    {
        $admins = User::where('role', 'admin')->get();
        return view('pages.admin.admin.view', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
