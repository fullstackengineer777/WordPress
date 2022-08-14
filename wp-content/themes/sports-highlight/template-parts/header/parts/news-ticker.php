<?php
/**
 * News ticker header template parts.
 *
 * @package Sports_Highlight
 */

use Sports_Highlight\Customizer_Helpers;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! Customizer_Helpers::mods( 'general_option_topbar_enable_news_ticker' ) ) {
	return;
}

$news_ticker_label    = Customizer_Helpers::mods( 'general_option_topbar_news_ticker_label' );
$news_ticker_category = Customizer_Helpers::mods( 'general_option_topbar_news_ticker_category' );

?>
<div class="trending-news-holder">

	<?php if ( $news_ticker_label ) { ?>
		<div class="trend-news-left">
			<i class="fas fa-bolt fa-flip"></i>
			<div class="trending-news-label"><?php echo esc_html( $news_ticker_label ); ?></div>
		</div>
	<?php } ?>

	<?php

	if ( $news_ticker_category ) {
		$news_ticker_query = new WP_Query(
			array(
				'posts_per_page' => -1,
				'cat'            => $news_ticker_category,
			)
		);

		?>
		<div class="trend-news-right">
			<ul class="news-item-wrap">

				<?php

				while ( $news_ticker_query->have_posts() ) {
					$news_ticker_query->the_post();

					?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title( ( $news_ticker_query->current_post + 1 ) . ' ' ); ?></a></li>
					<?php
				}

				?>
			</ul>

		</div>

		<?php

		wp_reset_postdata();
	}

	?>

</div>
