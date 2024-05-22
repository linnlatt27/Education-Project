<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    //direct course list page

    public function list() {
        $courses=Course::select('courses.*','teachers.name as teacher_name','categories.name as category_name')
                       ->when(request('key'),function($query){
             $query->where('courses.title','like','%'.request('key').'%');
        })
                      ->leftJoin('teachers','courses.teacher_id','teachers.id')
                      ->leftJoin('categories','courses.category_id','categories.id')
                      ->orderBy('courses.created_at','desc')
                      ->paginate(5);
            $courses->appends(request()->all());
        return view('admin.course.list',compact('courses'));
    }

    //direct add course page
    public function createPage() {
        $categories =Category::select('id','name')->get();
        $teachers   =Teacher::select('id','name')->get();
        return view('admin.course.create',compact('categories','teachers'));
    }

    //course delete 
    public function delete($id) {
        Course::where('id',$id)->delete();
        return redirect()->route('course#list')->with(['deleteSuccess'=>'Course Deleted']);
    }

    //edit course page
    public function edit($id) { 
        $course=Course::select('courses.*','teachers.name as teacher_name','categories.name as category_name')
                        ->leftJoin('teachers','courses.teacher_id','teachers.id')
                        ->leftJoin('categories','courses.category_id','categories.id')
                        ->where('courses.id',$id)->first();
        return view('admin.course.edit',compact('course'));
    }

    //course create page
    public function createCourse(Request $request) {
        $this->courseValidationCheck($request,"create");
        $data =$this->requestCourseInfo($request);

        $fileName =uniqid().$request->file('courseImage')->getClientOriginalName();
        $request->file('courseImage')->storeAs('public/'.$fileName);
        $data['image'] =$fileName;
    
        Course::create($data);
        return redirect()->route('course#list');
    }

        //direct update page
    public function updatePage($id) {
        $course =Course::where('id',$id)->first();
        $category=Category::get();
        $teacher =Teacher::get();
        return view('admin.course.update',compact('course','category','teacher'));
    }
       
    //update course
    public function update(Request $request) {
        $this->courseValidationCheck($request,"update");
        $data =$this->requestCourseInfo($request);
       
        if($request->hasFile('courseImage')) {
            $oldImageName =Course::where('id',$request->courseId)->first();
            $oldImageName =$oldImageName->image;

         if($oldImageName !=null) {
            Storage::delete('public/'.$oldImageName);
         }

         $fileName =uniqid().$request->file('courseImage')->getClientOriginalName();
         $request->file('courseImage')->storeAs('public/'.$fileName);
         $data['image'] =$fileName; 
        }

        Course::where('id',$request->courseId)->update($data);
        return redirect()->route('course#list');
    }  

    //request course info
    private function requestCourseInfo($request) {
        return [
            'title'=>$request->courseTitle,
            'category_id'=>$request->courseCategory,
            'description'=>$request->courseDescription,
            'teacher_id'=>$request->courseTeacher,
            'price'=>$request->coursePrice,
        ];
    }

    //course validation check
    private function courseValidationCheck($request,$action) {
        $validationRules = [
            'courseTitle'=>'required|unique:courses,title,'.$request->courseId,
            'courseCategory'=>'required',
            'courseDescription'=>'required',
            'courseTeacher'=>'required',
            'coursePrice'=>'required'                 
        ];

        $validationRules['courseImage'] =$action =="create"? 'required|mimes:jpg,jpeg,png,webp|file':"mimes:jpg,jpeg,png,webp|file";
        Validator::make($request->all(),$validationRules)->validate();
    }
}
