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
	$html_wrapper = sprintf("This post has %d words", $num_words); 
    $text = $text . $html_wrapper;

    return $text;
}

add_filter('the_content', 'add_word_count');
?>
