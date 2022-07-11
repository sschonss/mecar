
var page = parseInt(document.getElementById("page").value);
var numTotalPages = 0;
var btnVoltar = document.getElementById("anterior");
var btnProximo = document.getElementById("proximo");
var urlProjeto = document.getElementById("projeto").value;
var contador = page;



// Busca a Pagina do PDF quando clicar no botão anterior
btnVoltar.addEventListener("click", function(){


	//habilita a classe que desabilita a div após o click
	$('.click').addClass('disableDiv');
	

	if (page == 1) {



				//Carrega o PDF

				// If absolute URL from the remote server is provided, configure the CORS
				// header on that server.
				var url = 'documents/' + urlProjeto;

				// Loaded via <script> tag, create shortcut to access PDF.js exports.
				var pdfjsLib = window['pdfjs-dist/build/pdf'];

				// The workerSrc property shall be specified.
				pdfjsLib.GlobalWorkerOptions.workerSrc = 'js/workPdf.js';

				// Asynchronous download of PDF
				var loadingTask = pdfjsLib.getDocument(url);
				loadingTask.promise.then(function(pdf) {
					//console.log('PDF loaded');

				  // Fetch the first page
				  var pageNumber = 1;
				  pdf.getPage(pageNumber).then(function(page) {
				  	//console.log('Page loaded');

				  	var scale = 3;
				  	var viewport = page.getViewport({scale: scale});

				    // Prepare canvas using PDF page dimensions
				    var canvas = document.getElementById('the-canvas');
				    var context = canvas.getContext('2d');
				    canvas.height = viewport.height;
				    canvas.width = viewport.width;

				    // Render PDF page into canvas context
				    var renderContext = {
				    	canvasContext: context,
				    	viewport: viewport
				    };
				    var renderTask = page.render(renderContext);
				    renderTask.promise.then(function () {
				    	//console.log('Page rendered');
				    });
				});
				}, function (reason) {
				  // PDF loading error
				  //console.error(reason);
				});

				//Mostra Pagina Atual
				document.getElementById('page_num').value = page;
				//Fim do Carregamento da Pagina Atual


				//Conta o Numero de Paginas do PDF
				pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
					pdfDoc = pdfDoc_;
					document.getElementById('page_count').textContent = pdfDoc.numPages;

				  // Initial/first page rendering
				  renderPage(pageNum);

				  //remove classe que desabilita a div

					setTimeout(function(){

						$('.click').removeClass('disableDiv');

					},2000);

				});
				//Fim da Contagem do Numero de Paginas do PDF

				

			//Fim do Carregamento do PDF

		} else if (page > 1) {

			contador = contador - 1;



				//Carrega o PDF

				// If absolute URL from the remote server is provided, configure the CORS
				// header on that server.
				var url = 'documents/' + urlProjeto;

				// Loaded via <script> tag, create shortcut to access PDF.js exports.
				var pdfjsLib = window['pdfjs-dist/build/pdf'];

				// The workerSrc property shall be specified.
				pdfjsLib.GlobalWorkerOptions.workerSrc = 'js/workPdf.js';

				// Asynchronous download of PDF
				var loadingTask = pdfjsLib.getDocument(url);
				loadingTask.promise.then(function(pdf) {
					//console.log('PDF loaded');

				  // Fetch the first page
				  var pageNumber = contador;
				  pdf.getPage(pageNumber).then(function(page) {
				  	//console.log('Page loaded');

				  	var scale = 3;
				  	var viewport = page.getViewport({scale: scale});

				    // Prepare canvas using PDF page dimensions
				    var canvas = document.getElementById('the-canvas');
				    var context = canvas.getContext('2d');
				    canvas.height = viewport.height;
				    canvas.width = viewport.width;

				    // Render PDF page into canvas context
				    var renderContext = {
				    	canvasContext: context,
				    	viewport: viewport
				    };
				    var renderTask = page.render(renderContext);
				    renderTask.promise.then(function () {
				    	//console.log('Page rendered');
				    });
				});
				}, function (reason) {
				  // PDF loading error
				  //console.error(reason);
				});

				//Mostra Pagina Atual
				document.getElementById('page_num').value = contador;
				//Fim do Carregamento da Pagina Atual

				//Conta o Numero de Paginas do PDF
				pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
					pdfDoc = pdfDoc_;
					document.getElementById('page_count').textContent = pdfDoc.numPages;


					page = contador;

					//remove classe que desabilita a div

					setTimeout(function(){

						$('.click').removeClass('disableDiv');

					},2000);

				  // Initial/first page rendering
				  //renderPage(pageNum);
				});
				//Fim da Contagem do Numero de Paginas do PDF



			//Fim do Carregamento do PDF


			



		}

		



	});

//Fim da Ação do Botão Anterior



