<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SiteSettingController extends Controller
{
    //
    public function index(){
        $siteSetting = SiteSetting::all();
        return view('admin.siteSetting.index' , compact('siteSetting'));
    }

    public function store(Request $request){
        foreach (array_except($request->toArray() , ['_token' , 'submit']) as $key => $req){
            $sitesettingupdated = SiteSetting::where('namesetting' , $key)->get()[0];
            if($sitesettingupdated->type != 3){
                $sitesettingupdated->fill(['value' => $req])->save();
            } else {
                $fileName = uploadImage($request->file('main_slider') , '/public/website/slider/' , 1600 , 500 , base_path().'/public/website/slider/'.$sitesettingupdated->value);
                if(!$fileName){
                    return Redirect::back()->withFlashMessage(' حجم الصورة غير مناسب[500,200] ');
                }
                $sitesettingupdated->fill(['value' => $fileName])->save();
            }
        }
        return Redirect::back();
    }
}
