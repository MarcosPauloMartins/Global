create table if not exists usuarios(
	id int(11) not null AUTO_INCREMENT,
	nome varchar(255) not null,
    usuario varchar(255) not null,
    senha varchar(255) not null,
    nivel int(3) not null,
    
    PRIMARY KEY(id)
);

INSERT INTO `usuarios`(`nome`, `usuario`, `senha`,`nivel`) 
VALUES ('Marcos', 'marcos@marcos.com', '1', 1);