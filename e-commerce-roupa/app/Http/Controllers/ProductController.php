<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ProductController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $seed = Carbon::now()->format('Ymd');
            $products = Product::inRandomOrder($seed)->take(12)->get();
        }

        return view('welcome', compact('products', 'search'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $auth = Auth::user();
        if (!$auth || !$auth->is_admin) {
            return redirect('/');
        }else{
            $product = new Product();

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->size = $request->size;
            $product->category_id = $request->category_id;

            // Image upload
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $requestImage = $request->image;

                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $requestImage->move(public_path('img/products'), $imageName);
                $product->image = $imageName;
            }
            $product->save();

            return redirect('/products/dashboard')->with('msg', 'Produto cadastrado com sucesso!');
        }
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', ['categories' => $categories, 'product' => $product]);
    }

    public function update(Request $request)
    {
        Product::findOrFail($request->id)->update($request->all());

        return redirect('/admin/productsDashboard')->with('msg', 'Produto atualizado com sucesso!');

    }

    public function destroy($id){
        Product::findOrFail($id)->delete();
        return redirect('/admin/productsDashboard')->with('msg', 'Produto excluído com sucesso!');
    }
}
