function addNovoComentario($cd_aula) {
	

	const text_area = $('#textarea-comentario')[0].value;

	const cd_aula = 8;

	$.ajax({
        method: "POST",
		data: {cdAula: cd_aula, 'comentario': text_area},
      	url: "/udemy/comentario",
      	success: function(result){
      		console.log(result);

      		$('#comentarios').prepend(
      			`
      			<div class="media mb-4">
		          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
		          <div class="media-body">
		            <h5 class="mt-0">${result.usuario}</h5>
		            ${result.duvida}
		          </div>
		        </div>
      			`

      		);
      	}
	});



}

