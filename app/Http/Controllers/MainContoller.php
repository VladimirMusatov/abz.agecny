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

}
