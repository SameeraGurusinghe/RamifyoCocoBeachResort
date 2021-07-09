<?php

class db{

    var $con;
    public function connect(){
        $this->con=mysqli_connect("localhost","root","","ramifyohotel");
        return $this->con;
    }
}

?>