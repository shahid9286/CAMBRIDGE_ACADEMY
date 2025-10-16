<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function edit()
    {
        $policy = DB::table('privacy_policies')->first();
        return view('admin.privacy_policy.edit', compact('policy'));
    }

    public function update(Request $request)
    {
        DB::table('privacy_policies')->where('id', 1)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = [
            'alert' => 'success',
            'message' => 'Privacy Policy Updated Successfully'
        ];

        return redirect()->back()->with('notification', $notification);
    }
}
