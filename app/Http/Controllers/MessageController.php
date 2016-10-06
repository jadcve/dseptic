<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $message = \App\Message::paginate(10);
        return view('admin.message.index')->with('message', $message)->with('active', 'message');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function send($mensaje,$ticket,$tech){
        $message = new \App\Message;
        $message->Status = 1;
        $message->ID_TECH = $tech;
        $message->CONTENT = $mensaje." #".$ticket ;
        $message->save();
    }
    public function accept($id){
        $message = \App\Message::find($id);
        $message->Status = 2;
        $message->save();
        return redirect('/admin/message_list')->with('active', 'message');
    }
    
    public function accept_operator($id){
        $message = \App\Message::find($id);
        $message->Status = 2;
        $message->save();
        return redirect('/operator/message_list')->with('active', 'message');
    }
    
    public function message_update(Request $request){
        $message = \App\Message::where('Status',1)->get();
//        print_r($message);
        echo '('.count($message).')';
    }
    
    public function message_updateoperator(Request $request){
        $user = Auth::User();
        $message = \App\Message::where('ID_TECH',$user->id)->where('Status',1)->get();
        echo '('.count($message).')';
    }

    public function message_updatecliente(Request $request){
        $user = Auth::User();
        $message = \App\Message::where('ID_TECH',$user->id)->where('Status',1)->get();
        echo '('.count($message).')';
    }
    
    public function message_operator()
    {
        $user = Auth::User();
        $message = \App\Message::where('ID_TECH',$user->id)->select('message.id', 'Status', 'CONTENT','ID_TECH')->get();
        return view('operator.message.index')->with('message', $message)->with('active', 'message');
    }
    
}
