
// Functon to Show out Busy Div
function showBusy(){
	$('#col_main').block({
		message: '<h1>Processing</h1>',
		css: {border:'3px solid #000'}
	});
}

function updatePage(html){
	
	window.setTimeout( function(){
		$('#col_main').html(html);
	}, 200)
	
	
}


$(document).ready(function() {

	// $.AJAX Example Request
	$('.ajax-pag > a').live('click', function(eve){
		eve.preventDefault();
		
		var link = $(this).attr('href');
		
		$.ajax({
			url: link,
			type: "GET",
			dataType: "html",
			beforeSend: function(){
				showBusy();
			},	
		  	success: function(html) {
		    	updatePage(html);
		 	}
		});
//		alert('link');

	});		
	
		
});

function reportBusy(){
	$('#report_col').block({
		message: '<h1>Processing</h1>',
		css: {border:'3px solid #000'}
	});
}

function updateRep(html){
	
	window.setTimeout( function(){
		$('#report_col').html(html);
	}, 200)
	
	
}

$(document).ready(function() {

	// $.AJAX Example Request
	$('.ajax-pag-rep > a').live('click', function(eve){
		eve.preventDefault();
		
		var link = $(this).attr('href');
		alert(link);
		
		$.ajax({
			url: link,
			type: "GET",
			dataType: "html",
			beforeSend: function(){
				reportBusy();
			},	
		  	success: function(html) {
		    	updateRep(html);
		 	}
		});
//		alert('link');

	});		
	
		
});


