<?php
    session_start();
    ob_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: index.php");
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        include 'includes/head.php';
        include 'includes/menuloader.php';
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

<p class="welcome-message">Below is a breakdown of the behaviour points recorded this year
</p>

<?php
	$behaviours = orderByTypeWhole();
	$behTypes = array();
	$behValues = array();
	foreach($behaviours as $item){
		$behTypes[] = $item["type"];
		$behValues[] = intval($item["count(*)"]);
	}
	// php arrays to JSON
	$behaviourLabels = json_encode($behTypes, TRUE); 
	$behaviourValues = json_encode($behValues, TRUE);
?>

<canvas id="pie-chart" width="800" height="450"></canvas>

<script>
// parse to js
var strLabels = <?php echo($behaviourLabels); ?>;
var strValues = <?php echo($behaviourValues); ?>;

// parse as array
//var arrLables = JSON.parse(strLables);
//var arrValues = JSON.parse(strValues);
console.log(strLabels, strValues)

new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: strLabels,
      datasets: [{
        label: "Incident Type",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "dfea3b", "eaaf3b", "808080"],
        data: strValues,
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Breakdown of incident types for the whole school'
      }
    }
});

</script>

<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>