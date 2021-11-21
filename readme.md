Extension for spatie/laravel-backup to add telegram notifications.

| Version | spatie/laravel-backup version | Laravel version | PHP version |
|---------|-------------------------------|-----------------|-------------|
| ^1.0.0  | ^6.0.0                        | 5, 6, 7, 8      | ^7.3, ^8.0  |
| ^2.0.0  | ^7.0.0                        | 8               | ^8.0        |

### Installation

```
composer require hotrush/laravel-backup-telegram-notifications
```

### Configuration

- Configure telegram

```
// config/services.php
'telegram-bot-api' => [
    'token' => env('TELEGRAM_BOT_TOKEN', 'YOUR BOT TOKEN HERE')
],
```

- Configure backup package

```
// config/backup.php

use NotificationChannels\Telegram\TelegramChannel;

'notifications' => [

    'notifications' => [
        \Hotrush\SpatieBackup\Notifications\Notifications\BackupHasFailedNotification::class => [TelegramChannel::class],
        \Hotrush\SpatieBackup\Notifications\Notifications\UnhealthyBackupWasFoundNotification::class => [TelegramChannel::class],
        \Hotrush\SpatieBackup\Notifications\Notifications\CleanupHasFailedNotification::class => [TelegramChannel::class],
        \Hotrush\SpatieBackup\Notifications\Notifications\BackupWasSuccessfulNotification::class => [TelegramChannel::class],
        \Hotrush\SpatieBackup\Notifications\Notifications\HealthyBackupWasFoundNotification::class => [TelegramChannel::class],
        \Hotrush\SpatieBackup\Notifications\Notifications\CleanupWasSuccessfulNotification::class => [TelegramChannel::class],
    ],

    'notifiable' => \Hotrush\SpatieBackup\Notifications\Notifiable::class,

    'telegram' => [
        'channel_id' => env('BACKUP_TELEGRAM_CHANNEL'),
    ],

    ...
],
```