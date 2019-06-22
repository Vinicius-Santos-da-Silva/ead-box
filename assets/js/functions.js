function addRespostaComentario(id_text , cd_comentario , cd_autor){
	

	const text_area = $(id_text)[0];

	$.ajax({
		method: "POST",
		data: {tipo: 'aluno', cd_comentario: cd_comentario, cd_autor : cd_autor , 'resposta': text_area.value},
		url: "/udemy/comentario/resposta",
		success: function(result){
			console.log(result);
			console.log(text_area.parentElement.parentElement.parentElement);
			console.log($(id_text));

			$(text_area.parentElement.parentElement.parentElement).append(`
				<div class="media mt-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                      <h5 class="mt-0">${result.usuario.nome}</h5>
                      ${result.resposta}
                    </div>
                  </div>

				`);
		}
	});
}

function addNovoComentario(cd_aula) {
	

	const text_area = $('#textarea-comentario')[0].value;

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

