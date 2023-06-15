<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class n extends Notification
{
    use Queueable;
    protected $table = 'notifications';
    protected $fillable = ['incident_code','type','notifiable_type','data'];

    protected $liker;
    protected $post;
    protected $receiver;
    public $incident_code;
  
    /**
     * Create a new notification instance.
     */
    public function __construct(User $liker, Incident $incident, User $receiver, $incident_code)
    {
        $this->liker = $liker;
        $this->post = $incident;
        $this->receiver = $receiver;
        $this->incident_code = $incident_code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {    $email = $this->data['email'];
        return (new MailMessage)
                    ->to( $email = $this->data['email'])
                    
                    ->line('Accord de rendez vous');
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
            'incident_code' => $this->incident_code, 
        ];
    }
}
