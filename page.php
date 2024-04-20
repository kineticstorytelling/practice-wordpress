<?php
        get_header();
    ?>
    

		<article class="content px-3 py-5 p-md-5">
        
	    </article>

        <?php
            if( have_posts ()){
                 
                while( have_posts() ){
                    
                    the_post();
//    get template. 2nd parameter makes it look for the hyphenated version content-gallery etc
                    get_template_part('template-parts/content', 'page');
                }
            }
        ?>
    <?php
    get_footer();
    ?>