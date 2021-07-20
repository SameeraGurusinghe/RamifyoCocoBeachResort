<?php include("includes/libraries.php"); ?>

<!-- Modal -->
<div class="modal fade" id="staticBackdropForAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="color: red; font-weight: bold;" id="staticBackdropLabel">Do you want to add this food?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">No. Cancel</button>
        <button type="submit" name="addfood" class="btn btn-success">Yes. Add</button>
      </div>
    </div>
  </div>
</div>