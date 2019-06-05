# O sistema é um E-commerce com algumas categorias de produtos, com o intuito colocar em prática a linguagem PHP 7.1 junto com Banco de Dados MySQL.
# Os códigos foram feitos no Linux/Ubuntu, podendo ocorrer erros em alguns comandos em shell caso seja instalado em outro ambiente. 

- Configurações iniciais:
	É preciso ter um ambiente adequado com um servidor que interprete códigos PHP, junto com o MySQL para guardar informações no banco.
	Após isso, execute os comandos sql presentes em _database/daystore.sql para criar o banco.
	Configure a conexão com o banco em _back/db/connection.php e dê as permissões necessárias para as pastas.
	Instale o Composer para carregar as funções presentes no código.

- Funcionamento:
	É preciso inserir imagens no site, para isso logue como admin, com usuário:admin e senha:admin.
	Faça os uploads das imagens dos produtos que deseja inserir no E-commerce.
		Essas imagens irão para assets/img/ com um nome único.
		Esse nome também será inserido no banco, para ser resgatado quando solicitado, junto com o preço, tags e categoria do produto.
	Ainda na Página do administrador, é possível deletar produtos e usuários.
	Após inserir imagens, crie uma conta, e comece a comprar adicionando produtos no carrinho.
	O carrinho irá conter as imagens dos produtos, quantidade, preço de cada produto e o preço total.

- Gerais:
	Quando um produto é removido, mesmo que ele esteja em um carrinho de algum usuário, ele será removido do sistema e de todos os carrinhos
	Falta implementar a função "Comprar", que abriria uma aba para ser inserido os dados do cartão de crédito do usuário
