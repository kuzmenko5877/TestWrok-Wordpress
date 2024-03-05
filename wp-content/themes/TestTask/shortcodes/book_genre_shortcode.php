<?php
function books_by_genre_shortcode($atts)
{
    $atts  = shortcode_atts(array('genre' => ''), $atts);
    $genre = sanitize_text_field($atts['genre']);

    $args = array(
        'post_type'      => 'book',
        'tax_query'      => array(
            array(
                'taxonomy' => 'genre',
                'field'    => 'slug',
                'terms'    => $genre,
            ),
        ),
        'posts_per_page' => 3,
    );

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) : ?>
        <div class="row mb-4 mt-4">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="d-flex flex-column align-items-center col-md-4">
                    <a href="<?= esc_url(get_permalink()); ?>">
                        <?php the_post_thumbnail('small', array('class' => 'img-fluid', 'style' => 'width: 300px; height: 240px;')); ?>
                    </a>
                    <a href="<?= esc_url(get_permalink()); ?>" class="text-decoration-none"><?= esc_html(get_the_title()); ?></a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p><?= esc_html__('Книги данного жанра не найдено.'); ?></p>
    <?php endif;

    wp_reset_postdata();

    return ob_get_clean();
}

// Register shortcodes
add_shortcode('books', 'books_by_genre_shortcode');

// Apply shortcode in widgets
add_filter('widget_text', 'do_shortcode');
