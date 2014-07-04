<?php

/*
Plugin Name: deployWP | Active theme
Description: deployWP module for active theme
*/

add_action('deployWP', 'dwp_act_theme_add_module');
function dwp_act_theme_add_module(){
	register_deploy_module('active_theme', dirname(__FILE__).'/active_theme.dwp.php');
}


?>