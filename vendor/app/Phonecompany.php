<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phonecompany extends Model {

    protected $table = 'phonecompany';
    protected $fillable = ['PHONE_COMPANY', 'PHONE_CODIGO'];
    protected $guarded = ['id'];

    
}
