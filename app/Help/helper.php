<?php

function getSetting($nameSetting = 'namesite'){
    return \App\SiteSetting::where('namesetting' , $nameSetting)->get()[0]->value;
}

function checkIfImageExist($image , $path_1 = '/public/website/bu_images/' , $path_2 = '/website/bu_images/'){
    $path = base_path() . $path_1 .$image;
    if(file_exists($path) && $image != ''){
        return Request::root() . $path_2 . $image;
    }else {
        return Request::root() . $path_2 .getSetting('noimage');
    }
}

function uploadImage($request , $path = '/public/website/bu_images/' , $width = 500 , $height = 360 , $deletedFile = ''){
    /*
    $dim = getimagesize($request);
    if($dim[0] > $height || $dim[1] > $width){
        return false;
    }
    */
    if($deletedFile != ''){
        if(file_exists($deletedFile)){
            File::delete($deletedFile);
        }
    }
    $fileName = $request->getClientOriginalName();
    $request->move(
      base_path().$path,$fileName
    );
    \Intervention\Image\Facades\Image::make(base_path().$path.$fileName)->resize($width,$height)->save(base_path().$path.$fileName);
    return $fileName;
}

function unreadMessage(){
    return \App\Contact::where('view' , 0)->get();
}
function countunreadMessage(){
    return \App\Contact::where('view' , 0)->count();
}
function cutMessage($message , $len = 20){
    return strip_tags(str_limit($message,$len));
}

function contact(){
    return $array = [
        '1' => ' إعجاب ',
        '2' => ' مشكلة ',
        '3' => ' إقتراح ',
        '4' => ' إستفسار ',
    ];
}

function bu_type(){
    $array = [
        'شقة',
        'فيلا',
        'شاليه',
    ];
    return $array;
}

function bu_rent()
{
    $array = [
        'إيجار',
        'تمليك',
    ];
    return $array;
}

function bu_searchname(){
    $array = [
        'price' => ' سعر العقار ',
        'rooms' => ' عدد الغرف ' ,
        'type' => ' نوع العقار ' ,
        'rent' => ' نوع العملية ' ,
        'place' => ' منطقة العقار ' ,
        'square' => ' مساحة العقار ' ,

    ];
    return $array;
}

function bu_place(){
    $array = [
        'اليامون',
        'السيلة',
        'جنين',
        'العرقة',
        'رمانة',
        'الهاشمية',

    ];
    return $array;
}