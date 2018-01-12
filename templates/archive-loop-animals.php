    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">            
    <?php 
        $grupoAnimales = get_terms('animalgroup', array('hide_empty' => false));
        var_dump($grupoAnimales); 
        if ($grupoAnimales){ 
    ?>
        <div class="col-sm-6 nopadding archive-item-placeholder">
        algo
        </div>
    <?php }else{ ?>
    <p class="text-center"><?= _e('Sorry!. There are no animal groups on this list for now', 'gogalapagos'); ?></p>
    <?php } ?>
            </div>
        </div>
    </div>