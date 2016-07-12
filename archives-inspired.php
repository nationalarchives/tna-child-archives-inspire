<?php
/*
Template Name: Archives inspire
*/
get_header(); ?>
<div class="a-i">
    <?php
    if (has_post_thumbnail($post->ID)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
    }
    ?>
    <div class="banner" role="banner" style="background-image: url('<?php echo make_path_relative($image[0]); ?>')">
        <?php get_template_part('breadcrumb'); ?>
        <div class="heading-banner text-left">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="super-heading"><?php the_title(); ?></h1>
                        <h2 class="super-heading">2015 - 19</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="content-area" role="main">
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline">
                            <li>Archives inspire</li>
                            <li>Archives inspire the world</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section> <!--Main section-->
                <div class="row">
                    <div class="col-md-6 col-md-push-6">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/__6LKD8RtYY?rel=0"
                                    frameborder="0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-pull-6">
                        <h2>Over the next four years we will think and organise ourselves differently, to meet the needs
                            of each of our major audiences and to face our biggest challenge – digital.</h2>
                        <p>We will change the way you think about archives.</p>
                        <a class="brochure" href="http://www.nationalarchives.gov.uk/documents/archives-inspire-2015-19.pdf"><img
                                src="http://www.nationalarchives.gov.uk/wp-content/themes/tna/images/business-plan/ai-icon.jpg"
                                alt="Download Archives Inspire 2015-19" class="brochure img-responsive">
                            <small>Read full plan (PDF)</small>
                        </a>
                    </div>
                </div>
            </section><!--End Main section-->
        </div><!--End container-->
        <section class="a-i-tabs-section"><!--Tabs sections container-->
            <div class="container">
                <ul class="nav nav-pills">
                    <li class="active" role="tab"><a href="#1" data-toggle="tab">Goverment</a></li>
                    <li role="tab"><a href="#2" data-toggle="tab">Public</a></li>
                    <li role="tab"><a href="#3" data-toggle="tab">Archive sector</a></li>
                    <li role="tab"><a href="#4" data-toggle="tab">Research</a></li>
                    <li role="tab"><a href="#5" data-toggle="tab">Digital</a></li>
                </ul>
            </div>
        </section>
        <section class="a-i-tabs"><!--Tabs sections-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content ">
                            <div class="tab-pane active" id="1">
                                <div class="col-sm-6 col-md-6">
                                    <p class="highlight-p">
                                        We will provide <span>expert advice</span> and scrutiny to government, making
                                        sure that the record survives and thrives.
                                    </p>
                                    <p>
                                        We are both the custodian of the public record and the government’s expert in
                                        the management, preservation and use of information. We are uniquely placed by
                                        virtue of our history, responsibilities and expertise to provide trusted and
                                        independent advice and services across government and the wider public sector.
                                    </p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="tab_img">
                                        <img src="http://placehold.it/800x450?text=Tab+1" class="img-responsive"
                                             alt="some-alt">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="2">
                                <div class="col-sm-6 col-md-6">
                                    <p class="highlight-p">
                                        We will provide <span>expert advice</span> and scrutiny to government, making
                                        sure that the record survives and thrives.
                                    </p>
                                    <p>
                                        We are both the custodian of the public record and the government’s expert in
                                        the management, preservation and use of information. We are uniquely placed by
                                        virtue of our history, responsibilities and expertise to provide trusted and
                                        independent advice and services across government and the wider public sector.
                                    </p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="tab_img">
                                        <img src="http://placehold.it/800x450?text=Tab+2" class="img-responsive"
                                             alt="some-alt">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="3">
                                <div class="col-sm-6 col-md-6">
                                    <p class="highlight-p">
                                        We will provide <span>expert advice</span> and scrutiny to government, making
                                        sure that the record survives and thrives.
                                    </p>
                                    <p>
                                        We are both the custodian of the public record and the government’s expert in
                                        the management, preservation and use of information. We are uniquely placed by
                                        virtue of our history, responsibilities and expertise to provide trusted and
                                        independent advice and services across government and the wider public sector.
                                    </p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="tab_img">
                                        <img src="http://placehold.it/800x450?text=Tab+3" class="img-responsive"
                                             alt="some-alt">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="4">
                                <div class="col-sm-6 col-md-6">
                                    <p class="highlight-p">
                                        We will provide <span>expert advice</span> and scrutiny to government, making
                                        sure that the record survives and thrives.
                                    </p>
                                    <p>
                                        We are both the custodian of the public record and the government’s expert in
                                        the management, preservation and use of information. We are uniquely placed by
                                        virtue of our history, responsibilities and expertise to provide trusted and
                                        independent advice and services across government and the wider public sector.
                                    </p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="tab_img">
                                        <img src="http://placehold.it/800x450?text=Tab+4" class="img-responsive"
                                             alt="some-alt">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="5">
                                <div class="col-sm-6 col-md-6">
                                    <p class="highlight-p">
                                        We will provide <span>expert advice</span> and scrutiny to government, making
                                        sure that the record survives and thrives.
                                    </p>
                                    <p>
                                        We are both the custodian of the public record and the government’s expert in
                                        the management, preservation and use of information. We are uniquely placed by
                                        virtue of our history, responsibilities and expertise to provide trusted and
                                        independent advice and services across government and the wider public sector.
                                    </p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="tab_img">
                                        <img src="http://placehold.it/800x450?text=Tab+5" class="img-responsive"
                                             alt="some-alt">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--End tabs section-->
        <section class="a-i-carousel">
            <div class="container-fluid">
                <div class="row">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="col-md-6">
                                    <div class="carousel-text">
                                        <p>
                                            Archives are bursting with valuable information and insights. But finding
                                            the right information can sometimes take many years of painstaking work. How
                                            can our research help researchers everywhere?
                                        </p>
                                        <p>
                                            Traces through time is our ground-breaking international collaborative
                                            research project inspired by archives.
                                        </p>
                                        <p>
                                            This is just the beginning of a revolution in research technology.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="http://placehold.it/640x440?text=Slide+1" alt="Chania" class="img-responsive full-width">
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-md-6">
                                    <div class="carousel-text">
                                        <p>
                                            Every family has a history. Experiences of loss, courage, adventure and
                                            separation can resonate through generations and through communities. Making
                                            a connection with our past can help us to understand our own lives better.
                                        </p>
                                        <p>
                                            Through interactive technology we are bringing these real stories from the
                                            trenches to the classroom. We are also working with Caribbean, African and
                                            Asian communities in the UK to explore their First World War history.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="http://placehold.it/640x440?text=Slide+2" alt="Chania" class="img-responsive full-width">
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-md-6">
                                    <div class="carousel">
                                        <div class="carousel-text">
                                            <p>
                                                The laws that govern our society and guarantee our rights are constantly
                                                evolving. A change to one law will have implications for others. How can
                                                we follow these changes and understand their impact on our lives?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="http://placehold.it/640x440?text=Slide+3" alt="Chania" class="img-responsive full-width">
                                </div>
                            </div>
                            <!-- Left and right controls -->

                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span><</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span>></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<noscript>
    <style>
        .tab-content>.tab-pane {
            display: block;
        }
        .carousel-inner > .item {
            display: block;
        }
        .nav-pills>li.active>a::after {
            display: none;
        }
    </style>
</noscript>
<?php get_footer(); ?>
