<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectInfo;
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
        return view('admin.add')->with($this->data);
    }
    public function store()
    {
        # code...
    }
}
