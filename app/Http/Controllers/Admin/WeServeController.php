<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WeServe;
use App\Models\WeServeDetail;
use Illuminate\Http\Request;

class WeServeController extends Controller
{
    public function index()
    {
        $we_serves = WeServe::with('details')->get();

        return view('admin.we-serve.index', compact('we_serves'));
    }

    public function add()
    {
        return view('admin.we-serve.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'details.*.name' => 'required|string|max:255',
            'details.*.logo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $we_serves = new WeServe;
        $we_serves->title = $request->input('title');
        $we_serves->subtitle = $request->input('subtitle');
        $we_serves->description = $request->input('description');
        $we_serves->save();

        if ($request->has('details')) {
            foreach ($request->details as $index => $detail) {
                $we_serves_detail = new WeServeDetail;
                $we_serves_detail->we_serve_id = $we_serves->id;
                $we_serves_detail->name = $detail['name'] ?? '';

                if ($request->hasFile("details.$index.logo")) {
                    $logoFile = $request->file("details.$index.logo");
                    $logoName = time().rand().'.'.$logoFile->getClientOriginalExtension();
                    $logoFile->move(public_path('assets/admin/uploads/we_serves_details/'), $logoName);
                    $we_serves_detail->logo = $logoName;
                }

                $we_serves_detail->save();
            }
        }

        return redirect()->route('admin.we-serve.index')->with('notification', [
            'message' => 'We Serve Added Successfully!',
            'alert' => 'success',
        ]);
    }

    public function edit($id)
    {
        $we_serves = WeServe::with('details')->findOrFail($id);

        return view('admin.we-serve.edit', compact('we_serves'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'details.*.name' => 'required|string|max:255',
            'details.*.logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $we_serves = WeServe::findOrFail($id);
        $we_serves->title = $request->input('title');
        $we_serves->subtitle = $request->input('subtitle');
        $we_serves->description = $request->input('description');
        $we_serves->save();

        $existingIds = $we_serves->details()->pluck('id')->toArray();
        $incomingIds = collect($request->details ?? [])
            ->filter(fn ($d) => ! empty($d['name']))
            ->pluck('id')
            ->filter()
            ->toArray();

        $deletedIds = array_diff($existingIds, $incomingIds);
        if (! empty($deletedIds)) {
            WeServeDetail::whereIn('id', $deletedIds)->delete();
        }

        if ($request->has('details')) {
            foreach ($request->details as $index => $detail) {
                if (isset($detail['id']) && ! empty($detail['id'])) {
                    $we_serves_detail = WeServeDetail::find($detail['id']);
                    if ($we_serves_detail) {
                        $we_serves_detail->name = $detail['name'] ?? $we_serves_detail->name;

                        if ($request->hasFile("details.$index.logo")) {
                            if ($we_serves_detail->logo && file_exists(public_path('assets/admin/uploads/we_serves_details/'.$we_serves_detail->logo))) {
                                @unlink(public_path('assets/admin/uploads/we_serves_details/'.$we_serves_detail->logo));
                            }
                            $logoFile = $request->file("details.$index.logo");
                            $logoName = time().rand().'.'.$logoFile->getClientOriginalExtension();
                            $logoFile->move(public_path('assets/admin/uploads/we_serves_details/'), $logoName);
                            $we_serves_detail->logo = $logoName;
                        }

                        $we_serves_detail->save();
                    }
                } else {
                    $newDetail = new WeServeDetail;
                    $newDetail->we_serve_id = $we_serves->id;
                    $newDetail->name = $detail['name'] ?? '';

                    if ($request->hasFile("details.$index.logo")) {
                        $logoFile = $request->file("details.$index.logo");
                        $logoName = time().rand().'.'.$logoFile->getClientOriginalExtension();
                        $logoFile->move(public_path('assets/admin/uploads/we_serves_details/'), $logoName);
                        $newDetail->logo = $logoName;
                    }

                    $newDetail->save();
                }
            }
        }

        return redirect()->route('admin.we-serve.index')->with('notification', [
            'message' => 'We Serve Updated Successfully!',
            'alert' => 'success',
        ]);
    }

    public function delete($id)
    {
        $we_serves = WeServe::with('details')->findOrFail($id);

        foreach ($we_serves->details as $detail) {
            if (! empty($detail->logo) && file_exists(public_path('assets/admin/uploads/we_serves_details/'.$detail->logo))) {
                @unlink(public_path('assets/admin/uploads/we_serves_details/'.$detail->logo));
            }
            $detail->delete();
        }

        $we_serves->delete();

        return redirect()->route('admin.we-serve.index')->with('notification', [
            'message' => 'We Serve Deleted Successfully!',
            'alert' => 'success',
        ]);
    }
}
