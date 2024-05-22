<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AllDashboardController;
use App\Http\Controllers\ForgetPasswordController;


Route::middleware(['admin_auth'])->group(function() {

   Route::redirect('/','loginPage');
   //login and register
   Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
   Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');
});


Route::middleware(['auth'])->group(function(){
   Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');

   Route::middleware(['admin_auth'])->group(function() {
      //admin category list
   Route::prefix('category')->group(function() {
      Route::get('list',[CategoryController::class,'categoryList'])->name('admin#categoryList');
      Route::get('create/page',[CategoryController::class,'categoryCreatePage'])->name('admin#categoryCreatePage');
      Route::post('create',[CategoryController::class,'categoryCreate'])->name('admin#categoryCreate');
      Route::get('delete/{id}',[CategoryController::class,'categoryDelete'])->name('admin#categoryDelete');
      Route::get('edit/{id}',[CategoryController::class,'categoryEdit'])->name('admin#categoryEdit');
      Route::post('update',[CategoryController::class,'categoryUpdate'])->name('admin#categoryUpdate');
     });

     
      //direct course list
      Route::prefix('course')->group(function() {
        Route::get('list',[CourseController::class,'list'])->name('course#list');
        Route::get('create',[CourseController::class,'createPage'])->name('course#createPage');
        Route::post('create',[CourseController::class,'createCourse'])->name('course#createCourse');
        Route::get('delete/{id}',[CourseController::class,'delete'])->name('course#delete');
        Route::get('edit/{id}',[CourseController::class,'edit'])->name('course#edit');
        Route::get('updatePage/{id}',[CourseController::class,'updatePage'])->name('course#updatePage');
        Route::post('update',[CourseController::class,'update'])->name('course#update');
       });

       //direct teacher list
      Route::prefix('teacher')->group(function() {
         Route::get('list',[TeacherController::class,'list'])->name('teacher#list');
         Route::get('create',[TeacherController::class,'createPage'])->name('teacher#createPage');
         Route::post('create',[TeacherController::class,'createTeacher'])->name('teacher#createTeacher');
         Route::get('delete/{id}',[TeacherController::class,'delete'])->name('teacher#delete');
         Route::get('edit/{id}',[TeacherController::class,'edit'])->name('teacher#edit');
         Route::get('updatePage/{id}',[TeacherController::class,'updatePage'])->name('teacher#updatePage');
         Route::post('update',[TeacherController::class,'update'])->name('teacher#update');
        });

       //order list
       Route::prefix('order')->group(function(){
         Route::get('list',[OrderController::class,'orderList'])->name('admin#orderList');
         Route::get('change/status',[OrderController::class,'changeStatus'])->name('order#changeStatus');
         Route::get('ajax/change/status',[OrderController::class,'ajaxChangeStatus'])->name('ajax#changeStatus');
         Route::get('listInfo/{orderCode}',[OrderController::class,'listInfo'])->name('order#listInfo');
         Route::get('delete/{id}',[OrderController::class,'delete'])->name('order#delete');
     });
  
      //admin change pw
      Route::get('admin/changePassword',[ProfileController::class,'directChangePassword'])->name('admin#directChangePassword');
      Route::post('admin/changePassword',[ProfileController::class,'changePassword'])->name('admin#changePassword');
  
      //profile details
       Route::get('profile/details',[ProfileController::class,'profileDetails'])->name('profile#details');
       Route::get('edit',[ProfileController::class,'edit'])->name('profile#edit');
       Route::post('update/{id}',[ProfileController::class,'update'])->name('profile#update');
     
       //acc details
     Route::prefix('account')->group(function() {
        Route::get('list',[ProfileController::class,'accountList'])->name('account#list');
        Route::get('delete/{id}',[ProfileController::class,'delete'])->name('account#delete');
        Route::get('change/role',[ProfileController::class,'accountChangeRole'])->name('account#ChangeRole');
     });
      
     //contact list
     Route::prefix('contact')->group(function() {
      Route::get('list',[ContactController::class,'list'])->name('contact#list');
      Route::get('delete/{id}',[ContactController::class,'delete'])->name('contact#delete');
  });

     //certificate list
     Route::prefix('certificate')->group(function() {
      Route::get('list',[CertificateController::class,'list'])->name('certificate#list');
      Route::get('delete/{id}',[CertificateController::class,'delete'])->name('certificate#delete');
  });
   
  //rating list
   Route::prefix('rating')->group(function() {
     Route::get('list',[RatingController::class,'list'])->name('rating#list');
});
    
//all dashboard list
   Route::prefix('allDashboard')->group(function() {
     Route::get('list',[AllDashboardController::class,'list'])->name('allDashboard#list');
});
  
    //user list
     Route::prefix('user')->group(function() {
      Route::get('list',[UserController::class,'userList'])->name('admin#userList');
      Route::get('change/role',[UserController::class,'userChangeRole'])->name('admin#userChangeRole');
      Route::get('delete/{id}',[UserController::class,'delete'])->name('admin#userDelete');
  });
 });


   Route::group(['prefix'=>'user','middleware'=>'user_auth'],function () {
      //direct title page
      Route::get('/homePage',[UserController::class,'home'])->name('user#home');
      Route::get('/aboutPage',[UserController::class,'about'])->name('user#about');
      Route::get('/coursePage',[UserController::class,'coursePage'])->name('user#coursePage');
      Route::get('/filter/{id}',[UserController::class,'filter'])->name('user#filter');
      Route::get('/history',[UserController::class,'history'])->name('user#history');
      Route::get('/teacherPage',[UserController::class,'teacherPage'])->name('user#teacherPage');
      Route::get('contactPage/{contactId}',[UserController::class,'contactPage'])->name('user#contactPage');
      Route::post('send',[UserController::class,'send'])->name('user#send');
     
      //course details
      Route::prefix('course')->group(function() {
          Route::get('details/{id}',[UserController::class,'details'])->name('user#details');
          Route::get('register/{id}',[UserController::class,'registerPage'])->name('user#registerPage');
      });
      
      //rating add
      Route::prefix('rating')->group(function() {
         Route::post('add-rating',[RatingController::class,'add'])->name('rating#add');
     });
      
     //review add
     Route::prefix('review')->group(function() {
      Route::get('add-review/{id}',[ReviewController::class,'add'])->name('review#add');
      Route::post('add-review',[ReviewController::class,'create'])->name('review#create');
      Route::post('update-review',[ReviewController::class,'update'])->name('review#update');
  });
   
       //cart list
      Route::prefix('cart')->group(function() {
         Route::get('list',[UserController::class,'cartList'])->name('user#cartList');
     });
     
     //direct certificate page
     Route::prefix('certificate')->group(function() {
      Route::get('certificatePage',[CertificateController::class,'certificatePage'])->name('user#certificatePage');
      Route::post('send',[CertificateController::class,'sendCertificate'])->name('user#sendCertificate');
   });

    //ajax cart,order,view count and clear course
      Route::prefix('ajax')->group(function() {
         Route::get('addToCart',[AjaxController::class,'addToCart'])->name('ajax#addToCart');
         Route::get('order',[AjaxController::class,'order'])->name('ajax#order');
         Route::get('clear/cart',[AjaxController::class,'clearCart'])->name('ajax#clearCart');
         Route::get('clear/current/course',[AjaxController::class,'clearCurrentProduct'])->name('ajax#clearCurrentCourse'); 
         Route::get('increase/viewCount',[AjaxController::class,'increaseViewCount'])->name('ajax#increaseViewCount');
      });
  
   
   });
});


//sign up and log in google
Route::get('auth/google',[GoogleController::class,'loginGoogle'])->name('auth#google');
Route::get('auth/google/call-back',[GoogleController::class,'callbackGoogle']);

//sign up and log in fb
Route::get('auth/facebook',[FacebookController::class,'facebookPage'])->name('auth#facebook');
Route::get('auth/facebook/callback',[FacebookController::class,'facebookRedirect']);

//forget pw
Route::get('forget/password',[ForgetPasswordController::class,'forgetPasswordPage'])->name('auth#forgetPasswordPage');
Route::post('forget/password',[ForgetPasswordController::class,'forgetPasswordPost'])->name('auth#forgetPasswordPost');
Route::get('reset/password/{token}',[ForgetPasswordController::class,'resetPassword'])->name('reset#Password');
Route::post('reset/password',[ForgetPasswordController::class,'resetPasswordPost'])->name('reset#PasswordPost');

//sign up and log in github
Route::get('auth/github',[GithubController::class,'loginGithub'])->name('auth#github');
Route::get('auth/github/callback',[GithubController::class,'callbackGithub']);
