<?php
/**
 * Template Name: Nana Custom Layout 
 */
get_header();  // Gọi header
?>

<div class="top-part">
    <!-- Nội dung phần đầu trang -->
    <h2>Đây là Top Part</h2>
</div>

<div class="middle-part">
    <!-- Nội dung chính -->
    <h2>Đây là Middle Part</h2>
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div>

<div class="bottom-part">
    <!-- Nội dung phần cuối -->
    <h2>Đây là Bottom Part</h2>
</div>

<?php get_footer(); // Gọi footer ?>