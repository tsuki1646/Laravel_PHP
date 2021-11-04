<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function AllCat()
    {
        //$categories = Category::all(); //Lesson26
        //$categories = Category::latest()->get();
        //$categories = DB::table('categories')->latest()->get();
        //$categories = DB::table('categories')->latest()->paginate();
        //$categories = DB::table('categories')->latest()->paginate(5);
        $categories = Category::latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function AddCat(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            //'body' => 'required',
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category Less Than 255 Chars'
        ]);

        /** Way1: Lesson 22,23: created_at */
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at'=> Carbon:: now()
        ]);

        /** Way2: Lesson 24: ORM: Each database table has a corresponding "Model" */
        /**Lesson 24: created_at, updated_at */
        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        /** Way3: Lesson 25: Queries Builder */ 
        /**Lesson 24: created_at: NULL, updated_at: NULL */
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success', 'Category Insert Successfully');  
    }
}
