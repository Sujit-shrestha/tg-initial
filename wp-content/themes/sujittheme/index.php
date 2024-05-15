<?php get_header(); ?>


<h1> This is the index </h1>

<?php 

if( have_posts() ) : 
  while( have_posts() ) : the_post(); ?>
    
   <h3> <?php the_title(); ?> </h3>
   <small> Posterd on : <?php the_time('F j ,Y'); ?>, in <?php the_category(); ?> </small>

  <h2> <?php  the_content();   ?> </h2>
<?php 
  endwhile;
endif;
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>