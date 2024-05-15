<?php 

/**
 * Triggers this file on plugin uninstallation
 * 
 * @package TestifyPlugin
 */

 if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ){
  die;
 }

 //clear database stored data

//  $books = get_posts( ['post_type'=>'book' , 'numberposts'=> -1] );

//  foreach( $books as $book ){
  
//   wp_delete_post( $book->ID , true);

//  }

// Access the databse via SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
$wpdb->query( "DELETE FORM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" ); 
$wpdb->query( "DELETE FORM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" ); 