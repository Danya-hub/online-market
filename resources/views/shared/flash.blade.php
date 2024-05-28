@if ($message = flash()->get())
    <div class="{{ $message->class() }} p-5">
        <p>{{ $message->message() }}</p>
    </div>
@endif
