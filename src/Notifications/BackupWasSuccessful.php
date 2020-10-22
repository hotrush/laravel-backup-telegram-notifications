<?php

namespace Hotrush\SpatieBackup\Notifications;

use Spatie\Backup\Notifications\Notifications\BackupWasSuccessful as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;

class BackupWasSuccessful extends BaseNotification
{
    public function toTelegram($notifiable)
    {
        return (new TelegramMessage)
            ->to(config('backup.notifications.telegram.channel_id'))
            ->view('laravel-backup-tg-notifications::successful', [
                'message' => trans('backup::notifications.backup_successful_body', [
                    'application_name' => $this->applicationName(),
                    'disk_name' => $this->diskName(),
                ]),
                'properties' => $this->backupDestinationProperties(),
            ]);
    }
}