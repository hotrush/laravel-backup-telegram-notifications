<?php

namespace Hotrush\SpatieBackup\Notifications;

use Spatie\Backup\Notifications\Notifications\CleanupHasFailed as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;

class CleanupHasFailed extends BaseNotification
{
    public function toTelegram($notifiable)
    {
        return (new TelegramMessage)
            ->to(config('backup.notifications.telegram.channel_id'))
            ->view('laravel-backup-tg-notifications::failed', [
                'message' => trans('backup::notifications.cleanup_failed_subject', [
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