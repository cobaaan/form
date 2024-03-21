<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Contact;

class FormController extends Controller
{
    public $showModal = false;

    public function contact(){
        return view('contact');
    }
    
    public function confirm(){
        return view('confirm');
    }

    public function thanks(){
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
