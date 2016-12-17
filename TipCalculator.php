<DOCTYPE! html>
<html>
<head>
<title> Tip Calculator </title>
</head>
<div id="Calculator">
<body>
  <h1> Tip Calculator </h1>
  <form method = "post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Bill Subtotal: <input type="number" step = "any" name ="subtotal"> <br>
    Split: <input type = "number" name="split"><br>
    Tip percentage: <input type="radio" name ="tip" value = .05>5%
    <input type= "radio" name ="tip" value = .1> 10%
    <input type="radio" name = "tip" value = .15> 15%
    <br>
    Submit: <input type="submit" name="submit" value ="Submit">

    <?php
      $subtotal = 0;
      $percentage = 0;
      $split = 0;

      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $subtotal = $_POST["subtotal"];
        $percentage = $_POST["tip"];
        $split = $_POST["split"];
      }
    ?>

    <br>

    <h1> Output </h1>
    <?php
    if ($subtotal < 0){
      echo "Cannot compute value";
    }
    else{
      if ($split < 0){
        echo "Cannot have negative split";
      }
      else{
        $tip = $subtotal * $percentage;
        $total = $subtotal + $tip;
        echo "Tip: $".round($tip, 2);
        if ($split > 1){
          echo "<br>";
          $totaleach = $total/$split;
          $split1 = $tip/$split;
          echo "Tip each: $".round($split1,2);
          echo "<br>";
          echo "Total each: $".round($totaleach, 2);
        }
        echo "<br>";
        echo "Total: $".round($total, 2);
      }
    }
    ?>
  </form>
</body>
</div>
</html>
