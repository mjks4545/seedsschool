<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
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
		{label: "Ahmad", y: 125}	,
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
                            text: "List of Defaulter Subject Wise"
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
                                    { label: "Maths", y: 18 },
                                    { label: "Bio", y: 29 },
                                    { label: "History",  y: 40 },                                    
                                    { label: "Geography",  y: 34 },
                                    { label: "Urdu",  y: 24 }
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
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?= site_url() ?>public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?= site_url() ?>public/dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?= site_url() ?>public/dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?= site_url() ?>public/dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?= site_url() ?>public/dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= site_url() ?>public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?= site_url() ?>public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Inline Charts
            <small>multiple types of charts</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Charts</a></li>
            <li class="active">Inline Charts</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
              <div class="col-md-4">
                <div id="chartContainer" style="height:300px; width:100%;">
                </div>
            </div>
            <div class="col-md-4">
                <div id="chartsContainer" style="height: 300px; width: 100%;">
                </div>
            </div>
            <div class="col-md-4">
                <div id="chart_class_strength" style="height: 300px; width: 100%;">
                </div>
            </div>
          </div><br>
          <div class="row">
              <div class="col-md-4">
                    <div id="dataChartContainer" style="height: 300px; width: 100;">
                    </div>
              </div>
              <div class="col-md-4">
                    <div id="dataChart1Container" style="height: 300px; width: 100;">
                    </div>
              </div>
              <div class="col-md-4">
                    <div id="data1ChartContainer" style="height: 300px; width: 100;">
                    </div>
              </div>
          </div><br>
          <div class="row">
            <div class="col-md-4">
              <!-- attandance weekly -->
              <div id="attandance_daily" style="height: 360px; width: 100%;">
              </div>
            </div>
            <div class="col-md-4">
              <!-- attandance daily -->
              <div id="attandance_weekly" style="height: 360px; width: 100%;">
              </div>
            </div>
            <div class="col-md-4">
                <div id="discountChartContainer" style="height: 360px; width: 100%;">
                </div>
            </div>
          </div><br>
          <div class="row">
              <div class="col-md-4">
                <div id="noDeactiveCharts" style="height: 300px; width: 100%;"></div>
              </div>
              <div class="col-md-4">
                <div id="chart_another" style="height: 300px; width: 100%;"></div>
              </div>
              <div class="col-md-4">
                <div id="meeting_parents" style="height: 300px; width: 100%;"></div>
              </div>
          </div><br>
          <div class="row">
            <div class="col-md-4">
                <div id="olevel_alevel" style="height: 300px; width: 100%;"></div>
            </div>  
            <div class="col-md-4">
                <div id="total_paid_unpaid" style="height: 300px; width: 100%;"></div>
            </div>
            <div class="col-md-4">
                <div id="institue_break_up" style="height: 300px; width: 100%;"></div>
            </div>  
          </div><br>
          <!-- row -->
          <div class="row">
            <div class="col-md-4">
              <!-- jQuery Knob -->
              <div class="box box-solid">
                <div class="box-header">
                  <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title">Break Even Progress</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-6 text-center">
                      <input type="text" class="knob" value="30" data-width="90" data-height="90" data-fgColor="#00a65a"/>
                      <div class="knob-label">Calculated By the help of %</div>
                    </div><!-- ./col -->
                  </div><!-- /.row -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">  </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
      
      <!-- Control Sidebar -->      
      <aside class="control-sidebar control-sidebar-dark">
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?= site_url() ?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= site_url() ?>public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?= site_url() ?>public/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
     <!-- moris -->
    <script src="<?= site_url() ?>public/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?= site_url() ?>public/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?= site_url() ?>public/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= site_url() ?>public/dist/js/demo.js" type="text/javascript"></script>
    <!-- jQuery Knob -->
    <script src="<?= site_url() ?>public/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?= site_url() ?>public/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        /* jQueryKnob */

        $(".knob").knob({
          /*change : function (value) {
           //console.log("change : " + value);
           },
           release : function (value) {
           console.log("release : " + value);
           },
           cancel : function () {
           console.log("cancel : " + this.value);
           },*/
          draw: function () {

            // "tron" case
            if (this.$.data('skin') == 'tron') {

              var a = this.angle(this.cv)  // Angle
                      , sa = this.startAngle          // Previous start angle
                      , sat = this.startAngle         // Start angle
                      , ea                            // Previous end angle
                      , eat = sat + a                 // End angle
                      , r = true;

              this.g.lineWidth = this.lineWidth;

              this.o.cursor
                      && (sat = eat - 0.3)
                      && (eat = eat + 0.3);

              if (this.o.displayPrevious) {
                ea = this.startAngle + this.angle(this.value);
                this.o.cursor
                        && (sa = ea - 0.3)
                        && (ea = ea + 0.3);
                this.g.beginPath();
                this.g.strokeStyle = this.previousColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                this.g.stroke();
              }

              this.g.beginPath();
              this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
              this.g.stroke();

              this.g.lineWidth = 2;
              this.g.beginPath();
              this.g.strokeStyle = this.o.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
              this.g.stroke();

              return false;
            }
          }
        });
        /* END JQUERY KNOB */

        //INITIALIZE SPARKLINE CHARTS
        $(".sparkline").each(function () {
          var $this = $(this);
          $this.sparkline('html', $this.data());
        });

        /* SPARKLINE DOCUMENTAION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
        drawDocSparklines();
        drawMouseSpeedDemo();

      });
      function drawDocSparklines() {

        // Bar + line composite charts
        $('#compositebar').sparkline('html', {type: 'bar', barColor: '#aaf'});
        $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
                {composite: true, fillColor: false, lineColor: 'red'});


        // Line charts taking their values from the tag
        $('.sparkline-1').sparkline();

        // Larger line charts for the docs
        $('.largeline').sparkline('html',
                {type: 'line', height: '2.5em', width: '4em'});

        // Customized line chart
        $('#linecustom').sparkline('html',
                {height: '1.5em', width: '8em', lineColor: '#f00', fillColor: '#ffa',
                  minSpotColor: false, maxSpotColor: false, spotColor: '#77f', spotRadius: 3});

        // Bar charts using inline values
        $('.sparkbar').sparkline('html', {type: 'bar'});

        $('.barformat').sparkline([1, 3, 5, 3, 8], {
          type: 'bar',
          tooltipFormat: '{{value:levels}} - {{value}}',
          tooltipValueLookups: {
            levels: $.range_map({':2': 'Low', '3:6': 'Medium', '7:': 'High'})
          }
        });

        // Tri-state charts using inline values
        $('.sparktristate').sparkline('html', {type: 'tristate'});
        $('.sparktristatecols').sparkline('html',
                {type: 'tristate', colorMap: {'-2': '#fa7', '2': '#44f'}});

        // Composite line charts, the second using values supplied via javascript
        $('#compositeline').sparkline('html', {fillColor: false, changeRangeMin: 0, chartRangeMax: 10});
        $('#compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
                {composite: true, fillColor: false, lineColor: 'red', changeRangeMin: 0, chartRangeMax: 10});

        // Line charts with normal range marker
        $('#normalline').sparkline('html',
                {fillColor: false, normalRangeMin: -1, normalRangeMax: 8});
        $('#normalExample').sparkline('html',
                {fillColor: false, normalRangeMin: 80, normalRangeMax: 95, normalRangeColor: '#4f4'});

        // Discrete charts
        $('.discrete1').sparkline('html',
                {type: 'discrete', lineColor: 'blue', xwidth: 18});
        $('#discrete2').sparkline('html',
                {type: 'discrete', lineColor: 'blue', thresholdColor: 'red', thresholdValue: 4});

        // Bullet charts
        $('.sparkbullet').sparkline('html', {type: 'bullet'});

        // Pie charts
        $('.sparkpie').sparkline('html', {type: 'pie', height: '1.0em'});

        // Box plots
        $('.sparkboxplot').sparkline('html', {type: 'box'});
        $('.sparkboxplotraw').sparkline([1, 3, 5, 8, 10, 15, 18],
                {type: 'box', raw: true, showOutliers: true, target: 6});

        // Box plot with specific field order
        $('.boxfieldorder').sparkline('html', {
          type: 'box',
          tooltipFormatFieldlist: ['med', 'lq', 'uq'],
          tooltipFormatFieldlistKey: 'field'
        });

        // click event demo sparkline
        $('.clickdemo').sparkline();
        $('.clickdemo').bind('sparklineClick', function (ev) {
          var sparkline = ev.sparklines[0],
                  region = sparkline.getCurrentRegionFields();
          value = region.y;
          alert("Clicked on x=" + region.x + " y=" + region.y);
        });

        // mouseover event demo sparkline
        $('.mouseoverdemo').sparkline();
        $('.mouseoverdemo').bind('sparklineRegionChange', function (ev) {
          var sparkline = ev.sparklines[0],
                  region = sparkline.getCurrentRegionFields();
          value = region.y;
          $('.mouseoverregion').text("x=" + region.x + " y=" + region.y);
        }).bind('mouseleave', function () {
          $('.mouseoverregion').text('');
        });
      }

      /**
       ** Draw the little mouse speed animated graph
       ** This just attaches a handler to the mousemove event to see
       ** (roughly) how far the mouse has moved
       ** and then updates the display a couple of times a second via
       ** setTimeout()
       **/
      function drawMouseSpeedDemo() {
        var mrefreshinterval = 500; // update display every 500ms
        var lastmousex = -1;
        var lastmousey = -1;
        var lastmousetime;
        var mousetravel = 0;
        var mpoints = [];
        var mpoints_max = 30;
        $('html').mousemove(function (e) {
          var mousex = e.pageX;
          var mousey = e.pageY;
          if (lastmousex > -1) {
            mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
          }
          lastmousex = mousex;
          lastmousey = mousey;
        });
        var mdraw = function () {
          var md = new Date();
          var timenow = md.getTime();
          if (lastmousetime && lastmousetime != timenow) {
            var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
            mpoints.push(pps);
            if (mpoints.length > mpoints_max)
              mpoints.splice(0, 1);
            mousetravel = 0;
            $('#mousespeed').sparkline(mpoints, {width: mpoints.length * 2, tooltipSuffix: ' pixels per second'});
          }
          lastmousetime = timenow;
          setTimeout(mdraw, mrefreshinterval);
        };
        // We could use setInterval instead, but I prefer to do it this way
        setTimeout(mdraw, mrefreshinterval);
      }


    </script>

  </body>
</html>
