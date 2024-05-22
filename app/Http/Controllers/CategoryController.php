<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct category list page
    public function categoryList() {
        $categories =Category::when(request('key'),function($query){
            $query->where('name','like','%'.request('key').'%');
        })
                     ->orderBy('id','desc')
                     ->paginate(4);
            $categories->appends(request()->all());
        return view('admin.category.list',compact('categories'));
    }

    //direct category createPage
    public function categoryCreatePage() {
        return view('admin.category.create');
    }

    //category create
    public function categoryCreate(Request $request) {
        $this->categoryValidationCheck($request);
        $data=$this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route('admin#categoryList');
    }

    //delete category
    public function categoryDelete($id) {
        Category::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Category Deleted']);
    }

    //direct edit page
    public function categoryEdit($id) {
        $category =Category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }

    //update category
    public function categoryUpdate(Request $request) {
        $this->categoryValidationCheck($request);
        $data=$this->requestCategoryData($request);
        Category::where('id',$request->categoryId)->update($data);
        return redirect()->route('admin#categoryList');
    }

    //category validation check
    private function categoryValidationCheck($request) {
        Validator::make($request->all(),[
             'categoryName'=>'required|unique:categories,name,'.$request->categoryId,
        ])->validate();
    }
    
    //request categoryData
    private function requestCategoryData($request) {
       return [
        'name'=>$request->categoryName
       ];
    }
}
