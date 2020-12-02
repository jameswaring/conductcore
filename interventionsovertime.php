<?php

// shows interventions over time. Written by James Waring

    session_start();
    ob_start();
    include 'includes/analysisscripts.php';
    if(!isset($_SESSION['loggedIn'])){
        header("Location: index.php");
        die();
    }
    else if(!isset($_SESSION['loggedStudent'])){
            header("Location: nostudent.php");
            die();
    }
    else if(negPoints($_SESSION['loggedStudent']['studentID'])==0){
      // No interventions recorded
      header("Location: nostudentinc.php");
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
    ?>
</head>
<body>
<div class="content">
<?php
    loadMenu();
?>
<h1>Interventions</h1>

<div class="datawrapper">
  <div class="dataitem">
    <div class="textareatitle">Intervention Overview</div>
    <?php
    echo("<textarea>");
      $incidents = getAllInterventions($_SESSION['loggedStudent']['studentID']);
      foreach($incidents as $items){
        echo("\n");
        echo($items['date']." - ");
        echo($items['comments']);
        echo("\n");
      }
      echo("</textarea>");
    ?>
  </div>
  <div class="dataitem">
    <?php
      $behaviours = interventionsByDate($_SESSION['loggedStudent']['studentID']);
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
    <div>
    <canvas id="line-chart" height="400"></canvas>
    </div>
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
            label: "interventions",
            borderColor: "#3e95cd",
            fill: false
          }
        ]
      },
      options: {
        responsive: true, 
        maintainAspectRatio: false,
        title: {
          display: true,
          text: 'Interventions over time'
        }
      }
    });

    </script>
    </div>
</div>

<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>