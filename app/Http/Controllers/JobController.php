<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Requests\JobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Job;
use App\Message;
use App\Profile;
use App\User;
use App\Watch;
use App\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function showForm(){
        $courses = Course::all();
        $message = Message::where('user_id',Auth::id())->where('read',false)->get();
        $counter = count($message);
        return view('employer.create',compact('courses','counter'));
    }
    public function create(JobRequest $request){

        json_decode($request->category_id);
        json_decode($request->course_id);
        $create = Job::create(['user_id'=>Auth::id()] +  $request->all());
        if($create->id){
            $id = $create->id;
            return view("employer.personalQuestions",compact('id'));
        }
    }
    public function getCategory(Request $request){
        $id = json_decode($request->id);
        $categories = Category::where('course_id',$id)->get();
        return view('employer/partials/selectCategory',compact('categories'));
    }

    public function getAllJobs(Request $request){
        $id = json_decode($request->id);
         if($request->courseId != null){
             $course_id = json_decode($request->courseId);
             return Job::with('category','course')->where('user_id',$id)->where('course_id',$course_id)->get();
         }else{
             return Job::with('category','course')->where('user_id',$id)->get();
         }
    }
    public function editJob($id,$courseId){
         $checkJob = Job::find($id);
         if($checkJob->user_id != Auth::id()){
          return redirect('/employer');
         }
        $job = Job::find($id);
        $categories =  Category::where('course_id',json_decode($courseId))->get();
        $message = Message::where('user_id',Auth::id())->where('read',false)->get();
        $counter = count($message);
        return view('employer.editJob',compact('job','categories','counter'));
    }
    public  function updateJob(Request $request){

             $updated =  Job::where('id',json_decode($request->id))->update(['category_id' => json_decode($request->category_id),
            'company'=> $request->company,'title'=> $request->title,'description'=>$request->description,
            'requirements'=> $request->requirements,'salary'=>$request->salary,'location'=>$request->location,
            'contact_email'=>$request->contact_email,'phone'=> $request->phone]);
            if($updated){
                return redirect('/employer')->with('message', 'the job updated!!');
            }
    }
    public function studentByCategory(Request $request){
        $id = json_decode($request->category_id);
        $students = Profile::with('user','category')->where('category_id',$id)->where('confirm','=',true)->get();
        if(count($students) == 0){
            return redirect()->back()->withErrors('NO student found from this category :(');
        }
        $title =  'Find the best student for your job !' ;
        $job_id = json_decode($request->job_id);
        $personality = Job::where('id', $job_id)->value('personality');
        foreach($students as $key => $student){
            $studentParse = json_decode($student->personality);
            $jobParse = json_decode($personality);
            $studentPer = (array)$studentParse;
            $job = (array) $jobParse;
            $student->present = $this->get_the_present_of_match($job,$studentPer);
            $grade_and_out = Grade::where('sku',$student['user']['sku'])->get(['grade','outstanding'])->toArray();
            $student['portfolio']  = isset($student['links']) ? true : false;
            if($grade_and_out){
                $student['grade'] = json_decode($grade_and_out[0]['grade']);
                $student['outstanding'] = json_decode($grade_and_out[0]['outstanding']);
            }else{
                $student['grade'] = 0;
             }

        }

        $message = Message::where('user_id',Auth::id())->where('read',false)->get();
        $counter = count($message);
        return view('employer.studentsByCategory',compact('students','title','job_id','counter','personality'));
         }
      public function destroy($id)
    {
       $job = Job::find($id)->delete();
        if($job){
            return response('your post deleted successfully', 201)->header('Content-Type', 'text/plain');
        }else{
            return response('something warn', 500)->header('Content-Type', 'text/plain');
        }
    }
    public function get_the_present_of_match($job,$student){
        $counter = 100;
        foreach($job as $key => $value){
             $value = json_decode(trim($value,'%'));
             $studentValue = json_decode(trim($student[$key],'%'));
             if($value != $studentValue){
                 $res = $value - $studentValue;
                 $counter -= abs($res)/5;
             }
        }
       return $counter;
    }
    public function showStudent(Request $request){
        $profile = [];
        $id = json_decode($request->id);
        $profile['name'] = User::find($id)->name;
         $profile['grade'] = User::with('grade')->where('id',$id)->get()->toArray();

        $profile['cat_name'] = Category::select('cat_name')->where('id',User::find($id)->profile()->value('category_id'))->value('cat_name');
        $profile['categories'] = Category::all()->toArray();
        $profile['allData'] = Profile::where('user_id',$id)->get();
        $presentAll = Profile::where('user_id',$id)->get(['category_id','about_me', 'education', 'my_skills', 'links','work_experience','image'])->toArray();
        if (isset($presentAll[0])){
            foreach ($presentAll[0] as $key => $value){
                if($value != null){
                    $present[$key] = $value;
                }
            }
            $profile['present'] = $present;
        }
        $profile['id'] = $id;
        $profile['job_id'] = $request->job_id;
        $message = Message::where('user_id',Auth::id())->where('read',false)->get();
        $counter = count($message);
        $checkWatch = Watch::where('watch',json_decode($request->job_id))->where('watched',$id)->value('id');
        if(!$checkWatch){
           $watch =  Watch::create(['watch'=>json_decode($request->job_id),'watched'=>$id]);
        }
        return view('employer.studentByCategory',$profile);
    }

    public function showPortfolio($id){
        $course = User::with('course')->where('id',json_decode($id))->get()->toArray();

        $profile = Profile::with('category')->where('user_id',json_decode($id))->get()->toArray()[0];
  $theMaster = 'employerMaster';
     return view('employer.portfolioStudent',compact('course','profile','id','theMaster'));
    }



     public function personalQuistionsIndex($id){
         dd($id);
     }

     public function addPq(Request $request){

          if(JOB::where('id',$request->id)->update(array('personality' => json_encode($request->pq)))){
            return response('success', 201)->header('Content-Type', 'text/plain');
          };

     }
}
