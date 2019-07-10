<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class DocController extends Controller
{
    //

    public function doContactUs(Request $request)
    {
        $request -> validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);


        $newComment = new Contact();
        $newComment->first_name = $request -> first_name;
        $newComment->last_name = $request -> last_name;
        $newComment->email = $request -> email;
        $newComment->phone = $request -> phone;
        $newComment->message = $request -> message;

        $newComment ->save();


        $from = strtolower($_POST['email']);
        $message = $_POST['message'];



//        // First, instantiate the SDK with your API credentials
//        $mg = Mailgun::create('key-766aa88dbeda275f40fcde3d00e90d2f'); // For US servers
////$mg = Mailgun::create('key-766aa88dbeda275f40fcde3d00e90d2f', 'https://api.mailgun.net/v3/ceisheri.org'); // For EU servers
//
//// Now, compose and send your message.
//// $mg->messages()->send($domain, $params);
//        $mg->messages()->send('ceisheri.org', [
//            'from'    => $from,
//            'to'      => 'librallaw@yahoo.com',
//            'subject' => 'New Contact Message!',
//            'text'    => $message
//        ]);


        $details['message'] = $message;
        $details['phone'] = $request -> phone;
        $details['first_name'] = $request -> first_name;
        $details['last_name'] = $request -> last_name;
        $details['email'] = $request -> email;

        Mail::to('support.pg@partumgateway.com')->send(new ContactEmail($details));


        $referrer = $_SERVER['HTTP_REFERER'];

        return redirect()->to($referrer."#contact-section")->with("message","Your feedback was successfully received")
            ->with("type","success");



    }
}
