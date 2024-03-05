<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <div class="card">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid', 'style' => 'width: 100%; height: 350px;')); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body mb-3">
                <h2 class="card-title h4 mb-1"><?php the_title(); ?></h2>
                <div class="small mb-3 text-muted"><?php echo get_the_date(); ?></div>
                <div class="chars">
                    <?php display_authors(); ?>
                    <?php display_genres(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <?= the_content(); ?>
                    <?php edit_post_link('Edit', '<span class="edit-link">', '</span>'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function display_authors()
{
    $post_id = get_the_ID();
    $authors = get_the_terms($post_id, 'author');

    if ($authors && !is_wp_error($authors)) {
        ?>
        <div class="char row py-3">
            <div class="char__title col-md-5 font-weight-bold">Автор</div>
            <div class="char__value col-md-5 text-primary">
                <?php
                if (count($authors) > 1) {
                    foreach ($authors as $author) {
                        ?>
                        <div class="author-name"><?php echo esc_html($author->name); ?></div>
                        <?php
                    }
                } else {
                    echo esc_html($authors[0]->name);
                }
                ?>
            </div>
        </div>
        <?php
    }
}

function display_genres()
{
    $post_id = get_the_ID();
    $genres  = get_the_terms($post_id, 'genre');

    if ($genres && !is_wp_error($genres)) {
        foreach ($genres as $genre) {
            ?>
            <div class="char row py-3">
                <div class="char__title col-md-5 font-weight-bold">Категорія</div>
                <div class="char__value col-md-5">
                    <a class="text-primary text-decoration-none" href="<?= esc_url(get_term_link($genre)); ?>">
                        <?= esc_html($genre->name); ?>
                    </a>
                </div>
            </div>
            <?php
        }
    }
}

?>
