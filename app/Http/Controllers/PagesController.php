<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Job;
use App\Like;
use App\Message;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
  public function studentHome(){
      $userCategory = Profile::whereUserId(Auth::id())->value('category_id');
      $allJobs = $userCategory != null ? Job::with('category')->where('category_id',$userCategory)->where('confirm','=',true)->get() : Job::where('course_id',Auth::user()->course_id)->where('confirm',true)->get();
    if(count($allJobs) > 0){
    $personality = Profile::where('user_id', Auth::id())->value('personality');

      foreach($allJobs as $key => $job){
          $jobParse = json_decode($job->personality);
          $studentParse = json_decode($personality);
          $studentPer = (array)$studentParse;
          $jobPer = (array) $jobParse;
          $job->present = $this->get_the_present_of_match($jobPer,$studentPer);
      }
    }
      $title = 'Find your dream job';
      $second_title = User::find(Auth::id())->course()->value('name');
      $newMatches = Message::where('user_id',Auth::id())->whereNotNull('student_id')->where('read',false)->orderBy('created_at', 'desc')->get()->toArray();
      return view('student.home', compact( 'allJobs',  'title','userCategory','second_title','newMatches'));
  }
  public function get_the_present_of_match($job,$student){
    $counter = 100;
    foreach($student as $key => $value){
         $value = json_decode(trim($value,'%'));
         $jobValue = json_decode(trim($job[$key],'%'));

         if($value != $jobValue){
             $res = $value - $jobValue;
             $counter -= abs($res)/5;

         }
    }

   return $counter;
}
  public function employerHome(){
      $message = Message::where('user_id',Auth::id())->where('read',false)->get();
      $counter = count($message);
      $jobs = Job::with('category','course')->where('user_id',Auth::id())->get()->toArray();
      $title = 'Find new student ';
      $second_title = 'sort by course';
      $courses = Job::join('courses', 'jobs.course_id', '=', 'courses.id')->where('user_id',Auth::id())->get(['name','course_id'])->toArray();
      $courses = array_unique($courses,SORT_REGULAR);
      $newMatches = Message::where('user_id',Auth::id())->whereNotNull('student_id')->where('read',false)->get()->toArray();
      return view('employer.homeTest',compact('title','second_title','courses','newMatches','jobs'));
       $message = Message::where('user_id',Auth::id())->where('read',false)->get();
       $counter = count($message);
      $jobs = Job::with('category','course')->where('user_id',Auth::id())->get();
      $title = 'Find new student ';
      $second_title = 'sort by course';
      $courses = Job::join('courses', 'jobs.course_id', '=', 'courses.id')->where('user_id',Auth::id())->get(['name','course_id'])->toArray();
      $courses = array_unique($courses,SORT_REGULAR);
      $newMatches = Message::where('user_id',Auth::id())->whereNotNull('student_id')->where('read',false)->get()->toArray();
     return view('employer.home', compact('title','second_title','courses','newMatches'));
  }
  public function placementHome(){


        $matches = Like::where('role','match')->get()->toArray();
        if(!empty($matches)){
        $perfectMatches = [];
        foreach ($matches as $index => $row){
            $jobArr = Job::with('user','course','category')->where('id',$row['job_id'])->get()->toArray();
            $stuArr = User::with('profile')->where('id',$row['student_id'])->get()->toArray();
            $merge = array_merge($jobArr,$stuArr);
            $perfectMatches[$index]  = $merge ;
            $perfectMatches[$index]['matchId'] = $row['id'];
            $perfectMatches[$index]['interview_date'] = $row['interview_date'];
            $perfectMatches[$index]['status'] = $row['status'];
            $perfectMatches[$index]['status_message'] = $row['status_message'];
        }

       for ($i = 0;  $i < count($perfectMatches);  $i++){
           $message =  Message::where('student_id',$perfectMatches[$i][1]['id'])->where('job_id',$perfectMatches[$i][0]['id'])->get();
           if(count($message) == 2){
               $perfectMatches[$i][0]['message'] = 'full';
           }else if(count($message) == 1){
               $perfectMatches[$i][0]['message'] = 'half';
           }else if(count($message) == 0){
               $perfectMatches[$i][0]['message'] = 'empty';
           }

       }
     }else{
        $perfectMatches = [];
     }
       $title = "Hey ". Auth::user()->name ." see all match and send messages ";
       $checkCourses = Course::with('category','user','job')->get()->toArray();
        return view('placement.placementHome',compact('perfectMatches','title','checkCourses'));
  }
  public function adminHome(){
       $courses = Course::with('job','user')->get()->toArray();
       $success = Like::with('user','job')->where('status',true)->get()->toArray();
      return view('admin.adminHome',compact('courses','success'));
  }
}

