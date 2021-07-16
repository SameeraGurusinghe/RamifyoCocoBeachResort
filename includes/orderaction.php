<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="color: red; font-weight: bold;" id="staticBackdropLabel">Order Info</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
            <img src="<?php echo $fimage ?>"><br>
            <input type="text" name="fid" value="<?php echo $id; ?>">
            <h5><?php echo $fname ?></h5>
            <input type="text" name="fid" value="<?php echo $id; ?>">
            <input type="text" name="fname" value="<?php echo $fname; ?>">
            <input type="text" name="fprice" value="<?php echo $fprice; ?>">
            <h6></h6>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" checked="checked">Cancel</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </div>
    </div>
</div>
</div>