<?php

namespace Hotrush\SpatieBackup\Notifications;

use Spatie\Backup\Notifications\Notifications\BackupHasFailed as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;

class BackupHasFailed extends BaseNotification
{
    public function toTelegram($notifiable)
    {
        return (new TelegramMessage)
            ->to(config('backup.notifications.telegram.channel_id'))
            ->view('laravel-backup-tg-notifications::failed', [
                'message' => trans('backup::notifications.backup_failed_subject', [
                    'application_name' => $this->applicationName(),
                ]),
                'exception' => $this->event->exception,
                'properties' => $this->backupDestinationProperties(),
            ]);
    }
}