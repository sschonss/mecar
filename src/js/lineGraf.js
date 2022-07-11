
var page = document.getElementById('page').value; 
		   
$.ajax({
	url: '../class/line_'+ page +'.php',
	dataType: 'html',

	success: function(data) {
		$('#linha01').html(data);
		$('#linha02').html(data);
		$('#linha03').html(data);
		$('#linha04').html(data);
	},
	error: function( xhr, er, index, anchor ) {
		$('#linha01').html('Error ' + xhr.status);
		$('#linha02').html('Error ' + xhr.status);
		$('#linha03').html('Error ' + xhr.status);
		$('#linha04').html('Error ' + xhr.status);
	},
	beforeSend: function() {
		$('#linha01').html('carregando..');
		$('#linha02').html('carregando..');
		$('#linha03').html('carregando..');
		$('#linha04').html('carregando..');
	}
});

