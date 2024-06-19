<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\ReportFormController;

class SendNotiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $email;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // dd($data['data']);
        $this->data = $data;
        $this->email = $data['data']['email'];
        $this->id = $data['id'];
        $this->subject = env('APP_NAME');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ReportFormController = new ReportFormController();
        $arrayProduct = $ReportFormController->showData($this->id);
        return $this->subject($this->subject)->replyTo(env('MAIL_USERNAME'), 'Vàng Ta')->view(
            'mail.self_noti',
            [
                'data' => $this->data,
                'email' => $this->email,
                'arrayProduct' => $arrayProduct
            ]
        );
    }
}
