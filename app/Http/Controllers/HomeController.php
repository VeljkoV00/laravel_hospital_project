<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appoitment;

class HomeController extends Controller
{
    public function redirect (){


        if(Auth::id()){

            if(Auth::user()->usertype == '0'){
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            }
            else{
                 return view('admin.home' );
            }


        }

        else{
            return redirect()->back();
        }
    
}

   public function index(){
      
    
     if(Auth::id()){

        return redirect('home');
      }

      else{
        
            $doctor = Doctor::all();
           return view('user.home', compact('doctor'));
       
     
      }
}

  public function appoitment(Request $request){
       

    $data = new appoitment;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->doctor = $request->doctor;
    $data->date = $request->date;
    $data->message = $request->message;
    $data->status = 'In Progress';

    if(Auth::id()){

        $data->user_id = Auth::user()->id;
    }
      $data->save();

      return redirect()->back()->with('message', 'Appoitmnent done successfuly');

  }



  public function myappoitment(){
      

      if(Auth::id()){
       $userid = Auth::user()->id;

    

      

       $appoint = Appoitment::where('user_id', $userid)->get();
        return view('user.myappoitment', compact('appoint'));

      }

     else{

        return redirect()->back();
     }
  }


  public function appointment_delete ($id){



    $data = Appoitment::find($id);
    $data->delete();


    return redirect()->back();



  }


}