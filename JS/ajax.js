$(document).ready(function(){

	function adicionarPergunta() { 
		
		$('#divPergunta').empty();
		$('#divPergunta').append('<tr><td>'+dados[i].rfid+'</td><td>'+dados[i].nomeProd+'</td><td><a href="?apagar='+dados[i].rfid+'">REMOVER</a> </td></tr>');

	}

});
