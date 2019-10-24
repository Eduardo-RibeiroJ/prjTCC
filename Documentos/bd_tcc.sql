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
  `cargo` varchar(50) NOT NULL,
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
  `resumoVaga` varchar(200) NOT NULL,
  `nivelCargo` varchar(30) NOT NULL,
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
  ADD PRIMARY KEY (`cpf`,`idObjetivo`);

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
  ADD PRIMARY KEY (`idPergunta`);

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
  ADD PRIMARY KEY (`idTesteOnline`,`idQuestao`);

--
-- Índices para tabela `tbtesteonline`
--
ALTER TABLE `tbtesteonline`
  ADD PRIMARY KEY (`idTesteOnline`);

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
-- AUTO_INCREMENT de tabela `tbpergunta`
--
ALTER TABLE `tbpergunta`
  MODIFY `idPergunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbprocessoseletivo`
--
ALTER TABLE `tbprocessoseletivo`
  MODIFY `idProcesso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtesteonline`
--
ALTER TABLE `tbtesteonline`
  MODIFY `idTesteOnline` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `FK_CPFOBJ` FOREIGN KEY (`cpf`) REFERENCES `tbcandidato` (`cpf`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
