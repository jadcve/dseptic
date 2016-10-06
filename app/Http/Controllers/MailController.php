<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
//    public function send(Request $request){
    public function send($email, $name, $ticket, $phone, $idphone, $address, $phonecustomer,$last_name,$emailcustomer) {
        if ($idphone != "" || $idphone != null) {
            $phoneCompany = \App\Phonecompany::where('id', $idphone)->first();
            $phonecodigo = $phoneCompany->PHONE_CODIGO;
        } else {
            $phonecodigo = "";
        }
        if ($phonecodigo == "")
            $phonecodigo = null;
        $name = $name." ".$last_name;
        $request = array('email' => $email,
            'name' => $name,
            'codigo' => $phonecodigo,
            'phone' => $phone);

        $url = url();
        $td = '<tr style="font-family: Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">';
        $content = $td . " Work Order #" . $ticket . "</tr>" . $td . " Customer Address: " . $address . "</tr> " . $td . " Customer Name: " . $name . "</tr>" . $td . "  Customer Phone: " . $phonecustomer . "</tr>". $td . "  Customer Email: " . $emailcustomer . "</tr>";
        $datasms = array('name' => $name,
            'emailcustomer' => $emailcustomer,
            'address' => $address,
            'phone' => $phonecustomer,
            'number' => $ticket,
            'subject' => 'Ticket Dseptic',
            'body' => $url . '/operator/ticket/process/' . $ticket);

        $data = array('email' => $email,
            'name' => $name,
            'subject' => "",
            'body' => $content . "  " . '<a href="' . $url . '/operator/ticket/process/' . $ticket . '">Ticket ' . $ticket . '</a>');
        //guarda el valor de los campos enviados desde el form en un array
//       $data = $request->all();
// 
//       //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
        \Mail::send('message', $data, function($message) use ($request) {
            //remitente
            $message->from('mcastellanotg@gmail.com', 'DSeptic');
//           $message->from($request->email, $request->name);
            //asunto
            $message->subject('Dseptic Ticket');

            $message->to($request["email"], $request["name"]);
            //receptor
        });
        if ($phonecodigo != "") {
            \Mail::send('sms', $datasms, function($message) use ($request) {
//            $message->from('mcastellanotg@gmail.com', 'DSeptic');
                $message->subject('Dseptic Ticket');

                $message->to($request["phone"] . '@' . $request["codigo"], $request["name"]);
            });
            \Mail::send('sms2', $datasms, function($message) use ($request) {
//                $message->subject('Dseptic Ticket');

                $message->to($request["phone"] . '@' . $request["codigo"], $request["name"]);
            });
            \Mail::send('sms3', $datasms, function($message) use ($request) {
                $message->to($request["phone"] . '@' . $request["codigo"], $request["name"]);
            });
        }
    }

    public function index() {
        return \View::make('mail');
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

}
