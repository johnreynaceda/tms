<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ScheduleNotification extends Notification
{
    use Queueable;

    public string $capstoneTitle;
    public array $researchers;
    public string $schedule;

    /**
     * Create a new notification instance.
     */
    public function __construct($capstoneTitle, $members, $schedule)
    {
        $this->capstoneTitle = $capstoneTitle;
        $this->researchers   = $members;
        $this->schedule      = $schedule;
    }

    //

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
    {
        return (new MailMessage)
            ->subject('Capstone Defense Schedule Notification')
            ->greeting('Dear Teacher,')
            ->line('You have been scheduled for a capstone defense.')
            ->line('**Capstone Title:** ' . $this->capstoneTitle)
            ->line('**Members:** ' . implode(', ', $this->researchers))
            ->line('**Schedule:** ' . $this->schedule)
            ->line('Please be present and prepared for the defense session.')
            ->line('Thank you!')
            ->salutation('Best Regards,
        Capstone Committee');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
