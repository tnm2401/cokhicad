<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Setting;
use File;
class SendMail extends Mailable
implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->afterCommit();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = Setting::first()->email;
        $trans = Setting::with('translations')->first();
        $name = $trans->translations->name;
        $subject = 'Cảm ơn bạn đã đăng kí !';

        $view =    $this->view('mail.email-template')
                    ->from($address, $name)
                    //->cc($address, $name)
                    // ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([
                                'title' => $this->data['title'],
                                'content' => $this->data['content']
                    ]);
                    // return \File::exists($this->data['file']) ? $view
                    // : $view->attach($this->data['file']);
                    if($this->data['file'] == null){
                        return $view;
                    }
                    else{
                        return $view->attach($this->data['file']);
                    }
    }
}
