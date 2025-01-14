<header class="header">
    {{$slot}}
    <div class="header__logo">
        <img src="{{ asset('assets/imgs/logo.svg') }}" alt="{{ config('app.name', 'Laravel') }} Logo">
    </div>
</header>
