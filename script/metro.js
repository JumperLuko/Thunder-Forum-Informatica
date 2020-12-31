// Arquivo script.js com função para apresentar a barra de rolagem

$(function () {
	var maiorLinha = 0;
	$(".container .linha").each(function () {
		var larguraLinha = 0;
		$(this).children(".tile").each(function () {
			larguraLinha += $(this).width();
			larguraLinha += 2*parseInt($(this).css("margin-right").toString().replace("px", ""));
		});
		if (larguraLinha > maiorLinha)
			maiorLinha = larguraLinha+5;
	});
	$(".container").css("width", maiorLinha.toString() + "px");
});

//Tratamento dos eventos de botão do mouse sobre os tiles

$(".tile").mousedown(function () {
	$(this).addClass("selecionado");
});

$(".tile").mouseup(function () {
	$(this).removeClass("selecionado");
});
$(".tile").mouseleave(function () {
	$(this).removeClass("selecionado");
})