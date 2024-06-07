@if ($message = flash()->get())
    <div class="{{ $message->class() }}">
        <p>{{ $message->message() }}</p>
    </div>
@endif
