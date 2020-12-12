<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    public $data;
    public function __construct(){
        $this->data['menu'] = 'dashboard';
    }
     public function index()
    {
        # code...
        return view('admin.dashboard')->with($this->data);
    }
}
