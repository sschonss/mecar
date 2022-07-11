	

	var number01 = 0;
	var number02 = 0;
	var number03 = 0;
	var number04 = 0;
	var number05 = 0;
	var number06 = 0;
	var number07 = 0;
	var number08 = 0;
	var number09 = 0;
	var number10 = 0;
	var number11 = 0;
	var number12 = 0;
	var number13 = 0;
	var number14 = 0;
	var number15 = 0;
	var number16 = 0;
	var number17 = 0;
	var number18 = 0;
	var number19 = 0;
	var number20 = 0;
	var number21 = 0;
	var number22 = 0;
	var number23 = 0;
	var number24 = 0;
	var number25 = 0;
	var number26 = 0;
	var number27 = 0;
	var number28 = 0;
	var number29 = 0;
	var number30 = 0;
	var number31 = 0;
	var number32 = 0;
	var number33 = 0;
	var number34 = 0;
	var number35 = 0;
	var number36 = 0;
	var number37 = 0;
	var number38 = 0;
	var number39 = 0;
	var number40 = 0;
	var number41 = 0;
	var number42 = 0;
	var number43 = 0;
	var number44 = 0;
	var number45 = 0;
	var number46 = 0;
	var number47 = 0;
	var number48 = 0;
	var number49 = 0;
	var number50 = 0;
	var number51 = 0;
	var number52 = 0;



//checkBox01 Linha 01
	document.getElementById("check01Linha01").onclick = function() {


	  	number01 = number01 + 1;

	  	if (number01 > 1) {
	  		number01 = 0;
	  	}

	  	number02 = 0;
	  	number03 = 0;
	  	number04 = 0;
	  	number17 = 0;
	  	number21 = 0;

	  	if(number01 == 1) {

	  		document.getElementById('check02Linha01').disabled = true;
	  		document.getElementById('check03Linha01').disabled = true;
	  		document.getElementById('check04Linha01').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxTemp.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha01').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha01').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha01').html('carregando..');
				}
			});


	  	}
	  	else if(number01 == 0 ) {

	  		document.getElementById('check02Linha01').disabled = false;
	  		document.getElementById('check03Linha01').disabled = false;
	  		document.getElementById('check04Linha01').disabled = false;
	  		

	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha01').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha01').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha01').html('carregando..');
				}
			});

	  	}
	};


//checkBox02 Linha 01
	document.getElementById("check02Linha01").onclick = function() {


	  	number02 = number02 + 1;

	  	if (number02 > 1) {
	  		number02 = 0;
	  	}

	  	number01 = 0;
	  	number03 = 0;
	  	number04 = 0;
	  	number17 = 0;
	  	number21 = 0;

	  	if(number02 == 1) {

	  		document.getElementById('check01Linha01').disabled = true;
	  		document.getElementById('check03Linha01').disabled = true;
	  		document.getElementById('check04Linha01').disabled = true;
	  		

	  				   
			$.ajax({
				url: '../class/checkBoxCorrente.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha01').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha01').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha01').html('carregando..');
				}
			});

	  	}
	  	else if(number02 == 0 ) {

	  		document.getElementById('check01Linha01').disabled = false;
	  		document.getElementById('check03Linha01').disabled = false;
	  		document.getElementById('check04Linha01').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxCorrente.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha01').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha01').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha01').html('carregando..');
				}
			});

	  	}
	};



//checkBox03 Linha 01
	document.getElementById("check03Linha01").onclick = function() {


	  	number03 = number03 + 1;

	  	if (number03 > 1) {
	  		number03 = 0;
	  	}

	  	number02 = 0;
	  	number01 = 0;
	  	number04 = 0;
	  	number17 = 0;
	  	number21 = 0;

	  	if(number03 == 1) {

	  		document.getElementById('check02Linha01').disabled = true;
	  		document.getElementById('check01Linha01').disabled = true;
	  		document.getElementById('check04Linha01').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxPressao.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha01').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha01').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha01').html('carregando..');
				}
			});

	  	}
	  	else if(number03 == 0 ) {

	  		document.getElementById('check02Linha01').disabled = false;
	  		document.getElementById('check01Linha01').disabled = false;
	  		document.getElementById('check04Linha01').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha01').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha01').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha01').html('carregando..');
				}
			});

	  	}
	};


