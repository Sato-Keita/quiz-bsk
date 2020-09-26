<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Sns;
use App\UserSns;

class UserController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }

  public function index(){
    // DBよりUsersテーブルの値を全て取得
    $users = User::paginate(20);
    // 取得した値をビュー「user/index」に渡す
    return view('user/index', compact('users'));
  }
  
  public function edit($id){
    // DBよりURIパラメータと同じIDを持つBookの情報を取得
    $user = User::findOrFail($id);
    $sns_list = Sns::all();
    $userSns_list = UserSns::where('user_id', $id)->get();
    if( count($userSns_list)==0 ){
      $userSns = new UserSns();
      $userSns->sns_name = "";
      $userSns->sns_url = "";
      $userSns_list =array();
      array_push($userSns_list, $userSns);
    }

    // 取得した値をビュー「user/edit」に渡す
    return view('user/edit', compact('user', 'sns_list', 'userSns_list'));
  }
  
  public function update(Request $request, $id){
    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->page_show = $request->page_show;
    $user->save();

    if( strlen ( $request->sns_id )>0 ){
      $sns_id = $request->sns_id;
      $sns_id_list = preg_split("/[\s,]+/", $sns_id);
      $sns_url = $request->sns_url;
      $sns_url_list = preg_split("/[\s,]+/", $sns_url);

      $_userSns = UserSns::where("user_id", $id)->delete();
      for($i=0; $i<count($sns_id_list) ; $i++){
        $userSns = new UserSns();
        $userSns->user_id = $user->id;
        $userSns->sns_id = $sns_id_list[$i];
        $userSns->sns_url = $sns_url_list[$i];
        $userSns->save();
      }
    }

    return redirect("/manage/user");
  }
  
  public function destroy($id){
    $user = User::findOrFail($id);
    $user->delete();
    return redirect("/manage/user");
  }

  public function create(){
    // 空の$userを渡す
    $user = new User();
    
    $userSns = new UserSns();
    $userSns->sns_name = "";
    $userSns->sns_url = "";
    $userSns_list =array();
    array_push($userSns_list, $userSns);

    $sns_list = Sns::all();

    return view('user/create', compact('user', 'sns_list', 'userSns_list') );
  }

  public function store(Request $request){
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->page_show = $request->page_show;
    $user->save();

    if( strlen ( $request->sns_id )>0 ){
      $sns_id = $request->sns_id;
      $sns_id_list = preg_split("/[\s,]+/", $sns_id);

      $sns_url = $request->sns_url;
      $sns_url_list = preg_split("/[\s,]+/", $sns_url);

      for($i=0; $i<count($sns_id_list) ; $i++){
        $userSns = new UserSns();
        $userSns->user_id = $user->id;
        $userSns->sns_id = $sns_id_list[$i];
        $userSns->sns_url = $sns_url_list[$i];
        $userSns->save();
      }
    }

    return redirect("/manage/user");
  }
}
