<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicCOntroller extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('welcome'); 
    }

    public function welcome() {
        $products= Product::all()->sortDesc(); 
        return view('welcome', compact('products'));
    }

    public function contact(){
        return view('email/contact'); 
    }


    public function thank($name){
        $products= Product::all(); 
        return view('email/thank', compact('name'), compact('products')); 
    }
    
    public function submit(Request $request){
        $name= $request->input('name');
        $email= $request->input('email');
        $comment= $request->input('comment'); 

        Mail::to($email)->send(new ContactMail($name, $email, $comment)); 
        // return redirect(route('contact.us'))->with('message', 'email inviata con successo!'); 
        return redirect(route('contact.thank', compact('name'))); 
    }

    public function userDestroy(){
        $user_products= Auth::user()->products();
        foreach($user_products as $user_product){
            $user_product->update(
                ['user_id'=>NULL],
            ); 
        }

        Auth::user()->delete();

        return redirect(route('homePage'))->with('message', 'utente eliminato con successo!'); 
    }
}
