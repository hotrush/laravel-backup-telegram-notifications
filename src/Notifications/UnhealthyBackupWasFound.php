<?php

namespace Hotrush\SpatieBackup\Notifications;

use Spatie\Backup\Notifications\Notifications\UnhealthyBackupWasFound as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;

class UnhealthyBackupWasFound extends BaseNotification
{
    public function toTelegram($notifiable)
    {
        return (new TelegramMessage)
            ->to(config('backup.notifications.telegram.channel_id'))
            ->view('laravel-backup-tg-notifications::failed', [
                'message' => trans('backup::notifications.unhealthy_backup_found_subject', [
                    'application_name' => $this->applicationName(),
                ]),
                'exception' => $this->event->exception,
                'description' => $this->problemDescription(),
                'properties' => $this->backupDestinationProperties(),
            ]);
    }
}