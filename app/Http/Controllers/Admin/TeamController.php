<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('order_no')->get();
        return view('admin.teams.index', compact('teams'));
    }

    public function add()
    {
        return view('admin.teams.add');
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'photo' => 'required|image',
            'order no' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);


        $teams = new Team();
        $teams->name = $request->name;
        $teams->designation = $request->designation;
        $teams->order_no = $request->order_no;
        $teams->status = $request->status;
    
        if ($request->hasFile('photo')) {
            $teams->photo = FileHelper::upload($request->file('photo'), 'assets/uploads/photos');
        }

    $teams->save(); 

    return redirect()->route('admin.teams.index')
        ->with('notification', ['alert' => 'success', 'message' => ' added Successfully!']);

    }

public function edit($id)
{
    $team = Team::findOrFail($id);
    return view('admin.teams.edit', compact('team'));
}

    public function update(Request $request, $id)
    {
          $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'photo' => 'nullable|image',
            'order_no' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $teams =Team::findOrFail($id);
        $teams->name = $request->name;
        $teams->designation = $request->designation;
        $teams->order_no = $request->order_no;
        $teams->status = $request->status;
    
        if ($request->hasFile('photo')) {
            $teams->photo = FileHelper::update(
                $teams->photo,
                $request->file('photo'),
                'assets/uploads/photos'
            );
        }
    $teams->save();
        $notification = [
            'message' => 'Teams Updated Successfully!',
            'alert' => 'success'
        ];

        return redirect()->route('admin.teams.index')->with('notification', $notification);

    }

    public function delete($id)
    {
        $teams = Team::findOrFail($id);
        $teams->delete();

        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'Team Member Deleted Successfully!']);
    }
}
