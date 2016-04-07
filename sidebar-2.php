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

	<style>
		.user-login { padding: 2em; }
	</style>
		<div class='user-login'>
			<div class='user-login-title'>
				<?php if ( user()->login() ) : ?>
					로그인 정보
				<?php else : ?>
					로그인하기
				<?php endif; ?>
			</div>
			<div class='user-login-content'>
				<?php echo do_shortcode('[wp_log_info]');?>
			</div>
		</div>


		<?php dynamic_sidebar($sidebar); ?>
		
	</div><!--/.sidebar-content-->



	<div class="point-ad-title">
		필리핀 교민 업소 광고
		<span class="dashicons dashicons-admin-comments"></span>
	</div>
	<div class="point-ad-desc">
		<a href="http://www.philgo.com/?module=member&action=point_buy" target="_blank">
			필고에서 광고 등록하시면 필고, 헬로필리핀앱, 필고 패밀리 사이트 등에 광고가 표시됩니다.
			<br>
			필고 포인트 구매 페이지 열기
		</a>
	</div>


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
		$post_top = count( $post_top ) < 4 ? $post_top  : array_slice( $post_top, 0, 4 );
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
