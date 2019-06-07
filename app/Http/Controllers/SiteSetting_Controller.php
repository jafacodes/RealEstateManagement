<?php
/**
 * Created by PhpStorm.
 * User: andriod-top
 * Date: 7/7/17
 * Time: 1:01 AM
 */

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SiteSetting_Controller
{
    //
    public function index(){
        $siteSetting = SiteSetting::all();
        return view('adminApanel.siteSetting.index' , compact('siteSetting'));
    }

    public function store(Request $request){
        foreach (array_except($request->toArray() , ['_token' , 'submit']) as $key => $req){
            $sitesettingupdated = SiteSetting::where('namesetting' , $key)->get()[0];
            if($sitesettingupdated->type != 3){
                $sitesettingupdated->fill(['value' => $req])->save();
            } else {
                if($request->hasFile('main_slider')) {
                    $fileName = uploadImage($request->file('main_slider'), '/public/website/slider/', 1600, 500, $sitesettingupdated->value);
                    $sitesettingupdated->fill(['value' => $fileName])->save();
                }
                if($request->hasFile('shortcuticon')) {
                    $fileName = uploadImage($request->file('shortcuticon'), '/public/website/slider/', 128, 128, $sitesettingupdated->value);
                    $sitesettingupdated->fill(['value' => $fileName])->save();
                }

                if($request->hasFile('noimage')) {
                    $fileName = uploadImage($request->file('noimage'), '/public/website/slider/', 300, 300, $sitesettingupdated->value);
                    $sitesettingupdated->fill(['value' => $fileName])->save();
                }
            }
        }
        return Redirect::back()->withFlashMessage(' تم تعديل إعدادات الموقع بنجاح ');
    }
}