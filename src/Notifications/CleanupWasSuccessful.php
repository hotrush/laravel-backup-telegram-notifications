<?php

namespace Hotrush\SpatieBackup\Notifications;

use Spatie\Backup\Notifications\Notifications\CleanupWasSuccessful as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;

class CleanupWasSuccessful extends BaseNotification
{
    public function toTelegram($notifiable)
    {
        return (new TelegramMessage)
            ->to(config('backup.notifications.telegram.channel_id'))
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