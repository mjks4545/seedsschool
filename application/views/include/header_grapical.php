<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seeds School of Excellence in Education and Developmental Studies</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
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
        <?php
                $active    = '';
                $deactive  = '';
                foreach( $active_deactive_students as $student ){
                    $active_std = ( isset( $student['active_number_stds'] )) ? $student['active_number_stds'] : 0;
                    $deactive_std = ( isset( $student['deactive_number_stds'] )) ? $student['deactive_number_stds'] : 0;
                    $active   .= '{label: "' . $student['class'] . '", y: ' . $active_std . ' },';
                    $deactive .= '{label: "' . $student['class'] . '", y: ' . $deactive_std . ' },';
                }
        ?>
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
            // defaulters - list of bad paying students 15 in numbers
            
            var dps = [
                <?php 
                
                foreach( $result as $student ){
                    echo '{label: "' . $student['student_name'] . '", y: ' . $student['remaning_fee'] . '},';
                }
                ?>
		
		];
		var totalEmployees = "Total Number students with remaning balance : <?= $count?>";

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
				// indexLabel: "{y}",
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
                                <?php
                                
                                foreach( $good_paying as $student ){
                                    echo '{ label: "' . $student['name'] . '", y: ' . $student['amount'] . ' },';
                                }
                                
                                ?>
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
                                    <?php
                                    foreach ( $defaulters_subject_wise as $student ) {
                                        echo '{ label: "' . $student['su_name'] . '", y: ' . $student['remaning_fee'] . ' },';
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
            // Class strength below avg
            
            var chart_class_strength = new CanvasJS.Chart("chart_class_strength",
            {
                    animationEnabled: true,
                    title:{
                            text: "Class strenght below avg (<?= $below_avg_classes['avg']; ?>)"
                    },
                    axisY: {				
                            title: "Class strenght"
                    },					
                    axisX: {				
                            title: "Subject Names"
                    },
                    data: [
                    {
                            type: "column", //change type to bar, line, area, pie, etc
                            dataPoints: [
                                <?php 
                                $i = 1;
                                foreach ( $below_avg_classes as $student ) {
                                    if( $below_avg_classes['avg'] > $student['sum'] && $student['sum'] != 0 ){
                                        echo '{ label: "' . $student['co_name'] . ' - ' . $student['su_name'] . '", y: ' . $student['sum'] . ' },';
                                        $i++;
                                        if( $i == 15 ){
                                            break;
                                        }
                                    }
                                 } 
                                 
                                 ?>
                            ]
                    }
                    ]
                    });

            chart_class_strength.render();    
            chart_class_strength = {};
            // defaulters - list of bad paying students 15 in numbers
        // ---------------------------------------------------------------------
        // ---------------------------------------------------------------------
            // defaulters - list of bad paying students since subject wise
            
            var dataChartContainersince = new CanvasJS.Chart("dataChartContainersince",
            {
                    animationEnabled: true,
                    title:{
                            text: "List of Defaulter Since"
                    },
                    axisY: {				
                            title: "Time the Amount is Due From",
                            suffix: " d"
                    },					
                    axisX: {				
                            title: "Student Name"
                    },
                    data: [
                    {
                            type: "column", //change type to bar, line, area, pie, etc
                            dataPoints: [
                                    <?php
                                    $i = 1;
                                    foreach ( $list_of_defaulters_since as $student ) {
                                        echo '{ label: "' . $student['name'] . '", y: ' . $student['date_diff'] . ' },';
                                        if($i == 15){
                                            break;
                                        }
                                        $i++;
                                    }
                                    ?>
                            ]
                    }
                    ]
                    });

            dataChartContainersince.render();    
            dataChartContainersince = {};
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
                                    <?php
                                    foreach ( $teacher_vise as $student ) {
                                        echo '{ label: "' . $student['t_name'] . '", y: ' . $student['remaning_fee'] . ' },';
                                    }
                                    ?>
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
        			text: "Montly Attandance Report"
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
                        <?php 
                            
                            foreach ($weekly_attandance as $value) {
                                
                                echo '{ label: "' . $value['class_name'] . '", y: ' . $value['per'] . ' },';

                            }

                        ?>
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
				<?php 
                    foreach ($daily_attandance as $value) {
                        echo '{ label: "' . $value['class_name'] . '", y: ' . $value['per'] . '},';
                    }
				?>
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
                        title: "No of Students",
                },					
                axisX: {				
                        title: "Class Names"
                },
		data: [
		{
			type: "column", //change type to bar, line, area, pie, etc
			dataPoints: [
                <?php 
                    foreach( $student_registration_weekly as $student ){
                        echo '{ label: "' . $student['class'] . '", y: ' . $student['number_stds'] . ' },';
                    } 
                ?>
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
				fontSize: 25
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
				    <?= $active; ?>
				]
			},
			{
				type: "column",	
				name: "Deactive Students",
				legendText: "Deactive Students",
				axisYType: "secondary",
				showInLegend: true,
				dataPoints:[
				    <?= $deactive; ?>

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
            var break_even_students = new CanvasJS.Chart("break_even_students",
        {
            title:{
                text: "Break Even Student Wise"
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
                {  y: <?= $break_even_money['student_per'] ?>, indexLabel: "Registered {y}%", legendText: "Registered <?= $break_even_money['student_registered'] ?>" },
                {  y: <?= $break_even_money['student_per_required'] ?>, indexLabel: "Required {y}%", legendText: "Required <?= $break_even_money['student_required'] ?>" }
                ]
            }
            ]
        });

            break_even_students.render();
            break_even_students = {};
            // O level and A level Students
        // ---------------------------------------------------------------------
        // ---------------------------------------------------------------------
            // O level and A level Students
            var break_even_money = new CanvasJS.Chart("break_even_money",
        {
            title:{
                text: "Break Even Money Wise"
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
                {  y: <?= $break_even_money['student_per'] ?>, indexLabel: "Registered {y}%", legendText: "Registered 600000" },
                {  y: <?= $break_even_money['student_per_required'] ?>, indexLabel: "Required {y}%", legendText: "Required 100000" }
                ]
            }
            ]
        });

            break_even_money.render();
            break_even_money = {};
            // O level and A level Students
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
				{  y: <?= $level_break_up['olevel']?>, indexLabel: "O Level {y}%", legendText: "O Level" },
				{  y: <?= $level_break_up['alevel']?>, indexLabel: "A Level {y}%", legendText: "A Level" }
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
				{  y: <?= $paid_unpaid_students['paid'] ?>, indexLabel: "Paid {y}%", legendText: "Paid" },
				{  y: <?= $paid_unpaid_students['unpaid'] ?>, indexLabel: "UnPaid {y}%", legendText: "UnPaid" }
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
  //           var meeting_parents = new CanvasJS.Chart("meeting_parents",
		// {
		// 	title:{
		// 		text: "Meeting with 20 parents"
		// 	},
  //                       animationEnabled: true,
		// 	theme: "theme2",
		// 	data: [
		// 	{        
		// 		type: "doughnut",
		// 		indexLabelFontFamily: "Garamond",       
		// 		indexLabelFontSize: 20,
		// 		startAngle:0,
		// 		indexLabelFontColor: "dimgrey",       
		// 		indexLabelLineColor: "darkgrey", 
		// 		toolTipContent: "{legendText} : {y} %",
  //                               showInLegend: true,

		// 		dataPoints: [
		// 		{  y: 60, indexLabel: "Called Parents {y}%", legendText: "Called Parents" },
		// 		{  y: 30, indexLabel: "Already Meet {y}%", legendText: "Already Meet" },
		// 		{  y: 10, indexLabel: "Pending {y}%", legendText: "Pending" },
		// 		{  y: 20, indexLabel: "Not Came {y}%", legendText: "Not Came" },
		// 		{  y: 20, indexLabel: "Not Responded {y}%", legendText: "Not Responded" }
		// 		]
		// 	}
		// 	]
		// });

		// meeting_parents.render();
  //               meeting_parents = {};
            // Meeting with 20 parents
        // ---------------------------------------------------------------------
        
      };
    </script>
    <!--<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
    <script src="<?= site_url(); ?>public/assets/canvas.js"></script>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php $session = $this->session->userdata('session_data');
    $id = $session['id'];
    $role = $session['role']; ?>
    <header class="main-header">
        <!-- Logo -->
        <?php if ($role == "admin" || $role=="teacher" || $role=="director" ) { ?>
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
                <!-- ------------------------------------------------------------ -->
                    <li class="dropdown notifications-menu" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-warning"><?= $notifications['count'] + $notifications['p_count']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have <?= $notifications['count'] + $notifications['p_count']; ?> notifications</li>
                          <li>
                            <a href="<?= site_url(); ?>director/read_student_notifications">
                              <i class="fa fa-users text-aqua"></i> <?= $notifications['count']; ?> Students Registered.
                            </a>
                          </li>
                          <li>
                            <a href="<?= site_url(); ?>director/read_payment_notifications">
                              <i class="fa fa-shopping-cart text-green"></i> <?= $notifications['p_count'] ?> Students paid Fee
                            </a>
                          </li>
                          <!-- <li>
                            <a href="#">
                              <i class="fa fa-warning text-yellow"></i> For student Deactivation
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="fa fa-users text-red"></i> For mark as left
                            </a>
                          </li>
                          
                          <li>
                            <a href="#">
                              <i class="fa fa-user text-red"></i> For attendence
                            </a>
                          </li> -->
                      <li class="footer"><a href="#">View all</a></li>
                    </ul>
                  </li>
                    <!-- ------------------------------------------------------------ -->
                    <?php if ($role == "admin" || $role=="director" ) { ?>
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
    