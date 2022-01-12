<div class="container">
    <div class="row">
        <a href=""><img src="assets/images/Group 1.png" alt=""></a>
        <nav>
            <ul class="navigation">
                @foreach ($sections as $section)
                @if($sections !== 0)
                <li><a href="{{ $section->getFullSlug() }}">{{ $section->title }}</a></li>
                @endif
                @endforeach
            </ul>


            <div class="language">
                <a href="" class="active">GEO</a>
                <a href="">ENG</a>
            </div>
            <div class="social-media">
                <form action="">
                    <div>
                        <input type="text">
                        <button href="" class="icon-search"></button>
                    </div>
                </form>
                <a href="" class="icon-facebook"><span class="path1"></span><span class="path2"></span></a>
                <a href="" class="icon-linkedin"><span class="path1"></span><span class="path2"></span></a>
                <span class="icon-burgermenu"></span>
            </div>
        </nav>
    </div>
</div>
