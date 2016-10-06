<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
Use App\Rol;
use App\User;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $message = \App\Message::where('Status',1)->get();
        $cantidad = count($message);
        
        return view('admin.home')->with('cantidad', $cantidad)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }
    
    public function listRegister() {
        $users = User::all();
        return view('admin.list_user')->with('users', $users);
    }

    public function getRegister() {
        $roles = Rol::all();
        $phonecompany = \App\Phonecompany::all();
        return view('admin.user.register')->with('phonecompany', $phonecompany)->with('roles', $roles);
    }

    public function postRegister(Request $request) {
//        $input = $request->all();
        if($request->rol_id == 1){
            $input = $request->only('name', 'email','password','rol_id');
            $userupdate = User::create($input);
        }elseif($request->rol_id == 2){
            $input = $request->only('name', 'email','password','rol_id','PHONE','ID_PHONE_COMPANY',
                    'ID_PHONE_COMPANY2','ID_PHONE_COMPANY3','PHONE2','PHONE3');
            $userupdate = User::create($input);
        }else{
            $inputcustomer = $request->except('password','rol_id','PHONE', 'email');
            $input = $request->only('name', 'email','password','rol_id','PHONE','ID_PHONE_COMPANY',
                    'ID_PHONE_COMPANY2','ID_PHONE_COMPANY3','PHONE2','PHONE3');
            $userupdate = User::create($input);
            $customer = \App\Customer::create(['ID_USER' => $userupdate->id ]);
            $customer->fill($inputcustomer)->save();
            
        }
        $user = User::find($userupdate->id);
        $user->password =  bcrypt($request->password);
        $user->save();
        return redirect('/admin/home');
    }

}
