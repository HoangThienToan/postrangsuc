<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\ReportFormController;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    // Get public to show 
    public $id;
    public $email;
    public $dateTime;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->email = $data['email'];
        $this->dateTime = $data['dateTime'];
        $this->subject = env('APP_NAME');
        // dd($data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $id = $data['id'];
        $ReportFormController = new ReportFormController();
        $arrayProduct = $ReportFormController->showData($this->id);
        $image = $arrayProduct['image'];
        $fileName = url('uploads/img/' . $image);
        return $this->subject($this->subject)->replyTo(env('MAIL_USERNAME'), 'Vàng Ta')->view(
            'mail.send_mail',
            [
                'email' => $this->email,
                'dateTime' => $this->dateTime,
                'arrayProduct' => $arrayProduct,
                'fileName' => $fileName
            ]
        );
    }
}
