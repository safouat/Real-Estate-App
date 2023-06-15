<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Annonce;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;


class PostRDV extends Notification
{
    use Queueable;
    protected $table = 'notifications';
    protected $fillable = ['annonce_code','type','notifiable_type','data'];

    protected $liker;
    protected $post;
    protected $receiver;
    public $annonce_code;
  
    /**
     * Create a new notification instance.
     */
    public function __construct(User $liker, annonce $annonce, User $receiver, $annonce_code)
    {
        $this->liker = $liker;
        $this->post = $annonce;
        $this->receiver = $receiver;
        $this->annonce_code = $annonce_code;
    
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'liker_id' => $this->liker->id,
            'liker_name' => $this->liker->name,
            'liker_adress'=>$this->liker->email,
            'post_id' => $this->post->code,
            'post_title' => $this->post->name,
            'post_user_name' => $this->receiver->name,
            'annonce_code' => $this->annonce_code, // add annonce_code here
            
           
        ];
    }
    


}
