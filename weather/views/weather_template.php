
<h2>Погода на сегодня</h2>
<?php if($data){
    echo '<div class="row table-bordered justify-content-center">
                <div class="col-sm-1 col-sm-offset-1">
                    .'.$data["weather_short"].'.
                </div><!-- /col-sm-5 -->
        
                <div class="col-sm-8 col-sm-offset-1">
                    .'.$data["weather_detail"].'.
                </div><!-- /col-sm-5 -->
        
           </div><!-- /row -->\'';

    echo '<div class="row table-bordered">
                <div class="col-sm-5 col-sm-offset-2">
                    
                </div><!-- /col-sm-5 -->
        
           </div><!-- /row -->\'';
} ?>
