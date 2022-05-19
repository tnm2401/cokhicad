<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use App\Models\Account;

class ForgotPasswordEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $account;
    private $token;
    public function __construct(Account $account, $token)
    {
        $this->account = $account;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Xác nhận quên mật khẩu")
            ->greeting("Xin chào" . $this->account->name . '!')
            ->line('Vui lòng bấm vào nút để thay đổi mật khẩu tài khoản của bạn !')
            ->action('Thay đổi mật khẩu', route('auth.change_password', ['token' => $this->token]))
            ->line("Cám ơn")
            ->salutation(new HtmlString('Trân trọng'. "<br /> ".config('APP_NAME')));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
