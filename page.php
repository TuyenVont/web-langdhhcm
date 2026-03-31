<?php
get_header();
?>

<div class="hcmv-wrap">
    <div class="hcmv-container">
        
        <h1 class="hcmv-post-title"><?php the_title(); ?></h1>

        <div class="hcmv-article-content">
            <?php the_content(); ?>
        </div>

    </div>
</div>

<?php get_footer(); ?>