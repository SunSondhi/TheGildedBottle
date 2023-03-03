<footer class="page-footer font-small bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Our Links</h2>
                <a href="https://www.facebook.com/" class=" fa fa-facebook"></a>
                <a href="https://github.com/" class="fa fa-github"></a>
                <a href="https://www.linkedin.com/" class=" fa fa-linkedin"></a>
                <a href="https://twitter.com/" class="fa fa-twitter"></a>
            </div>
            <div class="col-md-4">
                <h2>Go to</h2>
                <ul class="list-unstyled">
                    <li><a href="">MainPage</a></li>
                    <li><a href="">Home</a></li>
                    <li><a href="">Login</a></li>
                    <li><a href="">Register</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Contact Us</h2>
                <a href="{{ route('Contactus') }}">Further Contact info &#8594;</a>
            </div>

            <div class="row">
                <div class="parallax-effect">
                    <img src="{{url('images\logo.png')}}" />
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p>Created by Group 28, The Gilded Bottle. © 2023</p>
            </div>
            <div class="col-md-6">
                <p>for further information contact me via email: <a href="mailto:210097072@aston.ac.uk">210097072@aston.ac.uk</a></p>
            </div>
        </div>
    </div>
</footer>

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