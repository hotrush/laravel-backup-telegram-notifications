<?php

namespace Hotrush\SpatieBackup\Notifications\Notifications;

use Spatie\Backup\Notifications\Notifications\BackupHasFailedNotification as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;

class BackupHasFailedNotification extends BaseNotification
{
    public function toTelegram($notifiable): TelegramMessage
    {
        return (new TelegramMessage)
            ->view('laravel-backup-tg-notifications::failed', [
                'message' => trans('backup::notifications.backup_failed_subject', [
                    'application_name' => $this->applicationName(),
                ]),
                'exception' => $this->event->exception,
                'properties' => $this->backupDestinationProperties(),
            ])
            ->options([
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true
            ]);
    }
}