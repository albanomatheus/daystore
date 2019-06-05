<?php
	// Função responsável por carregar o conteúdo da página dentro da div.main de acordo com a variável $_GET['page']
	// Caso o valor esteja presente dentro do array de strings, irá retornar um arquivo.php presente dentro de pages/ que será renderizado no index
	// Caso não esteja, a função irá lançar um erro que será capiturado para executar a função listStk($conn)listStk
	function load() { 
		$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
		if (in_array($page, ["admin", "login", "sign", "cart"])) {
			return "pages/{$page}.php"; 
		} else {
			throw new Exception();
		}
	}

	// Esta função irá carregar os adesivos de acordo com a variável $_GET['page'] 
	function listStk($conn) {
        $num = filter_input(INPUT_GET, 'num', FILTER_SANITIZE_STRING);
		$cat = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
		$tag = filter_input(INPUT_GET, 'tag', FILTER_SANITIZE_STRING);
		
		$condition = (!$cat or $cat == "home")	? "1" : (($cat=="find" and $tag) ? "tags LIKE '%{$tag}%'" : "cat='{$cat}'");	 
		if ($imgs = select($conn, "ads", $condition)) {
			echo "<div>";
			foreach ($imgs as $key => $pic) {
				echo "<table class='ads'>";
				echo "<tr><td><img src='assets/img/".$pic['name']."' width='250px' height='250px'></td></tr>";
				echo "<tr><td><span>R$ ".$pic['price']."</span></td></tr>";
				echo "<tr><td><button class='cartButton' style='background-color: purple;' onclick='addToCart(this, \"".$pic['name']."\", \"".$pic['price']."\")'>+Carrinho</button></td></tr>";
				echo "</table>";
			}
			echo "</div>";
		} else {
			echo "Nao há itens nessa categoria!";
		}
	}

	function findPrice($conn, $table, $condition) {
		$price = select($conn, "{$table}", $condition);
		return $price[0]['price'];
	}

	// Esta função carrega os adesivos igual a outra, porem com algumas características específicas para montar o carrinho do usuário
	// Ela retorna um array com o preço total do carrinho e uma string com comando html que será rederizada em cart.php
	function loadCart($conn, $id) {
		if ($_COOKIE["cart"]) {
			$arr['price'] = 0;
			$arr['cart'] = '';
			$imgs = explode("%", $_COOKIE["cart"]);
			$cont = array_count_values($imgs);
			$imgs = array_unique($imgs);
			foreach ($imgs as $key => $value) {
				if (file_exists("assets/img/".$value) and $value != NULL) {
					$price = findPrice($conn, "ads", "name='{$value}'");
					$arr['cart'] .=  "<table class='ads'>
										 <tr><td><img src='assets/img/".$value."' width='250px' height='250px'></td></tr>
										 <tr><td><span>R$ ".$price." x".$cont[$value]."</span></td></tr>
										 <tr><td><button class='cartButton' style='background-color: red;' onclick='rmFromCart(\"".$value."\", {$price})'>-Carrinho</button></td></tr>
					 				  </table>";
					$arr['price'] += $price*$cont[$value]; 
				}
			}
			return $arr;
		}
	}

	function dd($dump) {
		echo "<pre>";
		var_dump($dump);
		echo "</pre>";
		die();
	}
