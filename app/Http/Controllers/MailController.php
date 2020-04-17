<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
class MailController extends Controller
{
    public function addFeedback(Request $request)
    {
        $data = array(
            'full_name'     => $request->full_name,
            'number_phone'  => $request->number_phone,
            'messages'      => $request->messages,
        );
        Mail::send('sendmail', $data, function($message){
	        $message->to($request->email, 'Tên hiển thị')->subject('Tiêu đề gửi');
	    });
        Session::flash('flash_message', 'Đã gửi thành công, chúng tôi sẽ liên hệ với bạn sớm nhất!');

        return view('home');
    }
}
