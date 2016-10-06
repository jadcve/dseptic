<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
Use App\Ticket;
use App;
use Auth;
use App\User;
use App\Http\Controllers\Controller;

class TicketController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $user = Auth::User();
        $userId = $user->id;
        $tickets = Ticket::where('ID_ADMIN', $userId)->paginate(10);
        $tickets->setPath('/DSeptic/admin/ticket');
//        $tickets = Ticket::all();
//        $tickets = Ticket::paginate(10);
        return view('admin.ticket.index')->with('tickets', $tickets)->with('active', 'tickets');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $operators = User::where('rol_id', 2)->select('id', 'name')->get();
        $admins = User::where('rol_id', 1)->select('id', 'name')->get();
        $customers = User::where('rol_id', 3)->select('id', 'name')->get();
        $user = Auth::User();
        $userId = $user->id;
        $state = App\State::all();

        return view('admin.ticket.create')->with('state', $state)->with('customers', $customers)->with('userId', $userId)->with('operators', $operators)->with('admins', $admins);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        //
        $input = $request->except('PHONE', 'PHONE2', 'PHONE3');
        $data = User::where('users.id', $request->ID_TECH)->select('users.email', 'users.name', 'users.PHONE', 'users.ID_PHONE_COMPANY')->first();
        $datacustomer = User::where('users.id', $request->ID_CUSTOMER)->select('users.PHONE','users.name','users.email')->first();
        $infocustomer = \App\Customer::where('ID_USER', $request->ID_CUSTOMER)->select('LAST_NAME')->first();

//        print_r($data);
        $tick = Ticket::create($input);
        
        
        $usercustomer = User::find($request->ID_CUSTOMER);
        $inputcustomer = $request->only('PHONE', 'PHONE2', 'PHONE3');
        $usercustomer->fill($inputcustomer)->save();
        
        
        App::bind('MailController', function($app) {
            return new MailController();
        });
        App::make('MailController')->send($data->email, $datacustomer->name, $tick->id, $data->PHONE, $data->ID_PHONE_COMPANY, $tick->ADDRESS, $datacustomer->PHONE,$infocustomer->LAST_NAME,$datacustomer->email);

        App::bind('MessageController', function($app) {
            return new MessageController();
        });
        App::make('MessageController')->send("Ticket Created ", $tick->id, $request->ID_TECH);
//        }
        return redirect('/admin/ticket')->with('active', 'ticket');
//        return view('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $ticket = Ticket::find($id);
        return view('admin.ticket.show')->with('ticket', $ticket)->with('active', 'ticket');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $ticket = Ticket::find($id);
        $operators = User::where('rol_id', 2)->select('id', 'name')->get();
        $admins = User::where('rol_id', 1)->select('id', 'name')->get();
        $user = Auth::User();
        $userId = $user->id;
        return view('admin.ticket.edit')->with('ticket', $ticket)->with('userId', $userId)->with('operators', $operators)->with('admins', $admins)->with('active', 'ticket');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $ticket = Ticket::find($id);
        $input = $request->all();
        $ticket->fill($input)->save();
//        echo "guardo";
        $data = User::where('id', $request->ID_TECH)->select('email', 'name')->first();
//        echo " data ".$data->email." ".$data->name;

        App::bind('MailController', function($app) {
            return new MailController();
        });
        App::make('MailController')->send($data->email, $data->name, $id);

        App::bind('MessageController', function($app) {
            return new MessageController();
        });
        App::make('MessageController')->send("Ticket Assigned ", $ticket->id, $request->ID_TECH);

        return redirect('/admin/ticket')->with('active', 'ticket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $ticket = Ticket::find($id);
        $ticket->delete();

        return redirect('/admin/ticket')->with('message', 'Ticket Delete');
    }

    public function ticket_rejected() {
        $tickets = Ticket::where('Status', 3)->get();
        return view('admin.ticket.index')->with('tickets', $tickets)->with('active', 'tickets');
    }

    public function updatecity(Request $request) {

        $citys = \App\City::where('ID_STATE', $request->idstate)->get();
        foreach ($citys as $city){ ?>
           <option value="<?php echo $city->id; ?>"><?php echo $city->CITY; ?></option> 
    <?php    }
    }
}