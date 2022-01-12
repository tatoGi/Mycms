@extends('website.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
@include('webiste.components.head')
<body>

<header>
@include('webiste.components.header')

</header>

<section class="contacts">
    <img src="assets/images/page.png" alt="">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <h3>საკონტაქტო ინფორმაცია</h3>
                    <a class="s1" href=""><span class="icon-pin"></span>მისამართი</a>
                    <a class="s1" href=""><span class="icon-phone"></span>+995123456</a>
                    <a class="s1" href=""><span class="icon-smartphone"></span>+995123456</a>
                    <a class="s1" href=""><span class="icon-mail"></span>ელ-ფოსტა: info@ideadesigngrou.ge</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <form action="">
                        <input class="n1" type="text" placeholder="სახელი">
                        <input class="n2" type="text" placeholder="ელ-ფოსტა">
                        <textarea name="" id="" cols="30" rows="10" placeholder="კომენტარი"></textarea>
                    </form>
                    <div class="send">
                        <button>გაგზავნა<span class="icon-send"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
@include('webiste.components.footer')
</footer>



@include('webiste.components.scripts')
</body>
</html>
</section>
@nedsection


