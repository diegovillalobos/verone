<?php

function wpphamlp_get_stylesheet($name = 'style')
{
   return "<link rel='stylesheet' type='text/css' href='" . wph_theme_dir() . "/{$name}.css' />";
}

function wpphamlp_theme_dir()
{
   return get_bloginfo('stylesheet_directory');
}
