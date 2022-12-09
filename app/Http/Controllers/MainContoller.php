<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use App\Models\Employee;
use Image;

class MainContoller extends Controller
{

    public function index(){

        $employees = Employee::all();

        return view('dashboard', compact('employees'));
    }

    public function show($id){

        $employee = Employee::where('id', $id)->first();

        return view('show', compact('employee'));

    }

    public function create(){

        return view('create');

    }

    public function store(Request $request){

        $request->validate([

            'name' => ['min:2','max:256','required'],
            'email' => ['email','required'],
            'amount_salary' => ['numeric','min:0','max:500'],
            'photo' => ['file', 'max:5000', 'image','dimensions:min_width=300,min_height=300'],

        ]);

        $image = $request->photo;

        $filename = $image->getClientOriginalName();

        $image = Image::make($image->getRealPath());

        $image->crop(300, 300)->save(Storage::path('/public/image/').'employees/'.$filename, 80);

        $filename = Storage::url('image/employees/'.$filename);

        $date_start_works = date('Y-m-d',strtotime($request->date_start_works));

        $admin_id = Auth::user()->id;

        Employee::create([

            'name'=> $request->name,
            'job' => 'test',
            'email' => $request->email,
            'amount_salary' => $request->amount_salary,
            'photo' => $filename,
            'phone' => $request->phone,
            'date_start_works' => $date_start_works,
            'admin_created_id' => $admin_id,
            'admin_updated_id' => $admin_id,

        ]);

        return redirect()->route('dashboard')->with('message', 'Employee created successfully');

    }


    public function edit($id){

        $employee = Employee::where('id', $id)->first();

        return view('edit', compact('employee'));

    }

    public function update(Request $request,  $id){

        $request->validate([

            'name' => ['min:2','max:256','required'],
            'email' => ['email','required',Rule::unique('employees')->ignore($id),],
            'amount_salary' => ['numeric','min:0','max:500'],
            'photo' => ['file', 'max:5000', 'image','dimensions:min_width=300,min_height=300'],

        ]);

        $image = $request->photo;

        if($image != null){

            $filename = $image->getClientOriginalName();

            $image = Image::make($image->getRealPath());

            $image->crop(300, 300)->save(Storage::path('/public/image/').'employees/'.$filename, 80);

            $filename = Storage::url('image/employees/'.$filename);

        }else{

            $data = Employee::where('id', $id)->first();

            $filename = $data->photo;

        }

        $date_start_works = date('Y-m-d',strtotime($request->date_start_works));

        Employee::where('id', $id)->update([

            'name'=> $request->name,
            'email' => $request->email,
            'amount_salary' => $request->amount_salary,
            'photo' => $filename,
            'phone' => $request->phone,
            'date_start_works' => $date_start_works,
            'admin_updated_id' => $admin_id,

        ]);

        return redirect()->route('dashboard')->with('message', 'Employee updated successfully');

    }

    public function delete($id){

        Employee::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Employee deleted successfully');

    }

}
