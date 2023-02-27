@section('title','| HomePage')
@include('layouts/head')
@include('layouts/nav')

<script src="{{ asset('js/animations.js') }}"></script>
<script src="{{ asset('js/gsap.min.js') }}"></script>

<body>


    





    <section class="hero">

        <h1>The Gilded Bottle</h1>
        <h2>Welcome to our Website</h2>
        <p>Discover the latest products and services</p>
        <a href="#" class="btn">Discover Products</a>

        <div class="floating-object">
            <img src="{{url('images/jameson.png')}}" height="250px" />
        </div>
    </section>


    <section class="parallax-section">
        <div class="content">
            <h1>Shop From our variety of products</h1>
            <ul>
                <li>Wines</li>
                <li>Spirits</li>
                <li>Bottle Beers</li>
                <li>and More..</li>
            </ul>
        </div>
        <img src="{{url('images/homePimg.jpg')}}" />


    </section>

    <div class="row" style="padding:0%;margin:0%;">
        <div class="col">
            <div class="flex-container" style="padding:4%;">
                <div class=" profile-card-2">
                    <img src="{{url('images/brandy.jpg')}}" height="600px" width="auto">
                    <div class="profile-name">Brandy</div>
                </div>
                <div class="profile-card-2">
                    <img src="{{url('images/jamesonIMG.jpg')}}" height="600px" width="auto">
                    <div class="profile-name">Whiskey</div>
                </div>
                <div class="profile-card-2">
                    <img src="{{url('images/goose.jpg')}}" height="600px" width="auto">
                    <div class="profile-name">Vodka</div>
                </div>
                <div class="profile-card-2">
                    <img src="{{url('images/rumIMG.jpg')}}" height="600px" width="auto">
                    <div class="profile-name">Rum</div>
                </div>
                <div class="profile-card-2">
                    <img src="{{url('images/wine.jpg')}}" height="600px" width="auto">
                    <div class="profile-name">Wines</div>
                </div>
                <div class="profile-card-2">
                    <img src="{{url('images/gin.jpg')}}" height="600px" width="auto">
                    <div class="profile-name">Gin</div>
                </div>
                <div class="profile-card-2">
                    <img src="{{url('images/beer.jpg')}}" height="600px" width="auto">
                    <div class="profile-name">Beers</div>
                </div>
                <div class="profile-card-2">
                    <img src="{{url('images/shots.jpg')}}" height="600px" width="auto">
                    <div class="profile-name">Shots</div>
                </div>
            </div>
        </div>
    </div>



</body>

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