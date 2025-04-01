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

    public function toggleAdmin(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->back()->with('msg', 'Permissão de administrador alterada com sucesso.');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('msg', 'Usuário deletado com sucesso.');
        } else {
            return redirect()->back()->with('msg', 'Usuário não encontrado.');
        }
    }
}
