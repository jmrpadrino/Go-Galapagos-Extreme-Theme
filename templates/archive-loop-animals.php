    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">            
    <?php 
        $grupoAnimales = get_terms('animalgroup', array('hide_empty' => false));
        //var_dump($grupoAnimales); 
        $item = 1;
        foreach ($grupoAnimales as $grupo){ 
    ?>
        <div class="col-sm-6 nopadding archive-item-placeholder text-center">
            <a href="<?= get_term_link( $grupo->term_id, 'animalgroup' ) ?>">
                <?= get_term_thumbnail( $grupo->term_id, 'medium', array('class' => 'img_responsive') ) ?>
            </a>
            <a href="<?= get_term_link( $grupo->term_id, 'animalgroup' ) ?>"><h2><?= $grupo->name ?></h2></a>
            <span class="separator"></span>
            <p><?php echo term_description( $grupo->term_id, 'animalgroup' ) ?></p> 
        
        </div>
    <?php
        if($item % 2 == 0){
            echo '<div class="clearfix"></div>';
        }
    ?>
    <?php $item++; } ?>
            </div>
        </div>
    </div>