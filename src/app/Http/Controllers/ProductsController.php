<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Seasons;
use App\Models\ProductSeason;
use App\Http\Requests\ProductsRequest;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // 商品一覧表示機能
    public function index(Request $request)
    {
        

        $query = Products::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->with('seasons')->paginate(6);
        $seasons = Seasons::all();

        return view('products', compact('products'));
    }


    // 商品登録画面表示機能
    public function register()
    {
        return view('register');
    }

    // 商品登録機能
    public function store(ProductsRequest $request)
    {
        $product = new Products();

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public'); 
           }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        $product->seasons()->sync($request->seasons);
            
        return redirect('/products'); 
    }


    // 商品編集・詳細画面表示機能
    public function detail($id)
    {
        $product = Products::with('seasons')->find($id);
        $seasons = Seasons::all();

        return view('detail', compact('product', 'seasons'));
    }

    // 商品編集機能
    public function update(ProductsRequest $request, $id)
    {
        $product = Products::findOrFail($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        $product->seasons()->sync($request->seasons);

        return redirect('/products');
    }

    // 商品検索機能
    public function search(Request $request)
    {
        if (!$request->filled('search')) {
            return redirect('/products');
        }

        $query = Products::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->with('seasons')->paginate(6);
        $seasons = Seasons::all();

        return view('products', compact('products','seasons'));
    }

    // 商品削除機能
    public function destroy($productId)
    {
        $product = Products::find($productId);
        if ($product) {
            $product->delete();
        }

        $season = Seasons::find($productId);
        if ($season) {
            $season->delete();
        }

        return redirect('/products');
    }


}
