<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class CommentNoti extends Notification
{
    use Queueable;

  
    public $commenterName;
    public $commenterImage;
    public $annonceName;
   

    /**
     * Create a new notification instance.
     *
     * @param int $receiverId
     * @param string $commenterName
     * @param string $commenterImage
     * @param string $annonceName
     * @return void
     */
    public function __construct( $commenterName, $commenterImage, $annonceName)
    {
        
        $this->commenterName = $commenterName;
        $this->commenterImage = $commenterImage;
        $this->annonceName = $annonceName;
       
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [ 'database'];
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
            ->subject('Nouveau commentaire sur votre annonce')
            ->line('Bonjour,')
            ->line('Vous avez reçu un nouveau commentaire sur votre annonce : ' . $this->annonceName)
            ->line('Commentaire de : ' . $this->commenterName)
            ->line('Veuillez vous connecter pour voir le commentaire complet.')
            ->action('Voir le commentaire', url('/annonces/' . $this->annonceName));
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\DatabaseMessage
     */
    public function toArray($notifiable)
    {
        return [
            'commenter_name' => $this->commenterName,
            'commenter_image' => $this->commenterImage,
            'annonce_name' => $this->annonceName,
          
        ];
    }
}
?>