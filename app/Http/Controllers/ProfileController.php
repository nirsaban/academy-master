<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Job;
use App\Like;
use App\Message;
use App\Profile;
use App\User;
use App\Watch;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function CvUploadPost(Request $request){
        $validator = Validator::make($request->all(),[
            'cv'=> 'required',

        ],
            [
                'cv.required'=>'you must choose Pdf file before sending',
            ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $fileName =   $_FILES['cv']['name'];
        $request->cv->move(public_path('cvStudent/_'.Auth::id()), $fileName);
        $id = Auth::id();
        if(Profile::updateOrCreate(['user_id' => $id],["cv" => $fileName])){
            return redirect()->back()->with('message', 'Cv add!!');
        }else{
            return redirect('/placement');
        }
    }
    public function getInput($item){
        return view("student.partials.input$item");
    }

    public function cvFormat(){

        $cvFile = Course::where('id',Auth::user()->course_id)->value('cvFormat');
       return view('student/cvFormat',compact('cvFile'));

    }
    public function show($id)
    {

        if($id != Auth::id()){
            return  redirect('/');
        }
        $catId = Profile::where('user_id',$id)->value('category_id');
        $profile['StudentCategory'] =$catId != null ? Profile::where('category_id',$catId)->get()->count(): 0;
        $profile['allJobCat'] = $catId != null ?  Job::where('category_id',$catId)->get()->count() : 0;
//        $profile['allStart'] = $catId != null ?

        $profile['watches'] = Watch::where('watched',$id)->get()->count();
        $profile['categories'] = Category::where('course_id',Auth::user()->course_id)->get()->toArray();
        $profile['profile'] = Profile::with('category')->where('user_id',$id)->get()->toArray();
        $course = User::with('course')->where('id',$id)->get()->toArray();
        $profile['courseName'] = $course[0]['course']['name'];
        $profile['studentCourse'] = User::where('course_id',Auth::user()->course_id)->get()->count();
        $profile['jobsCourse'] = Job::where('course_id',Auth::user()->course_id)->get()->count();
        $presentAll = Profile::where('user_id',$id)->get(['category_id','about_me', 'education', 'my_skills', 'links','work_experience','image'])->toArray();
        if (isset($presentAll[0])){
            foreach ($presentAll[0] as $key => $value){
                if($value != null){
                    $presents[$key] = $value;
                }
            }
            $profile['present'] = $presents ?? '';
        }
        return view('student.profileTest',$profile);
        $profile = [];
        $profile['name'] = User::find($id)->name;
        $profile['cat_name'] = Category::select('cat_name')->where('id',User::find($id)->profile()->value('category_id'))->value('cat_name');
        $profile['categories'] = Category::where('course_id',Auth::user()->course_id)->get()->toArray();
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

        $profile['newMatches'] = Message::where('user_id',Auth::id())->whereNotNull('student_id')->where('read',false)->get()->toArray();
        return view('student.profile',$profile);
    }
    public function update(Request $request){
        $id = json_decode($request->id);
        $col = $request->item;
        $val = $col == 'category_id' ? json_decode($request->value): $request->value;

        if(Profile::updateOrCreate(['user_id' => $id],["$col" => $val])){
            return response('success update', 201)->header('Content-Type', 'text/plain');
        }else{
            return response('something failed', 500)->header('Content-Type', 'text/plain');
        }

//        $col = $request->item;
//        $val = $col == 'category_id' ? json_encode($request->value): $request->value;
//        $id = json_decode($request->id);
//        if(Profile::updateOrCreate(['user_id' => $id],["$col" => $val])){
//            return response('success update', 201)->header('Content-Type', 'text/plain');
//        }else{
//            return response('something failed', 500)->header('Content-Type', 'text/plain');
//        }
    }


    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $fileName =   $_FILES['image']['name'];
        $request->image->move(public_path('images/_'.Auth::id()), $fileName);
        $col = $request->item;
        $id = json_decode($request->id);
        if(Profile::updateOrCreate(['user_id' => $id],["image" => $fileName])){
            return redirect('profile/'.Auth::id());
        }else{
            return redirect('welcome');
        }

    }
    public function reset(Request $request){
        $id = json_decode($request->id);
        $reset = Profile::where('user_id', $id)->update(['category_id'=>null,'about_me'=>null,'education'=>null,
            'my_skills'=>null,'links'=>null,'work_experience'=>null,'image'=>null,'confirm'=>0]);
        if($reset){
          return response('success reset', 201)->header('Content-Type', 'text/plain');
        }else{
            return response('something failed', 500)->header('Content-Type', 'text/plain');
        }
    }
public function showWizardProfile($id){
        return view('student.buildProfile');
}
public function showPortFolio($id){
    if($id != Auth::user()->id){
        return redirect('profile/'.Auth::id());
    }
     $course = User::with('course')->where('id',$id)->get()->toArray();

     $profile = Profile::with('category')->where('user_id',Auth::id())->get()->toArray()[0];

     return view('student.BuildPortFolio',compact('course','profile'));
}
public function addPhoto(Request $request){

                $validator = Validator::make($request->all(),[
                    'file'=> 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',

                   ],
                    [
                        'file.mimes'=>'you must choose -> jpeg,png,jpg,gif,svg format',
                    ]);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator);
                }

                $position = json_decode($request->position);
                $item_postion = $position[0];
                $img_postion = $position[1];

                $theIndex = $item_postion.'_'.$img_postion;
                $fileName =   $_FILES['file']['name'];
                $request->file->move(public_path('imagesPort/_'.Auth::id()),$theIndex.$fileName);
                $files_arr = ["$theIndex" => $fileName];
                $theImages =  Profile::where('user_id',Auth::id())->value('links');

                if($theImages){
                $theImagesArr = json_decode($theImages);
                $theImagesArr->$theIndex = $fileName;
                 if(Profile::updateOrCreate(['user_id' =>Auth::id()],["links" =>json_encode($theImagesArr)])){
                    return redirect('BuildPortFolio/'.Auth::id());
                }else{
                    return redirect('welcome');
                }

                }else{
                    if(Profile::updateOrCreate(['user_id' =>Auth::id()],["links" =>json_encode($files_arr)])){
                        return redirect('BuildPortFolio/'.Auth::id());
                    }else{
                        return redirect('welcome');
                    }
                }


}

 public function addInput(Request $request){
     $position = $request->position;
     $type = $request->type;
     $value = $request->value;
     $theIndex = $type.'_'.$position;
     $theImages =  Profile::where('user_id',Auth::id())->value('links');
     if($theImages){
        $theImagesArr = json_decode($theImages);
        $theImagesArr->$theIndex = $value;
         if(Profile::updateOrCreate(['user_id' =>Auth::id()],["links" =>json_encode($theImagesArr)])){
            return response('updated confirm successfully',201)->header('Content-Type', 'text/plain');
        }else{
            return response('faild',500)->header('Content-Type', 'text/plain');
        }

        }else{
            $files_arr = ["$theIndex" => $value];
            if(Profile::updateOrCreate(['user_id' =>Auth::id()],["links" =>json_encode($files_arr)])){
                return response('updated confirm successfully',201)->header('Content-Type', 'text/plain');
            }else{
                return response('faild',500)->header('Content-Type', 'text/plain');
            }
        }

 }
 public function getDataPort($id){
    $data =  Profile::where('user_id',json_decode($id))->value('links');
    $dataJson = json_encode($data);
    return response($dataJson,201)->header('Content-Type', 'text/plain');
 }
 public function deletePort($id)
 {

    if(Profile::where('user_id',json_decode($id))->update(array('links' => NULL))){
        return response('success',201)->header('Content-Type', 'text/plain');
    }else{
        return response('faild',500)->header('Content-Type', 'text/plain');
    }


 }
}
