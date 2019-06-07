<?php

namespace App\Http\Controllers;

use App\Bu;
use App\Http\Requests\AddUserAdminRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Facades\Datatables;

class UsersController extends Controller
{

    public function index(){
        $users = User::all();
        return view('admin.user.index' , compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(AddUserAdminRequest $request , User $user ){
        $user::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect('adminpanel/users')->withFlashMessage(' تمت إضافة العضو بنجاح ');
    }

    public function edit($id , Request $request){
        $user = User::find($id);
        return view('admin.user.edit' , compact('user'))->withFlashMessage(' تم التعديل على العضو بنجاح ');
    }

    public function update($id , User $user , Request $request){
        $userupdated = $user->find($id);
        $userupdated -> fill($request->all())->save();
        return Redirect::back()->withFlashMessage(' تم التعديل على العضو بنجاح ');
    }

    public function changePassword(Request $request){
        $user = User::find($request->userid);
        $password = bcrypt($request->password);
        $user ->fill( ['password' => $password] )->save();
        return Redirect::back()->withFlashMessage(' تم تعديل كلمة المرور بنجاح ');
    }

    public function delete($id , User $user)
    {
        if($id != 1) {
            Bu::where('user_id',$id) -> delete();
            $user->find($id)->delete();
            return redirect('adminpanel/users')->withFlashMessage(' تمت حذف العضو بنجاح ');
        } else {
            return redirect('adminpanel/users')->withFlashMessage(' لا يمكن حذف العضو ');
        }
    }





    public function DataTables()
    {
        return view('adminpanel.users');
    }

    public function DataTablesData()
    {
        $users = User::select(['id', 'name', 'email', 'password' ,  'created_at' , 'admin' ]);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $all = '<a href="' . url('/adminpanel/users/' . $user->id . '/edit') . '" class="btn btn-info btn-sm btn-circle"><i class="fa fa-edit"></i></a> ';
                if($user->id != 1){
                    $all .= '<a href="' . url('/adminpanel/users/' . $user->id . '/delete') . '" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash-o"></i></a>';
                }
                return $all;
                //return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                //return '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
                //return $user->admin == 0 ? '<span class="badge badge-info">' . 'عضو' . '</span>' : '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
            })
            ->addColumn('admin', function ($user) {
                //return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                //return '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
                return $user->admin == 0 ?  'عضو'  :  'مدير الموقع';
            })
            ->editColumn('id', '{{$id}}')
            ->removeColumn('password')
            ->make(true);
    }

}
