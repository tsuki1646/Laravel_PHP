<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function AllCat(){
        return view('admin.category.index');
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
            'categoy_name' => 'required|unique:categories|max:255',
            'body' => 'required',
        ],
        [
            'categoy_name.required' => 'Please Input Category Name',
            'categoy_name.max' => 'Category Less Than 255 Chars'
        ]
    );
    }
}
