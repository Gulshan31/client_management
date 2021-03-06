<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainServices extends Model
{
    use HasFactory;
    protected $table = 'main_services';
    public function specification()
    {
        return $this->hasMany('App\Models\Specifications','main_service_id','id');
    }
}
