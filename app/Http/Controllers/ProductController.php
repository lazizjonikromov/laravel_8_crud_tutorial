<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        return view('welcome', ['products' => $products]);  
    }

    public function create(){
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'price' => 'required'
        ]);
        $product = new Product;

        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id'); 
       
        $product->save();
        session()->flash('message', $product['title'].' succesfully saved');
        return redirect('/');
    }

    public function edit($product){
        $categories = Category::all();
        $product = Product::find($product);
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, $product)
    {
        $product = Product::find($product);
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        if ($request->hasfile('image')) {
            $destination = 'public/images/products' . $product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            $new_name = rand() . "_" . $image->getClientOriginalname();
            $image->move(public_path('public/images/products'), $new_name);
            $product->image = $new_name;
        }

        $product->update();
        session()->flash('message', $product['title'].' succesfully Updated');
        return redirect('/');
    }

    public function delete($product){
        Product::find($product)->delete();
        session()->flash('message', 'Product succesfully Deleted');
        return redirect()->back();
    }

    public function search(){
        $search_text = $_GET['query'];
        $products = Product::where('title', 'LIKE' , '%'.$search_text.'%')->with('category')->get();

        return view('products.search', compact('products'));
    }

}