// Busca a Pagina do PDF quando clicar no botão Proximo
btnProximo.addEventListener("click", function(){


	//habilita a classe que desabilita a div após o click
	$('.click').addClass('disableDiv');


	if (page == numTotalPages) {

				//Carrega o PDF

				// If absolute URL from the remote server is provided, configure the CORS
				// header on that server.
				var url = 'documents/' + urlProjeto;

				// Loaded via <script> tag, create shortcut to access PDF.js exports.
				var pdfjsLib = window['pdfjs-dist/build/pdf'];

				// The workerSrc property shall be specified.
				pdfjsLib.GlobalWorkerOptions.workerSrc = 'js/workPdf.js';

				// Asynchronous download of PDF
				var loadingTask = pdfjsLib.getDocument(url);
				loadingTask.promise.then(function(pdf) {
					//console.log('PDF loaded');

				  // Fetch the first page
				  var pageNumber = numTotalPages;
				  pdf.getPage(pageNumber).then(function(page) {
				  	//console.log('Page loaded');

				  	var scale = 3;
				  	var viewport = page.getViewport({scale: scale});

				    // Prepare canvas using PDF page dimensions
				    var canvas = document.getElementById('the-canvas');
				    var context = canvas.getContext('2d');
				    canvas.height = viewport.height;
				    canvas.width = viewport.width;

				    // Render PDF page into canvas context
				    var renderContext = {
				    	canvasContext: context,
				    	viewport: viewport
				    };
				    var renderTask = page.render(renderContext);
				    renderTask.promise.then(function () {
				    	//console.log('Page rendered');
				    });
				});
				}, function (reason) {
				  // PDF loading error
				  //console.error(reason);
				});

				//Mostra Pagina Atual
				document.getElementById('page_num').value = page;
				//Fim do Carregamento da Pagina Atual


				//Conta o Numero de Paginas do PDF
				pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
					pdfDoc = pdfDoc_;
					document.getElementById('page_count').textContent = pdfDoc.numPages;

				  // Initial/first page rendering
				  renderPage(pageNum);

				  //remove classe que desabilita a div

					setTimeout(function(){

						$('.click').removeClass('disableDiv');

					},2000);

				});
				//Fim da Contagem do Numero de Paginas do PDF

			//Fim do Carregamento do PDF

		} else if (page < numTotalPages) {

			contador = contador + 1;



				//Carrega o PDF

				// If absolute URL from the remote server is provided, configure the CORS
				// header on that server.
				var url = 'documents/' + urlProjeto;

				// Loaded via <script> tag, create shortcut to access PDF.js exports.
				var pdfjsLib = window['pdfjs-dist/build/pdf'];

				// The workerSrc property shall be specified.
				pdfjsLib.GlobalWorkerOptions.workerSrc = 'js/workPdf.js';

				// Asynchronous download of PDF
				var loadingTask = pdfjsLib.getDocument(url);
				loadingTask.promise.then(function(pdf) {
					//console.log('PDF loaded');

				  // Fetch the first page
				  var pageNumber = contador;
				  pdf.getPage(pageNumber).then(function(page) {
				  	//console.log('Page loaded');

				  	var scale = 3;
				  	var viewport = page.getViewport({scale: scale});

				    // Prepare canvas using PDF page dimensions
				    var canvas = document.getElementById('the-canvas');
				    var context = canvas.getContext('2d');
				    canvas.height = viewport.height;
				    canvas.width = viewport.width;

				    // Render PDF page into canvas context
				    var renderContext = {
				    	canvasContext: context,
				    	viewport: viewport
				    };
				    var renderTask = page.render(renderContext);
				    renderTask.promise.then(function () {
				    	//console.log('Page rendered');
				    });
				});
				}, function (reason) {
				  // PDF loading error
				  //console.error(reason);
				});

				//Mostra Pagina Atual
				document.getElementById('page_num').value = contador;
				//Fim do Carregamento da Pagina Atual

				//Conta o Numero de Paginas do PDF
				pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
					pdfDoc = pdfDoc_;
					document.getElementById('page_count').textContent = pdfDoc.numPages;


					page = contador;


					//remove classe que desabilita a div

					setTimeout(function(){

						$('.click').removeClass('disableDiv');

					},2000);

				  // Initial/first page rendering
				  //renderPage(pageNum);
				});
				//Fim da Contagem do Numero de Paginas do PDF

			//Fim do Carregamento do PDF



		}

		



	});
//Fim do carregamento do PDF atraves do Botão Proximo




//Carrega o PDF ao recarregar a pagina

