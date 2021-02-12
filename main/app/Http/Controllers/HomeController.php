<?php

namespace App\Http\Controllers;
use Illuminate\Support\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function updateUserIcon(Request $request){
        
        $request -> validate([
            'icon' => 'required|file'
        ]);
        $this -> deleteUserIcon();
        $this -> clearUserIcon();
        $image = $request -> file('icon');
        $ext = $image -> getClientOriginalExtension();
        $fileName = rand(100000 ,999999) . '_' . time();
        $dest = $fileName . '.' . $ext;
        $file = $image -> storeAs('icon' , $dest ,'public');
        $user = Auth::user();
        $user -> icon = $dest;
        $user -> save();
        
        return redirect() -> back();
    }
    public function clearUserIcon(){
        $this -> deleteUserIcon();
        $icon = Auth::user();
        $icon -> icon = null;
        $icon -> save();
        return redirect() -> back();
    }
    private function deleteUserIcon(){
         $user = Auth::user();
         $fileName = $user -> icon;
         $file = storage_path('app\public\icon/' .$fileName);
         File::delete($file);
          
    }
}
