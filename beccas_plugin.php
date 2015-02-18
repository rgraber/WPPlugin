<?php

/*
Plugin Name: Becca's Plugin
Plugin URI: weekendofwordpress.wordpress.com
Description: This plugin adds a wordcount to each post
Version: 1.0
Author: rgraber
License: GPL
*/


function add_word_count($text) 
{
	# the_content includes the title, so need to subtract the wordcount
	$num_words = str_word_count($text) - str_word_count(get_the_title());
	$html_wrapper = sprintf("<div class='word_count'>This post has %d words</div>", $num_words); 
    $text = $text . $html_wrapper;

    return $text;
}

function add_word_count_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style', plugins_url('word_count.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}

add_filter('the_content', 'add_word_count');
add_action( 'wp_enqueue_scripts', 'add_word_count_stylesheet' );
?>
