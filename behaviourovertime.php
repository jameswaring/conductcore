<?php
    session_start();
    ob_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: index.php");
        die();
    }
    else if(!isset($_SESSION['loggedStudent'])){
            header("Location: nostudent.php");
            die();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        include 'includes/head.php';
        include_once 'includes/analysisscripts.php';
    ?>
</head>
<body>
<div class="content">
<?php
include 'includes/teachermenu.php';
?>
<h1>Behaviour Points</h1>

<?php
    
?>

<p class="welcome-message">Below is a breakdown of the behaviour points over time
</p>

<?php
	$behaviours = behaviourByDate($_SESSION['loggedStudent']['studentID']);
  // php arrays to JSON
  var_dump($behaviours);
	$behaviourLabels = json_encode($behTypes, TRUE); 
	$behaviourValues = json_encode($behValues, TRUE);
?>

<canvas id="line-chart" width="800" height="450"></canvas>

<script>
// parse to js
var strLabels = <?php echo($behaviourLabels); ?>;
var strValues = <?php echo($behaviourValues); ?>;

// parse as array
//var arrLables = JSON.parse(strLables);
//var arrValues = JSON.parse(strValues);
console.log(strLabels, strValues)

new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ["September", "October", "November", "December", "January", "February", "March", "April", "May", "June", "July"],
    datasets: [{ 
        data: [0, 3, 5, 6, 3, 2, 4, 5, 6, 9, 4],
        label: "incidents",
        borderColor: "#3e95cd",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Behaviour incidents over time'
    }
  }
});

</script>

<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>