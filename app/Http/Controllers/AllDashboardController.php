<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use App\Models\Contact;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Certificate;
use Illuminate\Http\Request;

class AllDashboardController extends Controller
{
    //admin's all dashboard
    public function list() {
        $category =Category::get();
        $course =Course::get();
        $teacher =Teacher::get();
        $order =Order::get();
        $contact =Contact::get();
        $certificate =Certificate::get();
        $user =User::where('role','user')->get();
        $admin =User::where('role','admin')->get();
        return view('admin.allDashboard.list',compact('category','course','teacher','order','contact','certificate','user','admin'));
    }

}
