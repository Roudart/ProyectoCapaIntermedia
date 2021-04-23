CREATE SCHEMA IF NOT EXISTS ShademyDB;

USE ShademyDB;
CREATE TABLE IF NOT EXISTS Usuario(
	IdUsuario INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    TipoUsuario ENUM ('Admin', 'Maestro', 'Estudiante') DEFAULT 'Estudiante',
    Nombre VARCHAR(40) NOT NULL,
    ApellidoPaterno VARCHAR(60) NOT NULL,
    ApellidoMaterno VARCHAR(60) NOT NULL,
    Apodo VARCHAR(30) NOT NULL,
    CorreoElectronico VARCHAR(60) NOT NULL,
    Contraseña VARCHAR(30) NOT NULL,
    Imagen VARCHAR(256) NULL,
    Biografía VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Curso(
	IdCurso INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    Nombre VARCHAR(60) NOT NULL,
    Descripción VARCHAR(256) NOT NULL,
    Requisitos VARCHAR(256) NOT NULL,
    Precio DECIMAL(15,2) NOT NULL,
    Extras VARCHAR(125) NULL
);

CREATE TABLE IF NOT EXISTS Tema(
	IdTema INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    Nombre VARCHAR(256) NOT NULL,
    Descripción VARCHAR(256) NOT NULL,
    IdCurso INT NOT NULL,
    FOREIGN KEY FK_TEMACURSO (IdCurso) REFERENCES Curso(IdCurso)
);

CREATE TABLE IF NOT EXISTS Categoria(
	IdCategoria INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    Nombre VARCHAR(30) NOT NULL,
    Color VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS Resena(
	IdResena INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    IdUsuario INT NOT NULL,
    Contenido VARCHAR(256) NOT NULL,
    FOREIGN KEY FK_ResenaUsuario (IdUsuario) REFERENCES Usuario(IdUsuario)
);

CREATE TABLE IF NOT EXISTS Clase(
	IdClase INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    Fecha DATETIME NOT NULL,
    FechaInicio DATETIME NOT NULL,
    FechaFfinal	DATETIME NOT NULL,
    Sala VARCHAR(256) NOT NULL,
    IdCurso INT NOT NULL,
    FOREIGN KEY FK_ClaseCurso (IdCurso) REFERENCES Curso(IdCurso)
);

CREATE TABLE IF NOT EXISTS UsuarioCurso(
	IdCursoDeseado INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    IdUsuario INT NOT NULL,
    IdCurso INT NOT NULL,
    Estado ENUM ('Deseado', 'Impartiendo', 'Cursando', 'Cursado'),
    FOREIGN KEY FK_UsuarioCursoUsuario (IdUsuario) REFERENCES Usuario(IdUsuario),
    FOREIGN KEY FK_UsuarioCursoCurso (IdCurso) REFERENCES Curso(IdCurso)
);

CREATE TABLE IF NOT EXISTS CursoCategoria(
	IdCursoCategoria INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    IdCurso INT NOT NULL,
    IdCategoria INT NOT NULL,
    FOREIGN KEY FK_CursoCategoriaCurso (IdCurso) REFERENCES Curso(IdCurso),
    FOREIGN KEY FK_CursoCategoriaCategoria (IdCategoria) REFERENCES Categoria(IdCategoria)
);

DROP PROCEDURE IF EXISTS SaludoDB;
DELIMITER $$
CREATE PROCEDURE SaludoDB()
BEGIN
		SELECT "Hola Mundo soy una base de datos de MYSQL";
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS TraerUsuariosManager;
DELIMITER $$
CREATE PROCEDURE TraerUsuariosManager()
BEGIN
SELECT IdUsuario, TipoUsuario, CONCAT_WS(' ', Nombre, ApellidoPaterno, ApellidoMaterno) AS NombreCompleto FROM USUARIO;
END $$
DELIMITER ;