<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProjectInfo;
use App\Models\Clients;
use App\Models\MainServices;
class ProjectController extends Controller
{
    public $data;
    public function __construct(){
        $this->data['menu'] = 'projects';
    }
     public function index()
    {
        $this->data['projects'] = ProjectInfo::with(['clients','services'])->get();
        return view('admin.project')->with($this->data);
    }
    public function add(){
        $this->data['clients'] = Clients::get();
        $this->data['services'] = MainServices::get();
        return view('admin.add')->with($this->data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'client_name'=>'required',
           'main_service'=>'required',
           'main_section'=>'required',
           'sub_section'=>'required'
        ]);
        if ($validator->fails()) { 
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
