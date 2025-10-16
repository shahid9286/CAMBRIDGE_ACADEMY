<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(Request $request){

        $clients = Client::orderBy('id', 'DESC')->get();

        return view('admin.client.index', compact('clients'));
    }

    public function add(){
        return view('admin.client.add');
    }

    public function store(Request $request){


        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'name' => 'nullable|max:250',
            'link' => 'nullable|max:250',
            'status' => 'nullable',
            'serial_number' => 'required|numeric',
        ]);

        $client = new Client();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/admin/img/client/', $image);

            $client->image = $image;
        }

        $client->serial_number = $request->serial_number;
        $client->name = $request->name;
        $client->link = $request->link;
        $client->status = $request->status;
        $client->save();

        $notification = array(
            'message' => 'Client Added Successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.client.index'))->with('notification', $notification);
    }

    public function edit($id){

        $client = Client::find($id);
        return view('admin.client.edit', compact('client'));

    }

    public function update(Request $request, $id){



        $client = Client::findOrFail($id);

         $request->validate([
            'name' => 'nullable|max:250',
            'link' => 'nullable|max:250',
            'status' => 'nullable',
            'serial_number' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,jpg,png',
        ]);


        if($request->hasFile('image')){
            @unlink('assets/admin/img/client/'. $client->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = 'portfolio_'.time().rand().'.'.$extension;
            $file->move('assets/admin/img/client/', $image);
            $client->image = $image;
        }

        $client->serial_number = $request->serial_number;
        $client->name = $request->name;
        $client->link = $request->link;
        $client->status = $request->status;
        $client->save();

        $notification = array(
            'message' => 'Client Updated Successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.client.index'))->with('notification', $notification);
    }

    public function delete($id){

        $client = Client::find($id);
        @unlink('assets/admin/img/client/'. $client->image);
        $client->delete();


        $notification = array(
            'message' => 'Client Deleted Successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.client.index'))->with('notification', $notification);
    }
}
