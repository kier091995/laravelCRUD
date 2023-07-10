<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $product = Product::get();

        return view('products.index',['products' => $product]);

    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){


        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new Product;

        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        // return back()->withSuccess('Product Created !');
        return back()->with('success', 'Product Created');

    }

    public function edit($id){


            $product = Product::where('id',$id)->first();

            return view('products.edit',['products' => $product]);

    }

    public function update(Request $request, $id){

        $product = Product::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);




        $imagePath = public_path('products/'.$product->image);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }


        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSuccess('Product Updated !');

    }

    public function delete($id) {

            $product = Product::where('id',$id)->first();

            $imagePath = public_path('products/'.$product->image);
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
            $product->delete();
            return back();
    }
}
