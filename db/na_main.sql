CREATE TABLE IF NOT EXISTS `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`password` char(64) COLLATE utf8_unicode_ci NOT NULL,
	`salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
	`email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	`nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	`estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
	`cidade` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
	`pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
	`dataNasc` date COLLATE utf8_unicode_ci NOT NULL,
	`sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
	`numeroCelular` char(20) COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY (id, email)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `Jogos` (
	`ID` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(50) NOT NULL,
	`tipoJogo` varchar(50) NOT NULL,
	`qtdParticipantes` int(30) NOT NULL,
	`temaJogo` varchar(50) NOT NULL,
	PRIMARY KEY (ID),
	);

CREATE TABLE `Esportes` (
	`ID` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(50) NOT NULL,
	`qtdParticipantes` int(50) NOT NULL,
	PRIMARY KEY (ID)
);

CREATE TABLE `Filmes` (
	`ID` int(11) NOT NULL AUTO_INCREMENT,
	`ano` int(4) NOT NULL,
	`tipo` varchar(50) NOT NULL,
	`tema` varchar(50) NOT NULL,
	`nome` varchar(40) NOT NULL,
	PRIMARY KEY (ID)
);

CREATE TABLE `Outros` (
	`ID` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(40) NOT NULL,
	`tipo` varchar(40) NOT NULL,
	`tema` varchar(40) NOT NULL,
	`qtdParticipantes` int(30) NOT NULL,
	`dadosAdicionais` varchar(50) NOT NULL,
	PRIMARY KEY (ID)
);

CREATE TABLE `UsuarioJogos` (
	`IDUsuario` int(11) NOT NULL,
	`IDJogo` int(11) NOT NULL,
	PRIMARY KEY (IDUsuario, IDJogo),
	FOREIGN KEY IDUsuario REFERENCES users(ID),
	FOREIGN KEY (IDJogo) REFERENCES Jogos(ID)
);

CREATE TABLE `UsuarioFilmes` (
	`IDUsuario` int(11) NOT NULL,
	`IDFilme` int(11) NOT NULL,
	PRIMARY KEY (IDUsuario, IDFilme),
	FOREIGN KEY (IDUsuario) REFERENCES users(ID),
	FOREIGN KEY (IDFilme) REFERENCES Filmes(ID)
);

CREATE TABLE `UsuarioEsportes` (
	`IDUsuario` int(11) NOT NULL,
	`IDEsporte` int(11) NOT NULL,
	PRIMARY KEY (IDUsuario, IDEsporte),
	FOREIGN KEY (IDUsuario) REFERENCES users(ID),
	FOREIGN KEY (IDEsporte) References Esportes(ID)
);

CREATE TABLE `UsuarioOutros` (
	`IDUsuario` int(11) NOT NULL,
	`IDOutro` int(11) NOT NULL,
	PRIMARY KEY (IDUsuario, IDOutro),
	FOREIGN KEY (IDUsuario) REFERENCES users(ID),
	FOREIGN KEY (IDEsporte) REFERENCES Outros(ID)
);


#CREATE TABLE `Entretenimento` (
#	`ID` int(11) NOT NULL,
#	`filme` varchar(50) NOT NULL,
#	`jogo` varchar(50) NOT NULL,
#	`esporte` varchar(50) NOT NULL,
#	`outro` varchar(50) NOT NULL,
#	PRIMARY KEY (ID)
#);