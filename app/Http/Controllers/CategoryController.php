<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
      // DBよりSnsテーブルの値を全て取得
      $categories = Category::paginate(20);
      // 取得した値をビュー「sns/index」に渡す
      return view('category/index', compact('categories'));
    }
      
    public function edit($id){
      // DBよりURIパラメータと同じIDを持つBookの情報を取得
      $category = Category::findOrFail($id);
      // 取得した値をビュー「sns/edit」に渡す
      return view('category/edit', compact('category'));
    }
      
    public function update(CategoryRequest $request, $id){
      $category = Category::findOrFail($id);
      $category->category_name = $request->category_name;
      $category->save();
      return redirect("/manage/category");
    }
      
    public function destroy($id){
      $category = Category::findOrFail($id);
      $category->delete();
      return redirect("/manage/category");
    }
    public function create(){
      // 空の$userを渡す
      $category = new Category();
      return view('category/create', compact('category'));
    }
        
    public function store(CategoryRequest $request){
      $category = new Category();
      $category->category_name = $request->category_name;
      $category->save();
      return redirect("/manage/category");
    }
}
