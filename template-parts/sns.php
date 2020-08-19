<?php
/**
 * SNSボタン
 */

?>
<?php
$share_url   = get_permalink();
$share_title = get_the_title();
$related_id  = 'BHCrusher1';
?>
<nav class="container my-3">
	<ul class="nav text-center sns">
		<li class="nav-item"><a class="nav-link text-white share-facebook" href="https://www.facebook.com/share.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener">Facebook</a></li>
		<li class="nav-item"><a class="nav-link text-white share-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $share_title; ?>&url=<?php echo $share_url; ?>&related=<?php echo $related_id; ?>" target="_blank" rel="noopener">Twitter</a></li>
		<li class="nav-item"><a class="nav-link text-white share-line" href="https://social-plugins.line.me/lineit/share?url=<?php echo $share_url; ?>" target="_blank" rel="noopener">LINE</a></li>
	</ul>
</nav>
