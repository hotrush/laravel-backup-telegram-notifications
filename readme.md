Extension for spatie/laravel-backup to add telegram notifications.

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
        \Hotrush\SpatieBackup\Notifications\BackupHasFailed::class => [TelegramChannel::class],
        \Hotrush\SpatieBackup\Notifications\UnhealthyBackupWasFound::class => [TelegramChannel::class],
        \Hotrush\SpatieBackup\Notifications\CleanupHasFailed::class => [TelegramChannel::class],
        \Hotrush\SpatieBackup\Notifications\BackupWasSuccessful::class => [TelegramChannel::class],
        \Hotrush\SpatieBackup\Notifications\HealthyBackupWasFound::class => [TelegramChannel::class],
        \Hotrush\SpatieBackup\Notifications\CleanupWasSuccessful::class => [TelegramChannel::class],
    ],

    'telegram' => [
        'channel_id' => env('BACKUP_TELEGRAM_CHANNEL'),
    ],

    ...
],
```