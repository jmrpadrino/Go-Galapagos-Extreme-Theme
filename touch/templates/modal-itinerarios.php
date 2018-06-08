        <!-- Modal -->
        <div class="modal fade" id="itinerariesModal" tabindex="-1" role="dialog" aria-labelledby="itinerariesModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Galapagos Legend Itineraries</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                            //echo '<pre>';
                            //print_r($itinerarios_array);
                            //echo '</pre>';
                        ?>
                        <ul class="modal-list">
                            <?php 
                                $i = 0;
                                foreach ($itinerarios_array as $item){ 
                            ?>
                            <li class="modal-itinerary-item"><a href="<?= home_url('legend-interactive/legend-interactive-itineraries') ?>?itinerario_id=<?= $i ?>"><?= $item->post_title?></a></li>
                            <?php $i++; } ?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>