$(document).ready(function(){

	

	var tag = document.getElementById("tag").value;

   		$.get("class/equipamentoPDF.php", {
			"tag" : tag
		}
		)

			.done(function(data){

				var json = JSON.parse(data);

				var numPageAtual = parseInt(json.page);

				//Carrega o PDF

				// If absolute URL from the remote server is provided, configure the CORS
				// header on that server.
				var url = 'documents/' + urlProjeto;

				// Loaded via <script> tag, create shortcut to access PDF.js exports.
				var pdfjsLib = window['pdfjs-dist/build/pdf'];

				// The workerSrc property shall be specified.
				pdfjsLib.GlobalWorkerOptions.workerSrc = 'js/workPdf.js';

				// Asynchronous download of PDF
				var loadingTask = pdfjsLib.getDocument(url);
				loadingTask.promise.then(function(pdf) {
					//console.log('PDF loaded');

				  // Fetch the first page
				  var pageNumber = numPageAtual;
				  pdf.getPage(pageNumber).then(function(page) {
				  	//console.log('Page loaded');

				  	var scale = 3;
				  	var viewport = page.getViewport({scale: scale});

				    // Prepare canvas using PDF page dimensions
				    var canvas = document.getElementById('the-canvas');
				    var context = canvas.getContext('2d');
				    canvas.height = viewport.height;
				    canvas.width = viewport.width;

				    // Render PDF page into canvas context
				    var renderContext = {
				    	canvasContext: context,
				    	viewport: viewport
				    };
				    var renderTask = page.render(renderContext);
				    renderTask.promise.then(function () {
				    	//console.log('Page rendered');
				    });
				});
				}, function (reason) {
				  // PDF loading error
				  //console.error(reason);
				});

				//Mostra Pagina Atual
				document.getElementById('page_num').value = numPageAtual;
				//Fim do Carregamento da Pagina Atual


				//Conta o Numero de Paginas do PDF
				pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
					pdfDoc = pdfDoc_;
					document.getElementById('page_count').textContent = pdfDoc.numPages;

					numTotalPages = pdfDoc.numPages;
					page = numPageAtual;

				  // Initial/first page rendering
				  //renderPage(pageNum);
				});
				//Fim da Contagem do Numero de Paginas do PDF

			//Fim do Carregamento do PDF

			});

});




//inicia o carregamento pdf pelo valor digitado no input
var typingTimer; 
var doneTypingInterval = 3000; //seta o tempo do delay
var valorBuscaIni;
var valorBusca;
var valorBuscaEnd = 0;
var valorTotalPage;

//verfica se o valor do input foi alterado
$('#page_num').keyup(function() {

	//habilita a classe que desabilita a div após o click
	$('.click').addClass('disableDiv');

  clearTimeout(typingTimer);

  if ($('#page_num').val) {

  	valorBuscaIni = document.getElementById('page_num').value;
  	valorTotalPage = document.getElementById('page_count').value;

  	if (parseInt(valorBuscaIni ) > parseInt(numTotalPages)) {

		//remove classe que desabilita a div
		$('.click').removeClass('disableDiv');

  	}else{

  		if (valorBuscaIni != "" && valorBuscaIni != valorBuscaEnd) {

	    	typingTimer = setTimeout(doneTyping, doneTypingInterval);

	    }else{

			//remove classe que desabilita a div
			$('.click').removeClass('disableDiv');

	    }

    }

  }
});

//função para pegar o ultimo valor digitado
function doneTyping() {

	valorBusca = document.getElementById('page_num').value;




  				var numPageAtual = parseInt(valorBusca);

				//Carrega o PDF

				// If absolute URL from the remote server is provided, configure the CORS
				// header on that server.
				var url = 'documents/' + urlProjeto;

				// Loaded via <script> tag, create shortcut to access PDF.js exports.
				var pdfjsLib = window['pdfjs-dist/build/pdf'];

				// The workerSrc property shall be specified.
				pdfjsLib.GlobalWorkerOptions.workerSrc = 'js/workPdf.js';

				// Asynchronous download of PDF
				var loadingTask = pdfjsLib.getDocument(url);
				loadingTask.promise.then(function(pdf) {
					//console.log('PDF loaded');

				  // Fetch the first page
				  var pageNumber = numPageAtual;
				  pdf.getPage(pageNumber).then(function(page) {
				  	//console.log('Page loaded');

				  	var scale = 3;
				  	var viewport = page.getViewport({scale: scale});

				    // Prepare canvas using PDF page dimensions
				    var canvas = document.getElementById('the-canvas');
				    var context = canvas.getContext('2d');
				    canvas.height = viewport.height;
				    canvas.width = viewport.width;

				    // Render PDF page into canvas context
				    var renderContext = {
				    	canvasContext: context,
				    	viewport: viewport
				    };
				    var renderTask = page.render(renderContext);
				    renderTask.promise.then(function () {
				    	//console.log('Page rendered');
				    });
				});
				}, function (reason) {
				  // PDF loading error
				  //console.error(reason);
				});

				//Mostra Pagina Atual
				document.getElementById('page_num').value = numPageAtual;
				//Fim do Carregamento da Pagina Atual


				//Conta o Numero de Paginas do PDF
				pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
					pdfDoc = pdfDoc_;
					document.getElementById('page_count').textContent = pdfDoc.numPages;

					numTotalPages = pdfDoc.numPages;
					page = numPageAtual;

				  // Initial/first page rendering
				  //renderPage(pageNum);

				//remove classe que desabilita a div

					setTimeout(function(){

						$('.click').removeClass('disableDiv');

					},2000);

				});



  			valorBuscaEnd = valorBusca;

  			contador = parseInt(numPageAtual);

}