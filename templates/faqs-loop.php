<div class="container">
    <div class="row">
        <?php
            $faqs_groups = get_terms( array(
                'taxonomy' => 'go_faqs',
                'hide_empty' => false,
            ) );
            echo $term;  
        ?>
        <div class="col-xs-12">
            <ul class="list-inline faqs-groups-links">
                <li class="faq-term-link <?php echo is_post_type_archive('ggfaqs') == '1' ? 'activated' : '' ?>"><a href="<?= get_post_type_archive_link('ggfaqs') ?>"><?= _e('All FAQs', 'gogalapagos') ?></a></li>
                <?php 
                    foreach($faqs_groups as $faqs_group){
                        echo '<li class="faq-term-link ';
                        echo $faqs_group->slug == $term ? 'activated' : '';
                        echo '"><a href="'.get_term_link( $faqs_group->term_id, 'go_faqs' ).'">' . $faqs_group->name . '</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php if( have_posts() ){ $i = 0;?>
            <?php while( have_posts() ){ the_post() ?>
                <div class="panel panel-default">
                    <?php if($i == 0){ ?>
                    <a class="panel-title-link" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= get_the_ID() ?>" aria-expanded="false" aria-controls="collapse<?= get_the_ID() ?>">
                    <?php }else{ ?>
                    <a class=" panel-title-link collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= get_the_ID() ?>" aria-expanded="false" aria-controls="collapse<?= get_the_ID() ?>">
                    <?php } ?>
                    <div class="panel-heading" role="tab" id="heading<?= $i ?>">
                        <h2 class="panel-title body-font">
                                <?= the_title(); ?>                                
                        </h2>
                        <?php $grupo = get_the_terms( get_the_ID() , 'go_faqs' ) ?>
                        <small><?= $grupo[0]->name ?></small>
                        <span class="pull-right see-more-faqs-icon fa fa-plus"></span>
                    </div>
                    </a>
                    <div id="collapse<?= get_the_ID() ?>" class="panel-collapse collapse <?php //$i == 0 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading<?= get_the_ID() ?>">
                        <div class="panel-body">
                            <?= the_excerpt() ?>
                        </div>
                    </div>
                </div>
            <?php $i++;} // End IF ?>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="pagination-container">
                    <?php
                        global $wp_query;
                        $total = $wp_query->max_num_pages;
                        if ( !$current_page = get_query_var('paged') )
                            $current_page = 1;
                        echo paginate_links(
                            array(
                                'prev_next' => false,
                                'current' => $current_page,
                                'total' => $total,
                                'type' => 'list'
                            )
                        );
                    ?>
                    </div>
                </div>
            </div>
            <?php } // End IF ?>
            </div>
        </div>
    </div>
</div>