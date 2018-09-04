<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
// use App\Mail\OrderShipped;
use App\Jobs\SendOrderEmail;
use App\Order;
use Log;



class MailController extends Controller
{

    public function index() {

    	for ($i=0; $i<20; $i++) {

			$order = Order::findOrFail(rand(1,50));   

			//if (rand(1, 3) > 1) {
				SendOrderEmail::dispatch($order)->onQueue('default');
			//} else {
			//	SendOrderEmail::dispatch($order)->onQueue('sms');
			//}

    	}

    	
    	
    	// SendOrderEmail::dispatch($order);  // default 

    	Log::info('Dispatched orders');  // . $order->id);


    	return 'Dispatched orders';  // . $order->id;


    	// $recipient = env('MAIL_TEST_RECIPIENT');
    	// Mail::to($recipient)->send(new OrderShipped($order));
    	// return 'Sent order ' . $order->id;


    }


}
