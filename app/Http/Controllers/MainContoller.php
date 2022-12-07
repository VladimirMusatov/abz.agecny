<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class MainContoller extends Controller
{

    public function index(){

        $employers = Employer::all();

        return view('dashboard', compact('employers'));
    }

    public function delete($id){


        Employer::where('id', $id)->delete();

        return redirect()->back()->with('message', 'User deleted successfully');

    }

}
