-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Ago-2019 às 01:49
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcandidato`
--

CREATE TABLE `tbcandidato` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(50),
  `sobrenome` varchar(50),
  `sexo` varchar(1),
  `dataNasc` date,
  `email` varchar(50),
  `senha` varchar(200),
  `estadoCivil` varchar(15),
  `cep` varchar(10),
  `estado` varchar(20),
  `cidade` varchar(30),
  `endereco` varchar(30),
  `bairro` varchar(20),
  `tel1` varchar(16),
  `tel2` varchar(16),
  `linkedin` varchar(50),
  `facebook` varchar(50),
  `sitePessoal` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcandidatocompetencia`
--

CREATE TABLE `tbcandidatocompetencia` (
  `cpf` varchar(15) NOT NULL,
  `idCompetencia` int(11) NOT NULL,
  `competencia` varchar(30) NOT NULL,
  `nivel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcandidatocurso`
--

CREATE TABLE `tbcandidatocurso` (
  `cpf` varchar(15) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `nomeCurso` varchar(50) DEFAULT NULL,
  `nomeInstituicao` varchar(50) DEFAULT NULL,
  `anoConclusao` date DEFAULT NULL,
  `cargaHoraria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcandidatoempresa`
--

CREATE TABLE `tbcandidatoempresa` (
  `cpf` varchar(15) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nomeEmpresa` varchar(50) DEFAULT NULL,
  `cargo` varchar(30) DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataSaida` date DEFAULT NULL,
  `atividades` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcandidatoformacao`
--

CREATE TABLE `tbcandidatoformacao` (
  `cpf` varchar(15) NOT NULL,
  `idFormacao` int(11) NOT NULL,
  `nomeCurso` varchar(50) NOT NULL,
  `nomeInstituicao` varchar(50) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataTermino` date NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcandidatoobjetivo`
--

CREATE TABLE `tbcandidatoobjetivo` (
  `cpf` varchar(15) NOT NULL,
  `idObjetivo` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `nivel` varchar(30) NOT NULL,
  `pretSal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcandidatoprocesso`
--

CREATE TABLE `tbcandidatoprocesso` (
  `cpf` varchar(15) NOT NULL,
  `idProcesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcargo`
--

CREATE TABLE `tbcargo` (
  `idCargo` int(11) NOT NULL,
  `nomeCargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcompetencia`
--

CREATE TABLE `tbcompetencia` (
  `idCompetencia` int(11) NOT NULL,
  `nomeComp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbrecrutador`
--

CREATE TABLE `tbrecrutador` (
  `cnpj` varchar(20) NOT NULL,
  `nomeEmpresa` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `tel1` varchar(16) NOT NULL,
  `tel2` varchar(16) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `siteEmpresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpergunta`
--

CREATE TABLE `tbpergunta` (
  `idPergunta` int(11) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `pergunta` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprocessocandpergunta`
--

CREATE TABLE `tbprocessocandpergunta` (
  `idProcesso` int(11) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `idPergunta` int(11) NOT NULL,
  `resposta` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprocessocandteste`
--

CREATE TABLE `tbprocessocandteste` (
  `idProcesso` int(11) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `idTesteOnline` int(11) NOT NULL,
  `resultado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Estrutura da tabela `tbprocessocandtestequestao`
--

CREATE TABLE `tbprocessocandtestequestao` (
  `idProcesso` int(11) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `idTesteOnline` int(11) NOT NULL,
  `idQuestao` int(11) NOT NULL,
  `resposta` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprocessocompetencia`
--

CREATE TABLE `tbprocessocompetencia` (
  `idProcesso` int(11) NOT NULL,
  `idCompetencia` int(11) NOT NULL,
  `nivel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprocessopergunta`
--

CREATE TABLE `tbprocessopergunta` (
  `idProcesso` int(11) NOT NULL,
  `idPergunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprocessoseletivo`
--

CREATE TABLE `tbprocessoseletivo` (
  `idProcesso` int(11) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataLimiteCandidatar` date NOT NULL,
  `resumoVaga` text NOT NULL,
  `tipoContratacao` varchar(30) NOT NULL,
  `salario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprocessoteste`
--

CREATE TABLE `tbprocessoteste` (
  `idProcesso` int(11) NOT NULL,
  `idTesteOnline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbquestao`
--

CREATE TABLE `tbquestao` (
  `idTesteOnline` int(11) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `idQuestao` int(11) NOT NULL,
  `questao` varchar(1000) NOT NULL,
  `altA` varchar(500) NOT NULL,
  `altB` varchar(500) NOT NULL,
  `altC` varchar(500) NOT NULL,
  `altD` varchar(500) NOT NULL,
  `resposta` varchar(1) NOT NULL,
  `tempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtesteonline`
--

CREATE TABLE `tbtesteonline` (
  `idTesteOnline` int(11) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `nomeTesteOnline` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcandidato`
--
ALTER TABLE `tbcandidato`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `tbcandidatocompetencia`
--
ALTER TABLE `tbcandidatocompetencia`
  ADD PRIMARY KEY (`cpf`,`idCompetencia`),
  ADD KEY `FK_COMPETENCIACAND` (`idCompetencia`);

--
-- Índices para tabela `tbcandidatocurso`
--
ALTER TABLE `tbcandidatocurso`
  ADD PRIMARY KEY (`cpf`,`idCurso`);

--
-- Índices para tabela `tbcandidatoempresa`
--
ALTER TABLE `tbcandidatoempresa`
  ADD PRIMARY KEY (`cpf`,`idEmpresa`);

--
-- Índices para tabela `tbcandidatoformacao`
--
ALTER TABLE `tbcandidatoformacao`
  ADD PRIMARY KEY (`cpf`,`idFormacao`);

--
-- Índices para tabela `tbcandidatoobjetivo`
--
ALTER TABLE `tbcandidatoobjetivo`
  ADD PRIMARY KEY (`cpf`,`idObjetivo`),
  ADD KEY `FK_CARGOCAND` (`idCargo`);

--
-- Índices para tabela `tbcandidatoprocesso`
--
ALTER TABLE `tbcandidatoprocesso`
  ADD PRIMARY KEY (`cpf`,`idProcesso`),
  ADD KEY `FK_PROCESSOCAND` (`idProcesso`);

--
-- Índices para tabela `tbcargo`
--
ALTER TABLE `tbcargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Índices para tabela `tbcompetencia`
--
ALTER TABLE `tbcompetencia`
  ADD PRIMARY KEY (`idCompetencia`);

--
-- Índices para tabela `tbrecrutador`
--
ALTER TABLE `tbrecrutador`
  ADD PRIMARY KEY (`cnpj`);

--
-- Índices para tabela `tbpergunta`
--
ALTER TABLE `tbpergunta`
  ADD PRIMARY KEY (`idPergunta`, `cnpj`);

--
-- Índices para tabela `tbprocessocandpergunta`
--
ALTER TABLE `tbprocessocandpergunta`
  ADD PRIMARY KEY (`idProcesso`,`cpf`,`idPergunta`),
  ADD KEY `FK_CPF_PERG` (`cpf`),
  ADD KEY `FK_PERGUNTA_CAND_PROC` (`idPergunta`);

--
-- Índices para tabela `tbprocessocandteste`
--
ALTER TABLE `tbprocessocandteste`
  ADD PRIMARY KEY (`idProcesso`,`cpf`,`idTesteOnline`),
  ADD KEY `FK_CPF_TESTE` (`cpf`),
  ADD KEY `FK_TESTE_PROC_CPF` (`idTesteOnline`);

--
-- Índices para tabela `tbprocessocandtestequestao`
--
ALTER TABLE `tbprocessocandtestequestao`
  ADD PRIMARY KEY (`idProcesso`,`cpf`,`idTesteOnline`,`idQuestao`),
  ADD KEY `FK_CPF_TESTE` (`cpf`),
  ADD KEY `FK_TESTE_PROC_CPF` (`idTesteOnline`),
  ADD KEY `FK_TESTE_PROC_QUESTAO` (`idQuestao`);

--
-- Índices para tabela `tbprocessocompetencia`
--
ALTER TABLE `tbprocessocompetencia`
  ADD PRIMARY KEY (`idProcesso`,`idCompetencia`),
  ADD KEY `FK_COMPETENCIA` (`idCompetencia`);

--
-- Índices para tabela `tbprocessopergunta`
--
ALTER TABLE `tbprocessopergunta`
  ADD PRIMARY KEY (`idProcesso`,`idPergunta`),
  ADD KEY `FK_IDPERGUNTA` (`idPergunta`);

--
-- Índices para tabela `tbprocessoseletivo`
--
ALTER TABLE `tbprocessoseletivo`
  ADD PRIMARY KEY (`idProcesso`),
  ADD KEY `FK_CNPJ` (`cnpj`),
  ADD KEY `FK_IDCARGO` (`idCargo`);

--
-- Índices para tabela `tbprocessoteste`
--
ALTER TABLE `tbprocessoteste`
  ADD PRIMARY KEY (`idProcesso`,`idTesteOnline`),
  ADD KEY `FK_IDTESTE_PROCESSO` (`idTesteOnline`);

--
-- Índices para tabela `tbquestao`
--
ALTER TABLE `tbquestao`
  ADD PRIMARY KEY (`idTesteOnline`,`idQuestao`, `cnpj`);

--
-- Índices para tabela `tbtesteonline`
--
ALTER TABLE `tbtesteonline`
  ADD PRIMARY KEY (`idTesteOnline`, `cnpj`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcargo`
--
ALTER TABLE `tbcargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcompetencia`
--
ALTER TABLE `tbcompetencia`
  MODIFY `idCompetencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbprocessoseletivo`
--
ALTER TABLE `tbprocessoseletivo`
  MODIFY `idProcesso` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbcandidatocompetencia`
--
ALTER TABLE `tbcandidatocompetencia`
  ADD CONSTRAINT `FK_COMPETENCIACAND` FOREIGN KEY (`idCompetencia`) REFERENCES `tbcompetencia` (`idCompetencia`),
  ADD CONSTRAINT `FK_CPFCAND` FOREIGN KEY (`cpf`) REFERENCES `tbcandidato` (`cpf`);

--
-- Limitadores para a tabela `tbcandidatocurso`
--
ALTER TABLE `tbcandidatocurso`
  ADD CONSTRAINT `FK_CPF_CURSO` FOREIGN KEY (`cpf`) REFERENCES `tbcandidato` (`cpf`);

--
-- Limitadores para a tabela `tbcandidatoempresa`
--
ALTER TABLE `tbcandidatoempresa`
  ADD CONSTRAINT `FK_CPF_EMPRESA` FOREIGN KEY (`cpf`) REFERENCES `tbcandidato` (`cpf`);

--
-- Limitadores para a tabela `tbcandidatoformacao`
--
ALTER TABLE `tbcandidatoformacao`
  ADD CONSTRAINT `FK_CPF_FORMACAO` FOREIGN KEY (`cpf`) REFERENCES `tbcandidato` (`cpf`);

--
-- Limitadores para a tabela `tbcandidatoobjetivo`
--
ALTER TABLE `tbcandidatoobjetivo`
  ADD CONSTRAINT `FK_CPFOBJ` FOREIGN KEY (`cpf`) REFERENCES `tbcandidato` (`cpf`),
  ADD CONSTRAINT `FK_CARGOCAND` FOREIGN KEY (`idCargo`) REFERENCES `tbCargo` (`idCargo`);

--
-- Limitadores para a tabela `tbcandidatoprocesso`
--
ALTER TABLE `tbcandidatoprocesso`
  ADD CONSTRAINT `FK_CPF` FOREIGN KEY (`cpf`) REFERENCES `tbcandidato` (`cpf`),
  ADD CONSTRAINT `FK_PROCESSOCAND` FOREIGN KEY (`idProcesso`) REFERENCES `tbprocessoseletivo` (`idProcesso`);

--
-- Limitadores para a tabela `tbprocessocandpergunta`
--
ALTER TABLE `tbprocessocandpergunta`
  ADD CONSTRAINT `FK_CPF_PERG` FOREIGN KEY (`cpf`) REFERENCES `tbcandidato` (`cpf`),
  ADD CONSTRAINT `FK_IDPROCESSO_PERG` FOREIGN KEY (`idProcesso`) REFERENCES `tbprocessoseletivo` (`idProcesso`),
  ADD CONSTRAINT `FK_PERGUNTA_CAND_PROC` FOREIGN KEY (`idPergunta`) REFERENCES `tbpergunta` (`idPergunta`);

--
-- Limitadores para a tabela `tbprocessocandteste`
--
ALTER TABLE `tbprocessocandteste`
  ADD CONSTRAINT `FK_CPF_TESTE` FOREIGN KEY (`cpf`) REFERENCES `tbcandidato` (`cpf`),
  ADD CONSTRAINT `FK_PROCESSO_TESTE` FOREIGN KEY (`idProcesso`) REFERENCES `tbprocessoseletivo` (`idProcesso`),
  ADD CONSTRAINT `FK_TESTE_PROC_CPF` FOREIGN KEY (`idTesteOnline`) REFERENCES `tbtesteonline` (`idTesteOnline`);

--
-- Limitadores para a tabela `tbprocessocompetencia`
--
ALTER TABLE `tbprocessocompetencia`
  ADD CONSTRAINT `FK_COMPETENCIA` FOREIGN KEY (`idCompetencia`) REFERENCES `tbcompetencia` (`idCompetencia`),
  ADD CONSTRAINT `FK_PROCESSO` FOREIGN KEY (`idProcesso`) REFERENCES `tbprocessoseletivo` (`idProcesso`);

--
-- Limitadores para a tabela `tbprocessopergunta`
--
ALTER TABLE `tbprocessopergunta`
  ADD CONSTRAINT `FK_IDPERGUNTA` FOREIGN KEY (`idPergunta`) REFERENCES `tbpergunta` (`idPergunta`),
  ADD CONSTRAINT `FK_IDPROCESSO` FOREIGN KEY (`idProcesso`) REFERENCES `tbprocessoseletivo` (`idProcesso`);

--
-- Limitadores para a tabela `tbprocessoseletivo`
--
ALTER TABLE `tbprocessoseletivo`
  ADD CONSTRAINT `FK_CNPJ` FOREIGN KEY (`cnpj`) REFERENCES `tbrecrutador` (`cnpj`),
  ADD CONSTRAINT `FK_IDCARGO` FOREIGN KEY (`idCargo`) REFERENCES `tbcargo` (`idCargo`);

--
-- Limitadores para a tabela `tbprocessoteste`
--
ALTER TABLE `tbprocessoteste`
  ADD CONSTRAINT `FK_IDPROCESSO_TESTE` FOREIGN KEY (`idProcesso`) REFERENCES `tbprocessoseletivo` (`idProcesso`),
  ADD CONSTRAINT `FK_IDTESTE_PROCESSO` FOREIGN KEY (`idTesteOnline`) REFERENCES `tbtesteonline` (`idTesteOnline`);
COMMIT;


/* INSERINDO TESTES ONLINE */

INSERT INTO `tbtesteonline` (`idTesteOnline`, `cnpj`, `nomeTesteOnline`) VALUES
(1, '555', 'Português '),
(2, '555', 'Raciocínio Lógico '),
(3, '555', 'Inglês ');

INSERT INTO `tbquestao` (`idTesteOnline`, `cnpj`, `idQuestao`, `questao`, `altA`, `altB`, `altC`, `altD`, `resposta`, `tempo`) VALUES
(1, '555', 1, 'Ela sempre resolve os problemas com bastante ..........', 'Discrição', 'Descrição', 'Discrissão', 'Todas as anteriores', 'A', 30),
(1, '555', 2, 'Camila falou que queria ......... exemplos, ......... não falou quantos.', 'Más / mais', 'Mais / mais', 'Mais / más', 'Mais / mas', 'D', 30),
(1, '555', 3, 'Vou ao mercado comprar algo pra ......... beber.', 'Mim', 'Eu', 'Nós', 'Nenhuma das anteriores', 'B', 30),
(1, '555', 4, 'Preciso levar o meu carro para ..........', 'Concertar', 'Consertar', 'Conscertar', 'Todas as anteriores', 'B', 30),
(1, '555', 5, 'Qual é o significado de \"supérfluo\"?', 'Grande', 'Lucro', 'Desnecessário', 'Poderoso', 'C', 30),
(1, '555', 6, 'Ele está trabalhando ......... pois está sempre de ......... humor.', 'Mal / mau', 'Mau / mal', 'Mal / mal', 'Mau / mau', 'A', 30),
(1, '555', 7, 'Qual é o significado de \"nostalgia\"?', 'Magia negra', 'Saudade', 'Tipo de remédio', 'Valor', 'B', 30),
(1, '555', 8, '......... muito tempo que não visitávamos um museu.', 'A', 'À', 'Á', 'Há', 'D', 30),
(1, '555', 9, 'Qual é o significado de \"xenofobia\"?', 'Aversão a cachoeiras e riachos', 'Aversão a insetos', 'Aversão a pessoas e coisas estrangeiras', 'Aversão ao escuro', 'C', 30),
(1, '555', 10, '......... você não me conta a verdade e me explica o ......... disso tudo?', 'Porque / por que', 'Porque / por quê', 'Por que / porquê', 'Por que / porque', 'C', 30),
(2, '555', 1, 'Considere a série de números: 26, 24, 20, 18, 14,... Qual é o próximo número?', '10', '12', '13', '16', 'B', 120),
(2, '555', 2, 'Considere a série de números: 51, 9, 51, 12, 51, 15, 51,… Qual é o próximo número?', '14', '18', '21', '24', 'B', 120),
(2, '555', 3, 'Considere a série de números: 23, 24, 27, 28, 31, 32,… Qual é o próximo número?', '27', '30', '34', '35', 'D', 120),
(2, '555', 4, 'Todas as árvores do parque são floridas. Algumas árvores do parque são ipês amarelos. Todos os ipês amarelos são árvores floridas. Se as duas primeiras sentenças são verdadeiras, a terceira é:', 'Verdadeira', 'Falsa', 'Incerta', 'Nenhuma das anteriores', 'A', 120),
(2, '555', 5, 'Maria corre mais rápido do que Ana. Sílvia corre mais rápido do que Maria. Ana corre mais rápido do que Sílvia. Se as duas primeiras sentenças são verdadeiras, a terceira é:', 'Verdadeira', 'Falsa', 'Incerta', 'Nenhuma das anteriores', 'B', 120),
(2, '555', 6, 'A turma A tem um maior número de alunos do que a turma B. A turma C tem um número menor de alunos do que a turma B. A turma A tem um maior número de alunos do que a turma C. Se as duas primeiras sentenças são verdadeiras, a terceira é:', 'Verdadeira', 'Falsa', 'Incerta', 'Nenhuma das anteriores', 'A', 120),
(2, '555', 7, 'Todas as escolas do bairro ficaram fechadas durante a semana. Muitos pais cancelaram as matrículas de seus filhos das escolas do bairro.', 'A sentença 1 é a causa e a sentença 2 é o seu efeito', 'A sentença 2 é a causa e sentença 1 é o seu efeito', 'As sentenças 1 e 2 são causas independentes', 'As sentenças 1 e 2 são efeitos de causas independentes', 'D', 120),
(2, '555', 8, 'O preço do ouro no mercado interno permaneceu inalterado durante a última semana. O preço do ouro no mercado internacional subiu durante a última semana.', 'A sentença 1 é a causa e a sentença 2 é o seu efeito', 'A sentença 2 é a causa e sentença 1 é o seu efeito', 'As sentenças 1 e 2 são causas independentes', 'As sentenças 1 e 2 são efeitos de causas independentes', 'D', 120),
(2, '555', 9, 'Cada pessoa que é sócia do clube Alfa também é sócia do clube Beta. Alguns sócios do clube Gama, também são sócios do clube Beta. João é sócio de dois desses clubes.', 'Se João é sócio do clube Alfa, ele não faz parte do clube Gama.', 'Se João é sócio do clube Beta, ele não é sócio do clube Gama.', 'Se João é sócio do clube Beta, ele pertence ao clube Alfa.', 'Todos os sócios do clube Beta, fazem parte de, no mínimo, dois clubes.', 'A', 120),
(2, '555', 10, 'No final de uma corrida, quatro motos cruzaram a linha de chegada, uma após a outra. As quatro motos eram das cores: amarela, vermelha, marrom e laranja.\n\nConsidere as seguintes afirmativas:\n    1) João chegou logo atrás de Pedro.\n    2) A moto vermelha chegou antes da moto laranja.\n    3) Fábio não estava na moto marrom.\n    4) Pedro estava na moto vermelha.\n    5) Tiago, que estava na moto amarela, chegou após João.\n\nBaseado na informação anterior, qual das afirmativas é verdadeira?', 'Fábio chegou na terceira posição', 'A moto marrom terminou a corrida antes da moto laranja', 'João estava na moto laranja', 'A moto laranja chegou na terceira posição', 'B', 180),
(3, '555', 1, 'Quando perguntam ¨Can I take a picture with you?¨, significa:', 'Eu posso falar com você?', 'Eu posso tirar uma foto com você?', 'Eu posso tirar uma foto sua?', '  Eu posso dançar com você?', 'B', 60),
(3, '555', 2, 'A palavra TREE é o mesmo que:', 'Três', 'Torre', 'Terça-feira', 'Árvore', 'D', 60),
(3, '555', 3, 'Quando alguém diz ¨I am in love with you\", significa:', 'Eu estou apaixonado(a) por você', 'Eu te amo muito', 'Eu te quero', 'Eu amo estar com você', 'A', 60),
(3, '555', 4, 'Complete: Did you ___ well last night?', 'slep', 'slept', 'sleep', 'slopt', 'C', 60),
(3, '555', 5, 'Na frase, ¨I\'m angry because the bus is late.¨, a palavra ANGRY significa:', 'Feliz', 'Atrasado', 'Nervoso', 'Ansioso', 'C', 60),
(3, '555', 6, 'Na frase, ¨What is wrong with being confident?¨, a tradução da palavra CONFIDENT seria:', 'Confidente', 'Confuso', 'Carinhoso', 'Confiante', 'D', 60),
(3, '555', 7, 'Complete: ¨___ I help you?¨', 'Do', 'May', 'Have', 'Does', 'B', 60),
(3, '555', 8, 'Qual é o antônimo de HAPPY?', 'Love', 'Joyful', 'Sad', 'Unfortunate', 'C', 60),
(3, '555', 9, 'A palavra PIECE significa o quê?', 'Pedaço', 'Coisa', 'Pedra', 'Paz', 'A', 60),
(3, '555', 10, 'Na frase, ¨I\'m feeling weird¨, a palavra WEIRD significa o quê?', 'doente', 'estranho', 'assustado', 'cansado', 'B', 60);

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
