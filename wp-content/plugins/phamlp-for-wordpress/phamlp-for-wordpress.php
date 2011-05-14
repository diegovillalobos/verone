<?php
/*
Plugin Name: PHAMLP for WordPress
Description: Allows you to write Wordpress themes using HAML
Author: Dave Ross
Version: 0.1
Author URI: http://davidmichaelross.com
*/

/*
 * Config
 */
 
define('COMPILED_TEMPLATES', WP_CONTENT_DIR . '/compiled-templates');

/*
 * Template handling
 */

require_once dirname(__FILE__) . "/helpers.php";
require_once dirname(__FILE__) . "/activate_hooks.php";
require_once dirname(__FILE__) . "/template_hooks.php";
require_once dirname(__FILE__) . "/warnings_hooks.php";
require_once dirname(__FILE__) . '/phamlp/haml/HamlParser.php';

/**
  * $template_layout is set by the template if it wishes to use a custom layout. 
  *
  * The loader compiles and executes the template, saves its output to $template_output,
  * and then compiles and executes the layout. The layout calls yield() to include the
  * content of the template.
  */

$template_layout = $template_output = '';
  

/**
  * Intercepts template includes using our new filter and looks for a HAML alternative.
  */
  
add_filter('template_include', 'wpphamlp_template_include');

function wpphamlp_template_include($template)
{
   // Globalise the Wordpress environment
   global $posts, $post, $wp_did_header, $wp_did_template_redirect, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;
   
   // Globalise the stuff we need
   global $template_output, $template_layout;
   
   // Is there a haml template?
   if(substr($template, -9) == '.haml.php')
   {
      $haml_template = $template;
   }
   else
   {
      $haml_template = str_replace(".php", ".haml.php", $template);
   }
   
   if(file_exists($haml_template))
   {
      // Execute the template and save its output
      $parser = new HamlParser(array('ugly' => false, 'style' => 'expanded'));
      $template_output = wpphamlp_capture_eval(file_get_contents($parser->parse($haml_template, COMPILED_TEMPLATES, 0755, '.haml.php', '.php')));

      if($template_layout == '')
      {
         $template_layout = TEMPLATEPATH . "/layout.haml.php";
      }

      // Execute the layout and display everything
      $parser = new HamlParser(array('ugly' => false, 'style' => 'expanded'));
      echo wpphamlp_capture_eval(file_get_contents($parser->parse($template_layout, COMPILED_TEMPLATES, 0755, '.haml.php', '.php')), array('template_output' => $template_output));   
      
      return null;
   }
   
   return $template;
}

function wpphamlp_capture_eval($string, $vars) {
	extract($vars);
	ob_start();
	eval('?>' . $string);
	$contents = ob_get_contents();
	ob_end_clean();
	return $contents;
}

/*
 * Create haml alternatives for the get_* functions
 */

function use_layout($name)
{
   global $template_layout;

   $layout = TEMPLATEPATH . "/layout-$name.haml.php";
   
   if(!file_exists($layout))
   {
      trigger_error("The specified layout could not be found: <em>$layout</em>", E_USER_ERROR);
      die();
   }
   
   $template_layout = $layout;
}

function render_partial($name, $return = false)
{
   $partial_template = TEMPLATEPATH . "/partials/_$name.haml.php";
   
   if(!file_exists($partial_template))
   {
      trigger_error("The specified partial could not be found: <em>$partial_template</em>", E_USER_ERROR);
      die();
   }
   
   // Execute the template and save its output   
   $parser = new HamlParser();
   $partial_output = eval('?>' . file_get_contents($parser->parse($partial_template, COMPILED_TEMPLATES, 0755, '.haml.php', '.php')));   
   
   if($return)
   {
      return $partial_output;
   }
   
   echo $partial_output;
}

function yield()
{
   global $template_output;
   
   if($template_output == '')
   {
      trigger_error("<tt>yield</tt> had no output to emit (\$template_output is empty). Did your template do anything?", E_USER_NOTICE);
      die();
   }
   
   echo $template_output;
}
