<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Order;



class MailController extends Controller
{
    public function index() {

    	$order = Order::findOrFail( rand(1,50) );
    	$recipient = env('MAIL_TEST_RECIPIENT');


    	Mail::to($recipient)->send(new OrderShipped($order));


    	return 'Sent order ' . $order->id;

    }


}
