<?php
// Custom post type: Book
function create_custom_post_type() {
    $labels = array(
        'name'               => 'Книги',
        'singular_name'      => 'Книга',
        'add_new'            => 'Добавить новую книгу',
        'add_new_item'       => 'Добавить новую книгу',
        'edit_item'          => 'Редактировать книгу',
        'new_item'           => 'Новая книга',
        'all_items'          => 'Все книги',
        'view_item'          => 'Просмотреть книгу',
        'search_items'       => 'Искать книги',
        'not_found'          => 'Книги не найдено',
        'not_found_in_trash' => 'Книг в корзине не найдено',
        'menu_name'          => 'Книги',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'book'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('book', $args);
}

add_action('init', 'create_custom_post_type');

add_theme_support('post-thumbnails', array('book'));


