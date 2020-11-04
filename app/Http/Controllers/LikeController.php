<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
public function insert(Request $request){
     $checkLike =  Like::where('love',$request->love)->where('beloved',$request->beloved)->first();
    if(!$checkLike){
    $like = new Like;
    $like->love = $request->love;
    $like->beloved = $request->beloved;
    $like->rilation = $request->rilation;
    if($like->save()){
        return response('your Like add successfully',201)->header('Content-Type', 'text/plain');
    }else{
        return response('something warng',500)->header('Content-Type', 'text/plain');
    }
  }else{
    return response('You dont can send more then 1 like ',201)->header('Content-Type', 'text/plain');
  }
 }
public function saveThedate(Request $request){
  $date = Like::where('id',$request->id)->update(['interview_date'=>$request->date]);
  if($date){
      return response('the date as been saved successfully',201);
  }else{
      return response('something faild',200);
  }
}
public function updateStatus(Request $request){
    $message = $request->message ?? null;
    $status = Like::where('id',$request->id)->update(['status'=>$request->status,'status_message'=>$message]);
    if($status){
        return response($request->status,201);
    }else{
        return response('something faild',200);
    }
}
}
