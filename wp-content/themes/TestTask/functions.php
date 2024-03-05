<?php

// Enqueue Bootstrap styles
function enqueue_bootstrap_styles()
{
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
}

// Enqueue custom styles
function enqueue_custom_styles()
{
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
}

// Register styles on wp_enqueue_scripts hook
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_styles');

// Include custom post type for books
require_once get_template_directory() . '/post-types/custom_post_type_book.php';

// Include Books by Author widget
require_once get_template_directory() . '/widgets/author_books_widget.php';

// Include Books by Genre shortcode
require_once get_template_directory() . '/shortcodes/book_genre_shortcode.php';

// Include Author taxonomy
require_once get_template_directory() . '/taxonomies/taxonomy_author.php';
