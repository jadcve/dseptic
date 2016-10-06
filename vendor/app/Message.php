<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $fillable = ['Status','ID_TICKET','CONTENT'];
    protected $guarded = ['id'];
}
