<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function Add_Category()
    {
        return view('admin.category.category_add_form');
    }
    public function Save_Category(Request $request)
    {
        //        return $request->all();
        $validated = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
        'category_description' => 'required',
        'publication_status' => 'required',
       ]);

        // The blog post is valid...
        $category=new Category;
        $category->Category_Name=$request->category_name;
        $category->Category_Description=$request->category_description;
        $category->Publication_Status=$request->publication_status;
        $category->save();
        
        //return back();
        return redirect('/Add/Category')->with('category_add_msg','Category_added_successfully');
    }
    
    public function manage_Category()
    {
        $categories=Category::paginate(5);
        return view('admin.category.category_manage',['categories'=>$categories]);
    }
    
    public function unpublish_category($id)
    {
       $category=Category::find($id);
       $category->Publication_Status=0;
       $category->save();
       return back()->with('status_msg','Category_unpublished_successfully');; 
    }
    
    public function publish_category($id)
    {
       $category=Category::find($id);
       $category->Publication_Status=1;
       $category->save();
       return back()->with('status_msg','Category_published_successfully');; 
    }
    public function category_delete($id)
    {
       $category=Category::find($id);
       $category->delete();
       return back()->with('status_msg','Category_deleted_successfully');; 
    }
    
    public function category_edit($id)
    {
       $category=Category::find($id);
       return view('admin.category.category_edit_form',['categories'=>$category]);
       return back()->with('status_msg','Category_deleted_successfully');; 
    }
    
    public function update_Category(Request $request)
    {
        //        return $request->all();
        $validated = $request->validate([
        'category_name' => 'required',
        'category_description' => 'required',
        'publication_status' => 'required',
       ]);

        // The blog post is valid...
        $category=Category::find($request->category_id);
        $category->Category_Name=$request->category_name;
        $category->Category_Description=$request->category_description;
        $category->Publication_Status=$request->publication_status;
        $category->save();
        
        //return back();
        return redirect('/manage/Category')->with('category_add_msg','Category_updated_successfully');
    }
   
}
