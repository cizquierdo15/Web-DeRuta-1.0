drop database if exists deruta;
--
create database deruta;
use deruta;
--
drop table if exists comentarios;
drop table if exists usuarios;
drop table if exists rutas;

-- 

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `cod_ruta` int(11) NOT NULL auto_increment,
  `nombre` varchar(40) NOT NULL,
  `distancia` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `dificultad` varchar(15) NOT NULL,
  `fecha_borrado` datetime DEFAULT NULL,
  `imagen` varchar(50) NOT NULL,
 primary key (cod_ruta)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL auto_increment,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20),
  `pass` varchar(128) NOT NULL,
  `id_sesion` varchar(50),
  `tipo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_borrado` datetime DEFAULT NULL,
primary key (cod_usuario)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

CREATE TABLE `comentarios` (
  `cod_comentario` int(11) NOT NULL auto_increment,
  `cod_ruta` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `contenido` varchar(150) NOT NULL,
  `fecha_publicacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime NULL,
  `puntos` int(11) NOT NULL,
primary key (cod_comentario,cod_ruta,cod_usuario),
foreign key(cod_ruta) references rutas (cod_ruta)
on delete restrict on update restrict,
foreign key(cod_usuario) references usuarios (cod_usuario)
on delete restrict on update restrict) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


insert into rutas values (0,'Cercedilla a Siete Picos','19.54Km','Madrid','Moderada',null,'giphy.gif');
insert into rutas values (1,'Torres de la Pedriza','15.56Km','Manzanares el Real','Moderada',null,'paisaje.jpg');
insert into usuarios values(0,'admin','adminis','trador','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec','AA0',2, 'admin@correo.es', null);
insert into usuarios values (1,'usuario','usuario','usuario','d9e94fd2b4c5522e5bb7996aa4df48a3f6b8f1b0c3e7fadb5fcc724e3ab6d85dc401b0a2789fe56c209b80e86102b218ff74ff8614f315599a180691846138b6','AA1','1','usuario@correo.es',null);
insert into comentarios (cod_ruta, cod_usuario,contenido, puntos)values (0,0,'Muy bonito',5);
insert into comentarios (cod_ruta, cod_usuario,contenido, puntos)values (0,1,'Me ha gustado',5);
insert into comentarios (cod_ruta, cod_usuario,contenido, puntos)values (1,1,'Apenas sombra',2);
insert into comentarios (cod_ruta, cod_usuario,contenido, puntos)values (1,0,'Poca sombra',2);
insert into comentarios (cod_ruta, cod_usuario,contenido, puntos)values (1,0,'Repetí y me llovió',0);



