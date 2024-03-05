<?php get_header(); ?>

<!-- Page content -->
<div class="py-5 bg-light border-bottom mb-4 mt-n4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Ласкаво просимо</h1>
            <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <?php display_featured_book(); ?>
            <?php display_additional_books(); ?>
        </div>

        <!-- Sidebar widgets -->
        <div class="col-lg-4">
            <?php if (is_active_sidebar('Sidebar right')) dynamic_sidebar('Sidebar right'); ?>
        </div>
    </div>
</div>

<!-- Footer -->
<?php get_footer(); ?>

<?php
function display_featured_book()
{
    $featured_args = array(
        'post_type'      => 'book',
        'posts_per_page' => 1,
    );

    $featured_query = new WP_Query($featured_args);

    if ($featured_query->have_posts()) :
        $featured_query->the_post();
        ?>
        <div class="card mb-4">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid', 'style' => 'width: 100%; height: 450px;')); ?>
                </a>
            <?php endif; ?>
            <div class="card-body row flex-column align-items-baseline">
                <div class="small text-muted"><?php echo get_the_date(); ?></div>
                <h2 class="card-title h4"><?php the_title(); ?></h2>
                <p class="card-text"><?php the_excerpt(); ?></p>
                <a class="mt-auto w-auto" href="<?php the_permalink(); ?>">Читати далі →</a>
            </div>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        Книги не знайдено
    <?php endif;
}

function display_additional_books()
{
    $additional_args = array(
        'post_type'      => 'book',
        'posts_per_page' => -4,
        'offset'         => 1,
    );

    $additional_query = new WP_Query($additional_args);

    if ($additional_query->have_posts()) :
        ?>
        <div class="row mb-4">
            <?php while ($additional_query->have_posts()) : $additional_query->the_post(); ?>
                <div class="col-lg-6 mb-4">
                    <div class="card h-100">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="featured-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid', 'style' => 'width: 100%; height: 250px;')); ?>
                                </a>
                            </div>
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
        <?php wp_reset_postdata();
    endif;
}
?>
