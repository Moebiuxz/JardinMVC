CREATE DATABASE arduin_bd;
USE arduin_bd;

CREATE TABLE tipo_cuenta (
  tipo_id INT NOT NULL,
  tipo_descripcion VARCHAR(100) DEFAULT NULL,
  eliminar_estado BIT DEFAULT 0,
  PRIMARY KEY (tipo_id)
);

CREATE TABLE usuario (
  usuario_rut VARCHAR(12) NOT NULL,
  usuario_nombre VARCHAR(150) NOT NULL,
  usuario_apellido VARCHAR(150) NOT NULL,
  eliminar_estado BIT DEFAULT 0,
  PRIMARY KEY (usuario_rut)
);

CREATE TABLE cuenta (
  cuenta_id INT AUTO_INCREMENT,
  fk_usuario_rut VARCHAR(12) NOT NULL,
  cuenta_clave VARCHAR(150) NOT NULL,
  fk_cuenta_tipo INT NOT NULL,
  eliminar_estado BIT DEFAULT 0,
  FOREIGN KEY (fk_usuario_rut) REFERENCES usuario(usuario_rut),
  FOREIGN KEY (fk_cuenta_tipo) REFERENCES tipo_cuenta(tipo_id),
  PRIMARY KEY (cuenta_id)
);

CREATE TABLE tipo_riego (
  tipo_id INT NOT NULL,
  tipo_descripcion VARCHAR(150) NOT NULL,
  eliminar_estado BIT DEFAULT 0,
  PRIMARY KEY (tipo_id)
);

CREATE TABLE riego (
  riego_id INT AUTO_INCREMENT,
  riego_fecha DATETIME NOT NULL,
  riego_temperatura FLOAT NOT NULL,
  ruego_humedad FLOAT NOT NULL,
  fk_riego_tipo INT NOT NULL,
  fk_riego_usuario VARCHAR(12) NULL,
  eliminar_estado BIT DEFAULT 0,
  FOREIGN KEY (fk_riego_tipo) REFERENCES tipo_riego(tipo_id),
  FOREIGN KEY (fk_riego_usuario) REFERENCES usuario(usuario_rut),
  PRIMARY KEY (riego_id)
);