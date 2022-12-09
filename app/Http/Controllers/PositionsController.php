<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Position;

class PositionsController extends Controller
{
    public function index(){

        $positions = Position::all();

        return view('positions.index', compact('positions'));

    }

    public function create(){

        return view('positions.create');

    }

    public function store(Request $request){

        $request->validate([

            'name' => 'required',

        ]);

        $admin_id = Auth::user()->id;

        Position::create([

            'name' => $request->name,
            'admin_created_id' => $admin_id,
            'admin_updated_id' => $admin_id,

        ]);

        return redirect()->route('positions-list')->with('message', 'Positions created successfully');

    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
