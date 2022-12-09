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

    public function edit($id){

        $position = Position::where('id', $id)->first();

        return view('positions.edit', compact('position'));

    }

    public function update(Request $request, $id){

        $request->validate([

            'name' => ['required', 'max:256'],

        ]);

        $admin_id = Auth::user()->id;

        Position::where('id', $id)->update([

            'name' => $request->name,
            'admin_updated_id' => $admin_id,

        ]);

        return redirect()->route('positions-list')->with('message', 'Position updated successfully');

    }

    public function delete($id){

        Position::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Position deleted successfully');

    }
}
