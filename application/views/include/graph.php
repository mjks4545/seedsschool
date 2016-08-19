<script>
    $(function () {
        var lineChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines:true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.1)",
            //Number - Width of the grid lines
            scaleGridLineWidth:1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.5,
            //Boolean - Whether to show a dot for each point
            pointDot: true,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 5,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill:true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvas = $("#visitorpm").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var lineChart = new Chart(lineChartCanvas);

        var lineChartData = {
            /* labels: [ <?php foreach($month as $v_m)
            { echo '"'.$v_m.'",'; } ?>  ]*/
            labels :["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
            datasets: [
                {
                    label: "Visitors per Month",
                    fillColor: "rgba(11, 114, 112,0.5)",
                    strokeColor: "rgba(11, 114, 112,0.5)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($num_v as $v_n)
            { echo '"'.$v_n.'",'; } ?>
                    ]
                }
            ]
        };


        //Create the line chart
        lineChart.Line(lineChartData,lineChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#visitorpm").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = lineChartOptions;
        lineChartOptions.datasetFill = true;
        lineChart.Line(lineChartData, lineChartOptions);

    // ***********for student********************************************************
        var lineChartCanvas = $("#studentpm").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var lineChart = new Chart(lineChartCanvas);

        var lineChartData = {
            labels :["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
            datasets: [
                {
                    label: "Student per Month",
                    fillColor: "rgba(150, 150,122, 0.5)",
                    strokeColor: "rgba(150, 150,122, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($num_spm as $spm)
            { echo '"'.$spm.'",'; } ?>
                    ]
                }
            ]
        };

       //Create the line chart
        lineChart.Line(lineChartData,lineChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#studentpm").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = lineChartOptions;
        lineChartOptions.datasetFill = true;
        lineChart.Line(lineChartData, lineChartOptions);
/* FOR VISITOR PER YEARS**********************************************************/
        var lineChartCanvas = $("#visitorpy").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var lineChart = new Chart(lineChartCanvas);

        var lineChartData = {
            labels :[
                <?php
                 $year = date("Y")-9;
                 $cyear = date("Y");
                for($y=$year; $y<=$cyear; $y++){
                 echo '"'.$y.'",';
                }
             ?> ],
            datasets: [
                {
                    label: "Visitors Per Year",
                    fillColor: "rgba(0, 250,122, 0.5)",
                    strokeColor: "rgba(0,250,122, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($vpy as $vpr_n)
            { echo '"'.$vpr_n.'",'; } ?>
                    ]
                }
            ]
        };

        //Create the line chart
        lineChart.Line(lineChartData,lineChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#visitorpy").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = lineChartOptions;
        lineChartOptions.datasetFill = true;
        lineChart.Line(lineChartData, lineChartOptions);

/**************************student per Year*************************************/
        var lineChartCanvas = $("#studentpy").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var lineChart = new Chart(lineChartCanvas);

        var lineChartData = {
            labels :[
                <?php
                 $year = date("Y")-9;
                 $cyear = date("Y");
                for($y=$year; $y<=$cyear; $y++){
                 echo '"'.$y.'",';
                }
             ?> ],
            datasets: [
                {
                    label: "Students Per Year",
                    fillColor: "rgba(0,0,122, 0.5)",
                    strokeColor: "rgba(0,0,122,0.5)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($spy as $spr_n)
            { echo '"'.$spr_n.'",'; } ?>
                    ]
                }
            ]
        };

        //Create the line chart
        lineChart.Line(lineChartData,lineChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#studentpy").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = lineChartOptions;
        lineChartOptions.datasetFill = true;
        lineChart.Line(lineChartData, lineChartOptions);

/**************************student fee month*************************************/
        var lineChartCanvas = $("#studentmfee").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var lineChart = new Chart(lineChartCanvas);

        var lineChartData = {
            labels :["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],

            datasets: [
                {
                    label: "Students Fee Per Month",
                    fillColor: "rgba(0,0,122, 0.5)",
                    strokeColor: "rgba(0,0,122,0.5)",
                    pointColor: "rgba(0,0, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($studentfee['paid'] as $p_fee)
            { echo '"'.$p_fee.'",'; } ?>
                    ]
                },
                {
                    label: "Students Fee Per Month",
                    fillColor: "rgba(255,0,1, 0.5)",
                    strokeColor: "rgba(255,0,1,0.5)",
                    pointColor: "rgba(255, 1, 1, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($studentfee['unpaid'] as $up_fee)
            { echo '"'.$up_fee.'",'; } ?>
                    ]
                }
            ]
        };

        //Create the line chart
        lineChart.Line(lineChartData,lineChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#studentmfee").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = lineChartOptions;
        lineChartOptions.datasetFill =false;
        lineChart.Line(lineChartData, lineChartOptions);
/**************************student otherfee month*************************************/
        var lineChartCanvas = $("#studentmotherfee").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var lineChart = new Chart(lineChartCanvas);

        var lineChartData = {
            labels :["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],

            datasets: [
                {
                    label: "Students Fee Per Month",
                    fillColor: "rgba(0,0,122, 0.5)",
                    strokeColor: "rgba(0,0,122,0.5)",
                    pointColor: "rgba(0,0, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($studentotherfee['paid'] as $p_fee)
            { echo '"'.$p_fee.'",'; } ?>
                    ]
                },
                {
                    label: "Students Other Fee Per Month",
                    fillColor: "rgba(255,0,1, 0.5)",
                    strokeColor: "rgba(255,0,1,0.5)",
                    pointColor: "rgba(255, 1, 1, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($studentotherfee['unpaid'] as $up_fee)
            { echo '"'.$up_fee.'",'; } ?>
                    ]
                }
            ]
        };

        //Create the line chart
        lineChart.Line(lineChartData,lineChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#studentmotherfee").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = lineChartOptions;
        lineChartOptions.datasetFill =false;
        lineChart.Line(lineChartData, lineChartOptions);
//----------------- student fee per year-------------------------------
        var lineChartCanvas = $("#yearlyfee").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var lineChart = new Chart(lineChartCanvas);

        var lineChartData = {
            labels :[
                <?php
                 $year = date("Y")-9;
                 $cyear = date("Y");
                for($y=$year; $y<=$cyear; $y++){
                 echo '"'.$y.'",';
                }
             ?>
            ],

            datasets: [
                {
                    label: "Students Fee Per Year",
                    fillColor: "rgba(0,0,122, 0.5)",
                    strokeColor: "rgba(0,0,122,0.5)",
                    pointColor: "rgba(0,0, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($yearlyfee['paid'] as $p_fee)
            { echo '"'.$p_fee.'",'; } ?>
                    ]
                },
                {
                    label: "Students Other Fee Per Month",
                    fillColor: "rgba(255,0,1, 0.5)",
                    strokeColor: "rgba(255,0,1,0.5)",
                    pointColor: "rgba(255, 1, 1, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($yearlyfee['unpaid'] as $up_fee)
            { echo '"'.$up_fee.'",'; } ?>
                    ]
                }
            ]
        };

        //Create the line chart
        lineChart.Line(lineChartData,lineChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#yearlyfee").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = lineChartOptions;
        lineChartOptions.datasetFill =false;
        lineChart.Line(lineChartData, lineChartOptions);
//----------------- student other fee per year-------------------------------
        var lineChartCanvas = $("#yearlyotherfee").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var lineChart = new Chart(lineChartCanvas);

        var lineChartData = {
            labels :[
                <?php
                 $year = date("Y")-9;
                 $cyear = date("Y");
                for($y=$year; $y<=$cyear; $y++){
                 echo '"'.$y.'",';
                }
             ?>
            ],

            datasets: [
                {
                    label: "Students Other Fee Per Year",
                    fillColor: "rgba(0,0,122, 0.5)",
                    strokeColor: "rgba(0,0,122,0.5)",
                    pointColor: "rgba(0,0, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($yearlyotherfee['paid'] as $p_fee)
            { echo '"'.$p_fee.'",'; } ?>
                    ]
                },
                {
                    label: "Students Other Fee Per Month",
                    fillColor: "rgba(255,0,1, 0.5)",
                    strokeColor: "rgba(255,0,1,0.5)",
                    pointColor: "rgba(255, 1, 1, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($yearlyotherfee['unpaid'] as $up_fee)
            { echo '"'.$up_fee.'",'; } ?>
                    ]
                }
            ]
        };

        //Create the line chart
        lineChart.Line(lineChartData,lineChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#yearlyotherfee").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = lineChartOptions;
        lineChartOptions.datasetFill =false;
        lineChart.Line(lineChartData, lineChartOptions);
    //-----------------------monthly  report****************************************
        var lineChartCanvas = $("#reportpm").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var lineChart = new Chart(lineChartCanvas);

        var lineChartData = {
            labels :["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],

            datasets: [
                {
                    label: "Income Per Month",
                    fillColor: "rgba(0,0,122, 0.5)",
                    strokeColor: "rgba(0,0,122,0.5)",
                    pointColor: "rgba(0,0, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($monthly_report['monthly_income'] as $income)
            { echo '"'.$income.'",'; } ?>
                    ]
                },
                {
                    label: "Expenses Per Month",
                    fillColor: "rgba(255,0,1, 0.5)",
                    strokeColor: "rgba(255,0,1,0.5)",
                    pointColor: "rgba(255, 1, 1, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($monthly_report['monthly_expense'] as $expense)
            { echo '"'.$expense.'",'; } ?>
                    ]
                }
            ]
        };

        //Create the line chart
        lineChart.Line(lineChartData,lineChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#reportpm").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = lineChartOptions;
        lineChartOptions.datasetFill =false;
        lineChart.Line(lineChartData, lineChartOptions);
/*end of monthly financial report*/

        //----------------- financial report per year-------------------------------
        var lineChartCanvas = $("#reportpy").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var lineChart = new Chart(lineChartCanvas);

        var lineChartData = {
            labels :[
                <?php
                 $year = date("Y")-9;
                 $cyear = date("Y");
                for($y=$year; $y<=$cyear; $y++){
                 echo '"'.$y.'",';
                }
             ?>
            ],

            datasets: [
                {
                    label: "yearly Income",
                    fillColor: "rgba(0,0,122, 0.5)",
                    strokeColor: "rgba(0,0,122,0.5)",
                    pointColor: "rgba(0,0, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($yearly_report['yearly_income'] as $yi)
            { echo '"'.$yi.'",'; } ?>
                    ]
                },
                {
                    label: "Yearly Expenses",
                    fillColor: "rgba(255,0,1, 0.5)",
                    strokeColor: "rgba(255,0,1,0.5)",
                    pointColor: "rgba(255, 1, 1, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        <?php foreach($yearly_report['yearly_expense'] as $ye)
            { echo '"'.$ye.'",'; } ?>
                    ]
                }
            ]
        };

        //Create the line chart
        lineChart.Line(lineChartData,lineChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#reportpy").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = lineChartOptions;
        lineChartOptions.datasetFill =false;
        lineChart.Line(lineChartData, lineChartOptions);

        //--------------------------------- END OF ALL FUNCTION
    });
</script>