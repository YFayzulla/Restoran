<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function setLang($locale){
        app()->setlocale($locale);
        Session::put('locale',$locale);
        return redirect()->back();
    }
    public function index(Request $request,$locale) {
        //set’s application’s locale
        app()->setLocale($locale);

        //Gets the translated message and displays it
        return view('index');
    }
}
