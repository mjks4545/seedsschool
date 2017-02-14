var Events = function(){
    
    // -------------------------------------------------------------------------
    
    this.__construct = function(){
        
		Template = new Template;
        console.log('events created');
		add_another_subject();
		get_teacher();
		student_class_fee();
		student_class_fee_total();
		student_class_fee_total1();
		student_fee_paid();
		admission_fee_paid();

    };
    
    // -------------------------------------------------------------------------
    
    var get_teacher = function(){
	
		$(document).on( 'change', '.subonchange', function(){
		    var $this    = $(this);
		    var data     = $this.val();
		    var url      = $('#url').val() + '/class_c/get_teacher/' + data;
		    $.get(url, '', function(o){
			var $output = '';
			$output  += '<option value="#">Select Teacher</option>';
			$.each( o.data, function( index, element ){
			    $output  += '<option value="' + element.id + '">' + element.name + '</option>';
			});
			var $id = '#teacher_' + $this.attr('id');
			$($id).html($output);
		    });
		});
    };
    
    // -------------------------------------------------------------------------
    
    var add_another_subject = function(){
		$('#add-another').on('click',function(e){ 
		    
		    e.preventDefault();
		    var url      = $('#url').val() + '/class_c/get_subject';
		    var counter  = $('#counter').val();
			counter++;
			$('#counter').val(counter);		
			
			$.get( url, '', function(o){
			    
			    var $output   = '<div class="col-md-12">';
			    $output   = '<div class="form-group has-feedback col-md-3">';
			    $output  += '<label for="exampleInputEmail1">Time</label>';
			    $output  += '<input type="text" name="time_' + counter + '" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Time Like 10:00 - 11:00 AM" required />';
			    $output  += '<span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>';
			    $output  += '<span class="help-block with-errors" style="margin-left:10px; "></span>';
			    $output  += '</div>';
			    $output  += '<div class="form-group has-feedback col-md-3">';
			    $output  += '<label for="exampleInputEmail1">Fee</label>';
			    $output  += '<input type="text" name="fee_' + counter + '" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Subject Fee Like 6000" required />';
			    $output  += '<span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>';
			    $output  += '<span class="help-block with-errors" style="margin-left:10px; "></span>';
			    $output  += '</div>';
			    $output  += '<div class="form-group has-feedback col-md-3">';
			    $output  += '<label for="exampleInputEmail1">Subject</label>';
			    $output  += '<select type="text" name="subject_' + counter + '" class="form-control subonchange" maxlength="50" minlength="3" id="' + counter + '" placeholder="Select Subject" required >';
			    $output  += '<option>Select Subject</option>';
			    
			    $.each( o.data, function( index, element ){
				$output  += '<option value="' + element.su_id + '">' + element.su_name + '</option>';
			    });
			    
			    $output  += '</select>';
			    $output  += '<span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>';
			    $output  += '<span class="help-block with-errors" style="margin-left:10px; "></span>';
			    $output  += '</div>';
			    $output  += '<div class="form-group has-feedback col-md-2">';
			    $output  += '<label for="exampleInputEmail1">Teacher</label>';
			    $output  += '<select type="text" name="teacher_' + counter + '" class="form-control teacher-get" id="teacher_' + counter + '" maxlength="50" minlength="3" placeholder="Select Teacher" required >';
			    $output  += '<option>Select Subject</option>';
			    $output  += '</select>';
			    $output  += '<span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>';
			    $output  += '<span class="help-block with-errors" style="margin-left:10px; "></span>';
			    $output  += '</div>';
			    $output  += '<div class="form-group has-feedback col-md-1">';
			    $output  += '</div>';
			    $output  += '</div>';
			    $('#subject-add').append( $output );
			    
			} );
		    
			
		    
		});
    };
    
    // -------------------------------------------------------------------------
    
    var student_class_fee = function(){
		$(".concession").keyup(function () {
		    var $id = $(this).attr('id');
		    var topay = $("#subject_fee_" + $id ).val() - $(this).val();
		    $("#fee_pay_" + $id ).val(topay);
		});
    }
    
    // -------------------------------------------------------------------------
    
    var student_class_fee_total = function(){
	
	$('.concession').keyup(function () {
	    
	    var admission = $('#add_fee').val();
	    var counter   = $('#counter').val();
	    var $addition = 0;
	    console.log(counter);
	    for( $i = 1; $i <= counter ; $i++){
		console.log('hi');
		$addition = parseInt( $addition ) + parseInt( $('#fee_pay_' + $i).val() ); 
		
	    }
	    console.log($addition);
	    var addition  =  parseInt( admission ) + $addition;
	    $('#total_fee').val( addition );
	    
	});
	
    }
    
    // -------------------------------------------------------------------------
    
    var student_class_fee_total1 = function(){
	
		$('#add_fee').keyup(function () {
		    
		    var admission = $('#add_fee').val();
		    var counter   = $('#counter').val();
		    var $addition = 0;
		    console.log(counter);
		    for( $i = 1; $i <= counter ; $i++){
			console.log('hi');
			$addition = parseInt( $addition ) + parseInt( $('#fee_pay_' + $i).val() ); 
			
		    }
		    console.log($addition);
		    var addition  =  parseInt( admission ) + $addition;
		    $('#total_fee').val( addition );
		    
		});
	
    };
    
    // -------------------------------------------------------------------------

    var student_fee_paid = function(){

    	$('.amount_paid').keyup(function(){

    		var $id                 = $(this).attr('id');
    		var $amount_to_be_paid  = $('#' + $id + '_student_fee').val();
    		var $amount_paid        = $(this).val();
    		var $balance            = $('#fee_pay_' + $id );
    		var $balance_value      = $amount_to_be_paid - $amount_paid;
    		$balance_value          = $balance_value - $( '#' + $id + '_discount' ).val();
    		var $total_paid         = $('#total_paid_fee').val();
    		var $total_remaning     = $('#total_ramaining_fee').val();
    		var $sum                = 0;	
    		var $balance_to_be_paid = 0;
    		var $counter           = $('#counter').val();
    		$balance.val( $balance_value );
    		for( i = 1; i <= $counter; i++  ){
    			$sum                    = $sum + parseInt( $( '#' + i ).val() );
    			$balance_to_be_paid     = $balance_to_be_paid + parseInt( $( '#fee_pay_' + i ).val() );
    		}
    		$sum = $sum + parseInt( $( '#admission_fee_paid' ).val() );
    		if( $('#admission_fee_due').length != 0 ){
    			var $admission_fee_due   = $('#admission_fee_due').val();
    			var $remaning            = $admission_fee_due - $( '#admission_fee_paid' ).val();
    			$remaning                = $remaning - $( '#admission_fee_paid_discount' ).val();
    			$( '#admission_fee_balance' ).val( $remaning );
	    		$balance_to_be_paid = $balance_to_be_paid + parseInt ( $remaning );
    		}
    		$('#total_paid_fee').val( $sum );
    		$('#total_ramaining_fee').val( $balance_to_be_paid );
    	});

    	$('.amount_paid_discount').keyup(function(){

    		var $id                 = $(this).attr('id');
    		$id                     = $id.replace("_discount", "");    
    		var $amount_to_be_paid  = $( '#' + $id + '_student_fee').val();
    		var $amount_paid        = $( '#' + $id ).val();
    		var $balance            = $('#fee_pay_' + $id );
    		var $balance_value      = $amount_to_be_paid - $amount_paid;
    		$balance_value          = $balance_value - $( '#' + $id + '_discount' ).val();
    		var $total_paid         = $('#total_paid_fee').val();
    		var $total_remaning     = $('#total_ramaining_fee').val();
    		var $sum                = 0;	
    		var $balance_to_be_paid = 0;
    		var $counter           = $('#counter').val();
    		$balance.val( $balance_value );
    		for( i = 1; i <= $counter; i++  ){
    			$sum                    = $sum + parseInt( $( '#' + i ).val() );
    			$balance_to_be_paid     = $balance_to_be_paid + parseInt( $( '#fee_pay_' + i ).val() );
    		}
    		$sum = $sum + parseInt( $( '#admission_fee_paid' ).val() );
    		if( $('#admission_fee_due').length != 0 ){
    			var $admission_fee_due   = $('#admission_fee_due').val();
    			var $remaning            = $admission_fee_due - $( '#admission_fee_paid' ).val();
    			$remaning                = $remaning - $( '#admission_fee_paid_discount' ).val();
    			$( '#admission_fee_balance' ).val( $remaning );
	    		$balance_to_be_paid = $balance_to_be_paid + parseInt ( $remaning );
    		}
    		$('#total_paid_fee').val( $sum );
    		$('#total_ramaining_fee').val( $balance_to_be_paid );
    	});

    };

    // ---------------------------------------------------------------------------

    var admission_fee_paid = function(){

    	$('#admission_fee_paid').keyup(
    			
    			function(){
    				var $admission_fee_due   = $('#admission_fee_due').val();
    				var $counter             = $('#counter').val();
    				var $sum                 = 0;	
    				var $balance_to_be_paid  = 0;
    				var $remaning            = $admission_fee_due - $( '#admission_fee_paid' ).val();
    				$remaning                = $remaning - $( '#admission_fee_paid_discount' ).val()
    				for( i = 1; i <= $counter; i++  ){
		    			$sum                    = $sum + parseInt( $( '#' + i ).val() );
		    			$balance_to_be_paid     = $balance_to_be_paid + parseInt( $( '#fee_pay_' + i ).val() );
		    		}
		    		$( '#admission_fee_balance' ).val( $remaning );
		    		$balance_to_be_paid = $balance_to_be_paid + parseInt ( $remaning ); 
		    		$sum = $sum + parseInt( $( '#admission_fee_paid' ).val() );
		    		$( '#total_paid_fee' ).val( $sum );
		    		$( '#total_ramaining_fee' ).val( $balance_to_be_paid );

    			}

    		);
    	$('#admission_fee_paid_discount').keyup(
    			
    			function(){
    				var $admission_fee_due   = $('#admission_fee_due').val();
    				var $counter             = $('#counter').val();
    				var $sum                 = 0;	
    				var $balance_to_be_paid  = 0;
    				var $remaning            = $admission_fee_due - $( '#admission_fee_paid' ).val();
    				$remaning                = $remaning - $( '#admission_fee_paid_discount' ).val()
    				for( i = 1; i <= $counter; i++  ){
		    			$sum                    = $sum + parseInt( $( '#' + i ).val() );
		    			$balance_to_be_paid     = $balance_to_be_paid + parseInt( $( '#fee_pay_' + i ).val() );
		    		}
		    		$( '#admission_fee_balance' ).val( $remaning );
		    		$balance_to_be_paid = $balance_to_be_paid + parseInt ( $remaning ); 
		    		$sum = $sum + parseInt( $( '#admission_fee_paid' ).val() );
		    		$( '#total_paid_fee' ).val( $sum );
		    		$( '#total_ramaining_fee' ).val( $balance_to_be_paid );

    			}

    		);
    };

    // ----------------------------------------------------------------------------

    this.__construct();

};


