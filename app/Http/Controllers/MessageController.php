<?php

namespace App\Http\Controllers;

use App\Job;
use App\Message;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function sendMessage(Request $request){

       $checkMessage = Message::where('user_id',json_decode($request->user_id))->where('student_id',json_decode($request->student_id))->where('job_id',json_decode($request->job_id))->first();
       if(!$checkMessage or $request->job_id == null){
           $message = new Message;
           $message->user_id = json_decode($request->user_id);
           $message->message = $request->message;
           $message->student_id = json_decode($request->student_id);
           $message->job_id = json_decode($request->job_id);
           if($message->save()){
               return response('your message as been send successfully',201)->header('Content-Type', 'text/plain');
           };
       }else{
           return response('you dont sent more than one message to this match',201)->header('Content-Type', 'text/plain');
       }

    }
    public function confirm(Request $request){
       if($request->type == 'student'){
           $confirm = Profile::where('user_id',json_decode($request->id))->update(['confirm'=>json_decode($request->bool)]);
           if($confirm){
               return response('updated confirm successfully',201)->header('Content-Type', 'text/plain');
           }else{
               return response('something warng',500)->header('Content-Type', 'text/plain');
           }
       }else{
           $confirm = Job::where('id',json_decode($request->id))->update(['confirm'=>json_decode($request->bool)]);
           if($confirm){
               return response('updated confirm successfully',201)->header('Content-Type', 'text/plain');
           }else{
               return response('something warng',500)->header('Content-Type', 'text/plain');
           }
       }
    }



    public function getMessages($id,$type){
        if($type == 'old'){
            $messages = Message::where('user_id',$id)->where('read',true)->get('message')->toArray();
            if($messages){
                return $messages;
            }else{
                return 'dont found any message';
            }
        }else if($type == 'profile'){
            $messages = Message::where('user_id',$id)->where('read',false)->whereNull('student_id')->get('message')->toArray();
            if($messages){
                return $messages;
            }else{
                return 'dont found any message';
            }
        }

    }

    public function confirmMessages(Request $request){
        if($request->type === 'matches'){
            $confirm = Message::where('user_id',$request->id)->whereNotNull('student_id')->update(['read'=>true]);
            if($confirm > 0 ){
                return response('your matches messages is confirm now',201);
            }else{
                return response('something faild',200);
            }
        }else if($request->type === 'notes'){
            $confirm = Message::where('user_id',$request->id)->whereNull('student_id')->update(['read'=>true]);
            if($confirm > 0 ){
                return response('your notes messages is confirm now',201);
            }else{
                return response('something faild',200);
            }
        }
    }
     public function getCountMessages($id){
        $messages = Message::where('user_id',$id)->where('read',false)->get();
        $count = count($messages);
        return $count;
    }
}
