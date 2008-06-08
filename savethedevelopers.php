<?php
/*
Plugin Name: Save The Developers
Plugin URI: http://1bigidea.com/blog/wordpress/
Description: Just say "no" to MSIE 6. Installs a Javascript from http://savethedevelopers.org which encourages site visitors using Microsoft Internet Explorer 6.0 to upgrade to a standards-compliant browser. Alternately, it will load from the plugin directory if the JS file exists. Doesn't insert if logged in or inserted within the last hour.
Author: Tom Ransom
Version: 1.1
Author URI: http://1bigidea.com/blog/

  Copyright 2008  Tom Ransom d/b/a One Big Idea  (email : transom@1bigidea.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( !class_exists('SaveTheDevelopers') ) {
	class SaveTheDevelopers {
	
		/**
		* @var string   The URI to the folder that contains this plugin
		*/	
		var $whereami_uri;
		
		/**
		* PHP 4 Compatible Constructor
		*/
		function SaveTheDevelopers () {
//  Emulates constructor/destruct for PHP4
//destructor
			register_shutdown_function(array(&$this, '__destruct'));
			
			//constructor
			$argcv = func_get_args();
			call_user_func_array(array(&$this, '__construct'), $argcv);
		}
// }}}

// {{{ __construct()
/*
* constructor function implementation
*/
		
		/**
		* PHP 5 Constructor
		*/		
		function __construct(){
			$this->whereami_uri = str_replace($_SERVER["DOCUMENT_ROOT"], "", dirname(__FILE__));
			if ( empty($_COOKIE['justsaynoie6']) ) {
				add_action('init',array(&$this,'std_insertjs') );
			}
		}
// }}}

//{{{ __destruct()
/*
* destructor function implementation
*/
		function __destruct()
		{
//code for destructor goes here
		}
//}}}

		public function std_insertjs () {
			if ( function_exists('wp_enqueue_script') ) {     // Wordpress API Check
				// Checks if a user is logged in, if not, then bug users who aren't logged-in
				if ( function_exists('wp_validate_auth_cookie') ) {		// Introduced in version 2.5
					if ( !wp_validate_auth_cookie() ) {					// Not Logged in
						$this->std_enqueuejs();
					}
				} else {       // Using a version < 2.5
					if ( function_exists('wp_login') ) {
					if ( (!empty($_COOKIE[USER_COOKIE]) && 
						!wp_login($_COOKIE[USER_COOKIE], $_COOKIE[PASS_COOKIE], true)) || 
						(empty($_COOKIE[USER_COOKIE])) ) {
							$this->std_enqueuejs();
						}
					}
				}
			}
			return;
		}   // End of std_insertjs
		
		private function std_enqueuejs () {
			if( file_exists(dirname(__FILE__)."/say.no.to.ie.6.js") ) {   // if you have a local copy, use it
				wp_enqueue_script('savethedevelopers', $this->whereami_uri."/say.no.to.ie.6.js" );
			} else {
				wp_enqueue_script('savethedevelopers','http://www.savethedevelopers.org/say.no.to.ie.6.js');
			}
			setcookie("justsaynoie6","1",(time()+60*60));    // Bug them once an hour maximum
			return;
		}	// End of std_enqueuejs

	}		// End of SaveTheDevelopers Class
}

// instantate the class
	if ( class_exists('SaveTheDevelopers') ) $trr_justsayno = new SaveTheDevelopers;
	
?>