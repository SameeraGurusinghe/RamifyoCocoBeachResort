

<!--Room availability area start-->
<div class="row">
	<div class="card">
		<div class="card-header">
    <h4 style="text-align: center;"><b>Room Availability</b></h4>
		  <div class="card-action">
		    <div class="card-body">
	

     <?php
     $uavroomcount = 0;
     $avroomcount = 0;
                $Result = mysqli_query($db,"SELECT * FROM room");
                while($row=mysqli_fetch_array($Result)){

                  $roomname = $row["roomno"];
                  $roomstatus = $row["roomstatus"];
                  $roomid = $row["roomid"];
                 
                    if($roomstatus==0){
                      
                      ?> 
                      
                      <button type="button" class="btn btn-success"> <?php echo "$roomname";?> <br>Avalible </button>
                   
                      <?php 
                     $avroomcount++; 
                    }        
                
                    elseif($roomstatus==1){

                     
               ?>     
                  <button type="button" class="btn btn-danger"><?php echo "$roomname";?><br>Unavalible </button>
                  <?php 
                   $uavroomcount++;
                }    } 
              

               ?>
<br>
     
		    <div class="row m-0 row-group text-center border-top border-light-3">
<br>
		      <div class="col-12 col-lg-4">
		        <div class="p-3">
		          <h5 class="mb-0"><?php echo" $uavroomcount";?> </h5>
			          <small class="mb-0">Overall Booked Rooms <span><?php $a=($uavroomcount/20)*100; echo"$a";?>%</span></small>
		        </div>
		      </div>

          <div class="col-12 col-lg-4">
            <div class="p-3">
              <h5 class="mb-0"><?php echo "$avroomcount";?></h5>
                <small class="mb-0">Avalibles Room Count <span> <?php $a=($avroomcount/20)*100; echo"$a";?>%</span></small>
            </div>
          </div>

          <div class="col-12 col-lg-4">
            <div class="p-3">
              <h5 class="mb-0">20</h5>
                <small class="mb-0">Total Rooms </small>
            </div>
          </div>

        </div>

        </div>
      </div>
    </div>
  </div>
</div><br><br><br>
<!--Room availability area end-->


