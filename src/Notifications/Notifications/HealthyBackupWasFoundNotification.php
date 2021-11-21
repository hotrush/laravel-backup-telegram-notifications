<?php

namespace Hotrush\SpatieBackup\Notifications\Notifications;

use Spatie\Backup\Notifications\Notifications\HealthyBackupWasFoundNotification as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;

class HealthyBackupWasFoundNotification extends BaseNotification
{
    public function toTelegram($notifiable): TelegramMessage
    {
        return (new TelegramMessage)
            ->view('laravel-backup-tg-notifications::successful', [
                'message' => trans('backup::notifications.healthy_backup_found_subject', [
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