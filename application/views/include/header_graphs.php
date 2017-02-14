<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seeds School of Excellence in Education and Developmental Studies</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/public/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/iCheck/flat/blue.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables/dataTables.bootstrap.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fullcalendar/fullcalendar.print.css" media="print">

    <link href="<?= site_url() ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= site_url() ?>public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?= site_url() ?>public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--<link href="<?= site_url() ?>public/assets/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="<?= site_url() ?>public/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">-->
    <!--<link href="<?= site_url() ?>public/assets/style.css" rel="stylesheet">-->
    <!-- scripts -->
    <!--<script src="<?= site_url() ?>public/assets/js/jquery-3.1.0.min.js"></script>-->
    <!--<script src="<?= site_url() ?>public/assets/js/bootstrap.min.js"></script>-->
    <script type="text/javascript">
        window.onload = function () {
          // ---------------------------------------------------------------------
            // Show course completed teacher wise  
          var charts = new CanvasJS.Chart("chartsContainer",
          {
            title:{
              text: "Course Complete VS Time Taken"    
            },
            axisY2: {
              title:"Course Completed"
            },
            animationEnabled: true,
            axisY: {
              title: "Time Taken in Weeks"
            },
            axisX :{
              title: "Classes",  
              labelFontSize: 12
            },
            legend: {
              verticalAlign: "bottom"
            },
            data: [

            {        
              type: "bar",  
              showInLegend: true, 
              legendText: "Course Completed",
              dataPoints: [      
              { x: 10, y: 98,  label: "A Level Maths" },
              { x: 20, y: 90,  label: "A Level Physics"},
              { x: 30, y: 90,   label: "O Level Maths"},
              { x: 40, y: 80,  label: "O Level Physics"},
              { x: 50, y: 50,   label: "O Level Pak Studeis"},
              { x: 60, y: 20,  label: "O Level History"},
              { x: 70, y: 60,   label: "O Level TNT"},
              { x: 80, y: 41,  label: "O Level Geo"}


              ]
            },
            {        
              type: "bar",  
              axisYType: "secondary",
              showInLegend: true,
              legendText: "Time Taken in Weeks",
              dataPoints: [      
              { x: 10, y:90, label: "A Level Maths" },
              { x: 20, y:80, label: "A Level Physics"},
              { x: 30, y:20 , label: "O Level Maths"},
              { x: 40, y:10 , label: "O Level Physics"},
              { x: 50, y:30 , label: "O Level Pak Studeis"},
              { x: 60, y:20, label: "O Level History"},
              { x: 70, y:30, label:"O Level TNT"},
              { x: 80, y:60, label:"O Level Geo"}


              ]
            }

            ],
            legend: {
              cursor:"pointer",
              itemclick : function(e){
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                  e.dataSeries.visible = false;
                }
                else{
                  e.dataSeries.visible = true;
                }
                charts.render();
              }
            }
          });
        charts.render();
        charts = {};
            // Show course completed teacher wise
        // ---------------------------------------------------------------------
         
        // ---------------------------------------------------------------------
            // techer wise class strenth
        var chart_class_strength = new CanvasJS.Chart("chart_class_strength",
                {
                        title:{
                                text: "Below Avg Classes"             
                        },
                        axisY:{
                                title: "Class Strenth"
                        },
                        axisX:{
                                title: "Teachers"
                        },
                        animationEnabled: true,
                        toolTip:{
                                shared: true,
                                content: "{name}: {y} "
                        },
                        data:[
                        {        
                                type: "stackedBar100",
                                showInLegend: true, 
                                name: "Olevel",
                                dataPoints: [
                                        {y: 600, label: "Ayaz Ahmad" },
                                        {y: 400, label: "Iftikhar Hussain" },
                                        {y: 120, label: "Huma" },
                                        {y: 250, label: "Shahid Bangash" },
                                        {y: 120, label: "Abdul Baseer" },
                                        {y: 374, label: "Sumera Shabnum" },
                                        {y: 350, label: "Wasif Naeem" }
                                ]
                        },
                        {        
                                type: "stackedBar100",
                                showInLegend: true, 
                                name: "A2 Level",
                                dataPoints: [
                                        {y: 400, label: "Ayaz Ahmad" },
                                        {y: 500, label: "Iftikhar Hussain" },
                                        {y: 220, label: "Huma" },
                                        {y: 350, label: "Shahid Bangash" },
                                        {y: 220, label: "Abdul Baseer" },
                                        {y: 474, label: "Sumera Shabnum" },
                                        {y: 450, label: "Wasif Naeem" }
                                ]
                        }, 
                        {        
                                type: "stackedBar100",
                                showInLegend: true, 
                                name: "As Level",
                                dataPoints: [
                                        {y: 300, label: "Ayaz Ahmad" },
                                        {y: 610, label: "Iftikhar Hussain" },
                                        {y: 215, label: "Huma" },
                                        {y: 221, label: "Shahid Bangash" },
                                        {y: 75, label:  "Abdul Baseer" },
                                        {y: 310, label: "Sumera Shabnum" },
                                        {y: 340, label: "Wasif Naeem" }
                                ]
                        },  
                        {        
                                type: "stackedBar100",
                                showInLegend: true, 
                                name: "O2 Level",
                                dataPoints: [
                                        {y: 300, label: "Ayaz Ahmad" },
                                        {y: 610, label: "Iftikhar Hussain" },
                                        {y: 215, label: "Huma" },
                                        {y: 221, label: "Shahid Bangash" },
                                        {y: 75, label:  "Abdul Baseer" },
                                        {y: 310, label: "Sumera Shabnum" },
                                        {y: 340, label: "Wasif Naeem" }
                                ]
                        }  
                        ]
                });
                chart_class_strength.render();
                chart_class_strength = {};
                
            // techer wise class strenth
        // ---------------------------------------------------------------------
        
        // ---------------------------------------------------------------------
            // defaulters - list of bad paying students 15 in numbers
            
            var dps = [
        {label: "Ahmad", y: 125}    ,
        {label: "Adil", y: 332},
        {label: "Zakir", y: 55},
        {label: "Zeshan", y: 46},
        {label: "Salman", y: 32}
        ];
        var totalEmployees = "total people on campus: 590";

        var chart = new CanvasJS.Chart("chartContainer",{
            theme: "theme2",
            title:{ 
                text: "List of Defaulters"
            },
            axisY: {                
                title: "Amount Due in Rs",
                                suffix: " Rs"
            },                  
            axisX: {                
                title: "Students Names",
                                suffix: " Rs"
            },                  
            legend:{
                verticalAlign: "top",
                horizontalAlign: "centre",
                fontSize: 18

            },
            data : [{
                type: "column",
                showInLegend: true,
                legendMarkerType: "none",               
                legendText: totalEmployees,
                indexLabel: "{y}",
                dataPoints: dps
            }]
        });

        // renders initial chart
        chart.render();
            // defaulters - list of bad paying students 15 in numbers
        // ---------------------------------------------------------------------
        // ---------------------------------------------------------------------
            // List of good payers
            
            var dataChartContainer = new CanvasJS.Chart("dataChartContainer",
            {
                    animationEnabled: true,
                    title:{
                            text: "List of Good Paying Customers"
                    },
                    axisY: {                
                            title: "Amount Paid in Rs",
                            suffix: " Rs"
                    },                  
                    axisX: {                
                            title: "Students Names",
                            suffix: " Rs"
                    },
                    data: [
                    {
                            type: "column", //change type to bar, line, area, pie, etc
                            dataPoints: [
                                    { label: "Arshid", y: 3000 },
                                    { label: "Hassan", y: 4000 },
                                    { label: "Imran",  y: 5000 },                                    
                                    { label: "Khan",   y: 6000 },
                                    { label: "Jan",    y: 4000 }
                            ]
                    }
                    ]
                    });

            dataChartContainer.render();    
            dataChartContainer = {};
            // list of good payers
        // ---------------------------------------------------------------------
        // ---------------------------------------------------------------------
            // defaulters - list of bad paying students since subject wise
            
            var dataChart1Container = new CanvasJS.Chart("dataChart1Container",
            {
                    animationEnabled: true,
                    title:{
                            text: "List of Defaulter 1 Subject Wise"
                    },
                    axisY: {                
                            title: "Amount Due in Rs",
                            suffix: " Rs"
                    },                  
                    axisX: {                
                            title: "Subject Names",
                    },
                    data: [
                    {
                            type: "column", //change type to bar, line, area, pie, etc
                            dataPoints: [
                                    <?php
                                    $i=1; 
                                    foreach ( $defaulters_subject_wise as $student ) {
                                        echo '{ label: "' . $student['su_name'] . '", y: ' . $student['remaning_fee'] . ' },';
                                        $i++;
                                    }
                                    ?>
                            ]
                    }
                    ]
                    });

            dataChart1Container.render();    
            dataChart1Container = {};
            // defaulters - list of bad paying students 15 in numbers
        // ---------------------------------------------------------------------
        // ---------------------------------------------------------------------
            // defaulters - list of bad paying students since Teacher wise
            
            var data1ChartContainer = new CanvasJS.Chart("data1ChartContainer",
            {
                    animationEnabled: true,
                    title:{
                            text: "List of Defaulter Teacher Wise"
                    },
                    axisY: {                
                            title: "Amount Due in Rs",
                            suffix: " Rs"
                    },                  
                    axisX: {                
                            title: "Teacher Names"
                    },
                    data: [
                    {
                            type: "column", //change type to bar, line, area, pie, etc
                            dataPoints: [
                                    { label: "Iftikhar Hussain", y: 18 },
                                    { label: "Shahid Bangash", y: 29 },
                                    { label: "Wasif Naeem",  y: 40 },                                    
                                    { label: "Adbul Baseer",  y: 34 },
                                    { label: "Sumera Shabnam",  y: 24 }
                            ]
                    }
                    ]
                    });

            data1ChartContainer.render();    
            data1ChartContainer = {};
            // defaulters - list of bad paying students since Teacher wise
        // ---------------------------------------------------------------------
        
        
        // ---------------------------------------------------------------------
            // attandance weekly report
            
            var attandance_weekly = new CanvasJS.Chart("attandance_weekly",
            {
        animationEnabled: true,
        title:{
            text: "Weekly Attandance Report"
        },
                axisY: {                
                        title: "Attandance in Percent",
                        suffix: "%"
                },                  
                axisX: {                
                        title: "Class Names"
                },
        data: [
        {
            type: "column", //change type to bar, line, area, pie, etc
            dataPoints: [
                { label: "Maths O Level", y: 18 },
                { label: "English A Level", y: 29 },
                { label: "Urdu AS",  y: 40 },                                    
                { label: "Arabic",  y: 34 },
                { label: "Nust",  y: 24 }
            ]
        }
        ]
        });

            attandance_weekly.render();
            attandance_weekly = {};
            // attandance weekly report
        // ---------------------------------------------------------------------
        // ---------------------------------------------------------------------
            // attandance daily report
            
            var attandance_daily = new CanvasJS.Chart("attandance_daily",
            {
        animationEnabled: true,
        title:{
            text: "Daily Attandance Report"
        },
                axisY: {                
                        title: "Attandance in Percent",
                        suffix: "%"
                },                  
                axisX: {                
                        title: "Class Names"
                },
        data: [
        {
            type: "column", //change type to bar, line, area, pie, etc
            dataPoints: [
                { label: "Maths O Level", y: 18 },
                { label: "English A Level", y: 29 },
                { label: "Urdu AS",  y: 40 },                                    
                { label: "Arabic",  y: 34 },
                { label: "Nust",  y: 24 }
            ]
        }
        ]
        });

            attandance_daily.render();
            attandance_daily = {};
            // attandance daily report
        // ---------------------------------------------------------------------
        
        // ---------------------------------------------------------------------
             // discount Given - Teacher Wise
             var chart_discount = new CanvasJS.Chart("discountChartContainer",
                {
                  title:{
                  text: "Discount Given to Students"   
                  },
                  animationEnabled: true,
                  axisX:{
                    title: "Teacher"
                  },
                  axisY:{
                    title: "Amount"
                  },
                  data: [
                  {        
                    type: "stackedColumn100",
                    toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}",
                    name: "Not able to Pay",
                    showInLegend: "true",
                    dataPoints: [
                    {  y: 40, label: "Rizwan"},
                    {  y: 10, label: "Bilal" },
                    {  y: 72, label: "Abdul Baser" },
                    {  y: 30, label: "Bangash" },
                    {  y: 21, label: "Jameel"}                
                    ]
                  }, {        
                    type: "stackedColumn100",
                    toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}",
                    name: "Inteligent",
                    showInLegend: "true",
                    dataPoints: [
                    {  y: 20, label: "Rizwan"},
                    {  y: 14, label: "Bilal" },
                    {  y: 40, label: "Abdul Baser" },
                    {  y: 43, label: "Bangash" },
                    {  y: 17, label: "Jameel"}                
                    ]
                  },{        
                    type: "stackedColumn100",        
                    toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}",
                    name: "Deserves it",
                    showInLegend: "true",
                    dataPoints: [
                    {  y: 20, label: "Rizwan"},
                    {  y: 14, label: "Bilal" },
                    {  y: 40, label: "Abdul Baser" },
                    {  y: 43, label: "Bangash" },
                    {  y: 17, label: "Jameel"}                
                    ]
                  },{        
                    type: "stackedColumn100",
                    toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}",
                    name: "Needy",
                    showInLegend: "true",
                    dataPoints: [
                    {  y: 20, label: "Rizwan"},
                    {  y: 14, label: "Bilal" },
                    {  y: 40, label: "Abdul Baser" },
                    {  y: 43, label: "Bangash" },
                    {  y: 17, label: "Jameel"}                
                    ]
                  },{        
                    type: "stackedColumn100",
                    toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}",
                    name: "Not Willing to Pay",
                    showInLegend: "true",
                    dataPoints: [
                    {  y: 20, label: "Rizwan"},
                    {  y: 14, label: "Bilal" },
                    {  y: 40, label: "Abdul Baser" },
                    {  y: 43, label: "Bangash" },
                    {  y: 17, label: "Jameel"}                
                    ]
                  }

                  ]
                });

                chart_discount.render();
                chart_discount = {};
            // discount Given - Teacher Wise
        // ---------------------------------------------------------------------
        
        // ---------------------------------------------------------------------
            // Student registraion weekly
            var noDeactiveCharts = new CanvasJS.Chart("noDeactiveCharts",
            {
        animationEnabled: true,
        title:{
            text: "Student registration weekly "
        },
                axisY: {                
                        title: "Attandance in Percent",
                        suffix: "%"
                },                  
                axisX: {                
                        title: "Class Names"
                },
        data: [
        {
            type: "column", //change type to bar, line, area, pie, etc
            dataPoints: [
                { label: "O Level Maths", y: 18 },
                { label: "A Level Maths", y: 29 },
                { label: "As Maths",  y: 40 },                                    
                { label: "A2 Geography",  y: 34 },
                { label: "O Level History",  y: 24 }
            ]
        }
        ]
        });

                noDeactiveCharts.render();
                noDeactiveCharts = {};
            // Student registraion weekly
        // ---------------------------------------------------------------------
        
        // ---------------------------------------------------------------------
            // no of active and deactive students
            var chart_another = new CanvasJS.Chart("chart_another",
        {
            theme: "theme3",
                        animationEnabled: true,
            title:{
                text: "No of active and deactive student weekly",
                fontSize: 30
            },
            toolTip: {
                shared: true
            },          
            axisY: {
                title: "No of Students"
            },
            axisX: {
                title: "Classes"
            },          
            data: [ 
            {
                type: "column", 
                name: "Active Students",
                legendText: "Active Students",
                showInLegend: true, 
                dataPoints:[
                {label: "O level Maths", y: 262},
                {label: "A Level Maths", y: 211},
                {label: "As Maths", y: 175},
                {label: "As English", y: 137},
                {label: "A2 TNT", y: 115},
                {label: "A3 Art And Design", y: 104},
                {label: "O Level Urdu", y: 97.8},
                {label: "O Level Accounting", y: 60},
                {label: "As Biology", y: 23.3},
                {label: "A2 English", y: 20.4}


                ]
            },
            {
                type: "column", 
                name: "Deactive Students",
                legendText: "Deactive Students",
                axisYType: "secondary",
                showInLegend: true,
                dataPoints:[
                {label: "O level Maths", y: 11.15},
                {label: "A Level Maths", y: 2.5},
                {label: "As Maths", y: 3.6},
                {label: "As English", y: 4.2},
                {label: "A2 TNT", y: 2.6},
                {label: "A3 Art And Design", y: 2.7},
                {label: "O Level Urdu", y: 3.1},
                {label: "O Level Accounting", y: 10.23},
                {label: "As Biology", y: 10.3},
                {label: "A2 English", y: 4.3}


                ]
            }
            
            ],
                    legend:{
                      cursor:"pointer",
                      itemclick: function(e){
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                          e.dataSeries.visible = false;
                        }
                        else {
                          e.dataSeries.visible = true;
                        }
                          chart_another.render();
                      }
                    }
                  });

                chart_another.render();
            // no of active and deactive students
        // ---------------------------------------------------------------------
        
        // ---------------------------------------------------------------------
            // Institue Wise Break Up
            var institue_break_up = new CanvasJS.Chart("institue_break_up",
            {
                    title:{
                            text: "Institue Wise Break Up"
                    },     
                    animationEnabled: true,     
                    data: [
                    {        
                            type: "doughnut",
                            startAngle: 60,                          
                            toolTipContent: "{legendText}: {y} - <strong>#percent% </strong>",                  
                            showInLegend: true,
                            dataPoints: [
                                    {y: 50, indexLabel: "Beakan House #percent%", legendText: "Beakan House" },
                                    {y: 40, indexLabel: "Roots #percent%", legendText: "Roots" },
                                    {y: 30,  indexLabel: "Aisha #percent%", legendText: "Aisha" },          
                                    {y: 30,  indexLabel: "LMS #percent%", legendText: "LMS" }           
                            ]
                    }
                    ]
            });
            institue_break_up.render();
            institue_break_up = {};
            // Institue Wise Break Up
        // ---------------------------------------------------------------------
        
        // ---------------------------------------------------------------------
            // O level and A level Students
            var olevel_alevel = new CanvasJS.Chart("olevel_alevel",
        {
            title:{
                text: "O level and A level Students"
            },
                        animationEnabled: true,
            theme: "theme2",
            data: [
            {        
                type: "doughnut",
                indexLabelFontFamily: "Garamond",       
                indexLabelFontSize: 20,
                startAngle:0,
                indexLabelFontColor: "dimgrey",       
                indexLabelLineColor: "darkgrey", 
                toolTipContent: "{legendText} : {y} %",
                                showInLegend: true,

                dataPoints: [
                {  y: 60, indexLabel: "O Level {y}%", legendText: "O Level" },
                {  y: 40, indexLabel: "A Level {y}%", legendText: "A Level" }
                ]
            }
            ]
        });

        olevel_alevel.render();
                olevel_alevel = {};
            // O level and A level Students
        // ---------------------------------------------------------------------
        // ---------------------------------------------------------------------
            // Paid and Unpaid Students
            var total_paid_unpaid = new CanvasJS.Chart("total_paid_unpaid",
        {
            title:{
                text: "Paid and Unpaid Students"
            },
                        animationEnabled: true,
            theme: "theme2",
            data: [
            {        
                type: "doughnut",
                indexLabelFontFamily: "Garamond",       
                indexLabelFontSize: 20,
                startAngle:0,
                indexLabelFontColor: "dimgrey",       
                indexLabelLineColor: "darkgrey", 
                toolTipContent: "{legendText} : {y} %",
                                showInLegend: true,

                dataPoints: [
                {  y: 60, indexLabel: "Paid {y}%", legendText: "Paid" },
                {  y: 40, indexLabel: "UnPaid {y}%", legendText: "UnPaid" }
                ]
            }
            ]
        });

        total_paid_unpaid.render();
                total_paid_unpaid = {};
            // Paid and Unpaid Students
        // ---------------------------------------------------------------------
        // ---------------------------------------------------------------------
            // Meeting with 20 parents
            var meeting_parents = new CanvasJS.Chart("meeting_parents",
        {
            title:{
                text: "Meeting with 20 parents"
            },
                        animationEnabled: true,
            theme: "theme2",
            data: [
            {        
                type: "doughnut",
                indexLabelFontFamily: "Garamond",       
                indexLabelFontSize: 20,
                startAngle:0,
                indexLabelFontColor: "dimgrey",       
                indexLabelLineColor: "darkgrey", 
                toolTipContent: "{legendText} : {y} %",
                                showInLegend: true,

                dataPoints: [
                {  y: 60, indexLabel: "Called Parents {y}%", legendText: "Called Parents" },
                {  y: 30, indexLabel: "Already Meet {y}%", legendText: "Already Meet" },
                {  y: 10, indexLabel: "Pending {y}%", legendText: "Pending" },
                {  y: 20, indexLabel: "Not Came {y}%", legendText: "Not Came" },
                {  y: 20, indexLabel: "Not Responded {y}%", legendText: "Not Responded" }
                ]
            }
            ]
        });

        meeting_parents.render();
                meeting_parents = {};
            // Meeting with 20 parents
        // ---------------------------------------------------------------------
        
      };
