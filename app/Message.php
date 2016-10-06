<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $fillable = ['Status','ID_TECH','CONTENT'];
    protected $guarded = ['id'];
    
    public function usermessage() {
      return $this->belongsTo('App\User', 'ID_TECH');
    }
}
