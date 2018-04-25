<?php get_header(); ?>

<section class="hero">
    <div class="site-width">
        <h1>If it's green, we've got it...</h1>
        <p><a href="#0" class="btn-outline--white">Show Weekly Deals</a></p>
    </div>
</section>

<section class="pad-y--most">
    <div class="site-width">
        <h2 class="has-text-center">Shop Popular Categories</h2>
        <ul class="category-grid">
            <?php

              $taxonomy     = 'product_cat';
              $orderby      = 'name';  
              $show_count   = 1;      // 1 for yes, 0 for no
              $pad_counts   = 0;      // 1 for yes, 0 for no
              $hierarchical = 1;      // 1 for yes, 0 for no  
              $title        = '';  
              $empty        = 0;

              $args = array(
                     'taxonomy'     => $taxonomy,
                     'orderby'      => $orderby,
                     'show_count'   => $show_count,
                     'pad_counts'   => $pad_counts,
                     'hierarchical' => $hierarchical,
                     'title_li'     => $title,
                     'hide_empty'   => $empty
          );
             $all_categories = get_categories( $args );
             print_r($all_categories);
             foreach ($all_categories as $cat) {
                if($cat->category_parent == 0) {
                    $category_id = $cat->term_id;       
                    echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';

                    $args2 = array(
                            'taxonomy'     => $taxonomy,
                            'child_of'     => 0,
                            'parent'       => $category_id,
                            'orderby'      => $orderby,
                            'show_count'   => $show_count,
                            'pad_counts'   => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li'     => $title,
                            'hide_empty'   => $empty
                    );
                    $sub_cats = get_categories( $args2 );
                    if($sub_cats) {
                        foreach($sub_cats as $sub_category) {
                            echo  $sub_category->name ;
                        }   
                    }
                }       
            }
            ?>
        </ul>
    </div>
</section>

<?php get_footer(); ?>