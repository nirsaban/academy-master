<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LikeController extends Controller
{
public function insert(Request $request){
    $role = $request->role;
    $stu_id = $request->student_id;
    $job_id = $request->job_id;
    if($role == 'student'){

        $checkLike =  DB::select("SELECT * FROM `likes` WHERE `student_id` = ? AND `job_id` = ? AND(`role` = 'student' OR `role` = 'match')",[$stu_id,$job_id]);
        if($checkLike){
            return response('You dont can send more then 1 like ',201)->header('Content-Type', 'text/plain');
        }else{
            $checkMatch = Like::where('student_id',$request->student_id)->where('job_id',$request->job_id)->where('role','employer')->get()->toArray();
            if(!empty($checkMatch)){
              Like::where('id',$checkMatch[0]['id'])->update(['role'=>'match']);
              return response('your Like add successfully',201)->header('Content-Type', 'text/plain');
            }else{
                $like = new Like;
                $like->student_id = $request->student_id;
                $like->job_id = $request->job_id;
                $like->role = 'student';
                if($like->save()){
                    return response('your Like add successfully',201)->header('Content-Type', 'text/plain');
                };
            }
        }

    }else{

        $checkLike =  DB::select("SELECT * FROM `likes` WHERE `student_id` = ? AND `job_id` = ? AND(`role` = 'employer' OR `role` = 'match')",[$stu_id,$job_id]);
        if($checkLike){
            return response('You dont can send more then 1 like ',201)->header('Content-Type', 'text/plain');
        }else{
            $checkMatch = Like::where('student_id',$request->student_id)->where('job_id',$request->job_id)->where('role','student')->get()->toArray();
            if(!empty($checkMatch)){
              Like::where('id',$checkMatch[0]['id'])->update(['role'=>'match']);
              return response('your Like add successfully',201)->header('Content-Type', 'text/plain');
            }else{
                $like = new Like;
                $like->student_id = $request->student_id;
                $like->job_id = $request->job_id;
                $like->role = 'employer';
                if($like->save()){
                    return response('your Like add successfully',201)->header('Content-Type', 'text/plain');
                };
            }
        }
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
