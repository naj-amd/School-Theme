<?php
/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function school_blocks_dynamic_block_init() {
	register_block_type( __DIR__ . '/build/copyright-date' );
	register_block_type( __DIR__ . '/build/staff-department', array(
		'render_callback' => 'fwd_render_staff_department'
	) );
	//Register the Animation to scroll block
}
add_action( 'init', 'school_blocks_dynamic_block_init' );

function school_blocks_static_block_init() {
	register_block_type(__DIR__ . '/build/animation-to-scroll');
	
}
add_action( 'init', 'school_blocks_static_block_init' );

function fwd_render_staff_department( $attributes ) {
    ob_start();
    ?>
    <div <?php echo get_block_wrapper_attributes(); ?>>
		
		<?php

		$nav_args = array( 
			'post_type'      => 'fwd-staff',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC'
		);
			
		// $nav_query = new WP_Query( $nav_args );
		// if ( $nav_query -> have_posts() ) {
		// 	echo '<nav class="staff-nav">';

		// 	while( $nav_query -> have_posts() ) {
		// 		$nav_query -> the_post();
				
		// 		echo '<a href="#post-'.esc_attr(get_the_ID()).'">' . esc_html(get_the_title()) . '</a>'; // Title in h2
				
			
		// 	}
		// 	wp_reset_postdata(); 
		// 	echo '</nav>';
		// }

		$terms = get_terms(
			array(
				'taxonomy' => 'fwd-staff-category',
				'hide_empty' => true
			)
		);

		if ( $terms && !is_wp_error($terms) ){
			echo '<section>';

			foreach($terms as $term){
				echo '<h2>'.esc_html($term->name).'</h2>';

				$args = array( 
					'post_type'      => 'fwd-staff',
					'posts_per_page' => -1,
					//now filter by taxonomy
					'tax_query'		=> array(
						array(
							'taxonomy' => 'fwd-staff-category',
							'field'    => 'slug',
							'terms'    => $term->slug
						)
						),
					'orderby' => 'title',
					'order' => 'ASC'
				);

				$query = new WP_Query( $args );
			
				if ( $query -> have_posts() ) {
					echo '<div class="staff-department">';
					while( $query -> have_posts() ) {
						$query -> the_post();
						// Diplsy each post's feature image and it's title and content. Also make it in a appropriate HTML structur and diplay two posts per row
						echo '<article id="post-' . esc_attr(get_the_ID()) . '" class="staff-member">';
							if (has_post_thumbnail()) {
								echo '<div class="staff-image">';
									the_post_thumbnail('medium');
								echo '</div>';
							}
							echo '<div class="staff-content">';
								echo '<h3>' . esc_html(get_the_title()) . '</h3>';
								echo '<div class="staff-description">';
									the_content();
								echo '</div>';
							echo '</div>';
						echo '</article>'; 
					}
					echo '</div>';
				}
				wp_reset_postdata(); 
			}
			echo '</section>';
		}
        
        ?>
    </div>
    <?php
    return ob_get_clean();
}

