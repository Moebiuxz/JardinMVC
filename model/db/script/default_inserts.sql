/*INSERTS POR DEFECTO*/
-- --------------------------------
USE arduin_bd;

/*Tipo de cuenta*/
INSERT INTO tipo_cuenta (tipo_id, tipo_descripcion)
VALUES (1, 'ADMINISTRADOR');
INSERT INTO tipo_cuenta (tipo_id, tipo_descripcion)
VALUES (2, 'NORMAL');

/*Usuario*/
INSERT INTO usuario (usuario_rut, usuario_nombre, usuario_apellido)
VALUES ('18039352-8', 'Álvaro', 'Bunster');

/*Cuenta*/
INSERT INTO cuenta (fk_usuario_rut, cuenta_clave, fk_cuenta_tipo)
VALUES ('18039352-8', sha2('123456', 256), 1);

/*Tipo de riego*/
INSERT INTO tipo_riego (tipo_id, tipo_descripcion)
VALUES (1, 'AUTOMÁTICO');
INSERT INTO tipo_riego (tipo_id, tipo_descripcion)
VALUES (2, 'MANUAL');