//checkBox04 Linha 01
	document.getElementById("check04Linha01").onclick = function() {


	  	number04 = number04 + 1;

	  	if (number04 > 1) {
	  		number04 = 0;
	  	}

	  	number02 = 0;
	  	number03 = 0;
	  	number01 = 0;
	  	number17 = 0;
	  	number21 = 0;

	  	if(number04 == 1) {

	  		document.getElementById('check02Linha01').disabled = true;
	  		document.getElementById('check03Linha01').disabled = true;
	  		document.getElementById('check01Linha01').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxNivel.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha01').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha01').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha01').html('carregando..');
				}
			});

	  	}
	  	else if(number04 == 0 ) {

	  		document.getElementById('check02Linha01').disabled = false;
	  		document.getElementById('check03Linha01').disabled = false;
	  		document.getElementById('check01Linha01').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha01').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha01').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha01').html('carregando..');
				}
			});

	  	}
	};


//checkBox05 Linha 01
	//retirado


//checkBox06 Linha 01
	
//retirado



//checkBox01 Linha 02
	document.getElementById("check01Linha02").onclick = function() {


	  	number05 = number05 + 1;

	  	if (number05 > 1) {
	  		number05 = 0;
	  	}

	  	number06 = 0;
	  	number07 = 0;
	  	number08 = 0;
	  	number18 = 0;
	  	number22 = 0;

	  	if(number05 == 1) {

	  		document.getElementById('check02Linha02').disabled = true;
	  		document.getElementById('check03Linha02').disabled = true;
	  		document.getElementById('check04Linha02').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxTemp.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha02').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha02').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha02').html('carregando..');
				}
			});

	  	}
	  	else if(number05 == 0 ) {

	  		document.getElementById('check02Linha02').disabled = false;
	  		document.getElementById('check03Linha02').disabled = false;
	  		document.getElementById('check04Linha02').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha02').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha02').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha02').html('carregando..');
				}
			});

	  	}
	};


//checkBox02 Linha 02
	document.getElementById("check02Linha02").onclick = function() {


	  	number06 = number06 + 1;

	  	if (number06 > 1) {
	  		number06 = 0;
	  	}

	  	number05 = 0;
	  	number07 = 0;
	  	number08 = 0;
	  	number18 = 0;
	  	number22 = 0;

	  	if(number06 == 1) {

	  		document.getElementById('check01Linha02').disabled = true;
	  		document.getElementById('check03Linha02').disabled = true;
	  		document.getElementById('check04Linha02').disabled = true;
	  		

	  				   
			$.ajax({
				url: '../class/checkBoxCorrente.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha02').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha02').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha02').html('carregando..');
				}
			});

	  	}
	  	else if(number06 == 0 ) {

	  		document.getElementById('check01Linha02').disabled = false;
	  		document.getElementById('check03Linha02').disabled = false;
	  		document.getElementById('check04Linha02').disabled = false;
	  		

	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha02').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha02').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha02').html('carregando..');
				}
			});

	  	}
	};


//checkBox03 Linha 02
	document.getElementById("check03Linha02").onclick = function() {


	  	number07 = number07 + 1;

	  	if (number07 > 1) {
	  		number07 = 0;
	  	}

	  	number06 = 0;
	  	number05 = 0;
	  	number08 = 0;
	  	number18 = 0;
	  	number22 = 0;

	  	if(number07 == 1) {

	  		document.getElementById('check02Linha02').disabled = true;
	  		document.getElementById('check01Linha02').disabled = true;
	  		document.getElementById('check04Linha02').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxPressao.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha02').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha02').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha02').html('carregando..');
				}
			});

	  	}
	  	else if(number07 == 0 ) {

	  		document.getElementById('check02Linha02').disabled = false;
	  		document.getElementById('check01Linha02').disabled = false;
	  		document.getElementById('check04Linha02').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha02').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha02').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha02').html('carregando..');
				}
			});

	  	}
	};


//checkBox04 Linha 02
	document.getElementById("check04Linha02").onclick = function() {


	  	number08 = number08 + 1;

	  	if (number08 > 1) {
	  		number08 = 0;
	  	}

	  	number06 = 0;
	  	number07 = 0;
	  	number05 = 0;
	  	number18 = 0;
	  	number22 = 0;

	  	if(number08 == 1) {

	  		document.getElementById('check02Linha02').disabled = true;
	  		document.getElementById('check03Linha02').disabled = true;
	  		document.getElementById('check01Linha02').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxNivel.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha02').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha02').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha02').html('carregando..');
				}
			});

	  	}
	  	else if(number08 == 0 ) {

	  		document.getElementById('check02Linha02').disabled = false;
	  		document.getElementById('check03Linha02').disabled = false;
	  		document.getElementById('check01Linha02').disabled = false;
	  		

	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha02').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha02').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha02').html('carregando..');
				}
			});

	  	}
	};


