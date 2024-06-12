<ul class="flex">
    @foreach(config('langs') as $lang)
        <li class="mx-1">
            <a class="{{ session()->get('locale') === $lang ? 'font-medium' : '' }}" href="{{ route('lang.switch', $lang) }}">{{ $lang }}</a>
        </li>
    @endforeach
</ul>
