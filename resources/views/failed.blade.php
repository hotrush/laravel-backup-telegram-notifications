<strong>{{ trans('backup::notifications.exception_message_title') }}:</strong>
{{ $exception->getMessage() }}
<strong>{{ trans('backup::notifications.exception_trace_title') }}:</strong>
{{ $exception->getTraceAsString() }}

@if(isset($description))
    <i>{{ $description }}</i>
@endif

@include('laravel-backup-tg-notifications::properties', ['properties' => $properties])