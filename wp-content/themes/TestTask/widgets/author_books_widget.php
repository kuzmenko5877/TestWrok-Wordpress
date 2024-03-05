<?php

function theme_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Sidebar right', 'textdomain'),
        'id'            => 'sidebar-right',
        'description'   => __('This is the widget area for the right sidebar.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}

add_action('widgets_init', 'theme_widgets_init');

class BooksByAuthor_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'books_by_author_widget',
            'Books by Author Widget',
            array('description' => 'Display books by a specific author.')
        );
    }

    public function widget($args, $instance)
    {
        $author_id = !empty($instance['author_id']) ? $instance['author_id'] : '';

        if ($author_id) {
            $author_term = get_term_by('id', $author_id, 'author');

            if ($author_term) {
                $authorName = $author_term->name;
                $query_args = array(
                    'post_type'      => 'book',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array('taxonomy' => 'author', 'field' => 'term_id', 'terms' => $author_id),
                    ),
                );

                $query = new WP_Query($query_args);

                echo $args['before_widget'];

                if ($query->have_posts()) : ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <?php
                            echo $args['before_title'] . sprintf('<h4>Книги від %s</h4>', esc_html($authorName)) . $args['after_title'];
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="author-books-list">
                                <ul class="list-unstyled">
                                    <?php
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        ?>
                                        <li class="mb-2"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    wp_reset_postdata();
                else :
                    echo '<p>Книги автора не найдено</p>';
                endif;

                echo $args['after_widget'];
            } else {
                echo 'Автор не найден';
            }
        }
    }

    public function form($instance)
    {
        $author_id = isset($instance['author_id']) ? esc_attr($instance['author_id']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('author_id'); ?>">Author Name:</label>
            <select class="widefat" id="<?php echo $this->get_field_id('author_id'); ?>"
                    name="<?php echo $this->get_field_name('author_id'); ?>">
                <option value="">Select Author</option>
                <?php
                $authors = get_terms(array('taxonomy' => 'author', 'fields' => 'id=>name'));
                foreach ($authors as $id => $name) : ?>
                    <option value="<?php echo esc_attr($id); ?>" <?php selected($author_id, $id); ?>><?php echo esc_html($name); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['author_id'] = (!empty($new_instance['author_id'])) ? absint($new_instance['author_id']) : 0;
        return $instance;
    }
}

function register_books_by_author_widget()
{
    register_widget('BooksByAuthor_Widget');
}

add_action('widgets_init', 'register_books_by_author_widget');
