<?php

/*
 * Setup and teardown
 */

register_activation_hook(__FILE__, 'wpphamlp_activate');
register_deactivation_hook(__FILE__, 'wpphamlp_deactivate');

function wpphamlp_activate()
{
   if(!file_exists(COMPILED_TEMPLATES) && !mkdir(COMPILED_TEMPLATES))
   {  
      add_action('admin_notices', 'wpphamlp_warning');
   }
}

function wpphamlp_deactivate()
{
}

function wpphamlp_warning() 
{
   echo "<div class='updated fade'><p>php-haml will currently work: you need to create <em>" . COMPILED_TEMPLATES . "</em> and make sure it's writeable by your webserver</p></div>";
}