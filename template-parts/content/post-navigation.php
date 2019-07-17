<nav class="container my-3 navigation post-navigation" role="navigation">
    <h4 class="h5">前後の記事</h4>
    <ul class="nav nav-pills nav-justified nav-links">
        <?php if (get_previous_post()): ?>
            <li class="nav-item nav-previous">前の記事<br><?php previous_post_link('%link', '<i class="fas fa-arrow-left"></i> %title'); ?></li>
        <?php else: ?>
            <li class="nav-item nav-previous">前の記事<br>前の記事がありません</li>
        <?php endif; ?>
        <?php if (get_next_post()): ?>
            <li class="nav-item nav-next">次の記事<br><?php next_post_link('%link', '%title <i class="fas fa-arrow-right"></i>'); ?></li>
        <?php else: ?>
            <li class="nav-item nav-next">次の記事<br>次の記事がありません</li>
        <?php endif; ?>
    </ul>
</nav>