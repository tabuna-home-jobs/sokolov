<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Redirect;
use Request;
use Session;
use Validator;



class AdminController extends Controller {



    public function index()
    {
        return view("dashboard/home", []);
    }




}
