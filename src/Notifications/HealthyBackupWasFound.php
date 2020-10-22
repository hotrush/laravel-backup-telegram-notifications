<?php

namespace Hotrush\SpatieBackup\Notifications;

use Spatie\Backup\Notifications\Notifications\HealthyBackupWasFound as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;

class HealthyBackupWasFound extends BaseNotification
{
    public function toTelegram($notifiable)
    {
        return (new TelegramMessage)
            ->content(trans('backup::notifications.healthy_backup_found_subject', ['application_name' => $this->applicationName(), 'disk_name' => $this->diskName()]))
            ->to(config('backup.notifications.telegram.channel_id'))
            ->view('laravel-backup-tg-notifications::successful', [
                'properties' => $this->backupDestinationProperties(),
            ]);
    }
}