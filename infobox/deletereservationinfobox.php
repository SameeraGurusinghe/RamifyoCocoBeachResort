<?php include("includes/libraries.php"); ?>

<!-- Modal -->
<div class="modal fade" id="staticBackdropForDeleteRoomReservation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="color: red; font-weight: bold;" id="staticBackdropLabel">Confirm reservation delete</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">No</button>
        <button type="submit" name="delete_room" class="btn btn-success">Yes. Delete</button>
      </div>
    </div>
  </div>
</div>