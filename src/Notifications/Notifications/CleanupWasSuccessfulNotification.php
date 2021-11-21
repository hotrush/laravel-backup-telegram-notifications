<?php

namespace Hotrush\SpatieBackup\Notifications\Notifications;

use Spatie\Backup\Notifications\Notifications\CleanupWasSuccessfulNotification as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;

class CleanupWasSuccessfulNotification extends BaseNotification
{
    public function toTelegram($notifiable): TelegramMessage
    {
        return (new TelegramMessage)
            ->view('laravel-backup-tg-notifications::successful', [
                'message' => trans('backup::notifications.cleanup_successful_body', [
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