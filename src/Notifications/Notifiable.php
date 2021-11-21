<?php

namespace Hotrush\SpatieBackup\Notifications;

use Spatie\Backup\Notifications\Notifiable as BaseNotifiable;

class Notifiable extends BaseNotifiable
{
    public function routeNotificationForTelegram(): string
    {
        return config('backup.notifications.telegram.channel_id');
    }
}