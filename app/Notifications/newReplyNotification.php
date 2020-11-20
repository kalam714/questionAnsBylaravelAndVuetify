<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class newReplyNotification extends Notification
{
    use Queueable;

   public $reply;
    public function __construct(Reply $reply)
    {
        $this->reply=$reply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'replyBy'=>$this->$reply->user->name,
            'question'=>$this->$reply->question->title,
            'path'=>$this->$reply->question->path
        ];
    }
}
