<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $categories = new Category;

        $categories->name = $request->input('name');

        $categories->save();
        return redirect('/category');
    }
}

