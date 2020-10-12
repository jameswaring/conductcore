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
        include 'includes/menuloader.php';
        include 'includes/findpupilbyid.php';
        include 'includes/responsibilitysearch.php';
        include 'includes/analysisscripts.php';
    ?>
</head>
<body>
<div class="content">
<?php
    loadMenu();
?>
<h1>Behaviour Points</h1>

<?php
    
?>

<p class="welcome-message">Below is a breakdown of the behaviour points over time
</p>

<?php
  $behaviours = behaviourByDate($_SESSION['loggedStudent']['studentID']);
  // php arrays to JSON
  $behTypes = array();
	$behValues = array();
	foreach($behaviours as $item){
    $behTypes[] = $item["monthname(`date`)"];
	  $behValues[] = intval($item["freq"]);
  }
	$behaviourLabels = json_encode($behTypes, TRUE); 
	$behaviourValues = json_encode($behValues, TRUE);
?>

<canvas id="line-chart" width="800" height="450"></canvas>

<script>
// parse to js
var strLabels = <?php echo($behaviourLabels); ?>;
var strValues = <?php echo($behaviourValues); ?>;

var months = ["August", "September", "October", "November", "December", "January", "February", "March", "April", "May", "June", "July"];
var values = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
for(var i = 0; i < strLabels.length; i++){
  var a = months.indexOf(strLabels[i])
  values[a] = strValues[i]
}
console.log(values)
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: months,
    datasets: [{ 
        data: values,
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