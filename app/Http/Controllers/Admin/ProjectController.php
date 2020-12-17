<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProjectInfo;
use App\Models\Clients;
use App\Models\MainServices;
use App\Models\MainSections;
use App\Models\SubSections;
use App\Models\QualityLists;
use App\Models\ServiceTypes;
use App\Models\Specifications;
use PDF;
class ProjectController extends Controller
{
    public $data;
    public function __construct(){
        $this->data['menu'] = 'projects';
    }
     public function index()
    {
        $this->data['projects'] = ProjectInfo::with(['clients','services','main_sections','sub_sections'])->get();
        return view('admin.project')->with($this->data);
    }
    public function add(){
        $this->data['clients'] = Clients::get();
        $this->data['services'] = MainServices::get();
        return view('admin.add')->with($this->data);
    }
    public function getMainSection($id)
    {
        # code...
        if($id==0){
            $data['main_section'] = [];
            $data['specification'] = [];
            return $data;
        }
        $data['main_section'] = MainSections::where('main_services_id',$id)->get();
        $data['specification'] = Specifications::where('main_service_id',$id)->get();
        return $data;
    }
    public function getSubSection($id)
    {
        # code...
        return SubSections::where('main_section_id',$id)->get();
    }
    public function downloadPDF($id)
    {
        $this->data['project'] = ProjectInfo::with(['clients','services','main_sections','sub_sections'])->whereId($id)->get()->first();
        $spe_ids = explode(',',$this->data['project']->specification);
        $temp_specification = Specifications::whereIn('id',$spe_ids)->get();
        // $temp_groups = [];
        // $group = [];
        // foreach($temp_specification as $temp){
        //     if(!in_array($temp->group,$temp_groups)){
        //         array_push($temp_groups,$temp->group);
        //         $group[$temp->group] = [];
        //     }
        //     array_push($group[$temp->group],$temp);
        // }
        $this->data['specifications'] = $temp_specification;
        // return view('pdf')->with($this->data);
        $pdf = PDF::loadView('pdf',$this->data);
        return $pdf->download('project.pdf');
    }
    public function getOptionsAndList($id)
    {
        # code...
        $data['option'] = ServiceTypes::where('sub_section_id',$id)->get();
        $data['quality'] = QualityLists::where('sub_section_id',$id)->get();
        return $data;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'client_name'=>'required',
           'main_service'=>'required',
           'main_section'=>'required',
           'sub_section'=>'required',
        ]);
        if ($validator->fails()) { 
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $specifications = [];
        if($request->has('Exteriors')){
            foreach($request['Exteriors'] as $spe)
            {
                array_push($specifications,$spe);
            }
        }
        if($request->has('Interiors')){
            foreach($request['Interiors'] as $spe)
            {
                array_push($specifications,$spe);
            }
        }
        $file_list=[];
        if($request->hasFile('docs')){
            $files = $request->file('docs');
            foreach($files as $f){
                $name = $f->getClientOriginalName();
                $f->move(public_path('uploads'),$name);
                array_push($file_list,$name);
            }
        }
        $file_list = count($file_list)?implode(',',$file_list):NULL;
        $quality_list = $request->quality_list;
        $service_type = $request->service_type;
        $main_section = $request->main_section?$request->main_section:NULL;
        Clients::where('id',$request->client_id)->increment('no_of_projects',1);
        ProjectInfo::create([
            'project_code'=>$request->project_code,
            'client_id'=>$request->client_id,
            'main_service'=>$request->main_service,
            'main_section'=>$main_section,
            'sub_section'=>$request->sub_section,
            'quality_list'=>$quality_list,
            'service_type'=>$service_type,
            'specification'=>count($specifications)?implode(',',$specifications):NULL,
            'g_drive'=>$request->g_drive,
            'files'=>$file_list,
            'assign_to'=>$request->assign_to,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status,
            'no_of_renders'=>$request->renders
        ]);
        return redirect('/admin/project')->with('success', 'Project created successfully.');
    }
    public function returnEditView($id)
    {
        $this->data['clients'] = Clients::get();
        $this->data['services'] = MainServices::get();
        $this->data['project'] = ProjectInfo::whereId($id)->with(['clients','services','main_sections','sub_sections'])->get()->first();
        return view('admin.edit')->with($this->data);
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'client_name'=>'required',
            'main_service'=>'required',
            'main_section'=>'required',
            'sub_section'=>'required',
         ]);
         if ($validator->fails()) { 
             return redirect()->back()->withErrors($validator)->withInput();
         }
         $specifications = [];
         if($request->has('Exteriors')){
             foreach($request['Exteriors'] as $spe)
             {
                 array_push($specifications,$spe);
             }
         }
         if($request->has('Interiors')){
             foreach($request['Interiors'] as $spe)
             {
                 array_push($specifications,$spe);
             }
         }
         $file_list=[];
         if($request->hasFile('docs')){
             $files = $request->file('docs');
             foreach($files as $f){
                 $name = $f->getClientOriginalName();
                 $f->move(public_path('uploads'),$name);
                 array_push($file_list,$name);
             }
         }
         if(count($file_list)){
            $data['files'] = implode(',',$file_list);
         }
         $quality_list = $request->quality_list;
         $service_type = $request->service_type;
         $main_section = $request->main_section?$request->main_section:NULL;
        //  Clients::where('id',$request->client_id)->increment('no_of_projects',1);
         $data = [
            'project_code'=>$request->project_code,
            'client_id'=>$request->client_id,
            'g_drive'=>$request->g_drive,
            'assign_to'=>$request->assign_to,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status,
            'no_of_renders'=>$request->renders
         ];
         ProjectInfo::whereId($id)->update($data);
         return redirect('/admin/project')->with('success', 'Project updated successfully.');
    }
    public function downloadFiles($id)
    {
        $files = ProjectInfo::where('id',$id)->get(['files'])->first();
        if($files->files){
            $allFiles = explode(',',$files->files);
            $path = public_path('uploads/');
            foreach($allFiles as $tempFile){
                return response()->download($path.$tempFile);
            }
            return redirect('/admin/project')->with('success', 'Downloaded all files under this project.');
        }
        else{
            return redirect('/admin/project')->with('error', 'No files under this project.');
        }
    }
}
