<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectInfo;
use App\Models\Clients;
class DashboardController extends Controller
{   
    public $data;
    public function __construct(){
        $this->data['menu'] = 'dashboard';
    }
     public function index()
    {
        # code...
        $clients = Clients::all();
        $projects = ProjectInfo::where('status',1)->get();
        $this->data['clients'] = $clients;
        $this->data['projects'] = $projects;
        return view('admin.dashboard')->with($this->data);
    }
}
