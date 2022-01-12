@extends('website.master')
@section('main')

@yield('content')

<section class="bottom-banner-section" style="margin-top: 12px;">
    @if(isset($bottom_banner))
    <div class="banner-add">
        <!-- <a href="{{ $bottom_banner->translate(app()->getLocale())->slug }}" target="blank"><img src="{{ image($bottom_banner->thumb) }}" alt=""></a> -->
    </div>
    @else

    @endif
</section>
@endsection
