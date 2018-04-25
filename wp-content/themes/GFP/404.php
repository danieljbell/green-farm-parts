<?php
  $actual_link = $_SERVER[REQUEST_URI];
?>

<?php get_header(); ?>

<div class="site-width">
    <h1>The page <pre><?php echo $actual_link; ?></pre> was not found</h1>    
</div>

<?php get_footer(); ?>