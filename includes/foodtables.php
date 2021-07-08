      <!--Rice Menu area start-->
      <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">RICE</h5>

               <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">FOOD Name</th>
                      <th scope="col">FOOD ID</th>
                      <th scope="col">PRICE</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                    
                      <?php
                        $Result = mysqli_query($db,"SELECT * FROM foods WHERE ftype='rice'");
                        while($row=mysqli_fetch_array($Result)){
                        $fname = $row["name"];
                        $foodid = $row["foodid"];
                        $fprice = $row["price"]; 
                      ?> 

                        <td><?php echo " $fname";?> </td>
                        <td><?php echo " $foodid";?> </td>
                        <td><?php echo "Rs $fprice/=";?> </td>
      
                    </tr>

                    <?php 
                    }
                    ?> 

                  </tbody>
                </table>

            </div>
          </div>
        </div>
      </div>
      <!--Rice menu area end-->

      <!--Koththu menu area start-->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">KOTHTHU</h5>

                <table class="table table-sm">
                  <thead>
                      <tr>
                        <th scope="col">FOOD Name</th>
                        <th scope="col">FOOD ID</th>
                        <th scope="col">PRICE</th>
                      </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <?php
                        $Result = mysqli_query($db,"SELECT * FROM foods WHERE ftype='koththu'");
                        while($row=mysqli_fetch_array($Result)){
                        $fname = $row["name"];
                        $foodid = $row["foodid"];
                        $fprice = $row["price"];  
                      ?> 
    
                      <td><?php echo " $fname";?> </td>
                      <td><?php echo " $foodid";?> </td>
                      <td><?php echo "Rs $fprice/=";?> </td>
                    </tr>

                      <?php 
                      }
                      ?> 
                  </tbody>
                </table>

            </div>
          </div>
        </div>
      </div>
    </div><br><br>
    <!--Koththu menu area end-->

    <!--Noodles menu area start-->
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">NOODLES</h5>

              <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">FOOD Name</th>
                      <th scope="col">FOOD ID</th>
                      <th scope="col">PRICE</th>
                    </tr>
                </thead>

                <tbody>
                  <tr>
                    <?php
                      $Result = mysqli_query($db,"SELECT * FROM foods WHERE ftype='noodles'");
                      while($row=mysqli_fetch_array($Result)){
                      $fname = $row["name"];
                      $foodid = $row["foodid"];
                      $fprice = $row["price"];    
                    ?> 

                          
                      <td><?php echo " $fname";?> </td>
                      <td><?php echo " $foodid";?> </td>
                      <td><?php echo "Rs $fprice/=";?> </td>
      
                  </tr>

                    <?php 
                    }
                    ?> 

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
      <!--Noodles menu area end-->

      <!--Soup menu area start-->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <h5 class="card-title text-center">SOUP</h5>

                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">FOOD Name</th>
                        <th scope="col">FOOD ID</th>
                        <th scope="col">PRICE</th>
                    
                      </tr>
                    </thead>
                    
                    <tbody>
                      <tr>
                        <?php
                         $Result = mysqli_query($db,"SELECT * FROM foods WHERE ftype='soup'");
                         while($row=mysqli_fetch_array($Result)){
                         $fname = $row["name"];
                         $foodid = $row["foodid"];
                         $fprice = $row["price"];  
                        ?> 

                         
                        <td><?php echo " $fname";?> </td>
                        <td><?php echo " $foodid";?> </td>
                        <td><?php echo "Rs $fprice/=";?> </td>
                      </tr>
                      
                      <?php 
                      }
                      ?> 
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div><br><br>
      <!--Soup Food Menu area end-->

    <!--Noodles menu area start-->
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">CURRY</h5>

              <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">FOOD Name</th>
                      <th scope="col">FOOD ID</th>
                      <th scope="col">PRICE</th>
                    </tr>
                </thead>

                <tbody>
                  <tr>
                    <?php
                      $Result = mysqli_query($db,"SELECT * FROM foods WHERE ftype='curry'");
                      while($row=mysqli_fetch_array($Result)){
                      $fname = $row["name"];
                      $foodid = $row["foodid"];
                      $fprice = $row["price"];    
                    ?> 

                          
                      <td><?php echo " $fname";?> </td>
                      <td><?php echo " $foodid";?> </td>
                      <td><?php echo "Rs $fprice/=";?> </td>
      
                  </tr>

                    <?php 
                    }
                    ?> 

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
      <!--Noodles menu area end-->

        <!--Soup menu area start-->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <h5 class="card-title text-center">DRINK</h5>

                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">FOOD Name</th>
                        <th scope="col">FOOD ID</th>
                        <th scope="col">PRICE</th>
                    
                      </tr>
                    </thead>
                    
                    <tbody>
                      <tr>
                        <?php
                         $Result = mysqli_query($db,"SELECT * FROM foods WHERE ftype='drink'");
                         while($row=mysqli_fetch_array($Result)){
                         $fname = $row["name"];
                         $foodid = $row["foodid"];
                         $fprice = $row["price"];  
                        ?> 

                         
                        <td><?php echo " $fname";?> </td>
                        <td><?php echo " $foodid";?> </td>
                        <td><?php echo "Rs $fprice/=";?> </td>
                      </tr>
                      
                      <?php 
                      }
                      ?> 
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div><br><br>
      <!--Soup Food Menu area end-->


    <!--Noodles menu area start-->
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">DESSERT</h5>

              <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">FOOD Name</th>
                      <th scope="col">FOOD ID</th>
                      <th scope="col">PRICE</th>
                    </tr>
                </thead>

                <tbody>
                  <tr>
                    <?php
                      $Result = mysqli_query($db,"SELECT * FROM foods WHERE ftype='dessert'");
                      while($row=mysqli_fetch_array($Result)){
                      $fname = $row["name"];
                      $foodid = $row["foodid"];
                      $fprice = $row["price"];    
                    ?> 

                          
                      <td><?php echo " $fname";?> </td>
                      <td><?php echo " $foodid";?> </td>
                      <td><?php echo "Rs $fprice/=";?> </td>
      
                  </tr>

                    <?php 
                    }
                    ?> 

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div></div>
      <!--Noodles menu area end-->