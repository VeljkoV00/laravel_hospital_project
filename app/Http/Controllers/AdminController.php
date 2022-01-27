<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appoitment;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function addview (){


        return view('admin.add_doctor');
    }

    public function upload(Request $request){

        $doctor = new doctor;

        $image = request()->file;

        $imagename = time().'.'.$image->getClientoriginalExtension();



        $request->file->move('docor_image', $imagename);
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->room = $request->room;
        $doctor->speciality = $request->spec;

        $doctor->save();

        return redirect()->back()->with('message', 'Successufully Added');


    }



    public function showappointment(){
        

        $data = Appoitment::all();

        return view('admin.showappointment', compact('data'));
    }


    public function approved($id){


        $data = Appoitment::find($id);
        $data->status = 'approved';
        $data->save();

        return redirect()->back();
    }

    public function canceled ($id){

        $data = Appoitment::find($id);
        $data->status = 'canceled';
        $data->save();

        return redirect()->back();

    }
    

    public function show_doctors (){
           

        $data = Doctor::all();
        return view('admin.showdoctor', compact('data'));
    }
    



    public function delete_doctor($id){
         

        $data = Doctor::find($id);
        $data->delete();
        

        return redirect()->back();



    }


    public function update_doctor ($id) {
        

        $data = Doctor::find($id);

        return view('admin.update_doctor', compact('data'));
    }



    public function editdoctor(Request $request,$id){

      $doctor = Doctor::find($id);

      $doctor->name = $request->name;
      $doctor->phone = $request->phone;
      $doctor->speciality = $request->speciality;
      $doctor->room = $request->room;
      $image = $request->file;
      if($image){
      
      $imagename= time().'.'.$image->getClientOriginalExtension();
      $request->file->move('docor_image', $imagename);
      $doctor->image= $imagename;
      }
      $doctor->save();


      return redirect()->back()->with('message');






    }


    public function emailview ($id){
         

        $data = Appoitment::find($id);

        return view('admin.emailview', compact('data'));
    }
    


    public function sendemail(Request $request, $id){
        


        $data = Appoitment::find($id);
        $details = [

            'greeting' => $request->greeting,
            'body' => $request->greeting,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart,


        ];


        Notification::send($data, new SendEmailVerificationNotification($details));

        return redirect()->back();

    }
}
