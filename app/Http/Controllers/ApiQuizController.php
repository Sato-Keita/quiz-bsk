<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Quiz;
use App\Select;

class ApiQuizController extends Controller
{

  public function index(){
    // DBよりSnsテーブルの値を全て取得
    $quizzes = User::all();
    // 取得した値をビュー「sns/index」に渡す
    return $quizzes;
  }

  public function list(){
    //$quizzes = DB::table("quizzes")->join('selects', 'quizzes.id', '=', 'selects.quiz_id')->get();
    $quizzes = Quiz::all();
    \Debugbar::info($quizzes[1]->selects);

    // $_selects = DB::table('selects')->orderByRaw('quiz_id ASC')->get();
    // \Debugbar::info($_selects);

    // $restart_index = 0;
    // for($i=0; $i<count($quizzes); $i++){
      
    //   $selects = array();
      
    //   for($j=$restart_index; $j<count($_selects); $j++){
        
    //     if($quizzes[$i]->id == $_selects[$j]->quiz_id){
    //       array_push($selects, $_selects[$j]);
    //     }else{
    //       break;
    //     }

    //   }
      
    //   \Debugbar::info($selects);
    //   $add_selects = array('selects'=>$selects);
    //   \Debugbar::info($add_selects);
    //   \Debugbar::info($quizzes[$i]->attributes["id"]);
    //   //artributeにアクセスする方法
    //   //array_push($quizzes[$i], $add_selects);
    //   $restart_index = $j;
    //}


                
    return $quizzes;
  }

  public function detail($id){
    return $id;
  }
}
