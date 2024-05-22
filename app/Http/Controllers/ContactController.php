<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //direct contact list page
   public function list() {
    $contact =Contact::when(request('key'),function($query){
        $query->where('name','like','%'.request('key').'%');
    })
                 ->orderBy('created_at','desc')
                 ->paginate(5);
        $contact->appends(request()->all());
    return view('admin.contact.list',compact('contact'));
   }
    
   //admin delete user's contact info
    public function delete($id) {
        Contact::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Message delete Success']);
    }
}
