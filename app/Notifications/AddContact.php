<?php

namespace App\Notifications;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AddContact extends Notification
{
    use Queueable;
    protected $contact;

    public function __construct(Contact $contact)
    {
        //
        $this->contact = $contact;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            //
            'name' => $this->contact->name,
            'type' => contact()[$this->contact->type],
            'contact_id' => $this->contact->id,
            'view' => $this->contact->view,
        ];
    }
}
