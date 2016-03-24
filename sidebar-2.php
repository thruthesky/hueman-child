<?php $sidebar = alx_sidebar_secondary(); ?>

<div class="sidebar s2">
	
	<a class="sidebar-toggle" title="<?php _e('Expand Sidebar','hueman'); ?>"><i class="fa icon-sidebar-toggle"></i></a>
	
	<div class="sidebar-content">
		
		<?php if ( ot_get_option('sidebar-top') != 'off' ): ?>
		<div class="sidebar-top group">
			<p><?php _e('More','hueman'); ?></p>
		</div>
		<?php endif; ?>
		
		<?php if ( ot_get_option( 'post-nav' ) == 's2') { get_template_part('inc/post-nav'); } ?>
		
		<?php dynamic_sidebar($sidebar); ?>
		
	</div><!--/.sidebar-content-->



	<style>
		.post-ad ul li {
			display:block;
			float:left;
			box-sizing: border-box;
			width:50%;
			overflow: auto;
		}
		.post-ad ul li a {
			display:block;
			overflow: auto;
		}
		.post-ad ul li .photo {
			padding: 3px;
		}
		.post-ad ul li:nth-child(odd) {
			padding-left: 3px;
		}
		.post-ad ul li:nth-child(even) {
			padding-right: 3px;
		}
		.post-ad ul li img {
			display:block;
			width:100%;
		}
	</style>
	<?php
	$post_top = philgo_ad('post_top');
	if ( $post_top ) {
		echo '<div class="post-ad"><ul>';
		foreach ( $post_top as $ad ) {
			?>
			<li>
				<a href="http://www.philgo.com/<?php echo $ad['url']?>" target="_blank">
					<div class="photo"><img src="http://www.philgo.com/<?php echo $ad['src']?>"></div>
				</a>
			</li>
			<?
		}
		echo '</ul></div>';
	}
	?>

</div><!--/.sidebar-->