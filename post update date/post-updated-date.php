<?php
/*
Plugin Name: Posts Modified Date
Description: Add Last Updated Date in WordPress Blog Posts.
Version: 1.0
Author: Nueul
Author URI: https://www.usefulblogging.com
Requires at least: 5.5
Tested Up to: 5.9
Stable Tag: trunk 
License: GPL v2
*/

function nurul_tech_post_modified($d = '') {
	        if ( '' == $d )
	                $the_time = get_post_modified_time(get_option('date_format'), null, null, true);
	        else
	                $the_time = get_post_modified_time($d, null, null, true);
	
	        return apply_filters( 'nurul_tech_post_modified', $the_time, $d );
	}
add_shortcode( 'post_modified', 'nurul_tech_post_modified' );

//* Add Post Modifed Date
add_filter('the_content', 'nurul_tech_modified_date');

function nurul_tech_modified_date($content) {

$nurul_tech_modified_date= '<span style="font-style:italic; font-weight:bold;text-align:center;">(Last Updated On: [post_modified])</span>';

if(is_single() && !is_home()) {
$content = $nurul_tech_modified_date.$content;
}
return $content;
}

?>