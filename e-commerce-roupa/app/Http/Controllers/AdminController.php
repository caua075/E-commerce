<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;


class AdminController extends Controller
{
    public function adminDashboard()
    {
        $users = User::all();
        $products = Product::all();
        //$orders = Order::all();
        return view('admin.dashboard', compact('users', 'products'));
    }

    public function productsDashboard()
    {
        $products = Product::with('category')->get();
        return view('admin.productsDashboard', ['products' => $products]);
    }

    public function usersDashboard()
    {
        $users = User::all();
        return view('admin.usersDashboard', ['users' => $users]);
    }
}
