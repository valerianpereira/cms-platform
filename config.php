<?php
ini_set( "display_errors", true ); //SHOULD BE SET TO FALSE FOR LIVE SITE
date_default_timezone_set( "Europe/London" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=cms" );
define( "DB_USERNAME", "username" );
define( "DB_PASSWORD", "newpassword" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "admin" ); // USE HASH() TO SECURE USERNAME AND PASSWORD
define( "ADMIN_PASSWORD", "password" );
require( CLASS_PATH . "/Article.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
<!--
In a live server environment it'd be a good idea to place config.php somewhere outside your website's document root, since it contains usernames and passwords. While it's not usually possible to read the source code of a PHP script via the browser, it does happen sometimes if the web server is misconfigured.

You could also use hash() to make a hash from your admin password, and store the hash in config.php instead of the plaintext password. Then, at login time, you can hash() the entered password and see if it matches the hash in config.php. -->
