      <!--Rice Menu area start-->
      <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">RICE</h5>

              <div style="width:auto; height:200px; overflow:auto;">
                <table class="table table-sm bg-dark">
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
                      //essential data coming from foodtabledate.php include file
                      include("includes/foodtabledata.php");
                      ?>
                  </tbody>
                </table>
              </div>
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

              <div style="width:auto; height:200px; overflow:auto;">
              <table class="table table-sm bg-dark">
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
                      //essential data coming from foodtabledate.php include file
                      include("includes/foodtabledata.php");
                      ?> 
                  </tbody>
              </table>
              </div>

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

              <div style="width:auto; height:200px; overflow:auto;">
              <table class="table table-sm bg-dark">
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
                      //essential data coming from foodtabledate.php include file
                      include("includes/foodtabledata.php");
                    ?> 
                </tbody>
              </table>
              </div>

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

                <div style="width:auto; height:200px; overflow:auto;">
                <table class="table table-sm bg-dark">
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
                          //essential data coming from foodtabledate.php include file
                          include("includes/foodtabledata.php");
                        ?> 
                    </tbody>
                </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div><br><br>
      <!--Soup Food Menu area end-->

    <!--Curry menu area start-->
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">CURRY</h5>

              <div style="width:auto; height:200px; overflow:auto;">
              <table class="table table-sm bg-dark">
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
                      //essential data coming from foodtabledate.php include file
                      include("includes/foodtabledata.php");
                    ?>
                </tbody>
              </table>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!--Curry menu area end-->

        <!--Crink menu area start-->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <h5 class="card-title text-center">DRINK</h5>

                <div style="width:auto; height:200px; overflow:auto;">
                <table class="table table-sm bg-dark">
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
                          //essential data coming from foodtabledate.php include file
                          include("includes/foodtabledata.php");
                        ?> 
                    </tbody>
                </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div><br><br>
      <!--Drink Menu area end-->


    <!--Dessert menu area start-->
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">DESSERT</h5>

              <div style="width:auto; height:200px; overflow:auto;">
              <table class="table table-sm bg-dark">
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
                      //essential data coming from foodtabledate.php include file
                      include("includes/foodtabledata.php");
                    ?> 
                </tbody>
              </table>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!--Dessert menu area end-->

    <!--Various menu area start-->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">Various</h5>

              <div style="width:auto; height:200px; overflow:auto;">
              <table class="table table-sm bg-dark">
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
                      $Result = mysqli_query($db,"SELECT * FROM foods WHERE ftype='various'");
                      //essential data coming from foodtabledate.php include file
                      include("includes/foodtabledata.php");
                    ?> 
                </tbody>
              </table>
              </div>

            </div>
          </div>
        </div>
      </div></div>
      <!--Various menu area end-->