//checkBox05 Linha 02
	// retirado


//checkBox06 Linha 02
	// retirado


// CheckBox01 Linha03

	document.getElementById("check01Linha03").onclick = function() {


	  	number09 = number09 + 1;

	  	if (number09 > 1) {
	  		number09 = 0;
	  	}

	  	number10 = 0;
	  	number11 = 0;
	  	number12 = 0;
	  	number19 = 0;
	  	number23 = 0;

	  	if(number09 == 1) {

	  		document.getElementById('check02Linha03').disabled = true;
	  		document.getElementById('check03Linha03').disabled = true;
	  		document.getElementById('check04Linha03').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxTemp.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha03').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha03').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha03').html('carregando..');
				}
			});

	  	}
	  	else if(number09 == 0 ) {

	  		document.getElementById('check02Linha03').disabled = false;
	  		document.getElementById('check03Linha03').disabled = false;
	  		document.getElementById('check04Linha03').disabled = false;
	  		

	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha03').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha03').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha03').html('carregando..');
				}
			});

	  	}
	};


// CheckBox02 Linha03
	document.getElementById("check02Linha03").onclick = function() {


	  	number10 = number10 + 1;

	  	if (number10 > 1) {
	  		number10 = 0;
	  	}

	  	number09 = 0;
	  	number11 = 0;
	  	number12 = 0;
	  	number19 = 0;
	  	number23 = 0;

	  	if(number10 == 1) {

	  		document.getElementById('check01Linha03').disabled = true;
	  		document.getElementById('check03Linha03').disabled = true;
	  		document.getElementById('check04Linha03').disabled = true;
	  		

	  				   
			$.ajax({
				url: '../class/checkBoxCorrente.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha03').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha03').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha03').html('carregando..');
				}
			});

	  	}
	  	else if(number10 == 0 ) {

	  		document.getElementById('check01Linha03').disabled = false;
	  		document.getElementById('check03Linha03').disabled = false;
	  		document.getElementById('check04Linha03').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha03').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha03').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha03').html('carregando..');
				}
			});

	  	}
	};


// CheckBox03 Linha03
	document.getElementById("check03Linha03").onclick = function() {


	  	number11 = number11 + 1;

	  	if (number11 > 1) {
	  		number11 = 0;
	  	}

	  	number10 = 0;
	  	number09 = 0;
	  	number12 = 0;
	  	number19 = 0;
	  	number23 = 0;

	  	if(number11 == 1) {

	  		document.getElementById('check02Linha03').disabled = true;
	  		document.getElementById('check01Linha03').disabled = true;
	  		document.getElementById('check04Linha03').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxPressao.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha03').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha03').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha03').html('carregando..');
				}
			});

	  	}
	  	else if(number11 == 0 ) {

	  		document.getElementById('check02Linha03').disabled = false;
	  		document.getElementById('check01Linha03').disabled = false;
	  		document.getElementById('check04Linha03').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha03').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha03').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha03').html('carregando..');
				}
			});

	  	}
	};


// CheckBox04 Linha03
	document.getElementById("check04Linha03").onclick = function() {


	  	number12 = number12 + 1;

	  	if (number12 > 1) {
	  		number12 = 0;
	  	}

	  	number10 = 0;
	  	number11 = 0;
	  	number09 = 0;
	  	number19 = 0;
	  	number23 = 0;

	  	if(number12 == 1) {

	  		document.getElementById('check02Linha03').disabled = true;
	  		document.getElementById('check03Linha03').disabled = true;
	  		document.getElementById('check01Linha03').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxNivel.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha03').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha03').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha03').html('carregando..');
				}
			});

	  	}
	  	else if(number12 == 0 ) {

	  		document.getElementById('check02Linha03').disabled = false;
	  		document.getElementById('check03Linha03').disabled = false;
	  		document.getElementById('check01Linha03').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha03').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha03').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha03').html('carregando..');
				}
			});

	  	}
	};


