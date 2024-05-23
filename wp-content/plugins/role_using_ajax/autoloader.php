<?php 

namespace Plugins\Role_using_ajax;
/**
 * Autoloading the classes 
 */

 spl_autoload_register( function ( $class ) {

  //exploding the class name in case the class name consists of namespaces
  //then , reversing the array and taking the 0th part so that it complies with the case when the namespace is not presented
  $classname =dirname(__FILE__) .'\\'. lcfirst(array_reverse(explode( '\\' , $class ))[0]) . '.php';
  //   echo $classname;
  // exit;
  if( file_exists( $classname ) ){

    require_once $classname ;

  }
 });