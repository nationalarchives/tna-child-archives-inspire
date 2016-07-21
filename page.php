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
                        <?php $h2_cf = get_post_meta( $post->ID, 'video_metabox', true );
                            if ($h2_cf) : ?>
                        <h2 class="super-heading">
                            <?php $sub_heading = get_post_meta( $post->ID, 'sub_heading_sub_heading', true );
                                echo $sub_heading;
                            ?>
                        </h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="content-area" role="main">
        <div class="container">
            <?php
                $args = array( 'category_name' => 'navigation',  'post_type' => 'page' );
                $the_query = new WP_Query( $args );
                if ($the_query->have_posts())   : ?>
                    <div class="breadcrumb">
                      <div class="row">
                         <div class="col-md-12">
                            <ul class="list-inline">
                              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></li>
                              <?php endwhile; ?>
                            </ul>
                         </div>
                      </div>
                    </div>
                <?php endif; wp_reset_query(); ?>
            <section> <!--Main section-->
                <h2 class="sr-only">Main section</h2>
                <div class="row">
                    <div class="col-md-6 col-md-push-6">
                    <?php $featbox_editor = get_post_meta( $post->ID, 'featbox_editor', true );
                        $video =  get_post_meta( $post->ID, 'video_metabox', true );
                        $embed_code = wp_oembed_get($video);
                        $featbox_color = get_post_meta( $post->ID, 'featbox_select', true );
                        if ($featbox_editor) : ?>
                            <div class="editor-container <?php echo $featbox_color; ?>">
                                 <?php echo wpautop($featbox_editor); ?>
                            </div>
                        <?php elseif ($video) : ?>
                            <div class="video-container">
                                <?php echo $embed_code;  ?>
                            </div>
                        <?php elseif (!empty($featbox_editor) && !empty($video)) : ?>
                            <div class="editor_container <?php echo $featbox_color; ?>">
                                <?php echo wpautop($featbox_editor); ?>
                            </div>
                        <?php endif; wp_reset_query(); ?>
                    </div>
                    <div class="col-md-6 col-md-pull-6">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </section><!--End Main section-->
        </div><!--End container-->
        <?php
        $page_id = $post->ID;
        $args = array('post_type' => 'page', 'post_parent' => $page_id, 'orderby' => 'menu_order', 'order' => 'ASC');
        $the_query = new WP_Query( $args );
        if ($the_query->have_posts()) : ?>
        <section class="a-i-tabs-section"><!--Tabs sections container-->
            <h2 class="sr-only">Tabs Navigation</h2>
            <div class="container">
                <ul class="nav nav-pills">
                    <?php $active = false; ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <li class="<?php echo !$active ? "active":"";?>" role="tab"><a href="#<?php echo sanitize_title_with_dashes(strtolower(get_the_title()));?>" data-toggle="tab"><?php the_title(); ?></a></li>
                        <?php $active = true;?>
                    <?php endwhile; ?>
                </ul>
            </div>
        </section>
        <?php endif; wp_reset_query(); ?>
        <?php
        $page_id = $post->ID;
        $args = array('post_type' => 'page', 'post_parent' => $page_id, 'orderby' => 'menu_order', 'order' => 'ASC');
        $the_query = new WP_Query( $args );
        if ($the_query->have_posts()) : ?>
        <section class="a-i-tabs"><!--Tabs sections-->
            <h2 class="sr-only">Tabs</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content ">
                            <?php $active = false; ?>
                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="tab-pane <?php echo !$active ? "active":"";?>" id="<?php echo sanitize_title_with_dashes(strtolower(get_the_title()));?>">
                                    <div class="col-md-12 pr-only">
                                        <h3><?php the_title(); ?></h3>
                                        <hr>
                                    </div>
                                    <?php
                                    $child_video =  get_post_meta( $post->ID, 'video_metabox', true );
                                    $child_embed_code = wp_oembed_get($child_video);
                                    if(has_post_thumbnail()) : ?>
                                        <div class="col-sm-6 col-md-6">
                                            <?php the_content();?>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="tab_img">
                                                <?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' ) ); ?>
                                            </div>
                                        </div>
                                    <?php elseif( !empty($child_video)) : ?>
                                        <div class="col-sm-6 col-md-6">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="video-container">
                                                <?php echo $child_embed_code; ?>
                                            </div>
                                        </div>
                                    <?php elseif( has_post_thumbnail() == null && empty($child_video)) : ?>
                                        <div class="col-sm-12 col-md-12">
                                            <?php the_content(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php $active = true;?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--End tabs section-->
        <?php endif; wp_reset_query(); ?>
        <?php if( is_page('Archives Inspire') ) : ?>
        <section class="a-i-carousel">
            <h2 class="sr-only">Carousel section</h2>
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
                                <span>&lt;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span>&gt;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </main>
</div>
<?php get_footer(); ?>