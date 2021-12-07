<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeric/1.2.6/numeric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.16.1/vis.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="js/anychart-base.min.js"></script>
    <script src="js/anychart-ui.min.js"></script>
    <script src="js/anychart-exports.min.js"></script>
    <script src="js/regression.min.js"></script>
</head>
<body>
    <div class="w-75 mx-auto"><br><br>
        <div class="w-50 mx-auto"><!--float-left">-->
            <div class="w-100 btn btn-success active">
            Wykres rozrzutu oraz regresji liniowej
            </div><br><br>
        </div>
    </div>
    <div style="display: block; width:90%; margin: 0 auto;">
        <div id='Wykres'><!-- Tu będzie wykres --></div>
    </div> 

    <script>//regresja liniowa
var rawData = [
<?php
  for($i=0;$i<$count;$i++){
    for($i=0;$i<$count;$i++){
        echo "[", $axisX[$i],",", $axisY[$i], "],";
    }
}
?>
/*
  [6,6],

  [2,3],

  [3,4],
 

  [4,9],

  [5,10]
  ,
[0.1, 2.1],
[1, 2.4],
[2, 2.6],
[4, 2.8],
[5, 3],
[0.1, 2.1],
[1, 2.7],
[1, 3.6],
[1, 3.8],
[2, 3],  
[0.1, 2.1],
[3, 2.4],
[3, 2.6],
[3, 2.8],
[4, 3],  
[0.1, 2.1],
[4, 2.4],
[4, 2.6],
[5, 2.8],
[6, 3],
[7, 2.4],
[7, 2.6],
[7, 2.8],
[7, 3],  
[7.1, 4.1],
[7, 5.4],
[7, 5.6],
[7, 5.8],*/
];

console.log(rawData);
//getting the regression object the type of regression depends on the experimental data
var result = regression('linear', rawData);

//get coefficients from the calculated formula
var coeff = result.equation;

anychart.onDocumentReady(function () {

var data_1 = rawData;
var data_2 = setTheoryData(rawData);

chart = anychart.scatter();

chart.title("The calculated formula: " + result.string + "\nThe coefficient of determination (R2): " + result.r2.toPrecision(2));

chart.legend(true);

// creating the first series (marker) and setting the experimental data
var series1 = chart.marker(data_1);
series1.name("Experimental data");

// creating the second series (line) and setting the theoretical data
var series2 = chart.line(data_2);
series2.name("Theoretically calculated data");
series2.markers(true);

chart.container("Wykres");
chart.draw();
});

//input X and calculate Y using the formula found this works with all types of regression
function formula(coeff, x) {
var result = null;
for (var i = 0, j = coeff.length - 1; i < coeff.length; i++, j--) {
  result += coeff[i] * Math.pow(x, j);
}
return result;
}

//setting theoretical data array of [X][Y] using experimental X coordinates this works with all types of regression
function setTheoryData(rawData) {
var theoryData = [];
for (var i = 0; i < rawData.length; i++) {
  theoryData[i] = [rawData[i][0], formula(coeff, rawData[i][0])];
}
return theoryData;
}
</script>
</body>
</html>