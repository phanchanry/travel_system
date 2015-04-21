<div class="modal fade bs-example-modal-lg" id="popup_container" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h2 id="place-title"><?php echo $location->ts_location_title; ?></h2>
                <p id="place-subtitle"><?php echo $location->ts_location_subtitle; ?></p>
            </div>
            <div class="modal-body">
                <div class="place-photo">
                    <img src="<?php echo $location->ts_location_photo?>" />
                </div>
                <div class="place-description">
                    <?php echo nl2br($location->ts_location_description); ?>
                </div>
            </div>
            <div class="modal-footer popup-container-footer">
                Copyright Travel System, Inc. 2014 All Rights Reserved
            </div>
        </div>
    </div>
</div>