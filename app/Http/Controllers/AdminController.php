<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Food;
use App\Models\Foodchief;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user()
    {
        $data=User::all();
        return view("admin.users", compact('data'));
    }

    public function deleteuser($id)
    {
        $data=User::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function deletemenu($id)
    {
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function foodmenu()
    {
        $data=Food::all();
        return view('admin.foodmenu',compact('data'));
    }
    public function updateview($id)
    {
        $data=Food::find($id);
        return view("admin.updateview",compact('data'));
    }
    public function update(Request $request ,$id)
    {
        $data = Food::find($id);
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();
    }

    public function upload(Request $request)
    {
        $data = new food;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();
    }

    public function reservation(Request $request)
    {
        $data = new Reservation();

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
        return redirect()->back();
    }

    public function viewreservation()
    {
        $data = Reservation::all();
        return view('admin.adminreservation', compact('data'));
    }

    public function viewchief()
    {
        $data = Foodchief::all();
        return view('admin.adminchief',compact('data'));
    }
    public function uploadchief(Request $request)
    {
        $data = new Foodchief();
        $image = $request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chiefimage',$imagename);
        $data->image=$imagename;
        $data->name=$request->name;
        $data->speciality=$request->speciality;

        $data->save();
        return redirect()->back();
    }
    public function updatechief($id)
    {
        $data = Foodchief::find($id);

        return view('admin.updatechief', compact('data'));
    }
    public function updatefoodchief(Request $request ,$id)
    {
        $data = Foodchief::find($id);
        $image=$request->image;
        if ($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chiefimage',$imagename);
            $data->image=$imagename;
        }

        $data->name=$request->name;
        $data->speciality=$request->speciality;
        $data->save();
        return redirect()->back();

    }
    public function deletechief($id)
    {
        $data=Foodchief::find($id);
        $data->delete();
        return redirect()->back();
    }
}
