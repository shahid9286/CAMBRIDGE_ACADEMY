<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TermsAndConditionController extends Controller
{ public function edit()
    {
        $terms = DB::table('terms_and_conditions')->first();
        return view('admin.terms_and_conditions.edit', compact('terms'));
    }

    public function update(Request $request)
    {
        DB::table('terms_and_conditions')->where('id', 1)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'alert' => 'success',
            'message' => 'terms and conditions Updated Successfully'
        ];

        return redirect()->back()->with('notification', $notification);
    }
}