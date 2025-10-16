<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CookiesController extends Controller
{ 
    public function edit()
    {
        $cookies = DB::table('cookies')->first();
        return view('admin.cookies.edit', compact('cookies'));
    }

    public function update(Request $request)
    {
        DB::table('cookies')->where('id', 1)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'alert' => 'success',
            'message' => 'Cookies  Updated Successfully'
        ];

        return redirect()->back()->with('notification', $notification);
    }
}