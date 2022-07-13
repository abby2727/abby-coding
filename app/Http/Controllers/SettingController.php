<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        return view('admin.setting.index', compact('setting'));
    }

    public function saveData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_name' => 'required|max:255',
            'website_logo' => 'nullable',
            'website_favicon' => 'nullable',
            'description' => 'nullable',
            'meta_title' => 'required|max:255',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $setting = Setting::where('id', '1')->first();

        // Update
        if ($setting) {
            $setting->website_name = $request->website_name;

            // Website Logo
            if ($request->hasFile('website_logo')) {
                $destination = 'uploads/website-logo/' . $setting->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('website_logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/website-logo/', $filename);

                $setting->logo = $filename;
            }

            // Website Favicon
            if ($request->hasFile('website_favicon')) {
                $destination = 'uploads/website-favicon/' . $setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('website_favicon');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/website-favicon/', $filename);

                $setting->favicon = $filename;
            }

            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;

            $setting->save();
            return redirect('admin/setting')->with('message', 'Setting updated successfully!');
        }

        // Store
        else {
            $setting = new Setting();
            $setting->website_name = $request->website_name;

            // Website Logo
            if ($request->hasFile('website_logo')) {
                $file = $request->file('website_logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/website-logo/', $filename);

                $setting->logo = $filename;
            }

            // Website Favicon
            if ($request->hasFile('website_favicon')) {
                $file = $request->file('website_favicon');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/website-favicon/', $filename);

                $setting->favicon = $filename;
            }

            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;

            $setting->save();
            return redirect('admin/setting')->with('message', 'Setting added successfully!');
        }
    }
}
