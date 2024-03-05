<?php
get_header();

// Получаем текущий жанр
$current_genre = get_queried_object();
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">

            <?php if (!empty($current_genre->description)) : ?>
                <p><?php echo esc_html($current_genre->description); ?></p>
            <?php endif; ?>

            <?php
            $args = array(
                'post_type' => 'book',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'genre',
                        'field' => 'id',
                        'terms' => $current_genre->term_id,
                    ),
                ),
            );

            $query = new WP_Query($args);

            // Проверяем, есть ли посты
            if ($query->have_posts()) :
                ?>
                <div class="row">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'w-100', 'style' => 'width: 100%; height: 300px;')); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="card-body row flex-column align-items-baseline">
                                    <div class="small text-muted"><?php echo get_the_date(); ?></div>
                                    <h2 class="card-title h4"><?php the_title(); ?></h2>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a class="mt-auto w-auto" href="<?php the_permalink(); ?>">Читати далі →</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php
            else :
                echo 'Постов не найдено.';
            endif;

            wp_reset_postdata();
            ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
