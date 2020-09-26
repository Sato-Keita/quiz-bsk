<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SnsRequest;
use App\Sns;

class SnsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
      // DBよりSnsテーブルの値を全て取得
      $sns_list = Sns::paginate(20);
      // 取得した値をビュー「sns/index」に渡す
      return view('sns/index', compact('sns_list'));
    }
      
    public function edit($id){
      // DBよりURIパラメータと同じIDを持つBookの情報を取得
      $sns = Sns::findOrFail($id);
      // 取得した値をビュー「sns/edit」に渡す
      return view('sns/edit', compact('sns'));
    }
      
    public function update(SnsRequest $request, $id){
      $path = $request->file('file')->store('public/sns');
      $sns_image = basename($path);

      $sns = Sns::findOrFail($id);
      $sns->sns_name = $request->sns_name;
      $sns->sns_image = $sns_image;
      $sns->save();
      return redirect("/manage/sns");
    }
      
    public function destroy($id){
      $sns = Sns::findOrFail($id);
      $sns->delete();
      return redirect("/manage/sns");
    }

    public function create(){
      // 空の$userを渡す
      $sns = new Sns();
      return view('sns/create', compact('sns'));
    }
    
    public function store(SnsRequest $request){
        $path = $request->file('file')->store('public/sns');
        $sns_image = basename($path);
        
        $sns = new Sns();
        $sns->sns_name = $request->sns_name;
        $sns->sns_image = $sns_image;
        $sns->save();
        return redirect("/manage/sns");
    }
}
