<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Hashing\BcryptHasher;
use Hash;

class OperatorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $user = Auth::User();
        $message = \App\Message::where('ID_TECH', $user->id)->where('Status', 1)->get();
        $cantidad = count($message);
        return view('operator.home')->with('cantidad', $cantidad)->with('message', $message);
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

    public function ticket_list() {
        $user = Auth::User();
        $tickets = \App\Ticket::where('ID_TECH', $user->id)->where('Status', '!=', 3)->orderBy('id', 'desc')->get();
        return view('operator.list_ticket')->with('tickets', $tickets);
    }

    public function accept($id) {
        $ticket = \App\Ticket::find($id);
        return view('operator.accept_ticket')->with('ticket', $ticket);
    }

    public function accept_store(Request $request) {
        $ticket = \App\Ticket::find($request->id);
        if ($request->status == "yes") {
            $ticket->Status = 2;
            App::bind('MessageController', function($app) {
                return new MessageController();
            });
             App::make('MessageController')->send("Ticket Accepted ", $request->id,$ticket->ID_TECH);
        } else {
            $ticket->Status = 3;
            App::bind('MessageController', function($app) {
                return new MessageController();
            });
             App::make('MessageController')->send("Ticket Rejected ", $request->id,$ticket->ID_TECH);
        }
        $ticket->save();
        return redirect('/operator/ticket/list')->with('active', 'ticket');
    }

    public function process($id) {
        $ticket = App\Ticket::find($id);
        return view('operator.ticket_process')->with('ticket', $ticket)->with('active', 'ticket');
    }

    public function update_ticket(Request $request, $id) {
        $ticket = App\Ticket::find($id);
        $input = $request->all();
        $ticket->fill($input)->save();
        if($request->Status == 5){
            $ticket->ClosedDate = date('Y-m-d');
            $ticket->save();
        }
        return redirect('/operator/ticket/list')->with('active', 'ticket');
    }

    public function ticket_listaccepted() {
        $user = Auth::User();
        $tickets = \App\Ticket::where('ID_TECH', $user->id)->where('Status', 2)->orderBy('id', 'desc')->get();
        return view('operator.list_ticket')->with('tickets', $tickets);
    }

    public function ticket_listprocess() {
        $user = Auth::User();
        $tickets = \App\Ticket::where('ID_TECH', $user->id)->where('Status', 4)->orderBy('id', 'desc')->get();
        return view('operator.list_ticket')->with('tickets', $tickets);
    }

    public function ticket_listclosed() {
        $user = Auth::User();
        $tickets = \App\Ticket::where('ID_TECH', $user->id)->where('Status', 5)->orderBy('id', 'desc')->get();
        return view('operator.list_ticket')->with('tickets', $tickets);
    }

    public function ticket_listassigned() {
        $user = Auth::User();
        $tickets = \App\Ticket::where('ID_TECH', $user->id)->where('Status', 1)->orderBy('id', 'desc')->get();
        return view('operator.list_ticket')->with('tickets', $tickets);
    }

    public function user_info() {
        $user = Auth::User();
        $phonecompany = \App\Phonecompany::all();
        return view('operator.user.edit')->with('user', $user)->with('phonecompany', $phonecompany);
    }

    public function validate_password(Request $request) {
        $user = Auth::User();
        if (Hash::check($request->current,$user->password)) {
            echo "true";
        }else{
            echo "false";
        }
            
    }
    
    public function user_update(Request $request){
        $user = App\User::find($request->id);
        $input = $request->all();  
        $user->fill($input)->save();
        $user->password =  bcrypt($request->password);
        $user->save();

        return redirect('/operator/home');
        
    }

}
