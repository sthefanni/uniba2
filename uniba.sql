
-- DROP DATABASE IF EXISTS UniBA;
CREATE DATABASE UniBA;

USE UniBA;

CREATE TABLE usuario (
  IDusuario INT NOT NULL UNIQUE AUTO_INCREMENT,
  senha  VARCHAR(20),
  nome    VARCHAR(50),
  email  VARCHAR(50),
  dataNascimento DATE,
  
  PRIMARY KEY (IDusuario)
)DEFAULT CHARSET = utf8;


CREATE TABLE instituicao (
  SIGLA   VARCHAR(20),
  municipio  VARCHAR(50),
  nomeInst  VARCHAR(200),
  numCursos  INT NOT NULL,
  tipoEnsino  VARCHAR(200),

  PRIMARY KEY (SIGLA)
)DEFAULT CHARSET = utf8;


CREATE TABLE curso (
  codCurso   INT NOT NULL UNIQUE,
  area  VARCHAR(50),
  nomeCurso  VARCHAR(100),

  PRIMARY KEY (codCurso)
)DEFAULT CHARSET = utf8;

CREATE TABLE inst_curso (
    SIGLA_inst VARCHAR(20),
    id_curso INT NOT NULL
)DEFAULT CHARSET = utf8;

-- O que difere um usuário do outro é o seu ID, cada ID tem uma SIGLA ou um CODCURSO diferente. A tabela favorito armazena o usuário e seu favorito.
CREATE TABLE favorito (
  codCurso   INT NOT NULL UNIQUE,
  SIGLA   VARCHAR(20),
  IDusuario  INT NOT NULL UNIQUE,

  FOREIGN KEY (codCurso) REFERENCES curso (codCurso),
  FOREIGN KEY (SIGLA) REFERENCES instituicao (SIGLA),
  FOREIGN KEY (IDusuario) REFERENCES usuario (IDusuario)
)DEFAULT CHARSET = utf8;


-- CONSULTA PARA VER A RELAÇÃO INSTITUIÇÃO COM CURSO (é muito importante)
-- SELECT p.nomeInst As nomeInst , l.nomeCurso As nomeCurso FROM instituicao AS p JOIN inst_curso AS pl On pl.SIGLA_inst = p.SIGLA JOIN curso AS l ON l.codCurso = pl.id_curso ORDER BY p.nomeInst ASC



-- INSTITUIÇÕES


INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('CESUPI','Ilhéus', 'CESUPI - Centro de Ensino de Superior de Ilhéus', '5', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UNIFG', 'Guanambi', 'UNIFG - Centro Universitário de Guanambi', '5', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('Estácio', 'Salvador', 'Estácio', '5', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('FANEB', 'Coronel João de Sá', 'FANEB - Faculdade do Nordeste da Bahia', '5', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('FAAHF', 'Luís Eduardo Magalhães', 'FAAHF - Faculdade Arnaldo Horácio Ferreira', '5', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UNISULBAHIA', 'Eunápolis', 'UNISULBAHIA - Faculdades Integradas do Extremo Sul da Bahia', '5', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('FAMEC', 'Camaçari', 'FAMEC - Faculdade Metropolitana de Camaçari', '5', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('Pitágoras', 'Ipatinga', 'Faculdade Pitágoras', '5', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('FASB SBC', 'Barreiras', 'FASB SBC - Faculdade São Francisco de Barreiras', '4', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('FACIIP', 'Lauro de Freitas', 'FACIIP - Faculdades Integradas Ipitanga', '5', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('IFBAIANO', 'Guanambi', 'IF BAIANO - Instituto Federal Baiano', '2', 'Pública');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UNILAB', 'São Francisco Do Conde', ' UNILAB - Universidade da Integração Internacional da Lusofonia Afro-Brasileira', '5', 'Pública');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UNEB', 'Guanambi', 'UNEB - Universidade Estadual da Bahia', '5', 'Pública');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UEFS', 'Feira de Santana', 'UEFS - Universidade Estadual de Feira de Santana', '5', 'Pública');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UESB', 'Itapetinga', 'UESB - Universidade Estadual do Sudoeste Bahia', '5', 'Pública');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UFBA', 'Salvador', ' UFBA - Universidade Federal da Bahia', '6', 'Pública');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UFRB', 'Armagosa', ' UFRB - Universidade Federal do Recôncavo da Bahia', '5', 'Pública');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UNIVASF', 'Juazeiro', 'UNIVASF - Universidade Federal do Vale do São Francisco', '5', 'Pública');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UNIVERSO', 'Salvador', 'UNIVERSO Universidade Salgado de Oliveira', '5', 'Privada');
INSERT INTO instituicao (SIGLA,municipio,nomeInst,numCursos,tipoEnsino) VALUES ('UNIFTC', 'Itabuna', 'UNIFTC - Centro Universitário de Tecnologia e Ciência', '5', 'Pública');


-- CURSOS


INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('01', 'Humanas', 'Administração');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('02', 'Ciências Sociais Aplicadas', 'Ciências Contábeis');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('03','Ciências Humanas', 'Direito' );
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('04', 'Ciências Biológicas', 'Enfermagem');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('05', 'Exatas', 'Engenharia Civil');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('06', 'Exatas','Design');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('07', 'Ciências Biológicas ', 'Medicina');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('08','Ciências Biológicas', 'Medicina Veterinária');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('09', 'Ciências Humanas',  'Psicologia ');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('10', 'Exatas' , ' Análise e desenvolvimento de sistemas');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('11', 'Recursos Humanos ', 'Gestão de recursos humanos');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('12', 'Ciências Exatas ', 'Investigação Forense e Perícia Criminal');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('13', 'Ciências Exatas e Biológicas', 'Agronomia');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('14 ', 'Ciências humanas', 'Educação Física');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('15', 'Ciências Humanas', 'Pedagogia');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('16','Ciências humanas', 'Letras');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('17', 'Ciências Biológicas', 'Fisioterapia');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('18','Ciências exatas', 'Engenharia de produção');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('19','Ciências exatas', 'Química');
INSERT INTO curso (codCurso, area, nomeCurso) VALUES ('20','Ciências exatas', 'Engenharia Elétrica');


-- RELAÇÕES ENTRE CURSOS E INSTITUIÇÕES


INSERT INTO inst_curso (SIGLA_inst, id_curso) VALUES
('UNIFTC', '01'),('UNIFTC','02'),('UNIFTC','03'),
('UNIVERSO', '01'),('UNIVERSO','02'),('UNIVERSO','03'),
('UNEB', '01'),('UNEB', '14'),('UNEB', '04'),('UNEB', '15'),
('FACIIP', '01'),('FACIIP','02'),('FACIIP','15'),('FACIIP','18'),
('UNISULBAHIA','02'),('UNISULBAHIA','03'),('UNISULBAHIA','01'),('UNISULBAHIA','04'),('UNISULBAHIA','17'),
('FAMEC','18'),('FAMEC','17'),('FAMEC','16'),('FAMEC','15'),('FAMEC','09'),('FAMEC','14'),('FAMEC','05'),('FAMEC','09'),
('FASB SBC','04'),('FAMEC','17'),('FAMEC','07'),('FAMEC','09'),
('UEFS','01'),('UEFS','02'),('UEFS','13'),
('UNILAB','16'),('UNILAB','15'),('UNILAB','19'),
('CESUPI','03'),('CESUPI','02'),('CESUPI','04'),('CESUPI','05'),
('UNIFG','03'),('UNIFG','07'),('UNIFG','08'),('UNIFG','09'),('UNIFG','06'),
('FAAHF','03'),('FAAHF','18'),('FAAHF','16'),('FAAHF','15'),('FAAHF','09'),
('UFBA','03'),('UFBA','16'),('UFBA','09'),
('ESTÁCIO','10'),('ESTÁCIO','11'),('ESTÁCIO','12'),('ESTÁCIO','07'),('ESTÁCIO','09'),
('FANEB','01'),('FANEB','13'),('FANEB','14'),('FANEB','05'),('FANEB','15'),
('IFBAIANO','19'),
('UESB','19'),
('UFRB','06'),('UFRB','13'),
('UNIVASF','20');