<?php

namespace Hotrush\SpatieBackup\Notifications\Notifications;

use Spatie\Backup\Notifications\Notifications\BackupWasSuccessfulNotification as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;

class BackupWasSuccessfulNotification extends BaseNotification
{
    public function toTelegram($notifiable): TelegramMessage
    {
        return (new TelegramMessage)
            ->view('laravel-backup-tg-notifications::successful', [
                'message' => trans('backup::notifications.backup_successful_body', [
                    'application_name' => $this->applicationName(),
                    'disk_name' => $this->diskName(),
                ]),
                'properties' => $this->backupDestinationProperties(),
            ])
            ->options([
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true
            ]);
    }
}