<?php

$dataPoints = array(
    array("label"=> "A⁺ᵛᵉ", "y"=> 90),
    array("label"=> "A⁻ᵛᵉ", "y"=> 261),
    array("label"=> "B⁺ᵛᵉ", "y"=> 158),
    array("label"=> "B⁻ᵛᵉ", "y"=> 72),
    array("label"=> "O⁺ᵛᵉ", "y"=> 191),
    array("label"=> "O⁻ᵛᵉ", "y"=> 573),
    array("label"=> "AB⁺ᵛᵉ", "y"=> 126),    
    array("label"=> "AB⁻ᵛᵉ", "y"=> 126)
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp"/>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="stats.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
    <div class="bbms">

    <?php
        include_once("../left.php");        
    ?>    
<stats>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    title:{
        text: "Blood Group Statistics"
    },
    subtitles: [{
        text: "Blood Available"
    }],
    data: [{
        type: "pie",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - #percent%",
        yValueFormatString: "฿#,##0",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>
</stats>
<div id="chartContainer"></div>

<?php
        include_once("../right.php");        
    ?>
        
    </div>
    <!---------------------- order.js must be before script.js -------------->
    <script src="../script.js"></script> 
</body>
</html>

