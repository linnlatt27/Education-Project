<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    //direct teacher list page

    public function list() {
        $teachers=Teacher::select('teachers.*','categories.name as category_name')
                       ->when(request('key'),function($query){
             $query->where('teachers.name','like','%'.request('key').'%');
        })
                      ->leftJoin('categories','teachers.category_id','categories.id')
                      ->orderBy('teachers.created_at','desc')
                      ->paginate(5);
            $teachers->appends(request()->all());
        return view('admin.teacher.list',compact('teachers'));
    }

    //direct add teacher page
    public function createPage() {
        $categories =Category::select('id','name')->get();
        return view('admin.teacher.create',compact('categories'));
    }

    //teacher info delete 
    public function delete($id) {
        Teacher::where('id',$id)->delete();
        return redirect()->route('teacher#list')->with(['deleteSuccess'=>'Teacher Deleted']);
    }

    //direct teacher create page
    public function createTeacher(Request $request) {
        $this->teacherValidationCheck($request,"create");
        $data =$this->requestTeacherInfo($request);

        $fileName =uniqid().$request->file('teacherImage')->getClientOriginalName();
        $request->file('teacherImage')->storeAs('public/'.$fileName);
        $data['image'] =$fileName;
    
        Teacher::create($data);
        return redirect()->route('teacher#list');
    }
    
    //direct edit teacher page
    public function edit($id) { 
        $teacher=Teacher::select('teachers.*','categories.name as category_name')
                        ->join('categories','teachers.category_id','categories.id')
                        ->where('teachers.id',$id)->first();
        return view('admin.teacher.edit',compact('teacher'));
    }

        //direct update page
        public function updatePage($id) {
            $teacher =Teacher::where('id',$id)->first();
            $category =Category::get();
            return view('admin.teacher.update',compact('teacher','category'));
        }
           
        //update teacher
        public function update(Request $request) {
            $this->teacherValidationCheck($request,"update");
            $data =$this->requestTeacherInfo($request);
           
            if($request->hasFile('teacherImage')) {
                $oldImageName =Teacher::where('id',$request->teacherId)->first();
                $oldImageName =$oldImageName->image;
    
             if($oldImageName !=null) {
                Storage::delete('public/'.$oldImageName);
             }
    
             $fileName =uniqid().$request->file('teacherImage')->getClientOriginalName();
             $request->file('teacherImage')->storeAs('public/'.$fileName);
             $data['image'] =$fileName; 
            }
    
            Teacher::where('id',$request->teacherId)->update($data);
            return redirect()->route('teacher#list');
        }  
    

    //request teacher info
    private function requestTeacherInfo($request) {
        return [
            'name'=>$request->teacherName,
            'category_id'=>$request->courseCategory,
            'message'=>$request->courseMessage,
        ];
    }

    //teacher validation check
    private function teacherValidationCheck($request,$action) {
        $validationRules = [
            'teacherName'=>'required|unique:teachers,name,'.$request->teacherId,
            'courseCategory'=>'required',
            'courseMessage'=>'required',               
        ];

        $validationRules['teacherImage'] =$action =="create"? 'required|mimes:jpg,jpeg,png,webp|file':"mimes:jpg,jpeg,png,webp|file";
        
        Validator::make($request->all(),$validationRules)->validate();
    }
}
