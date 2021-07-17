<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h4 class="modal-title" style="color: black; font-weight:bold; margin-left:180px;" id="staticBackdropLabel">RATE MEALS</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-dark">
      <p style="color:yellow;">Please rate. It will help others to get an idea about our meals.</p>
        <span id="business_list"></span>
      </div>
      <div class="modal-footer bg-secondary">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" checked="checked">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<script>
$(document).ready(function(){
 
 load_business_data();
 
 function load_business_data(){
  $.ajax({
   url:"rating/fetch.php",
   method:"POST",
   success:function(data){
    $('#business_list').html(data);
   }
  });
 }
 
 $(document).on('mouseenter', '.rating', function(){
  var index = $(this).data("index");
  var food_id = $(this).data('food_id');
  remove_background(food_id);

  for(var count = 1; count<=index; count++){
   $('#'+food_id+'-'+count).css('color', '#ffcc00');
  }
    });
 
 function remove_background(food_id){
  for(var count = 1; count <= 5; count++){
   $('#'+food_id+'-'+count).css('color', '#ccc');
  }
 }
 
 $(document).on('mouseleave', '.rating', function(){
  var index = $(this).data("index");
  var food_id = $(this).data('food_id');
  var rating = $(this).data("rating");
  remove_background(food_id);
  //alert(rating);
  for(var count = 1; count<=rating; count++){
   $('#'+food_id+'-'+count).css('color', '#ffcc00');
  }
 });
 
 $(document).on('click', '.rating', function(){
  var index = $(this).data("index");
  var food_id = $(this).data('food_id');
  $.ajax({
   url:"rating/insert_rating.php",
   method:"POST",
   data:{index:index, food_id:food_id},
   success:function(data){
    if(data == 'done'){
     load_business_data();
     alert("You have rate "+index +" out of 5");
    }

    else{
     alert("There is some problem in System");
    }

   }
  });
  
 });

});
</script>