<?php 
    get_header(); 
    the_post();
?>
<div class="sections section">
<div class="container">
    <div class="row">
        <div class="col-sm-4 text-center">left</div>
        <div class="col-sm-4 text-center">center</div>
        <div class="col-sm-4 text-center">right</div>
    </div>
    <style>
        .flex-ejemplo{
            display: flex; width: 100%; background: green; justify-content: space-between; padding: 36px 0; 
        }
        @media screen and (max-width: 768px){
            .flex-ejemplo{
                flex-direction: column-reverse;

            }
        }
    </style>
    <div class="row">
        <div class="col-xs-12">
            <div class="flex-ejemplo">
                <div class="div1 text-center" style="background: red; flex: 1; padding: 36px;">             
                    <div>
                        <img src="http://placehold.it/80x80">
                    </div>
                </div>
                <div class="div1" style="background: blue; flex: 1;">cosa</div>
                <div class="div1" style="background: yellow; flex: 1; ">cosa</div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    get_footer(); 
?>