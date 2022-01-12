@extends('website.layout')
@section('content')

    <!--begin::Entry-->
    <!DOCTYPE html>
<html lang="en">
@include('webiste.components.head')
<body>

@include('webiste.components.header')

    <section class="projects">
        <div class="container">
            <div class="row">
                <h2>პროექტები</h2>


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="active">
                          <a href="#home" role="tab" data-toggle="tab">
                              <icon class="fa fa-home"></icon> ყველა
                          </a>
                      </li>
                      <li><a href="#profile" role="tab" data-toggle="tab">
                          <i class="fa fa-user"></i> გისი
                          </a>
                      </li>
                      <li>
                          <a href="#settings" role="tab" data-toggle="tab">
                              <i class="fa fa-cog"></i> დიზაინი
                          </a>
                      </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane fade active in" id="home">
                          <article class="col-lg-6">
                                <a href="" class="row">
                                    <div class="background"></div>
                                    <div class="foreground">
                                        <img src="assets/images/bilrmoree.png" alt="">
                                        <div>
                                            <h4>ისწავლეთ დროის ეფექტური მართვა და გახდით უფრო თავდაჯერებული. დროის სწორი
                                                განაწილება გაგხდით მეტად წარმატებულს როგორც კარიერულ, ისე პირად ცხვრებაში. </h4>
                                        </div>
                                    </div>
                                </a>
                          </article>
                          <article class="col-lg-6">
                                <a href="" class="row">
                                    <div class="background"></div>
                                    <div class="foreground">
                                        <img src="assets/images/bilrmoree.png" alt="">
                                        <div>
                                            <h4>ისწავლეთ დროის ეფექტური მართვა და გახდით უფრო თავდაჯერებული. დროის სწორი
                                                განაწილება გაგხდით მეტად წარმატებულს როგორც კარიერულ, ისე პირად ცხვრებაში. </h4>
                                        </div>
                                    </div>
                                </a>
                          </article>
                          <article class="col-lg-6">
                                <a href="" class="row">
                                    <div class="background"></div>
                                    <div class="foreground">
                                        <img src="assets/images/bilrmoree.png" alt="">
                                        <div>
                                            <h4>ისწავლეთ დროის ეფექტური მართვა და გახდით უფრო თავდაჯერებული. დროის სწორი
                                                განაწილება გაგხდით მეტად წარმატებულს როგორც კარიერულ, ისე პირად ცხვრებაში. </h4>
                                        </div>
                                    </div>
                                </a>
                          </article>
                          <article class="col-lg-6">
                                <a href="" class="row">
                                    <div class="background"></div>
                                    <div class="foreground">
                                        <img src="assets/images/bilrmoree.png" alt="">
                                        <div>
                                            <h4>ისწავლეთ დროის ეფექტური მართვა და გახდით უფრო თავდაჯერებული. დროის სწორი
                                                განაწილება გაგხდით მეტად წარმატებულს როგორც კარიერულ, ისე პირად ცხვრებაში. </h4>
                                        </div>
                                    </div>
                                </a>
                          </article>
                      </div>
                      <div class="tab-pane fade" id="profile">
                          <h2>Profile Content Goes Here</h2>
                          <img src="http://lorempixel.com/400/400/cats/2" alt="Cats"/>
                      </div>
                      <div class="tab-pane fade" id="messages">
                          <h2>Messages Content Goes Here</h2>
                          <img src="http://lorempixel.com/400/400/cats/3" alt="Cats"/>
                      </div>
                      <div class="tab-pane fade" id="settings">
                          <h2>Settings Content Goes Here</h2>
                          <img src="http://lorempixel.com/400/400/cats/4" alt="Cats"/>
                      </div>
                    </div>




            </div>
        </div>
            <a class="all-project" href="">ყველა პროექტი</a>
    </section>
    @include('webiste.components.footer')










  @include('webiste.components.scripts')
</body>
</html>
    <!--end::Entry-->
@endsection
