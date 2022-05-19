<?php

namespace App\Notifications;
use App\Models\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class VerificationEmail extends Notification
{
    use Queueable;

    private $account;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Account $account)
    {
        $this->account = $account;
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
            ->subject("Xác nhận tài khoản")
            ->greeting("Xin chào". $this->account->name . ' !')
            ->line('Vui lòng bấm vào nút để xác nhận tài khoản của bạn !')
            ->action('Thay đổi mật khẩu', route('auth.verify', ['token' => $this->account->token]))
            ->line('Cảm ơn')
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
