CREATE TABLE customers (
	id int(11) NOT NULL,
	nome varchar(255),	
	cpf varchar(20),
	endereco varchar(255),
	bairro varchar(100),	
	cep varchar(20),	
	cidade varchar(100),
	estado varchar(100),
	telefone varchar(20),	 
	celular varchar(20),
);

ALTER TABLE customers
ADD PRIMARY KEY (id);

ALTER TABLE customers
MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;