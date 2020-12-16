<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInfo extends Model
{
    use HasFactory;
    protected $table = 'project_info';
    protected $guarded = [];
    public function clients(){
        return $this->belongsTo('App\Models\Clients','client_id','id');
    }
    public function services(){
        return $this->belongsTo('App\Models\MainServices','main_service','id');
    }
    public function main_sections(){
        return $this->belongsTo('App\Models\MainSections','main_section','id');
    }
    public function sub_sections(){
        return $this->belongsTo('App\Models\SubSections','sub_section','id');
    }
}
