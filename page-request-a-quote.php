<?php 
get_header(); 
the_post();
?>
<section class="section sections request-a-quite-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <h1><?= _e('Request a Quote') ?></h1>
                <p>Find out which option is the best for you and your family.</p>
                <p>Please complete all the information:</p>
                <form role="form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Check me out
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    get_footer(); 
?>