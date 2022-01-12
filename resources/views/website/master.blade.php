<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('website.components.head')


<body>

    <header>
    @include('website.components.header')
    </header>

    <section class="section-cover">
      @include('website.components.main')
    </section>
    <footer>
    @include('website.components.footer')
    </footer>









    @include('website.components.scripts')
</body>

</html>

