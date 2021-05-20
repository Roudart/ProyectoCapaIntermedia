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
    Biografía VARCHAR(255) NULL
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

CREATE TABLE IF NOT EXISTS Requisito(
	IdRequisito INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    IdCurso INT NOT NULL,
    Nombre VARCHAR(60) NOT NULL,
    FOREIGN KEY FK_REQUISITOCURSO (IdCurso) REFERENCES Curso(IdCurso)
);

CREATE TABLE IF NOT EXISTS TemaVisto(
	IdTemaVisto INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    IdUsuario INT NOT NULL,
    IdCurso INT NOT NULL,
    IdTema INT NOT NULL,
    Visto TINYINT NOT NULL DEFAULT 0,
    FOREIGN KEY FK_TEMAVISTO_USUARIO (IdUsuario) REFERENCES usuario(IdUsuario),
	FOREIGN KEY FK_TEMAVISTO_CURSO (IdCurso) REFERENCES tema(IdCurso)
);


ALTER TABLE TEMA
ADD NumTema INT NOT NULL
AFTER Descripción;

ALTER TABLE curso
ADD Aprobado TINYINT NOT NULL DEFAULT 1
AFTER Extras;

ALTER TABLE curso
ADD IdMaestro INT
AFTER IdCurso;

ALTER TABLE curso
DROP COLUMN Extras;

ALTER TABLE curso
DROP COLUMN Requisitos;

ALTER TABLE curso
ADD ImagenURL VARCHAR(255) NULL
AFTER Aprobado;

ALTER TABLE curso
ADD FechaCreada DATETIME NOT NULL DEFAULT NOW();

ALTER TABLE usuariocurso
ADD Calificacion TINYINT NULL;

DROP PROCEDURE IF EXISTS SaludoDB;
DELIMITER $$
CREATE PROCEDURE SaludoDB()
BEGIN
		SELECT "Hola Mundo soy una base de datos de MYSQL";
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS RegistrarUsuario;
DELIMITER $$
CREATE PROCEDURE RegistrarUsuario(
    regNombre VARCHAR(40),
    regApellidoPaterno VARCHAR(60),
    regApellidoMaterno VARCHAR(60),
    regApodo VARCHAR(30),
    regCorreoElectronico VARCHAR(60),
    regContraseña VARCHAR(30),
    regImagen VARCHAR(256))
BEGIN	
        INSERT INTO Usuario (Nombre, ApellidoPaterno, ApellidoMaterno, Apodo, CorreoElectronico, Contraseña, Imagen) 
        values (regNombre, regApellidoPaterno, regApellidoMaterno, regApodo, regCorreoElectronico, regContraseña, regImagen);
        SELECT IdUsuario FROM Usuario ORDER BY IdUsuario DESC limit 1;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS BuscarUsuario;
DELIMITER $$
CREATE PROCEDURE BuscarUsuario(id INT)
BEGIN
    SELECT TipoUsuario, Nombre, ApellidoPaterno, ApellidoMaterno, Apodo, CorreoElectronico, Imagen
    FROM Usuario
    WHERE IdUsuario = id
    LIMIT 1;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS IniciarSesion;
DELIMITER $$
CREATE PROCEDURE IniciarSesion(Correo VARCHAR(40), Pass VARCHAR(40))
BEGIN
	SELECT IdUsuario FROM Usuario WHERE CorreoElectronico = Correo AND Contraseña = Pass LIMIT 1;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS TraerUsuariosManager;
DELIMITER $$
CREATE PROCEDURE TraerUsuariosManager()
BEGIN
        SELECT IdUsuario, TipoUsuario, CONCAT_WS(' ', Nombre, ApellidoPaterno, ApellidoMaterno) AS NombreCompleto FROM USUARIO;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS DeleteUser;
DELIMITER $$
CREATE PROCEDURE DeleteUser(id INT)
BEGIN
	    DELETE FROM Usuario WHERE IdUsuario = id;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS CambiarTipoUsuario;
DELIMITER $$
CREATE PROCEDURE CambiarTipoUsuario(IN id INT,IN Tipo int) /*(INDICE DE USUARIO, (INT)1 - "ADMIN" (INT)2 - "MAESTRO" (INT)3 - "ESTUDIANTE")*/
BEGIN
	    UPDATE usuario SET TipoUsuario = Tipo WHERE IdUsuario = id;
END $$
DELIMITER $$

DROP PROCEDURE IF EXISTS BuscarFotoUsuario;
DELIMITER $$
CREATE PROCEDURE BuscarFotoUsuario(id INT)
BEGIN	
        SELECT Imagen FROM usuario WHERE IdUsuario = id LIMIT 1;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS CrearCurso;
