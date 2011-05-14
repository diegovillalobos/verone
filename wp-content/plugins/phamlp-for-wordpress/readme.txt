=== PHAMLP for WordPress ===
Contributors: csixty4
Donate link: http://www.catguardians.org/
Tags: haml, markup, phamlp, theme, themes
Requires at least: 3.0
Tested up to: 3.0.5
Stable tag: 0.1

PHAMLP for WordPress enables theme creation using the HAML template system.

== Description ==

PHAMLP for WordPress enables theme creation using the HAML template system. HAML replaces the tag soup of most HTML/PHP templates with a cleaner, hierarchical markup language.

Any plain HTML/PHP theme will work while PHAMLP for WordPress is enabled. But the individual templates that make up a WordPress theme, from index.php to author.php, can be replaced with a corresponding .haml.php file and PHAMLP for WordPress will process them.

= HAML Example =

`!!! 5
%html
  %head
    %title Welcome to my web site
  %body
    #header
      %h1 Welcome!
    #content
      #greeting Hello world!
    #footer
      #copyright-notice (c) forever by me!`

A "TwentyHAMLTen" example theme will be included in future versions.

== Installation ==

= Automated installation =

1. Log into the administrative section of your WordPress site (i.e. http://example.com/wp-admin"
1. In the "plugins" section of the menu on the left, select "add new"
1. Search for "PHAMLP for WordPress"
1. Install

= Manual installation =

1. Upload the `phamlp-for-wordpress` directory to the `/wp-content/plugins/` directory of your WordPress site.
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 0.1 =
* Initial version. Did not include theme.

== Licenses ==

1. PHAMLP for WordPress is a fork of wp-haml, and is therefore available under the [ISC license](http://en.wikipedia.org/wiki/ISC_license).
1. PHAMLP is redistributed under the terms of the [New BSD License](http://www.opensource.org/licenses/bsd-license.php).
1. The TwentyHAMLTen theme is a derivative of the TwentyTen theme that ships with WordPress and inherits the original theme's GPL license.