// CheckBox05 Linha03
	// retirado


// CheckBox06 Linha03
	//retirado



// CheckBox01 Linha04

	document.getElementById("check01Linha04").onclick = function() {


	  	number13 = number13 + 1;

	  	if (number13 > 1) {
	  		number13 = 0;
	  	}

	  	number14 = 0;
	  	number15 = 0;
	  	number16 = 0;
	  	number20 = 0;
	  	number24 = 0;

	  	if(number13 == 1) {

	  		document.getElementById('check02Linha04').disabled = true;
	  		document.getElementById('check03Linha04').disabled = true;
	  		document.getElementById('check04Linha04').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxTemp.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha04').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha04').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha04').html('carregando..');
				}
			});

	  	}
	  	else if(number13 == 0 ) {

	  		document.getElementById('check02Linha04').disabled = false;
	  		document.getElementById('check03Linha04').disabled = false;
	  		document.getElementById('check04Linha04').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha04').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha04').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha04').html('carregando..');
				}
			});

	  	}
	};

// CheckBox02 Linha04
	document.getElementById("check02Linha04").onclick = function() {


	  	number14 = number14 + 1;

	  	if (number14 > 1) {
	  		number14 = 0;
	  	}

	  	number13 = 0;
	  	number15 = 0;
	  	number16 = 0;
	  	number20 = 0;
	  	number24 = 0;

	  	if(number14 == 1) {

	  		document.getElementById('check01Linha04').disabled = true;
	  		document.getElementById('check03Linha04').disabled = true;
	  		document.getElementById('check04Linha04').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxCorrente.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha04').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha04').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha04').html('carregando..');
				}
			});

	  	}
	  	else if(number14 == 0 ) {

	  		document.getElementById('check01Linha04').disabled = false;
	  		document.getElementById('check03Linha04').disabled = false;
	  		document.getElementById('check04Linha04').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha04').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha04').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha04').html('carregando..');
				}
			});

	  	}
	};


// CheckBox03 Linha04
	document.getElementById("check03Linha04").onclick = function() {


	  	number15 = number15 + 1;

	  	if (number15 > 1) {
	  		number15 = 0;
	  	}

	  	number14 = 0;
	  	number13 = 0;
	  	number16 = 0;
	  	number20 = 0;
	  	number24 = 0;

	  	if(number15 == 1) {

	  		document.getElementById('check02Linha04').disabled = true;
	  		document.getElementById('check01Linha04').disabled = true;
	  		document.getElementById('check04Linha04').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxPressao.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha04').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha04').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha04').html('carregando..');
				}
			});

	  	}
	  	else if(number15 == 0 ) {

	  		document.getElementById('check02Linha04').disabled = false;
	  		document.getElementById('check01Linha04').disabled = false;
	  		document.getElementById('check04Linha04').disabled = false;
	  		

	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha04').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha04').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha04').html('carregando..');
				}
			});

	  	}
	};


// CheckBox04 Linha04
	document.getElementById("check04Linha04").onclick = function() {


	  	number16 = number16 + 1;

	  	if (number16 > 1) {
	  		number16 = 0;
	  	}

	  	number14 = 0;
	  	number15 = 0;
	  	number13 = 0;
	  	number20 = 0;
	  	number24 = 0;

	  	if(number16 == 1) {

	  		document.getElementById('check02Linha04').disabled = true;
	  		document.getElementById('check03Linha04').disabled = true;
	  		document.getElementById('check01Linha04').disabled = true;
	  		


	  				   
			$.ajax({
				url: '../class/checkBoxNivel.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha04').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha04').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha04').html('carregando..');
				}
			});

	  	}
	  	else if(number16 == 0 ) {

	  		document.getElementById('check02Linha04').disabled = false;
	  		document.getElementById('check03Linha04').disabled = false;
	  		document.getElementById('check01Linha04').disabled = false;
	  		


	  		$.ajax({
				url: '../class/checkBoxVazio.php',
				dataType: 'html',
						
				success: function(data) {
					$('#linha04').html(data);
				},
				error: function( xhr, er, index, anchor ) {
					$('#linha04').html('Error ' + xhr.status);
				},
				beforeSend: function() {
					$('#linha04').html('carregando..');
				}
			});

	  	}
	};


// CheckBox05 Linha04
	//retirado

// CheckBox06 Linha04
	//retirado