DELIMITER $$
CREATE PROCEDURE CrearCurso(Id INT, NombreCurso VARCHAR(60), Des VARCHAR(256), Costo DECIMAL(15,2), Imagen VARCHAR(256))
BEGIN
	INSERT INTO curso (IdMaestro, Nombre, Descripción, Precio, Aprobado, ImagenURL)
    VALUES (Id, NombreCurso, Des, Costo, 0, Imagen); 
    SELECT IdCurso FROM Curso ORDER BY IdCurso DESC LIMIT 1;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS CrearTema;
DELIMITER $$
CREATE PROCEDURE CrearTema(NombreTema VARCHAR(256), Des VARCHAR(156), Num INT, Curso INT)
BEGIN
	INSERT INTO Tema (Nombre, Descripción, NumTema, IdCurso)
    VALUES (NombreTema, Des, Num, Curso); 
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS CrearRequisito;
DELIMITER $$
CREATE PROCEDURE CrearRequisito(Curso INT, NombreRequisito VARCHAR(100))
BEGIN
	INSERT INTO Requisito (IdCurso, Nombre)
    VALUES (Curso, NombreRequisito); 
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS CrearCategoria;
DELIMITER $$
CREATE PROCEDURE CrearCategoria(NombreCategoria VARCHAR(30), ColorCategoria VARCHAR(20))
BEGIN
	INSERT INTO categoria (Nombre, Color) 
	VALUES (NombreCategoria, ColorCategoria);
    SELECT IdCategoria FROM categoria ORDER BY IdCategoria DESC LIMIT 1;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS AgregarCategoriaCurso;
DELIMITER $$
CREATE PROCEDURE AgregarCategoriaCurso(Curso INT, NombreCategoria VARCHAR(30))
BEGIN
	DECLARE IdCat INT unsigned;
    SELECT IdCategoria INTO IdCat FROM categoria WHERE Nombre = NombreCategoria; 
	INSERT INTO cursocategoria (IdCurso, IdCategoria)
    VALUES (Curso, IdCat); 
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS AgregarVistasTema;
DELIMITER $$
CREATE PROCEDURE AgregarVistasTema(IdUsuario INT,IdCurso INT, IdTema INT)
BEGIN
		INSERT INTO temavisto (IdUsuario, IdCurso, IdTema, Visto) VALUES (IdUsuario, IdCurso, IdTema, 0);
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS AgregarCursoUsuario;
DELIMITER $$
CREATE PROCEDURE AgregarCursoUsuario(Curso INT, Usuario INT, CursoEstado INT) /*  INDICE ESTADO, (INT)1 - "Deseado", (INT)2 - "Impartiendo", (INT)3 - "Cursando", (INT)4 - "Cursado" */
BEGIN
	DECLARE CursoDeseadoId INT DEFAULT -1;
	DECLARE UsuarioId INT;
    DECLARE CursoId INT;
    DECLARE EstadoCurso INT;
    DECLARE NumeroTemas INT;
    DECLARE x INT DEFAULT 0;
	SELECT IdCursoDeseado, IdCurso, IdUsuario, Estado INTO CursoDeseadoId, CursoId, UsuarioId, EstadoCurso FROM usuariocurso WHERE IdCurso = Curso AND IdUsuario = Usuario LIMIT 1;
    IF CursoDeseadoId > -1 THEN /* EN CASO DE ENCONTRAR UNA RELACION ENTRE EL ESTUDIANTE Y EL CURSO */
		IF CursoDeseadoId > -1 AND EstadoCurso = CursoEstado THEN  /* EN CASO DE QUE SE ENCUENTRA UN RESULTADO Y CON EL MISMO ESTADO SE DEBE ELIMINAR*/
			DELETE FROM usuariocurso WHERE IdCursoDeseado = CursoDeseadoId;
			SELECT "Eliminado" AS Respuesta;
		ELSE 
			UPDATE usuariocurso SET Estado = CursoEstado WHERE IdCursoDeseado = CursoDeseadoId;/* EN CASO DE QUE TENGA OTRO ESTADO AL QUE YA TIENE, SE ACTUALIZA CON NUEVO ESTADO */
            SELECT "Actualizado" AS Respuesta;
		END IF;
		ELSE /* SI NO HAY NINGUN REGISTRO CON TAL RELACIÓN, SE CREA UN NUEVO REGISTRO*/
        INSERT INTO usuariocurso (IdCurso, IdUsuario, Estado) VALUES (Curso, Usuario, CursoEstado);
        SELECT "Insertado" AS Respuesta;
    END IF;
    IF CursoEstado = 3 THEN /* SI SE VA A CURSAR, HAY QUE CREAR LAS TABLAS DE LOS TEMAS QUE VA A VER */
		SELECT COUNT(NumTema) INTO NumeroTemas FROM tema WHERE IdCurso = Curso;
		WHILE x < NumeroTemas DO
			CALL AgregarVistasTema(Usuario, Curso,x+1);
            SET x = x+1;
		END WHILE;
	END IF;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS TraerCursosCategoria;
