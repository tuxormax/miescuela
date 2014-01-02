CREATE TABLE IF NOT EXISTS `alumnos` (
  `idalumno` INT NOT NULL AUTO_INCREMENT,
  `nombre_alumno` VARCHAR(200) NOT NULL,
  `apellido_alumno` VARCHAR(200) NOT NULL,
  `edad_alumno` INT(11) NOT NULL,
  `telefono_alumno` INT(11) NULL,
  `email_alumno` VARCHAR(200) NULL,
  `usuario_alumno` VARCHAR(45) NULL,
  `pass_alumno` VARCHAR(45) NULL,
  `idperfil` INT NOT NULL,
  PRIMARY KEY (`idalumno`)
  );


CREATE TABLE IF NOT EXISTS `materias` (
  `idmateria` INT NOT NULL AUTO_INCREMENT,
  `nombre_materia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idmateria`)
  );
  
CREATE TABLE IF NOT EXISTS `profesores` (
  `idprofesor` INT NOT NULL AUTO_INCREMENT,
  `nombre_profesor` VARCHAR(200) NOT NULL,
  `apellidos_profesor` VARCHAR(200) NOT NULL,
  `telefono_profesor` INT(11) NULL,
  `email_profesor` VARCHAR(200) NULL,
  `usuario_profesor` VARCHAR(45) NULL,
  `pass_profesor` VARCHAR(45) NULL,
  `idperfil` INT NOT NULL,
  PRIMARY KEY (`idprofesor`)
  );
  
  CREATE TABLE IF NOT EXISTS `calificaciones` (
  `idcalificacion` INT NOT NULL AUTO_INCREMENT,
  `idalumno` INT NOT NULL,
  `idmateria` INT NOT NULL,
  `idprofesor` INT NOT NULL,
  'calificacion' FLOAT NOT NULL,
  PRIMARY KEY (`idcalificaciones`)
  );

 CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`)
  );
