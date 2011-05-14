<?php

/*
 * Warn people not to use get_header and get_footer
 */
 
add_action('get_header', 'wpphamlp_headfoot_warnings');
add_action('get_footer', 'wpphamlp_headfoot_warnings');
add_action('get_sidebar', 'wpphamlp_headfoot_warnings');
add_action('get_search_form', 'wpphamlp_headfoot_warnings');

function wpphamlp_headfoot_warnings()
{
   trigger_error("Eek! Don't use get_header, get_footer, get_sidebar or get_search_form. You should use layouts and partials instead: <tt>use_layout</tt> and <tt>get_partial</tt>", E_USER_WARNING);
}
