    <div class="container-fluid nopadding">
    <?php if( have_posts() ){ ?>
    <?php while( have_posts() ){ the_post() ?>
        <div class="col-sm-4 nopadding archive-item-placeholder">
            <div class="archive-item-mask"></div>
            <a class="island-link" href="<?php echo the_permalink(); ?>" alt="<?= get_the_title(get_the_ID()); ?>"><?php the_title('<h2 class="archive-item-title">','</h2>'); ?>
                <?= the_post_thumbnail('full', array('class' => 'img-responsive', 'title' => get_the_title(get_the_ID()), 'alt' => get_the_title(get_the_ID()))); ?>
            </a>
        </div>
    <?php } // End IF ?>
    <?php } // End IF ?>
    </div>