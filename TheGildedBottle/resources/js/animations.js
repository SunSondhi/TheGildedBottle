import { gsap } from "gsap";

gsap.registerPlugin(ScrollTrigger);
// REVEAL //
gsap.utils.toArray('.revealUp').forEach(function (elem) {
    ScrollTrigger.create({
        trigger: elem,
        start: "top 80%",
        end: "bottom 20%",
        markers: true,
        onEnter: function () {
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
        onLeave: function () {
            gsap.fromTo(elem, {
                autoAlpha: 1
            }, {
                autoAlpha: 0,
                overwrite: "auto"
            });
        },
        onEnterBack: function () {
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
        onLeaveBack: function () {
            gsap.fromTo(elem, {
                autoAlpha: 1
            }, {
                autoAlpha: 0,
                overwrite: "auto"
            });
        }
    });
});


$(document).ready(function () {
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='{{route('HomePage')}}']").on('click', function (event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {

            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
})