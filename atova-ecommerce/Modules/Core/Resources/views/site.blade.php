@extends('core::layouts.frontend')

@section('content')



        <section id="content1-9" class="content1-9">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                        <h1 class="content-title">Take Your Business to the Next Level</h1>
                        <p class="big-para">
                            Quo duis quibusdam sed ingeniis nulla minim non aute, ea si tractavissent a a
                            nisi hic aliqua, fabulas veniam est arbitror transferrem non ex fugiat quibusdam
                            firmissimum ita ex ne imitarentur.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2 margin-top">
                        <ul class="media-list">
                            <li class="media single-content">
                                <div class="media-right pull-right">
                                    <i class="fa fa-code"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>Web Design</h3>
                                    <p>
                                        probant an malis deserunt commodo labore labore do atur, concursiobus singulis multos consequat nostru
                                    </p>
                                </div>
                            </li>
                            <li class="media single-content">
                                <div class="media-right pull-right">
                                    <i class="fa fa-flask"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>Web Development</h3>
                                    <p>
                                        probant an malis deserunt commodo labore labore do atur, concursiobus singulis multos consequat nostru
                                    </p>
                                </div>
                            </li>
                            <li class="media single-content">
                                <div class="media-right pull-right">
                                    <i class="fa fa-paint-brush"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>Software Development</h3>
                                    <p>
                                        probant an malis deserunt commodo labore labore do atur, concursiobus singulis multos consequat nostru
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--div class="col-md-4">
                        <div class=""><img class="img-responsive" src="images/iphone-double.png" alt="#" /></div>
                    </div-->
                    <div class="col-md-4 margin-top">
                        <ul class="media-list">
                            <li class="media single-content">
                                <div class="media-left pull-left">
                                    <i class="fa fa-glass"></i>
                                </div>
                                <div class="media-body">
                                    <h3>Digital Marketing</h3>
                                    <p>
                                        probant an malis deserunt commodo labore labore do atur, concursiobus singulis multos consequat nostru
                                    </p>
                                </div>
                            </li>
                            <li class="media single-content">
                                <div class="media-left pull-left">
                                    <i class="fa fa-database"></i>
                                </div>
                                <div class="media-body">
                                    <h3>E-commerce Solution</h3>
                                    <p>
                                        probant an malis deserunt commodo labore labore do atur, concursiobus singulis multos consequat nostru
                                    </p>
                                </div>
                            </li>
                            <li class="media single-content">
                                <div class="media-left pull-left">
                                    <i class="fa fa-wifi"></i>
                                </div>
                                <div class="media-body">
                                    <h3>Apps Development</h3>
                                    <p>
                                        probant an malis deserunt commodo labore labore do atur, concursiobus singulis multos consequat nostru
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- PORTFOLIO -->


        <section id="portfolio" class="portfolio2">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="section-title">Our Portfolio</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">

                        <div class="portfolio-filter">
                            <ul class="list-inline text-uppercase">
                                <li data-filter="*" class="active">All</li>
                                <li data-filter=".web-design">Web Design</li>
                                <li data-filter=".graphic">Graphic</li>
                                <li data-filter=".photography">Photography</li>
                                <li data-filter=".motion-video">Motion Video</li>
                            </ul>
                        </div> <!-- /.portfolioFilter -->

                        <div class="portfolio-items2" style="position: relative; height: 1140px;">

                            <div class="single-item web-design motion-video" style="width: 380px; height: 380px; position: absolute; left: 0px; top: 0px;">
                                <div class="project-content">
                                    <img class="img-responsive" src="images/portfolio1.jpg">
                                    <div class="project-overflow center-vertically text-center">
                                        <strong>Project Title</strong>
                                        <p>Branding, Graphic Design</p>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-heart"></i></li>
                                            <li><i class="fa fa-camera"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="single-item motion-video" style="width: 380px; height: 380px; position: absolute; left: 380px; top: 0px;">
                                <div class="project-content">
                                    <img class="img-responsive" src="images/portfolio2.jpg">
                                    <div class="project-overflow center-vertically text-center">
                                        <strong>Project Title</strong>
                                        <p>Branding, Graphic Design</p>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-heart"></i></li>
                                            <li><i class="fa fa-camera"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="single-item web-design graphic" style="width: 380px; height: 380px; position: absolute; left: 760px; top: 0px;">
                                <div class="project-content">
                                    <img class="img-responsive" src="images/portfolio3.jpg">
                                    <div class="project-overflow center-vertically text-center">
                                        <strong>Project Title</strong>
                                        <p>Branding, Graphic Design</p>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-heart"></i></li>
                                            <li><i class="fa fa-camera"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="single-item web-design graphic" style="width: 380px; height: 380px; position: absolute; left: 0px; top: 380px;">
                                <div class="project-content">
                                    <img class="img-responsive" src="images/portfolio4.jpg">
                                    <div class="project-overflow center-vertically text-center">
                                        <strong>Project Title</strong>
                                        <p>Branding, Graphic Design</p>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-heart"></i></li>
                                            <li><i class="fa fa-camera"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="single-item web-design motion-video" style="width: 380px; height: 380px; position: absolute; left: 380px; top: 380px;">
                                <div class="project-content">
                                    <img class="img-responsive" src="images/portfolio5.jpg">
                                    <div class="project-overflow center-vertically text-center">
                                        <strong>Project Title</strong>
                                        <p>Branding, Graphic Design</p>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-heart"></i></li>
                                            <li><i class="fa fa-camera"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="single-item web-design graphic" style="width: 380px; height: 380px; position: absolute; left: 760px; top: 380px;">
                                <div class="project-content">
                                    <img class="img-responsive" src="images/portfolio1.jpg">
                                    <div class="project-overflow center-vertically text-center">
                                        <strong>Project Title</strong>
                                        <p>Branding, Graphic Design</p>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-heart"></i></li>
                                            <li><i class="fa fa-camera"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="single-item web-design" style="width: 380px; height: 380px; position: absolute; left: 0px; top: 760px;">
                                <div class="project-content">
                                    <img class="img-responsive" src="images/portfolio2.jpg">
                                    <div class="project-overflow center-vertically text-center">
                                        <strong>Project Title</strong>
                                        <p>Branding, Graphic Design</p>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-heart"></i></li>
                                            <li><i class="fa fa-camera"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="single-item graphic photography" style="width: 380px; height: 380px; position: absolute; left: 380px; top: 760px;">
                                <div class="project-content">
                                    <img class="img-responsive" src="images/portfolio3.jpg">
                                    <div class="project-overflow center-vertically text-center">
                                        <strong>Project Title</strong>
                                        <p>Branding, Graphic Design</p>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-heart"></i></li>
                                            <li><i class="fa fa-camera"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="single-item graphic motion-video photography" style="width: 380px; height: 380px; position: absolute; left: 760px; top: 760px;">
                                <div class="project-content">
                                    <img class="img-responsive" src="images/portfolio4.jpg">
                                    <div class="project-overflow center-vertically text-center">
                                        <strong>Project Title</strong>
                                        <p>Branding, Graphic Design</p>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-heart"></i></li>
                                            <li><i class="fa fa-camera"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section><!--======== blog update =========-->



        <section id="blog1" class=" blog1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <h1 class="sec-title">Blog Updates</h1>
                        <p class="sec-sub-title">Lorem Ipsum adalah text contoh digunakan didalam industri pencetakan dan typesetting.
                            Lorem telah menjadi text contoh semenjak tahun ke 1500an, apabila pencetak yang kurang terkenal mengambil.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="blog-post wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="post-img">
                                        <img class="img-responsive" src="images/post-1.jpg" alt="image">
                                        <div class="date text-center"><span>15</span><br>Dec</div>
                                        <ul class="list-inline post-info">
                                            <li><i class="lnr lnr-eye"></i> 325</li>
                                            <li><i class="lnr lnr-bubble"></i> 74</li>
                                            <li class="post-tag text-uppercase">Style</li>
                                        </ul>
                                    </div>
                                    <div class="blog-details">
                                        <h4 class="media-heading">Lorem Ipsum adalah contoh digun akan didal indust</h4>
                                        <p>Lorem Ipsum adalah text contoh digun akan didalam industri pence taka types etting
                                            adalah text contoh.</p>
                                        <ul class="list-inline text-capitalize">
                                            <li>by John Doe</li>
                                            <li class="pull-right">Mobile.Computer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="blog-post wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="post-img">
                                        <img class="img-responsive" src="images/post-2.jpg" alt="image">
                                        <div class="date text-center"><span>15</span><br>Dec</div>
                                        <ul class="list-inline post-info">
                                            <li><i class="lnr lnr-eye"></i> 325</li>
                                            <li><i class="lnr lnr-bubble"></i> 74</li>
                                            <li class="post-tag text-uppercase">Design</li>
                                        </ul>
                                    </div>
                                    <div class="blog-details">
                                        <h4 class="media-heading">Lorem Ipsum adalah contoh digun akan didal indust</h4>
                                        <p>Lorem Ipsum adalah text contoh digun akan didalam industri pence taka types etting
                                            adalah text contoh.</p>
                                        <ul class="list-inline text-capitalize">
                                            <li>by John Doe</li>
                                            <li class="pull-right">Mobile.Computer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="blog-post wow fadeInUp" data-wow-delay="0.6s">
                                    <div class="post-img">
                                        <img class="img-responsive" src="images/post-3.jpg" alt="image">
                                        <div class="date text-center"><span>15</span><br>Dec</div>
                                        <ul class="list-inline post-info">
                                            <li><i class="lnr lnr-eye"></i> 325</li>
                                            <li><i class="lnr lnr-bubble"></i> 74</li>
                                            <li class="post-tag text-uppercase">Sport</li>
                                        </ul>
                                    </div>
                                    <div class="blog-details">
                                        <h4 class="media-heading">Lorem Ipsum adalah contoh digun akan didal indust</h4>
                                        <p>Lorem Ipsum adalah text contoh digun akan didalam industri pence taka types etting
                                            adalah text contoh.</p>
                                        <ul class="list-inline text-capitalize">
                                            <li>by John Doe</li>
                                            <li class="pull-right">Mobile.Computer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- ****** Team Section****** -->


        <section id="team2-2" class="team2-2">
            <div class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 text-center">
                            <div class="section-title wow bounceIn">
                                <h2>About our genius </h2>
                            </div><!-- //title -->
                            <div class="subtitle">
                                Lorem ipsum dolor sit amet, consectetur Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor,ulla varius consequat magna.
                            </div><!-- //subtitle -->
                        </div><!-- //column -->
                    </div><!-- //row -->
                    <div class="row margin">
                        <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                            <div class="box">
                                <div><img src="images/member.png" alt="Team Member 1"></div>
                                <h3>Jackson</h3>
                                <div><strong>Web Designer, AMD</strong></div>
                                <p class="description ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                                <div>
                                    <a href="#"><i class="fa fa-google-plus fa-1x social-icon"></i></a>
                                    <a href="#"><i class="fa fa-twitter fa-1x social-icon"></i></a>
                                    <a href="#"><i class="fa fa-linkedin fa-1x social-icon"></i></a>
                                </div>
                            </div><!-- //box -->
                        </div><!-- //column -->
                        <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                            <div class="box">
                                <div><img src="images/member2.png" alt="Team Member 2"></div>
                                <h3>Thomas</h3>
                                <div><strong>Web Master, CEO</strong></div>
                                <p class="description ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                                <div>
                                    <a href="#"><i class="fa fa-google-plus fa-1x social-icon"></i></a>
                                    <a href="#"><i class="fa fa-twitter fa-1x social-icon"></i></a>
                                    <a href="#"><i class="fa fa-linkedin fa-1x social-icon"></i></a>
                                </div>
                            </div><!-- //box -->
                        </div><!-- //column -->
                        <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                            <div class="box">
                                <div><img src="images/member3.png" alt="Team Member 3"></div>
                                <h3>Barnny</h3>
                                <div><strong>Editor, AMD</strong></div>
                                <p class="description ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                                <div>
                                    <a href="#"><i class="fa fa-google-plus fa-1x social-icon"></i></a>
                                    <a href="#"><i class="fa fa-twitter fa-1x social-icon"></i></a>
                                    <a href="#"><i class="fa fa-linkedin fa-1x social-icon"></i></a>
                                </div>
                            </div><!-- //box -->
                        </div><!-- //column -->
                        <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                            <div class="box">
                                <div><img src="images/member4.png" alt="Team Member 4"></div>
                                <h3>Eyrshan</h3>
                                <div><strong>Developer, SEO</strong></div>
                                <p class="description ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                                <div>
                                    <a href="#"><i class="fa fa-google-plus fa-1x social-icon"></i></a>
                                    <a href="#"><i class="fa fa-twitter fa-1x social-icon"></i></a>
                                    <a href="#"><i class="fa fa-linkedin fa-1x social-icon"></i></a>
                                </div>
                            </div><!-- //box -->
                        </div><!-- //column -->
                    </div><!-- //row -->
                </div><!--//container-->
            </div><!--//section padding-->
        </section><!--//team section -->


        <section id="contact2" class="contact2"><!-- background pattern -->

            <div class="container">

                <div class="row">

                    <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">

                        <!-- section title -->
                        <h2>Contact With Us</h2>

                        <!-- big paragraph -->
                        <p class="big-para">Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.</p>

                        <!-- social icons -->
                        <div class="contact-social-link">

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-2x social-icon"></i></a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-2x social-icon"></i></a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Tumblr"><i class="fa fa-tumblr fa-2x social-icon"></i></a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-2x social-icon"></i></a>

                            <a href="#" data-toggle="tooltip" data-placement="top" title="Google - Plus"><i class="fa fa-google-plus fa-2x social-icon"></i></a>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">

                        <!-- contact form -->
                        <div class="contact-form">

                            <form class="clearfix" accept-charset="utf-8" method="get" action="#">

                                <div class="row">

                                    <div class="col-sm-6 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">

                                        <label class="sr-only" for="name">Your Name</label>

                                        <input type="text" placeholder="Your Name" name="name" class="form-control input-lg" required="">

                                    </div>

                                    <div class="col-sm-6 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">

                                        <label class="sr-only" for="email">Email Address</label>

                                        <input type="email" placeholder="Your Email" name="email" class="form-control input-lg" required="">

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">

                                        <label class="sr-only">Phone Number</label>

                                        <input type="tel" placeholder="Phone Number" name="tel" class="form-control input-lg">

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="1000ms" data-wow-duration="1000ms">

                                        <label class="sr-only" for="message">Write Message</label>

                                        <textarea rows="6" name="message" id="message" class="form-control input-lg " placeholder="Write Massage" required=""></textarea>

                                    </div>

                                </div>

                                <!-- submit button -->
                                <button class="btn btn-success btn-lg btn-block wow fadeInDown" data-wow-delay="1200ms" data-wow-duration="1000ms" type="submit">Send Message</button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </section><!-- TOP FOOTER -->


        <section class="footer1">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h1><i class="fa fa-codepen"></i> Eden</h1>
                        <p>sapiente, nam sunt rem beatae architecto cupiditate.</p>
                        <div class="media">
                            <div class="media-left"><a href="#"><i class="fa fa-home"></i></a></div>
                            <div class="media-body">
                                <h5 class="media-heading">Address</h5>
                                <p>Lebel 2, 13 Elezabe St, Melbounire, Victoria 3000 </p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><i class="fa fa-envelope-o"></i></a>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Having any questions?</h5>
                                <p>support@settletheme.com</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><i class="fa fa-phone"></i></a>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Call us &amp; Hair us</h5>
                                <p>+61(0)7 9180 3458</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><i class="fa fa-fax"></i></a>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Fax</h5>
                                <p>+(921) 34256537893</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4>Fresh Tweets</h4>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="media-body">
                                <p><a href="#">@Steeltheme,</a> Porton HTML various out now</p>
                                <strong>10 Mins Ago</strong>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="media-body">
                                <p><a href="#">@envato,</a> Porton HTML various out now, search more market</p>
                                <strong>10 Mins Ago</strong>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="media-body">
                                <p><a href="#">@collins,</a> Porton HTML various out now</p>
                                <strong>10 Mins Ago</strong>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="media-body">
                                <p><a href="#">@Steeltheme,</a> Porton HTML various out now</p>
                                <strong>10 Mins Ago</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4>Latest Updates</h4>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><img class="media-object" src="images/feed-1.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <p class="update">An engaging video a the post</p>
                                <strong class="update-info"><i class="fa fa-user"></i>Mano <i class="fa fa-eye"></i>22 Viwes</strong>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><img class="media-object" src="images/feed-1.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <p class="update">An engaging video a the post</p>
                                <strong class="update-info"><i class="fa fa-user"></i>Mano <i class="fa fa-eye"></i>72 Viwes</strong>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><img class="media-object" src="images/feed-1.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <p class="update">An engaging video a the post</p>
                                <strong class="update-info"><i class="fa fa-user"></i>Mano <i class="fa fa-eye"></i>32 Viwes</strong>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><img class="media-object" src="images/feed-1.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <p class="update">An engaging video a Nam sunt</p>
                                <strong class="update-info"><i class="fa fa-user"></i>Mano <i class="fa fa-eye"></i>27 Viwes</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4>Popular tags</h4>
                        <div class="tags" style="padding-top: 8px;">
                            <a class="btn btn-default btn-sm" href="#">Amazing</a>
                            <a class="btn btn-default btn-sm" href="#">Design</a>
                            <a class="btn btn-default btn-sm" href="#">Jequery</a>
                            <a class="btn btn-default btn-sm" href="#">Photoshop</a>
                            <a class="btn btn-default btn-sm" href="#">art</a>
                            <a class="btn btn-default btn-sm" href="#">wordpres</a>
                        </div>

                        <div class="subscribe">
                            <h4>subscribe us</h4>
                            <p>Nam sunt rem beatae architecto cupiditate numquam.</p>
                            <div class="input-group">
                                <input type="text" class="form-control input-sm" placeholder="Email Address">
                                <span class="input-group-btn">
                                        <button class="btn btn-default input-sm" type="button"><i class="fa fa-check"></i></button>
                                    </span>
                            </div>
                            <p>We respect your privacy.</p>
                        </div>
                        <ul class="list-inline social-link">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- END TOP FOOTER -->



        <!-- BOTTOM FOOTER -->
        <section class="footer1 bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        Copyrights 2015 All Reseved by <a href="bootultra.com">Bootultra.com</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="#">Terms of use</a>
                        <a href="#">Privacy &amp; Security Statement</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- END BOTTOM FOOTER -->




@stop