</script>
    <script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php $session = $this->session->userdata('session_data');
    $id = $session['id'];
    $role = $session['role']; ?>
    <header class="main-header">
        <!-- Logo -->
        <?php if ($role == "admin" || $role=="teacher") { ?>
            <a href="<?php echo site_url() ?>admin/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>S</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Seeds School Of</b>Exellence</span>
            </a>

        <?php }
        if ($role == "receptionist") { ?>
            <a href="<?php echo site_url() ?>reception/index" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>S</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Seeds School Of</b>Exellence</span>
            </a>
        <?php } ?>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php if ($role == "admin") { ?>
                        <li role="presentation">
                            <a href="<?= site_url() ?>graphical">Home</a>
                        </li>
                        <li role="presentation">
                            <a href="<?= site_url() ?>visitor/index">Visitor
                                <span class="badge">
                         <?php echo $this->visitor_m->unviewed_visitors(); ?>
                        </span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="<?= site_url() ?>events/">Calander</a>
                        </li>
                    <?php } ?>

                    <li class="dropdown user user-menu">
                        <a href="<?php echo base_url('home/logout'); ?>">
                  <span class="hidden-xs">
                  <?php if ($this->session->userdata('session_data')) { ?>
                      <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                  <?php } ?>
                  </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <script>
        $(function () {
            $("#example1").DataTable({
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });
        });
    </script>