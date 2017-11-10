<?php 
/**
    * Template Name: test 123
    */
?>
<?php get_header() ?>

<a href="#" class="btn btn-primary">Go to bottom</a>
<div class="container">
  <h2>HELLO THERE</h2>    
   <form action = "<?php $_PHP_SELF ?>" method = "POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name = "name" id="name" placeholder="Enter your name"/>
    </div>
    <div class="form-group">
      <label for="num">Number:</label>
      <input type="number" class="form-control" name = "num" id="num" placeholder="Enter number"/>
    </div>

         <b>Name: </b><input type = "text" name = "name"  class="form-control" /> <br/>
         <b>Enter number:</b> <input type = "text" name = "num"  class="form-control" />  </br>
     <button type="submit" class="btn btn-primary">Submit</button>
         
      </form>
      


<div class="card" style="width: 50rem;">
  <img class="card-img-top" src="" alt=Result/>
  <div class="card-body">
      <h4 class="card-title"><b>Result</b></h4>
    <p class="card-text">
<?php

function printFibonacci($n)
 {
  $first = 0;
  $second = 1;
 
  echo "Fibonacci Series \n";
 
  echo $first.' '.$second.' ';
 
  for($i = 2; $i < $n; $i++){
 
    $third = $first + $second;
 
    echo $third.' ';
 
    $first = $second;
    $second = $third;
 
    }
}
  
if( isset($_POST["name"]) || isset($_POST["num"]) ) {
      echo "Welcome ". $_POST['name']. "<br />";
      echo "You enter ". $_POST['num']. "<br />.";
      $val1 = htmlentities($_POST['num']);
      printFibonacci($val1);     
  
 } 


 ?>
        
</p>
    <a href="#" class="btn btn-primary">Go Back</a>
  </div>
</div>

  <?php get_footer() ?>