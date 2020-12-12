<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInfo extends Model
{
    use HasFactory;
    protected $table = 'project_info';
    public function clients(){
        return $this->belongsTo('App\Models\Clients','client_id','id');
    }
    public function services(){
        return $this->belongsTo('App\Models\MainServices','main_service_id','id');
    }
}
