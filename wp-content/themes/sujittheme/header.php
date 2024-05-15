<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Awesome theme</title>
  <?php wp_head(); 

  ?>
</head>
<body>
  <?php wp_nav_menu(array('theme_location' => 'primary'));
  ?>
  <img src="<?php header_image();?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width ?>" alt="npt" /> 

  <h1> this is header </h1>