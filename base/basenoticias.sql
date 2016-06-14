CREATE DATABASE basenoticias DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE basenoticias;

CREATE TABLE IF NOT EXISTS noticias (
  idNoticia int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(20) NOT NULL,
  categoria varchar(50) NOT NULL,
  noticia varchar(100) NOT NULL,
  imagen varchar(50) NOT NULL,
  PRIMARY KEY (idNoticia)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO noticias (idNoticia, titulo, categoria, noticia, imagen) VALUES
(1, 'Noticia 1', 'Deporte', 'Texto noticia 1', 'foto1.jpg');
