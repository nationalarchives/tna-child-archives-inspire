<?php
/*
Template Name: Archives inspired
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
                        <h1 class="super-heading"><?php the_title(); ?><?php the_title(); ?></h1>
                        <h2 class="super-heading"><?php the_title(); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main id class="content-area" role="main">
        <div class="container">
            <section> <!--Main section-->
                <div class="row">
                    <div class="col-md-8">
                        <h2>Over the next four years we will think and organise ourselves differently, to meet the needs
                            of each of our major audiences and to face our biggest challenge – digital.</h2>
                        <p>We will change the way you think about archives.</p>
                        <a href="http://www.nationalarchives.gov.uk/documents/archives-inspire-2015-19.pdf"><img
                                src="http://www.nationalarchives.gov.uk/wp-content/themes/tna/images/business-plan/ai-icon.jpg"
                                alt="Download Archives Inspire 2015-19" class="brochure"><br>
                            <small>Read full plan (PDF)</small>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <div class="video-container">
                            <iframe width="380" height="320" src="https://www.youtube.com/embed/__6LKD8RtYY?rel=0"
                                    frameborder="0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </section><!--End Main section-->
        </div><!--End container-->
        <section class="tabs"><!--Tabs sections-->
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#1" data-toggle="tab">Goverment</a></li>
                        <li><a href="#2" data-toggle="tab">Public</a></li>
                        <li><a href="#3" data-toggle="tab">Archive sector</a></li>
                        <li><a href="#4" data-toggle="tab">Research</a></li>
                        <li><a href="#5" data-toggle="tab">Digital</a></li>
                    </ul>
                    <div class="container">
                        <div class="tab-content ">
                            <div class="tab-pane active" id="1">
                                    <div class="col-md-6">
                                        <p>
                                            We will provide expert advice and scrutiny to government, making sure that the record survives and thrives.
                                        </p>
                                        <p>
                                            We are both the custodian of the public record and the government’s expert in the management, preservation and use of information. We are uniquely placed by virtue of our history, responsibilities and expertise to provide trusted and independent advice and services across government and the wider public sector.
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="tab_img"></div>
                                    </div>
                            </div>
                            <div class="tab-pane" id="2">
                                <p>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                            </div>
                            <div class="tab-pane" id="3">
                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                            </div>
                            <div class="tab-pane" id="4">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                            <div class="tab-pane" id="5">
                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--End tabs section-->
    </main>
</div>
<?php get_footer(); ?>
