<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Bu;
use Yajra\Datatables\Facades\Datatables;

class BuController extends Controller
{
    //
    public function index(){
        return view('admin.bu.index');
    }

    public function create(){
        return view('admin.bu.create');
    }

    public function store(BuRequest $request , Bu $bu ){
        if($request->file('image')){
            $fileName = uploadImage($request->file('image'));
            if(!$fileName){
                return Redirect::back()->withFlashMessage(' حجم الصورة غير مناسب[500,200] ');
            }else{
                $image = $fileName;
            }
        }else {
            $image = '';
        }
        $bu::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'rooms' => $request['rooms'],
            'rent' => $request['rent'],
            'square' => $request['square'],
            'type' => $request['type'],
            'small_desc' => $request['small_desc'],
            'meta' => $request['meta'],
            'longitude' => $request['longitude'],
            'latitude' => $request['latitude'],
            'large_desc' => $request['large_desc'],
            'status' => $request['status'],
            'user_id' => $request['user_id'],
            'place' => $request['place'],
            'image' => $image,
        ]);

        return redirect('adminpanel/bu')->withFlashMessage(' تمت إضافة العقار بنجاح ');
    }

    public function edit($id , Request $request){
        $bu = Bu::find($id);
        return view('admin.bu.edit' , compact('bu'))->withFlashMessage(' تم التعديل على العقار بنجاح ');
    }

    public function update($id , Bu $bu , Request $request){
        $buupdated = $bu->find($id);
        $buupdated ->fill(array_except($request->all() , ['image']))->save();
        //$dim = getimagesize($request->file('image'));
        //dd($dim);
        if($request->file(['image'])){
            $fileName = uploadImage($request->file(['image']) , '/public/website/bu_images/' , 500 , 360 , base_path().'/public/website/bu_images/'.$buupdated->image);
           /* if(!$fileName){
                return Redirect::back()->withFlashMessage(' حجم الصورة غير مناسب[500,200] ');
            }
            /*
            $fileName = $request->file(['image'])->getClientOriginalName();
            $request->file(['image'])->move(
                base_path().'/public/website/bu_images/' , $fileName
            );
            */
            $buupdated->fill(['image' => $fileName])->save();
        }
        return Redirect::back()->withFlashMessage(' تم التعديل على العقار بنجاح ');
    }

    public function delete($id , Bu $bu)
    {

            $bu->find($id)->delete();
            return redirect('adminpanel/bu')->withFlashMessage(' تمت حذف العقار بنجاح ');

    }

    public function DataTables()
    {
        return view('admin.bu.index');
    }

    public function DataTablesData()
    {
        $bus = Bu::select([
            'id' , 'name', 'price','rooms', 'rent', 'square', 'type',  'status', 'user_id' , 'created_at'
        ]);

        return Datatables::of($bus)
            ->addColumn('action', function ($bu) {
                $all = '<a href="' . url('/adminpanel/bu/' . $bu->id . '/edit') . '" class="btn btn-info btn-sm btn-circle"><i class="fa fa-edit"></i></a> ';
                $all .= '<a href="' . url('/adminpanel/bu/' . $bu->id . '/delete') . '" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash-o"></i></a>';
                return $all;
            })
            ->editColumn('rent', function ($bu) {
                $type = bu_rent();
                return $type[$bu->rent] ;
            })

            ->editColumn('type', function ($bu) {
                $type = bu_type();
                return $type[$bu->type] ;
            })
            ->editColumn('status', function ($bu) {
              return $bu->status == 0 ?  'غير مفعل'  :  'مفعل';
            })
            ->editColumn('user_id', function ($bu) {
                $user = User::find($bu->user_id);
                return $user->name;
            })
            ->make(true);
    }

    // All Buildings
    public function showAllEnabled(Request $request){
            $bu = Bu::where('status', 1)->orderBy('id', 'price')->paginate(3);
            return view('website.bu.buAll', compact('bu'));
        }
    // For rent
    public function showRent(){
        $bu = Bu::where('status' , 1)->where('rent',0)->orderBy('id','price')->paginate(3);
        return view('website.bu.buAll' , compact('bu'));
    }
    // For Buy
    public function showBuy(){
        $bu = Bu::where('status' , 1)->where('rent',1)->orderBy('id','price')->paginate(3);
        return view('website.bu.buAll' , compact('bu'));
    }
    // Show By Type
    public function showByType($type){
        if(in_array($type,[0,1,2])){
        $bu = Bu::where('status' , 1)->where('type',$type)->orderBy('id','price')->paginate(3);
        return view('website.bu.buAll' , compact('bu'));
        }
        else {
            return Redirect::back();
        }
    }
    // Search
    public function search(Request $request)
    {

        $requestAll = array_except($request->toArray(),['submit','_token' ,'count','price_from' , 'price_to']);
        $query = DB::table('bus');
        $min = $request->price_from == '' ? 1000 : $request->price_from;
        $max = $request->price_to == '' ? 5000000 : $request->price_to;

        $search = array();
        foreach ($requestAll as $key => $value) {
            if ($value != '' && $value != null && strcmp($value, 'undefined') != 0) {
                $query->where($key,$value);
                $search[$key] = $value;
            }
        }
        $search['price'] = $min . ' - ' . $max;
        $query->whereBetween('price' , [$min , $max])->limit($request->count);
        //dd($query);
        $bu = $query->get();
        $count = count($bu);
        if ($count != $request->count) {
            $more = false;
            $count = $request->count + 3;
            return view('website.bu.buAll', compact('bu', 'search', 'more', 'count'));
        } else {
            /*
                $bu = Bu::where('status', 1)
                    ->where('price', $request->price)
                    ->orderBy('id', 'price')
                    ->paginate(3);
*/
            $more = true;
            $count = $request->count + 3;
            return view('website.bu.buAll', compact('bu', 'search', 'more', 'count'));
        }

        // Show More Search;

        /*

        $requestAll = array_except($request->toArray(), ['submit', '_token', 'count' , 'price_from' , 'price_to']);
        $query = 'select * from `bus` ';
        $arr = array();
        $i = 0;
        $search = array();
        if (($request->price_from != '' && $request->price_from != null && strcmp($request->price_from, 'undefined') != 0) && ($request->price_to != '' && $request->price_to != null && strcmp($request->price_to, 'undefined') != 0) ) {
            $query .= ' where `price` between ? and ? ';
            $arr[$i] = $request->price_from;
            $i++;
            $arr[$i] = $request->price_to;
            $i++;
            $search['price'] = $request->price_from . ' <= ' . $request->price_to;
        }
        echo $query .'<br>';
        foreach ($requestAll as $key => $value) {
            if ($value != '' && $value != null && strcmp($value, 'undefined') != 0) {
                if ($i == 0) {
                    $query .= ' where `' . $key . '`= ? ';
                } else {
                    $query .= ' and `' . $key . '`= ? ';
                }
                $search[$key] = $value;
                $arr[$i] = $value;
                $i++;
            }
        }
        $query .= ' limit ' . $request->count;
        echo $query.'<br>';
        $bu = DB::select($query, $arr);
        $count = count($bu);

        if ($count != $request->count) {
            $more = false;
            $count = $request->count + 3;
            return view('website.bu.buAll', compact('bu', 'search', 'more', 'count'));
        } else {
            /*
                $bu = Bu::where('status', 1)
                    ->where('price', $request->price)
                    ->orderBy('id', 'price')
                    ->paginate(3);

            $more = true;
            $count = $request->count + 3;
            return view('website.bu.buAll', compact('bu', 'search', 'more', 'count'));
        }
        */

        // Pagination search;
        /*
        $requestAll = array_except($request->toArray(),['submit','_token' ,'count']);
        $query = DB::table('bus');
        foreach ($requestAll as $key => $value) {
            if ($value != '' && $value != null && strcmp($value, 'undefined') != 0) {
                $query->where($key,$value);
            }
        }
        $bu = $query->paginate(2);
        return view('website.bu.buAll', compact('bu'));
        */
    }

    // Single building
    public function showBu($id){
        $buShow = Bu::find($id);
        $same_rent = Bu::where('rent',$buShow->rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
        $same_type = Bu::where('type',$buShow->type)->orderBy(DB::raw('RAND()'))->take(3)->get();
        return view('website.bu.buShow' , compact('buShow','same_rent','same_type'));
    }



    public function getAjaxInfo(Request $request ){
        return Bu::find($request->id)->toJson();
    }
}
