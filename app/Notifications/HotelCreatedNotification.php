<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

/**
 * Class HotelCreatedNotification
 *    Use this class to notify notifiable entities for new hotel creation.
 *
 * @package App\Notifications
 */
class HotelCreatedNotification extends Notification
{
    use Queueable;

    /**
     * @var $hotel
     */
    protected $hotel;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($hotel)
    {
        $this->hotel = $hotel;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param mixed $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'hotel_id' => $this->hotel->id,
            'hotel_name' => $this->hotel->name,
        ]);
    }
}
