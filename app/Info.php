<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    public $timestamps = false;
    protected $table='daily_info';
    protected $primaryKey = 'info_id';
}
