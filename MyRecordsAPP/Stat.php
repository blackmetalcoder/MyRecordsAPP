<!DOCTYPE html>
<html lang="sv-SE">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stats</title>
    <link href="Content/jqm-icon-pack-fa.css" rel="stylesheet" />
    <link href="Content/App.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>

<body>
        <script>
            $(document).on("ready", function (event) {
                var chart = new CanvasJS.Chart("chartContainer",
	{
	    title: {
	        text: "Desktop Search Engine Market Share, Dec-2012"
	    },
	    animationEnabled: true,
	    legend: {
	        verticalAlign: "center",
	        horizontalAlign: "left",
	        fontSize: 20,
	        fontFamily: "Helvetica"
	    },
	    theme: "theme2",
	    data: [
		{
		    type: "pie",
		    indexLabelFontFamily: "Garamond",
		    indexLabelFontSize: 20,
		    indexLabel: "{label} {y}%",
		    startAngle: -20,
		    showInLegend: true,
		    toolTipContent: "{legendText} {y}%",
		    dataPoints: [
				{ y: 83.24, legendText: "Google", label: "Google" },
				{ y: 8.16, legendText: "Yahoo!", label: "Yahoo!" },
				{ y: 4.67, legendText: "Bing", label: "Bing" },
				{ y: 1.67, legendText: "Baidu", label: "Baidu" },
				{ y: 0.98, legendText: "Others", label: "Others" }
		    ]
		}
	    ]
	});
                chart.render();
           

        </script>
        
            <div id="chartContainer" style="height: 300px; width: 500px;"></div>
            <br />


</body>
</html>