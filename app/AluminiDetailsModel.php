<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AluminiDetailsModel extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public $table = 'alumini_details';
}
