@section('title','| HomePage')
@include('layouts/head')



<script src="{{ asset('js/animations.js') }}"></script>
<script src="{{ asset('js/gsap.min.js') }}"></script>
@include('layouts/nav')

<section class="hero">

    <h1>The Gilded Bottle</h1>
    <h2>Welcome to our Website</h2>
    <p>Discover the latest products and services</p>
    <a href="{{url('products')}}" class="btn" style="color:aliceblue;">Discover Products</a>

    <!-- <div class="floating-object">
            <img src="{{url('images/jameson.png')}}" height="250px" />
            <img src="{{url('images/morganspice.png')}}" height="250px" />

        </div> -->

</section>


<section class="parallax-section">
    <div class="content">
        <h1>Shop From our variety of products</h1>
        <ul>
            <li>Wines</li>
            <li>Spirits</li>
            <li>Bottle Beers</li>
            <li>Shots such as Jagermeister</li>
        </ul>
    </div>
    <img src="{{url('images/homePimg.jpg')}}" />
</section>


<div class="container-products-homepage">
    <div class="profile-card-2">
        <a href="{{url('products/filter/Brandy')}}">
            <img src="{{url('images/brandy.jpg')}}" height="600px" width="auto">
            <div class="profile-name">Brandy</div>
        </a>
    </div>
    <div class="profile-card-2">
        <a href="{{url('products/filter/Whiskey')}}">
            <img src="{{url('images/jamesonIMG.jpg')}}" height="600px" width="auto">
            <div class="profile-name">Whiskey</div>
        </a>
    </div>
    <div class="profile-card-2">
        <a href="{{url('products/filter/Vodka')}}">
            <img src="{{url('images/goose.jpg')}}" height="600px" width="auto">
            <div class="profile-name">Vodka</div>
        </a>
    </div>
    <div class="profile-card-2">
        <a href="{{url('products/filter/Rum')}}">
            <img src="{{url('images/rumIMG.jpg')}}" height="600px" width="auto">
            <div class="profile-name">Rum</div>
        </a>
    </div>
    <div class="profile-card-2">
        <a href="{{url('products/filter/Wines')}}">
            <img src="{{url('images/wine.jpg')}}" height="600px" width="auto">
            <div class="profile-name">Wines</div>
        </a>
    </div>
    <div class="profile-card-2">
        <a href="{{url('products/filter/Gin')}}">
            <img src="{{url('images/gin.jpg')}}" height="600px" width="auto">
            <div class="profile-name">Gin</div>
        </a>
    </div>
    <div class="profile-card-2">
        <a href="{{url('products/filter/Beer')}}">
            <img src="{{url('images/beer.jpg')}}" height="600px" width="auto">
            <div class="profile-name">Beers</div>
        </a>
    </div>
    <div class="profile-card-2">
        <a href="{{url('products/filter/Shots')}}">
            <img src="{{url('images/shots.jpg')}}" height="600px" width="auto">
            <div class="profile-name">Shots</div>
        </a>
    </div>
</div>





@include('layouts/footer')

<script>
    const parallax = document.querySelector('.parallax-effect');
    const image = parallax.querySelector('img');

    parallax.addEventListener('mousemove', e => {
        const rect = parallax.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const rotateX = (y - rect.height / 2) / 10;
        const rotateY = (x - rect.width / 2) / 10;
        image.style.setProperty('--rotateX', `${rotateX}deg`);
        image.style.setProperty('--rotateY', `${rotateY}deg`);
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js">
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 100) {
            $(".nav").css("background-color", "#212121");
        } else {
            $(".nav").css("background-color", "transparent");
        }
    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js">
    import {
        gsap
    } from "gsap";
    import {
        ScrollTrigger
    } from "gsap/ScrollTrigger";
    gsap.registerPlugin(ScrollTrigger);
    // REVEAL //
    gsap.utils.toArray('.revealUp').forEach(function(elem) {
        ScrollTrigger.create({
            trigger: elem,
            start: "top 80%",
            end: "bottom 20%",
            markers: true,
            onEnter: function() {
                gsap.fromTo(
                    elem, {
                        y: 100,
                        autoAlpha: 0
                    }, {
                        duration: 1.25,
                        y: 0,
                        autoAlpha: 1,
                        ease: "back",
                        overwrite: "auto"
                    }
                );
            },
            onLeave: function() {
                gsap.fromTo(elem, {
                    autoAlpha: 1
                }, {
                    autoAlpha: 0,
                    overwrite: "auto"
                });
            },
            onEnterBack: function() {
                gsap.fromTo(
                    elem, {
                        y: -100,
                        autoAlpha: 0
                    }, {
                        duration: 1.25,
                        y: 0,
                        autoAlpha: 1,
                        ease: "back",
                        overwrite: "auto"
                    }
                );
            },
            onLeaveBack: function() {
                gsap.fromTo(elem, {
                    autoAlpha: 1
                }, {
                    autoAlpha: 0,
                    overwrite: "auto"
                });
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.floating-object').hover(function() {
            $(this).css('animation-play-state', 'paused');
        }, function() {
            $(this).css('animation-play-state', 'running');
        });
    });
</script>