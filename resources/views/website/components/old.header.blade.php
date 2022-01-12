<header>
    <div class="header-grey-div"></div>
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="logo">
                    <a href="/">
                        <img src="/website/img/Group 24.png" alt="">
                    </a>
                </div>
                <div class="navnav">
                    <div class="nav1">
                        <nav>
                            {{-- <a href="/" class="icon-home"></a> --}}

                            @foreach ($sections as $section)
                            @if($sections !== 0)
                            <div class="navdropdown">
                                <a href="{{ $section->getFullSlug() }}">{{ $section->title }}</a>
                                <div class="navbottomline"></div>
                                <div class="childs">
                                    @foreach ($section->children as $menu)
                                    @if($section->children !== 0)
                                    <a href="{{ $menu->getFullSlug() }}">{{ $menu->title }}</a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </nav>
                    </div>
                    <div class="nav3">
                        <div>
                            <form action="/{{app()->getLocale()}}/search" method="POST">
                                @csrf
                                <input type="text" placeholder="Enter your keywords here..." name="text" required>
                                <button type="submit" class="icon-search"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="burgermenuicon">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="navvvv">
    <div class="burgermenunav">
        <div class="container">
            <div class="row">
                <div class="navigatiottt">
                    <div>
                        <form action="/{{app()->getLocale()}}/search" method="POST">
                            @csrf
                            <input type="text" placeholder="Search" name="text" required>
                            <button type="submit" class="icon-search"></button>
                        </form>
                    </div>
                    <div>
                        <a href="/" class="navhome">{{trans('website.homepage')}}</a>
                        @foreach ($sections as $section)
                        @if($section !==0)
                        <div class="navdropdown">
                            <a href="{{ $section->getFullSlug() }}">{{ $section->title }} <span class="burgerchildicon @if(count($section->children) !==0)icon-left-arrow @endif"></span> </a>
                            <div class="childsss">
                                @foreach ($section->children as $menu)
                                @if($section->children !==0)
                                <a href="{{ $menu->getFullSlug() }}">{{ $menu->title }}</a>
                                @endif
                                @endforeach

                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>

                </div>







            </div>
        </div>

    </div>
</div>
