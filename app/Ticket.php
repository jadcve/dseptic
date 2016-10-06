<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {

    //
    protected $table = 'ticket';
    protected $fillable = ['Admin_Notes', 'Status', 'Status_Message',
        'ID_ADMIN', 'Date','ClosedDate', 'Repair_Performed', 'PAID',
        'SYSTEM_BRAND','PERMIT_ID','Apartment','GATE_CODE', 'Notes', 
        'Technician', 'Price','ADDRESS','ADDRESS2','ID_TECH','ID_CUSTOMER','ID_CITY',
        'ZIP_CODE','PHONE_NUMBER','ID_STATE','PROBLEMS'];
    protected $guarded = ['id'];

    public function userOperator() {
        return $this->belongsTo('App\User', 'ID_TECH');
    }

//   public function userCustomer() {
//      return $this->belongsTo('User', 'ID_CUSTOMER');
//   }

    public function userAdmin() {
        return $this->belongsTo('App\User', 'ID_ADMIN');
    }
    
    public function userCustomer() {
        return $this->belongsTo('App\User', 'ID_CUSTOMER');
    }

    public function mensajes() {
        return $this->hasMany('App\Message', 'ID_TICKET');
    }

}
