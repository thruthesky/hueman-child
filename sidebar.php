<?php
$sidebar = alx_sidebar_primary();
$layout = alx_layout_class();
if ( $layout != 'col-1c'):
	?>

	<div class="sidebar s1">

		<a class="sidebar-toggle" title="<?php _e('Expand Sidebar','hueman'); ?>"><i class="fa icon-sidebar-toggle"></i></a>

		<div class="sidebar-content">

			<?php if ( ot_get_option('sidebar-top') != 'off' ): ?>
				<div class="sidebar-top group">
					<p><?php _e('Follow:','hueman'); ?></p>
					<?php alx_social_links() ; ?>
				</div>
			<?php endif; ?>

			<?php if ( ot_get_option( 'post-nav' ) == 's1') { get_template_part('inc/post-nav'); } ?>

			<?php if( is_page_template('page-templates/child-menu.php') ): ?>
				<ul class="child-menu group">
					<?php wp_list_pages('title_li=&sort_column=menu_order&depth=3'); ?>
				</ul>
			<?php endif; ?>



			<?php dynamic_sidebar($sidebar); ?>



			<style>
				.columnist {
					padding:1em;
				}
				.columnist img {
					display:block;
					width: 100%;
				}
				.columnist .title {
					margin-bottom:.2em;
					border-bottom: 1px dotted grey;
				}
				.columnist .title b {
					color:darkred;
				}
				.columnist .desc {
					padding: .6em 1em;
					background-color: #7f8b91;
					color:white;
					font-family: "Gulim", "AppleGothic", "Dotum", serif;
					font-size:12px;
					line-height: 1.4em;
					text-align:center;
				}
			</style>
			<div class="columnist">
				<a href="http://www.philgo.com/?page=family-site&action=index" target="_blank">
					<div class="title">
						<span class="dashicons dashicons-share"></span>
						<b>필고</b> 패밀리 사이트
					</div>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/columnist.jpg">
					<div class="desc">
						필리핀 칼럼 작가를 모십니다.<br>
						필고 패밀리 사이트 교민 업소 홈페이지/앱을 제작 지원
					</div>
				</a>
			</div>


			<style>
				.philgo {
					margin-top:2rem;
					padding:1em;
					font-size:0.8rem;
					text-align: center;
				}
			</style>
			<div class="philgo">
				<a href="http://www.philgo.com/" target="_blank">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/philgo.png">
					<div class="desc">
						필리핀 여행, 골프, 어학연수, 교민생활정보, 장터
					</div>
				</a>
			</div>


			<?php /** ---------------------------- 필고 광교 표시 ---------------- */ ?>
			<style>
				.point-ad-title {
					padding:1em;
					background-color:white;
					cursor: pointer;
				}
				.point-ad-desc {
					display: none;
					padding: 1em;
					background-color: #410000;
					color: white;
					line-height:1.8em;
				}
				.point-ad-desc a {
					color: inherit;
				}
			</style>
			<script>
				jQuery(function($) {
					$(".point-ad-title").click(function(){
						$(this).next().slideDown();
					});
				});
			</script>
			<div class="point-ad-title">
				필고 회원 포인트 광고 안내
				<span class="dashicons dashicons-admin-comments"></span>
			</div>
			<div class="point-ad-desc">
				<a href="http://www.philgo.com/?module=member&action=point_buy" target="_blank">
					필고에서 회원 포인트로 광고글을 등록하시면 필고, 헬로필리핀앱, 필고 패밀리 사이트 등에 광고가 표시됩니다.<br>
					필고 포인트 구매 페이지 열기
				</a>
			</div>


			<style>
				.point-ad ul {
					list-style: none;
					margin: 0;
					padding: 0;
				}
				.point-ad ul li {
					padding: 1em;
					overflow: auto;
				}
				.point-ad ul li:hover {

					background-color: #bcc8d5;
				}
				.point-ad ul li .photo {
					float: left;
					margin-right: 1em;
				}
				.point-ad ul li img {
					max-width: 64px;
					border-radius: 50%;
					border: 2px solid white;
				}
				.point-ad .subject {
					padding: .4em;
				}
			</style>
			<?php
			$point_ad = philgo_ad('point');
			if ( $point_ad ) {
				echo '<div class="point-ad"><ul>';
				foreach ( $point_ad as $ad ) {
					?>
					<li>
						<a href="http://www.philgo.com/<?php echo $ad['url']?>" target="_blank">
							<?php if ( isset($ad['src_thumbnail']) && $ad['src_thumbnail'] ) { ?>
								<div class="photo"><img src="<?php echo $ad['src_thumbnail']?>"></div>
							<?php } ?>
							<div class="subject"><?php echo $ad['subject']?></div>
						</a>
					</li>
					<?
				}
				echo '</ul></div>';
			}
			?>



		</div><!--/.sidebar-content-->

	</div><!--/.sidebar-->

	<?php if (
	( $layout == 'col-3cm' ) ||
	( $layout == 'col-3cl' ) ||
	( $layout == 'col-3cr' ) )
{ get_template_part('sidebar-2'); }
	?>

<?php endif; ?>
