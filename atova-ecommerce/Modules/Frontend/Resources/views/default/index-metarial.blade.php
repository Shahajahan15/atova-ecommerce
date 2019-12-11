@extends('frontend::layouts.master')

@section('content')

    {{-- Start coding for Top navbar --}}
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </div>
    </nav>


    {{-- Start coding for header --}}

    <div class="container">
        <div class="row">
            <div class="col s4">

                This div is 6-columns wide
            </div>
            <div class="col s8">This div is 6-columns wide</div>
        </div>
    </div>




    {{-- Start coding for Main navbar --}}
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <ul id="nav-mobile" class="hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col m8">
                <div class="slider">
                    <ul class="slides">
                        <li>
                            <img src="http://lorempixel.com/580/250/nature/1"> <!-- random image -->
                            <div class="caption center-align">
                                <h3>This is our big Tagline!</h3>
                                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                            </div>
                        </li>
                        <li>
                            <img src="http://lorempixel.com/580/250/nature/2"> <!-- random image -->
                            <div class="caption left-align">
                                <h3>Left Aligned Caption</h3>
                                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                            </div>
                        </li>
                        <li>
                            <img src="http://lorempixel.com/580/250/nature/3"> <!-- random image -->
                            <div class="caption right-align">
                                <h3>Right Aligned Caption</h3>
                                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                            </div>
                        </li>
                        <li>
                            <img src="http://lorempixel.com/580/250/nature/4"> <!-- random image -->
                            <div class="caption center-align">
                                <h3>This is our big Tagline!</h3>
                                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>








    {{-- Product Area --}}

    <div class="container">
        <div class="row">

            <div class="col m3">
                <div class="card hoverable small">
                    <div class="card-image">
                        <img src="https://www.w3schools.com/css/img_fjords.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>

            <div class="col m3">
                <div class="card hoverable small">
                    <div class="card-image">
                        <img src="https://www.w3schools.com/css/img_fjords.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col m3">
                <div class="card hoverable small">
                    <div class="card-image">
                        <img src="https://www.w3schools.com/css/img_fjords.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col m3">
                <div class="card hoverable small">
                    <div class="card-image">
                        <img src="https://www.w3schools.com/css/img_fjords.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col m3">
                <div class="card hoverable small">
                    <div class="card-image">
                        <img src="https://www.w3schools.com/css/img_fjords.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col m3">
                <div class="card hoverable small">
                    <div class="card-image">
                        <img src="https://www.w3schools.com/css/img_fjords.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col m3">
                <div class="card hoverable small">
                    <div class="card-image">
                        <img src="https://www.w3schools.com/css/img_fjords.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col m3">
                <div class="card hoverable small">
                    <div class="card-image">
                        <img src="https://www.w3schools.com/css/img_fjords.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col m3">
                <div class="card hoverable small">
                    <div class="card-image">
                        <img src="https://www.w3schools.com/css/img_fjords.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- Start coding for footer --}}

    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2014 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>


@stop


@section('foot_js')

    <script>
        $(document).ready(function(){
            $('.slider').slider();
        });

    </script>

@stop
