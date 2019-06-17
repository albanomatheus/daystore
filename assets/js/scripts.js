// Ajax que irá requisitar a pagina user.php para deslogar o usuário
function logout() {
	$.ajax({
		url: "_back/validation/user.php?key=logout",
		type: "POST",
		success: function (data) {
			location.reload();
		},
		error: function (data) {
			console.log("error");
		}
	});
}

// Ajax que irá requisitar a pagina user.php para adicionar protudo no carrinho
// A response terá 3 paratros: {1} usuário logado e inserção no banco com sucesso, {0} usuário logado porem com algum erro de inserção no banco, {-1} usuário nao logado
function addToCart(button,item, price) {
	$.ajax({
		url: "_back/validation/user.php?key=addToCart",
		type: "POST",
		data: {item:item, price:price},
		success: function (data) {
			console.log(data);
			if (data === "1") {
				$(button).css("background-color","green");
				$(button).html("Adicionado");
				setTimeout(function(){
					$(button).css("background-color","purple");
					$(button).html("+Carrinho");

				},1000);
			} else if(data === "-1"){
				$(button).css("background-color","red");
				$(button).html("Faça o Login");
				setTimeout(function(){
					$(button).css("background-color","purple");
					$(button).html("+Carrinho");

				},1000);
			} else {
				$(button).css("background-color","red");
				$(button).html("Erro");
				setTimeout(function(){
					$(button).css("background-color","purple");
					$(button).html("+Carrinho");

				},1000);
			}
		},
		error: function (data) {
			console.log("error");
		}
	});
}

// Ajax que irá requisitar a pagina user.php para remover item do carrinho do usuário
function rmFromCart(item, price) {
	$.ajax({
		url: "_back/validation/user.php?key=rmFromCart",
		type: "POST",
		data: {item:item, price:price},
		success: function (data) {
			location.reload();
		},
		error: function (data) {
			console.log("error");
		}
	});
}

// Ajax que irá requisitar a pagina admin.php para deletar uma linha de uma tabela
function del(table, id, name) {
	// name = (typeof name === 'undefined') ? '' : name;
	$.ajax({
		url: "_back/validation/admin.php?key=del",
		type: "POST",
		data: {table:table, id:id, name:name},
		success: function (data) {
			location.reload();
			console.log(data);
		}
	});
}

function getAddress(address) {
	$.ajax({
		url: "_back/validation/user.php?key=address",
		type: "GET",
		data: {postalCode: address},
		success: function (data) {
			data = JSON.parse(data);
			document.getElementById('cidade').value = data.city;
			document.getElementById('bairro').value = data.block;
			document.getElementById('rua').value = data.street;
		}
	});
}
