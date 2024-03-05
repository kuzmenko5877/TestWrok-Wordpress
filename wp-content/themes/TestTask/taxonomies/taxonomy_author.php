<?php

// Taxonomy: Genre
function register_genre_taxonomy() {
    $labels = array(
        'name'              => 'Жанри',
        'singular_name'     => 'Жанр',
        'search_items'      => 'Пошук жанрів',
        'all_items'         => 'Усі жанри',
        'edit_item'         => 'Редагувати жанр',
        'update_item'       => 'Оновити жанр',
        'add_new_item'      => 'Додати новий жанр',
        'new_item_name'     => 'Новий жанр',
        'menu_name'         => 'Жанри',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'genre'),
    );

    register_taxonomy('genre', array('book'), $args);
}

// Taxonomy: Authors
function register_author_taxonomy() {
    $labels = array(
        'name'              => 'Автори',
        'singular_name'     => 'Автор',
        'search_items'      => 'Пошук авторів',
        'all_items'         => 'Усі автори',
        'edit_item'         => 'Редагувати автора',
        'update_item'       => 'Оновити автора',
        'add_new_item'      => 'Додати нового автора',
        'new_item_name'     => 'Новий автор',
        'menu_name'         => 'Автори',
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'author'),
    );

    register_taxonomy('author', array('book'), $args);
}

// Add taxonomy "Genre" and "Author"
add_action('init', 'register_genre_taxonomy');
add_action('init', 'register_author_taxonomy');
