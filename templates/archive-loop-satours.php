    <?php /*
       <div class="container-fluid nopadding">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">            
    <?php 
        $grupoAnimales = get_terms('go_tours', array('hide_empty' => false));
        //var_dump($grupoAnimales); 
        foreach ($grupoAnimales as $grupo){ 
    ?>
        <div class="col-sm-6 nopadding archive-item-placeholder text-center">
            <a href="<?= get_term_link( $grupo->term_id, 'go_tours' ) ?>">
                <?= get_term_thumbnail( $grupo->term_id, 'medium', array('class' => 'img_responsive') ) ?>
            </a>
            <a href="<?= get_term_link( $grupo->term_id, 'go_tours' ) ?>"><h2><?= $grupo->name ?></h2></a>
            <span class="separator"></span>
            <p><?php echo term_description( $grupo->term_id, 'go_tours' ) ?></p> 
        
        </div>
    <?php } ?>
            </div>
        </div>
    </div>
    
    */ ?>
    
    <div class="container-fluid nopadding">
    <?php 
        $grupostours = get_terms('go_sa_tours', array('hide_empty' => false));
        //var_dump($grupoAnimales); 
        foreach ($grupostours as $grupo){ 
    ?>
        <a class="island-link" href="<?= get_term_link( $grupo->term_id, 'go_sa_tours' ) ?>" alt="<?= $grupo->term_name ?>">
            <div class="col-sm-6 col-md-4 nopadding archive-item-placeholder">
                <div class="archive-item-mask"></div>
                <h2 class="archive-item-title"><?= $grupo->name ?></h2>
                <?= get_term_thumbnail( $grupo->term_id, 'full', array('class' => 'img-responsive') ) ?>
            </div>
        </a>
    <?php } // End IF ?>    
    </div>