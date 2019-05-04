<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')
@stack('style')
<body>
  <div id="app">
    @include('layouts.partials.nav')
  <main class="py-4">
    @yield('content')
  </main>
</div>
@include('layouts.partials.script')
@stack('script')
</body>
</html>
