<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package pgb
 */
?>

<?php

$the_post_meta = get_post_meta( get_the_ID() );

$format_source_name = (!empty($the_post_meta['_format_quote_source_name'][0]))
	? $the_post_meta['_format_quote_source_name'][0] . ' '
	: '';
$format_source_title = (!empty($the_post_meta['_format_quote_source_title'][0]))
	? ( (!empty($the_post_meta['_format_quote_source_url'][0])) 
		? '<cite title="Source Title"><a href="'.$the_post_meta['_format_quote_source_url'][0].'">'.$the_post_meta['_format_quote_source_title'][0].'</a></cite>' 
		: '<cite title="Source Title">'.$the_post_meta['_format_quote_source_title'][0].'</cite>' ) 
	: '';

?>

<?php if ( is_single() ) : // Only display Excerpts for Search and Archive Pages ?>

	<div class="entry-content col-md-12">

<?php else : ?>

	<div class="entry-summary col-md-12">

<?php endif; ?>
			
		<blockquote>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pgb' ) ); ?>

			<?php if ( !empty($format_source_name) && !empty($format_source_title) ) {
				echo '<footer>' . $format_source_name . $format_source_title . '</footer>';
			} ?>
		</blockquote>

		<?php if ( is_single() ) : // Only display Excerpts for Search and Archive Pages ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'pgb' ),
					'after'  => '</div>',
				) );
			?>

		<?php endif; ?>
			
	</div><!-- .entry-summary -->
