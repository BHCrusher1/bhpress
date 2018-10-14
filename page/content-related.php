<footer class="related">
<p>同じカテゴリの記事</p>
<ul>
<?php
$categories = get_the_category($post->ID);
$category_ID = array();
  
foreach($categories as $category){
	array_push($category_ID,$category->cat_ID);
}
  
$posts_number = 5; // 表示したい件数を指定
  
$args = array(
	'post__not_in'=>array($post->ID), // 現在のページの投稿を除外
	'category__in'=>$category_ID, // 現在の投稿のカテゴリーの関連記事を取得
	'orderby'=>'date', // ランダムに並べる
	'posts_per_page'=>$posts_number, // 表示する件数の指定
);
$wp_query = new WP_Query($args);
  
if($wp_query->have_posts()){
	while($wp_query->have_posts()):$wp_query->the_post();
	?>
		<li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?><?php
		if ( has_post_thumbnail() ) {
			echo '<div class="related-meta">';
		}else{
			echo '<div class="related-meta no-thumbnail">';} 
		?><h3><?php the_title(); ?></h3> <time><?php echo get_the_date(); ?></time></div></a></li>
	<?php
	endwhile;
}else{
?>
	<p>同じカテゴリの記事がありません・・・</p>
	<?php } ?>
</ul>
</footer>