DELIMITER $$
CREATE PROCEDURE TraerCursosCategoria(Categoria INT)
BEGIN
	SELECT C.IdCurso, C.Nombre, C.Descripción, C.ImagenURL FROM curso AS C
    INNER JOIN cursocategoria AS CC
    ON C.IdCurso = CC.IdCurso
    WHERE CC.IdCategoria = Categoria
    ORDER BY RAND();
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS TraerCursosPendientes; /* PENDIENTE - INCOMPLETO PERO FUNCIONA - POR FAVOR CORRER */
DELIMITER $$
CREATE PROCEDURE TraerCursosPendientes(Usuario INT)
BEGIN
	SELECT C.IdCurso, C.Nombre, UC.Estado, IF(UC.Estado = 'Deseado',0, 100/COUNT(T.IdTema)) AS Avance FROM usuariocurso AS UC
	INNER JOIN curso AS C
	ON UC.IdCurso = C.IdCurso
    INNER JOIN tema as T
    ON T.IdCurso = UC.IdCurso
	WHERE UC.IdUsuario = Usuario
    GROUP BY UC.IdCurso;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS MasVendidos;
DELIMITER $$
CREATE PROCEDURE MasVendidos()
BEGIN
SELECT COUNT(C.IdCurso) AS Compras, C.IdCurso, C.Nombre, C.Descripción, C.Precio, C.ImagenURL, UC.Estado, SUM(C.Precio) AS TotalVentas FROM curso AS C
INNER JOIN usuariocurso AS UC ON C.IdCurso = UC.IdCurso WHERE UC.Estado != "Deseado" GROUP BY C.IdCurso ORDER BY Compras DESC;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS MasRecientes;
DELIMITER $$
CREATE PROCEDURE MasRecientes()
BEGIN
SELECT IdCurso, Nombre, Descripción, ImagenURL, 
IF (
/*DIAS*/
DATEDIFF(NOW(), FechaCreada) != 0, CONCAT_WS(" ",TIMESTAMPDIFF(DAY, FechaCreada, NOW()), "días"), 
	IF(
    /*HORAS*/
    TIMESTAMPDIFF(HOUR, FechaCreada, NOW()) > 1, CONCAT_WS(" ",TIMESTAMPDIFF(HOUR, FechaCreada, NOW()), "horas"), 
		IF (
        /*MINUTOS*/
		TIMESTAMPDIFF(MINUTE, FechaCreada, NOW()) != 0 ,CONCAT_WS(" ", TIMESTAMPDIFF(MINUTE, FechaCreada, NOW()), "minutos"), CONCAT_WS(" ", TIMESTAMPDIFF(SECOND, FechaCreada, NOW()), "segundos")
        )
    )
)
AS Hace FROM curso ORDER BY FechaCreada DESC;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS MejorCalificados;
DELIMITER $$
CREATE PROCEDURE MejorCalificados()
BEGIN
SELECT C.IdCurso, C.Nombre, C.Descripción, C.Precio, C.ImagenURL, SUM(UC.Calificacion) AS SUMA, COUNT(C.IdCurso) AS CUENTA, CAST(SUM(UC.Calificacion)/COUNT(C.IdCurso) AS DECIMAL(4,1)) AS Promedio FROM curso AS C
INNER JOIN usuariocurso AS UC ON C.IdCurso = UC.IdCurso
GROUP BY C.IdCurso
ORDER BY Promedio DESC;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS CalificarCurso;
DELIMITER $$
CREATE PROCEDURE CalificarCurso(Curso INT, Usuario INT, Rating TINYINT)
BEGIN
	DECLARE Existe BOOLEAN;
	SELECT IdCursoDeseado INTO Existe FROM usuariocurso WHERE IdCurso = Curso AND IdUsuario = Usuario;
    IF Existe THEN UPDATE usuariocurso SET Calificacion = Rating WHERE IdCurso = Curso AND IdUsuario = Usuario;
    ELSE SELECT 'No hay relación' AS Respuesta;
    END IF;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS CalificacionUsuarioCurso;
DELIMITER $$
CREATE PROCEDURE CalificacionUsuarioCurso(Curso INT, Usuario INT)
BEGIN
SELECT Calificacion FROM usuariocurso WHERE IdCurso = Curso AND IdUsuario = Usuario LIMIT 1;
END $$
DELIMITER ;