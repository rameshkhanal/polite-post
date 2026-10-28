<?php
/**
* Polite Slider Function
* @since Polite 1.0.0
*
* @param null
* @return void
*
*/
global $polite_theme_options;
$slide_id = absint($polite_theme_options['polite-select-category']);
$slick_args = array(
'slidesToShow'      => 1,
'slidesToScroll'    => 1,
'dots'              => false,
'arrows'            => false,
);
$args = array(
'posts_per_page' => 3,
'paged' => 1,
'cat' => $slide_id,
'post_type' => 'post'
);
$slider_query = new WP_Query($args);
if ($slider_query->have_posts()): ?>
<div class="container">
  <div class="modern-slider" data-slick='<?php echo isset( $slick_args_encoded ) ? $slick_args_encoded : ''; ?>'>
    <?php while ($slider_query->have_posts()) : $slider_query->the_post();
    if(has_post_thumbnail()){
    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src( $image_id,'',true );
    ?>
    <div class="slider-items">
      <div class="slide-wrap slider-height img-cover" style="background-image: url(<?php echo esc_url($image_url[0]);?>)">
        <div class="col-12">
          <div class="caption">
            <?php
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
            echo '<a class="s-cat" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
            }
            ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry-meta">
              <?php polite_posted_on(); ?>
            </div>
            <div class="post-excerpt entry-content">
              <?php the_excerpt(); ?>
              <a class="more-btn" href="<?php the_permalink(); ?>"><?php _e('Read More', 'polite'); ?></a>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <?php } endwhile;
    wp_reset_postdata(); ?>
  </div>

  <div class="binduz-er-news-slider-area pt-30 pb-60">
        <div class=" container">
            <div class="binduz-er-news-slider-box">
                <div class="row g-0 align-items-center">
                    <div class=" col-lg-6">
                        <div class="binduz-er-news-slider-item">
                            <div class="binduz-er-item">
                                <img src="assets/images/news-slider-1.jpg" alt="">
                            </div>
                            <div class="binduz-er-item">
                                <img src="assets/images/news-slider-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-6">
                        <div class="binduz-er-news-slider-content-slider">
                            <div class="binduz-er-item">
                                <div class="binduz-er-meta-item">
                                    <div class="binduz-er-meta-categories">
                                        <a href="#">Technology</a>
                                    </div>
                                    <div class="binduz-er-meta-date">
                                        <span><i class="fal fa-calendar-alt"></i> 24th February 2020</span>
                                    </div>
                                </div>
                                <div class="binduz-er-news-slider-content">
                                    <h3 class="binduz-er-title"><a href="#">Spot misinformation online with these tips</a></h3>
                                    <p>How effectively the massive shopping center can repurpose more than 300,000 square feet soon to be vacated</p>
                                </div>
                                <div class="binduz-er-meta-author">
                                    <div class="binduz-er-author">
                                        <img src="assets/images/user-2.jpg" alt="">
                                        <span>By <span>Rosalina D.</span></span>
                                    </div>
                                    <div class="binduz-er-meta-list">
                                        <ul>
                                            <li><i class="fal fa-eye"></i> 5k</li>
                                            <li><i class="fal fa-heart"></i> 5k</li>
                                            <li><i class="fal fa-comments"></i> 5k</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="binduz-er-item">
                                <div class="binduz-er-meta-item">
                                    <div class="binduz-er-meta-categories">
                                        <a href="#">Technology</a>
                                    </div>
                                    <div class="binduz-er-meta-date">
                                        <span><i class="fal fa-calendar-alt"></i> 24th February 2020</span>
                                    </div>
                                </div>
                                <div class="binduz-er-news-slider-content">
                                    <h3 class="binduz-er-title"><a href="#">Take a look at these pandemic pastimes</a></h3>
                                    <p>How effectively the massive shopping center can repurpose more than 300,000 square feet soon to be vacated</p>
                                </div>
                                <div class="binduz-er-meta-author">
                                    <div class="binduz-er-author">
                                        <img src="assets/images/user-2.jpg" alt="">
                                        <span>By <span>Rosalina D.</span></span>
                                    </div>
                                    <div class="binduz-er-meta-list">
                                        <ul>
                                            <li><i class="fal fa-eye"></i> 5k</li>
                                            <li><i class="fal fa-heart"></i> 5k</li>
                                            <li><i class="fal fa-comments"></i> 5k</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>