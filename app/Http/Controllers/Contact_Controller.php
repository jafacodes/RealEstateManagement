<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Notifications\AddContact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;
use Yajra\Datatables\Facades\Datatables;


class Contact_Controller extends Controller
{
    //
    public function contact(){
        return view('website.contact.contact');
    }

    public function store(ContactRequest $request , Contact $contact){
        //if(Contact::create($request->all())){
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->type = $request->type;
            $contact->view = 0;
            $contact->save();
            $users = User::where('admin' , 1)->get();
            Notification::send($users , new AddContact($contact));
            $url = url('/admin_panel/contact/'.$contact->id.'/edit');
            $data = '<a class="media" href="'.$url.'">';
            $data.='<span class="media-left media-icon">'.'<span class="fa-stack fa-lg">'.
            '<i class="fa fa-circle fa-stack-2x text-primary"></i>'.
                '<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>'.
                '</span>'.
                '</span>'.'<div class="media-body">'.'<span class="block">'.$contact->name.'</span>'.
                                        '<span class="text-muted block">'.contact()[$contact->type].'</span>';
            StreamLabFacades::pushMessage('test' , 'AddContact' , $data);
        //}
        return Redirect::back()->withFlashMessage(' تم إرسال رسالتك إلينا ');
    }

    public function index(){
        $contacts = Contact::all();
        return view('adminApanel.contact.index' , compact('contacts'));
    }

    public function edit($id , Request $request){
        $contact = Contact::find($id);
        $contact->fill(['view' => 1])->save();
        return view('adminApanel.contact.edit' , compact('contact'));
    }

    public function update($id , Contact $contact , Request $request){
        $contactupdated = $contact->find($id);
        $contactupdated -> fill($request->all())->save();
        return Redirect::back()->withFlashMessage(' تم التعديل على الرسالة بنجاح ');
    }

    public function delete($id){
        Contact::find($id)->delete();
        return Redirect::back()->withFlashMessage(' تم حذف الرسالة بنجاح ');
    }
    public function DataTables()
    {
        return view('adminApanel.contact');
    }

    public function DataTablesData()
    {
        $contacts = Contact::select(['id', 'name', 'email', 'view', 'created_at' , 'type' , 'message' ]);

        return Datatables::of($contacts)
            ->addColumn('action', function ($contact) {
                $all = '<a href="' . url('/admin_panel/contact/' . $contact->id . '/edit') . '" class="btn btn-info btn-sm btn-circle"><i class="fa fa-edit"></i></a> ';
                $all .= '<a href="' . url('/admin_panel/contact/' . $contact->id . '/delete') . '" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash-o"></i></a>';
                return $all;
                //return '<a href="#edit-'.$contact->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                //return '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
                //return $contact->admin == 0 ? '<span class="badge badge-info">' . 'عضو' . '</span>' : '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
            })
            ->addColumn('type', function ($contact) {
                //return '<a href="#edit-'.$contact->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                //return '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
                return \contact()[$contact->type];
            })
            ->editColumn('id', '{{$id}}')
            ->editColumn('message', function ($contact){
                return cutMessage($contact->message);
            })
            ->editColumn('view' , function ($contact){
                return $contact->view == 0 ? 'رسائل جديدة' : 'رسائل قديمة';
            })
            ->make(true);
    }

    public function AllSeen()
    {
        foreach(auth()->user()->notifications as $mess){
            $mess->markAsRead();
        }
    }
}
