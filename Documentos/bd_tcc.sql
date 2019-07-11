CREATE DATABASE bd_tcc;

use bd_tcc;

--CRIAÇÃO DAS TABELAS
create table tbTesteOnline (
	idTesteOnline int NOT NULL AUTO_INCREMENT,
	nomeTesteOnline varchar (50) NOT NULL,
	CONSTRAINT PK_IDTESTEONLINE PRIMARY KEY (idTesteOnline)
);

create table tbPergunta (
	idTesteOnline int NOT NULL,
	idPergunta int NOT NULL,
	pergunta varchar (250) NOT NULL,
	altA varchar (150) NOT NULL,
	altB varchar (150) NOT NULL,
	altC varchar (150) NOT NULL,
	altD varchar (150) NOT NULL,
	resposta varchar (1) NOT NULL,
	tempo int NOT NULL,
	CONSTRAINT PK_TESTE_PERGUNTA PRIMARY KEY (idTesteOnline, idPergunta)
);