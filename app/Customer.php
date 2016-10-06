<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['ID_USER', 'name', 'LAST_NAME',
        'ADDRESS', 'ADDRESS_ALTERNATIVE', 'PERMIT', 'ZIP_CODE'];
    protected $guarded = ['id'];

//    public function Customer() {
//        return $this->belongsTo('App\User', 'ID_USER');
//    }
}
