<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;
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
      $quizzes = Quiz::paginate(20);
      // 取得した値をビュー「sns/index」に渡す
      return view('quiz/index', compact('quizzes'));
    }
      
    public function edit($id){
      // DBよりURIパラメータと同じIDを持つBookの情報を取得
      $quiz = Quiz::findOrFail($id);
      $categories = Category::all();

      $selects = Select::where('quiz_id', $id)->get();
      if( count($selects) == 0 ){
        $select = new Select();
        $select->quiz_id = "";
        $select->selection = "";
        $select->is_answer = "";
        $selects = array();
        array_push($selects, $select);
      }

      $quiz_categories = QuizCategory::where('quiz_id', $id)->get();
      if( count($quiz_categories) == 0 ){
        $quiz_category = new QuizCategory();
        $quiz_category->quiz_id = "";
        $quiz_category->category_id = "";
        $quiz_categories = array();
        array_push($quiz_categories, $quiz_category);
      }
      // 取得した値をビュー「sns/edit」に渡す
      return view('quiz/edit', compact('quiz', 'categories', 'selects', 'quiz_categories'));
    }
      
    public function update(QuizRequest $request, $id){
      $path = $request->file('file')->store('public/quiz');
      $main_image = basename($path);

      $quiz = Quiz::findOrFail($id);
      $quiz->main_image = $main_image;
      $quiz->question = $request->question;
      $quiz->answer = $request->answer;
      $quiz->explain = $request->explain;
      $quiz->save();


      $selection = $request->selection;
      $selection_list = preg_split("/[\s,]+/", $selection);
      $is_answer = $request->is_answer;
      $is_answer_list = preg_split("/[\s,]+/", $is_answer);
      
      $_select = Select::where("quiz_id", $id)->delete();
      for($i=0; $i<count($selection_list); $i++){
        $select = new Select();
        $select->quiz_id = $quiz->id;
        $select->selection = $selection_list[$i];
        $select->is_answer = $is_answer_list[$i];
        $select->save();
      }

      $category_id = $request->category_id;
      $category_id_list = preg_split("/[\s,]+/", $category_id);

      $_quiz_category = QuizCategory::where("quiz_id", $id)->delete();
      for($i=0; $i<count($category_id_list); $i++){
        $quiz_category = new QuizCategory;
        $quiz_category->quiz_id = $quiz->id;
        $quiz_category->category_id = $category_id_list[$i];
        $quiz_category->save();
      }

      return redirect("/manage/quiz");
    }
      
    public function destroy($id){
      $quiz = Quiz::findOrFail($id);
      $quiz->delete();
      return redirect("/manage/quiz");
    }
    public function create(){
      // 空のインスタンスを渡す
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
        
    public function store(QuizRequest $request){
      $path = $request->file('file')->store('public/quiz');
      $main_image = basename($path);

      $quiz = new Quiz();
      $quiz->main_image = $main_image;
      $quiz->question = $request->question;
      $quiz->answer = $request->answer;
      $quiz->explain = $request->explain;
      $quiz->save();


      $selection = $request->selection;
      $selection_list = preg_split("/[\s,]+/", $selection);
      $is_answer = $request->is_answer;
      $is_answer_list = preg_split("/[\s,]+/", $is_answer);
      
      for($i=0; $i<count($selection_list); $i++){
        $select = new Select();
        $select->quiz_id = $quiz->id;
        $select->selection = $selection_list[$i];
        $select->is_answer = $is_answer_list[$i];
        $select->save();
      }


      $category_id = $request->category_id;
      $category_id_list = preg_split("/[\s,]+/", $category_id);

      for($i=0; $i<count($category_id_list); $i++){
        $quiz_category = new QuizCategory;
        $quiz_category->quiz_id = $quiz->id;
        $quiz_category->category_id = $category_id_list[$i];
        $quiz_category->save();
      }

      return redirect("/manage/quiz");
    }
}
