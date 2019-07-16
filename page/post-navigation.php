<nav class="post-navigation">
    <h4>前後の記事</h4>
    <ul class="nav-links">
        <?php if (get_previous_post()): ?>
        <li class="nav-previous">前の記事<br><?php previous_post_link('%link', '<i class="fas fa-arrow-left"></i> %title'); ?>
        </li>
        <?php endif; ?>
        <?php if (get_next_post()): ?>
        <li class="nav-next">次の記事<br><?php next_post_link('%link', '%title <i class="fas fa-arrow-right"></i>'); ?>
        </li>
        <?php endif; ?>
    </ul>
</nav>