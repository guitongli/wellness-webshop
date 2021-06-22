
<div class="news">
			<h1 class='headline text-center'>Coming up</h1>
			<div id="filters" class="filter-group d-flex justify-content-center mb-4">
				<button class="btn is-checked " data-filter="*">All</button>


				<button class="btn is-checked" data-filter=".contests">
					Contests
				</button>


				<button class="btn is-checked" data-filter=".concerts">
						Concerts
				</button>

				<button class="btn is-checked" data-filter=".masterclass">
				Classes
				</button>
			</div>

			<div class="grid">

<?php $events = new WP_Query(
    array(
        'post_type' => 'post', // Tell WordPress which post type we want
        'orderby' => 'meta_value', // We want to organize the events by date
        'meta_key' => 'event_date', // Grab the "start date" field created via "More Fields" plugin (stored in YYYY-MM-DD format)
        'order' => 'ASC', // ASC is the other option
        'posts_per_page' => '-1', // Let's show them all.
        'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
            array(
                'key' => 'event_date', // Check the start date field
                'value' => date("Y-m-d"), // Set today's date (note the similar format)
                'compare' => '>=', // Return the ones greater than today's date
                'type' => 'DATE', // Let WordPress know we're working with date
            ),
        ),
        // 'tax_query' => array( // Return only concerts (event-types) and events where "songs-of-ascent" is performing
        //     array(
        //         'taxonomy' => 'event-types',
        //         'field' => 'slug',
        //         'terms' => 'concert',
        //         ),
        //     array(
        //         'taxonomy' => 'speakers',
        //         'field' => 'slug',
        //         'terms' => 'songs-of-ascent',
        //         )
        //     )
    )
);
while ($events->have_posts()): $events->the_post();?>


						 <div class="grid-item border m-2 p-3 <?php the_tags();?>">
										<a href="#"
											>

											<img
												src=" <?php the_post_thumbnail_url('post-thumbnail');?>"
												class="blog-preview"
										/>
									</a>
										<div
											class="blog-text d-flex align-items-center justify-content-around"
										>
											<div
												class="blog-date d-flex flex-column align-items-center"
											>
												<span class="day"><?php $custom_date = get_post_meta($post->ID, 'event_date', true);
                                              echo $custom_date;?></span>
											</div>

											<div class="blog-headlines">
												<h3 class="blog-title">
													<?php the_title();?>
												</h3>
												<h4 class="blog-intro">
													<?php the_excerpt();?>
												</h4>

												<a href="<?php echo get_permalink($post->ID); ?>" class="p-1">read more...</a>
											</div>
										</div>
									</div>
						</div>
						
						  <?php endwhile;
wp_reset_query();?>


</div>
</div>