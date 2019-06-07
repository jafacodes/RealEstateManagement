<?php
/**
 * Created by PhpStorm.
 * User: andriod-top
 * Date: 7/7/17
 * Time: 12:41 AM
 */

namespace App\Http\Controllers;


class Admin_Controller
{

    public function index(){
        return view('adminApanel.home.adminpanel');
    }

}