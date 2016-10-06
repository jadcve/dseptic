<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
      
//    public function send(Request $request){
    public function send($email,$name,$ticket){
        $request = array('email' => $email,
           'name' => $name);
//        $destino=$email;
//        $nombre_des=$name;
        $url=url();
        $data=array('email' => 'mcastellanotg@gmail.com',
            'name' => $name,
            'subject' => 'Ticket Dseptic',
            'body' => '<a href="'.$url.'/operator/ticket/accept/'.$ticket.'">Ticket '.$ticket.'</a>');
       //guarda el valor de los campos enviados desde el form en un array
//       $data = $request->all();
// 
//       //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
       \Mail::send('message', $data, function($message) use ($request)
       {
           //remitente
           $message->from('mcastellanotg@gmail.com', 'Manuel');
//           $message->from($request->email, $request->name);
           
           //asunto
           $message->subject('Dseptic Ticket');
           
           $message->to($request["email"], $request["name"]);
           //receptor
//           $message->to('9723339999@sprintpaging.com', 'manuel');
 
       });
//       return \View::make('success');
//        \Mail::raw('Laravel with Mailgun is easy!', function($message)
//        {
//        $message->to('macm1820@gmail.com');
////        $message->from('noreply@localhost', 'Do Not Reply');
//        });
    }


    public function index()
    {
        return \View::make('mail');
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
}
