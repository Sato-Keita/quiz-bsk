<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Category;
use App\QuizCategory;
use App\Select;

class QuizController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
      // DBよりSnsテーブルの値を全て取得
      $quizzes = Quiz::all();
      // 取得した値をビュー「sns/index」に渡す
      return $quizzes;
    }
      
    public function edit($id){
      // DBよりURIパラメータと同じIDを持つBookの情報を取得
      $quiz = Quiz::findOrFail($id);
      $categories = Category::all();

      $selects = Select::where('quiz_id', $id)->get();
      $quiz_categories = QuizCategory::where('quiz_id', $id)->get();
      // 取得した値をビュー「sns/edit」に渡す
      return view('quiz/edit', compact('quiz', 'categories', 'selects', 'quiz_categories'));
    }
      
    public function update(Request $request, $id){
      $quiz = Quiz::findOrFail($id);
      $quiz->main_image = $request->main_image;
      $quiz->question = $request->question;
      $quiz->save();
      return redirect("/manage/quiz");
    }
      
    public function destroy($id){
      $quiz = Quiz::findOrFail($id);
      $quiz->delete();
      return redirect("/manage/quiz");
    }
    public function create(){
      // 空の$userを渡す
      $quiz = new Quiz();

      $categories = Category::all();
      
      $quiz_category = new QuizCategory();
      $quiz_category->quiz_id = "";
      $quiz_category->category_id = "";
      $quiz_categories = array();
      array_push($quiz_categories, $quiz_category);

      $select = new Select();
      $select->quiz_id = "";
      $select->selection = "";
      $select->is_answer = "";
      $selects = array();
      array_push($selects, $select);

      return view('quiz/create', compact('quiz', 'categories', 'quiz_categories', 'selects'));
    }
        
    public function store(Request $request){
      dd($request);
      $quiz = new Quiz();
      $quiz->main_image = $request->main_image;
      $quiz->question = $request->question;
      $quiz->save();
      return redirect("/manage/quiz");
    }
}
