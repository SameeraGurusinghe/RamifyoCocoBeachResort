<?php include("includes/libraries.php"); ?>

<!-- Modal -->
<div class="modal fade" id="staticBackdropForNewsFeedback" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="color: red; font-weight: bold;" id="staticBackdropLabel">Confirm before publish the post</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="addnews" class="btn btn-success">Confirm</button>
      </div>
    </div>
  </div>
</div>