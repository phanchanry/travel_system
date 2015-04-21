<div class="modal fade bs-example-modal-sm" id="savedTripsModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myLargeModalLabel" class="modal-title">My saved Trips</h4>
            </div>
            <div class="modal-body">
            <?php foreach ($savedTrips as $k => $v) {?>
            	<div class="saved-trip">
            		<h4><a href="<?php echo base_url();?>user_trips/<?php echo $v->trip_key;?>"><?php echo nl2br($v->ts_trip_title); ?></a></h4>
            		<p><?php echo nl2br($v->ts_description);?></p>
            	</div>		
            <?php }?>
            </div>
        </div>
    </div>
</div>