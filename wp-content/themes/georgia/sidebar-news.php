
<div id="sidebar">

    <section id="tribe-mini-calendar-3" class="widget tribe_mini_calendar_widget">
        <div class="widget-inner">
            <h3 class="widget-title">LAATSTE NIEUWSARTIKELEN</h3>
            <div class="tribe-mini-calendar-wrapper">
                <ul>
                    <?php
                    global $post;
                    $args = array(  
                        'post_type' => 'news',
                        'post_status' => 'publish',
                        'post__not_in' => array($post->ID),
                    ); 
                    $query = new WP_query($args);
                    if ($query->have_posts()) {                                   
                        while ($query->have_posts()) {
                            $query->the_post();
                            $news_image = get_field('news_image', get_the_ID());                            
                    ?>
                    <li class="normal">
                        <a href="<?php echo get_permalink(get_the_ID());?>" title="">
                            <img title="" src="<?php echo $news_image;?>">
                        </a>
                        <h3>
                            <a href="<?php echo get_permalink(get_the_ID());?>" title=""><?php echo get_the_title(get_the_ID());?></a>
                        </h3>
                        <span><?php echo get_the_date('j F, Y'); ?></span>                        
                    </li>
                    <?php
                        }
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
    </section>
    
</div>

<style type="text/css" media="screen">
    .tribe-mini-calendar-wrapper {
        float: left;
        width: 483px;
        position: relative;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .tribe-mini-calendar-wrapper ul {
        float: left;
        margin-left: 0px;
        padding-bottom: 10px;
    }
    .tribe-mini-calendar-wrapper ul li{
        width: 230px;
        padding-top: 12px;
        float: left;
        position: relative;
        list-style: none;
        padding-bottom: 12px;
        border-bottom: solid 1px #535251;
    }
    .tribe-mini-calendar-wrapper ul li:first-child{
        padding-top: 0px;
    }
    .tribe-mini-calendar-wrapper ul li img {
        float: left;
        width: 30px;
        height: 30px;
        margin-right: 8px;
        border: 0;
    }
    .tribe-mini-calendar-wrapper ul li h3{
        color: #887554;
        font-size: 12px;
        font-weight: bold;
        line-height: 12px;
        font-family: 'Raleway', sans-serif;
        font-style: normal;
        display: block;
        padding-bottom: 7px;
    }
    .tribe-mini-calendar-wrapper ul li span{
        color: #FFF;
        font-size: 12px;
        font-weight: bold;
        line-height: 12px;
        font-family: 'Raleway', sans-serif;
        font-style: normal;
        display: block;
    }
</style>