<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use App\Mail\WelcomeEmail;
use App\Mail\SendNotiMail;
use App\Http\Controllers\ReportFormController;

class SendMailController extends Controller
{
    public function send_mail(Request $request)
    {
        $data = $request->all();
        $email = $data['email'] ?? '';
        $id = $data['id'];
        $dateTime = $data['dateTime'];
        
        // Send
        \Mail::to($email)->send(new WelcomeEmail([
            'email' => $email,
            'id' => $id,
            'dateTime' => $dateTime,
        ]));
        \Mail::to(env('MAIL_USERNAME'))->send(new SendNotiMail([
            'data' => $data,
            'id' => $id,
        ]));
        Session::flash('flash_message', 'Đặt hàng thành công ');
        return view('template.pnj.success');
    }
    
}
