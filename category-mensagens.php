<?php
get_header();
?>

<div class="content-inner">
<div id="blog-posts">
<div class="posts-layout-wrapper">
<div class="posts-layout layout--blog_classic">

<?php if (have_posts()) :
    while ( have_posts() ) :
	the_post(); ?>
	<article class="entry post type-post status-publish format-standard has-post-thumbnail hentry category-mensagens">
		<div class="entry-inner">
			<div class="entry-media">
				<a class="entry-media-link" href="<?php echo get_permalink(); ?>" title="<?php get_the_title(); ?>" rel="bookmark"></a>
				<div class="entry-thumbnail has-thumb">
					<?php the_post_thumbnail(); ?>
				</div>
			</div>

			<div class="entry-content-data">
			<div class="entry-article-part entry-article-header">
				<h2 class="entry-title entry--item">
					<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark" class="plain_color"><?php echo get_the_title(); ?></a>
				</h2>
				
				<div class="entry-meta entry--item text-uppercase text-xsmall">
					<span class="meta-item posted-on">
						<i class="fa fa-clock-o" aria-hidden="true"></i> 
						<?php the_date('', '<time class="entry-date published">', '</time>'); ?>
					</span>
					<span class="sep">|</span>

					<span class="meta-item meta-cat">
						<i class="fa fa-folder-open-o" aria-hidden="true"></i> <?php echo get_the_archive_title(); ?>
					</span>

					<span class="sep">|</span>					

					<span class="meta-item byline">
						<span class="author vcard">
							<i class="fa fa-user-circle-o"></i> <?php echo get_field('transmissor-mensagem') ?: 'Comunicação IBASP'; ?>
						</span>
					</span>

				</div>
			</div>
			
			<div class="entry-article-part entry-article-body">
				<div class="entry-excerpt entry--item">
					<p><?php echo get_the_excerpt(); ?></p>
				</div>
			</div>
	      
	      		<div class="entry-article-part entry-article-footer only-more">
				<div class="entry-readmore entry--item">
					<a class="readmore-button" title="Ir para o conteúdo completo" href="<?php echo get_permalink(); ?>">Leia mais →</a>
				</div>
			</div>
			</div>
          	</div>
        </article>
        
    <?php endwhile;
endif;

the_posts_pagination( array( 'mid_size'  => 2 ) );
?>



</div>
</div>
</div>
</div>

<?php


/* Restore original Post Data 
 * NB: Because we are using new WP_Query we aren't stomping on the 
 * original $wp_query and it does not need to be reset.
*/
wp_reset_postdata();

get_footer();