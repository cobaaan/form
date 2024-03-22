<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Contact;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\CategoryRequest;

class FormController extends Controller
{
    public $showModal = false;

    public function contact(){
        $contacts = Contact::all();
        $categories = Category::all();
        return view('contact', compact('contacts', 'categories'));
    }
    
    public function confirm(ContactRequest $request){
        $requests = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'tell2', 'tell3', 'address', 'address2', 'category_id', 'detail']);
        return view('confirm', compact('requests'));
    }

    public function thanks(Request $request){
        $requests = $request->only(['category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail']);
        Contact::create($requests);
        return view('thanks');
    }
        
    public function admin(){
        $contacts = Contact::Paginate(7);
        $categories = Category::all();
        $showModal = null;
        return view('admin', compact('contacts', 'categories', 'showModal'));
    }

    public function modal(Request $request){
        $showModal = 'nu';
        $contacts = Contact::Paginate(7);
        $categories = Category::all();
        $requests = $request->all();
        unset($requests['_token']);
        return view('admin', compact('requests', 'contacts', 'categories', 'showModal'));
    }

    public function adminsearch(Request $request){
        $contacts = Contact::with('category')->CategorySearch($request->content)->get();
        $categories = Category::all();
        $showModal = null;
        return view('admin', compact('contacts', 'categories', 'showModal'));
    }

    public function adminDelete(){
        $showModal = null;
        return view('admin', compact('showModal'));
    }

    public function register(){
        return view('register');
    }
        
    public function login(){
        return view('login');
    }
}
