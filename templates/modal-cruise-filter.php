<!-- Modal -->
<form action="<?= home_url('booking') ?>/" role="form" method="GET">
<div class="modal fade" id="tripFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center body-font" id="myModalLabel">Get your trip in Ecuador</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-xs-12">
                                <h5 class="body-font step-title"><span class="step-bullet">1</span> Destinations</h5>
                                <ul class="trip-type-list">
                                    <li class="cruise-list">
                                        <div class="filter-button">
                                            <div class="inner-btn">Cruise<input type="checkbox" value="cruise" name="radio_option1" class="checkout_field"></div>
                                        </div>
                                    </li>
                                    <li class="cruise-list">
                                        <div class="filter-button">
                                            <div class="inner-btn">Land<input type="checkbox" value="land" name="radio_option1" class="checkout_field"></div>
                                        </div>
                                    </li>
                                    <li class="cruise-list">
                                        <div class="filter-button">
                                            <div class="inner-btn">Package<input type="checkbox" value="package" name="radio_option1" class="checkout_field"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h5 class="body-font step-title"><span class="step-bullet">2</span> How many of you</h5>
                                <label for="adultCounter">
                                   <span class="fa fa-male"></span> Adults 
                                   <input id="adultCounter" name="adultcounter" type="number" min="1" max="9" value="2" class="pull-right people-counter">
                                </label>
                                <label for="childCounter">
                                   <span class="fa fa-child"></span> Children 
                                   <input id="childCounter" name="childcounter" type="number" min="0" max="9" value="0" class="pull-right people-counter">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-1">
                        <div class="row">
                            <div class="col-xs-12">
                                <h5 class="body-font step-title pull-left"><span class="step-bullet">3</span> Departures</h5>
                                <div class="year-selector pull-right">
                                    Select the year&nbsp;
                                    <span class="fa fa-chevron-left year-arrow"></span>
                                    <span class="year-placeholder">2018</span>
                                    <span class="fa fa-chevron-right year-arrow"></span>
                                    <input type="hidden" name="year" value="2018">
                                </div>
                            </div>
                        </div>
                        <div class="row month-list">
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio deactivated">JAN<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio deactivated">FEB<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio">MAR<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio">APR<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio">MAY<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio">JUN<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio">JUL<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio">AUG<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio">SEP<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio">OCT<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio">NOV<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="filter-button">
                                    <div class="inner-btn-radio">DEC<input type="radio" value="option2" name="departure_month" id="option2" class="checkout_field"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h5 class="body-font step-title"><span class="step-bullet">4</span> Select your Ship</h5>
                                <ul class="trip-type-list ship-list list-inline">
                                    <li class="cruise-list">
                                        <div class="filter-button">
                                            <div class="inner-btn-radio-ship">Galapagos Legend<input type="radio" value="option2" name="ship" id="option2" class="checkout_field"></div>
                                        </div>
                                    </li>
                                    <li class="cruise-list">
                                        <div class="filter-button">
                                            <div class="inner-btn-radio-ship">Coral Yachts<input type="radio" value="option2" name="ship" id="option2" class="checkout_field"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default doitlater-btn" data-dismiss="modal">I'll do it later</button>
                <button type="submit" class="btn btn-success">GO get it NOW!</button>
            </div>
        </div>
    </div>
</div>
</form>