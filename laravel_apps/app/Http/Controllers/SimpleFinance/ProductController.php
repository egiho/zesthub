<?php

namespace App\Http\Controllers\SimpleFinance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view("pages_sf.products.index");
    }

    public function create()
    {
        return view("pages_sf.products.create");
    }

    public function save(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer'
        ]);

        try {

            $product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);


            return redirect('/product')->with(['success' => '<strong>' . $product->title . '</strong> Telah disimpan']);
        } catch(\Exception $e) {
            return redirect('/product/new')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        return redirect('/products')->with(['success' => '<strong>' . $product->title . '</strong> Diperbaharui']);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products')->with(['success' => '</strong>' . $product->title . '</strong> Dihapus']); // DIARAHKAN KEMBALI KEHALAMAN /product
    }
}
