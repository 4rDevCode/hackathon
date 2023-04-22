
DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_mochila`$$ 

CREATE PROCEDURE `sp_mochila`(
	_id INT,
  _id_familia INT,
  _descripcion VARCHAR(500),
  _peso DECIMAL(8,2) ,
  _estado CHAR(1),
  inout _msj VARCHAR(200)
	)
BEGIN		
	IF(_id=0) THEN
		IF((SELECT COUNT(*) FROM tbl_mochila WHERE descripcion = _descripcion and id_familia = _id_familia) > 0) THEN
			set _msj = 'Mochila ya se encuentra registrada.';			
		ELSE			
			INSERT INTO tbl_mochila (id_familia,descripcion,peso,estado)
			VALUES(_id_familia,_descripcion,_peso,_estado);                    
          
			SET _msj =  'Registro Exitoso.';
		END IF;
	ELSE 
		IF((SELECT COUNT(*) FROM tbl_mochila WHERE descripcion = _descripcion and id_familia = _id_familia and id <> _id) > 0) THEN
			set _msj =  'Mochila ya se encuentra registrada.';			
		ELSE			
			UPDATE tbl_mochila 
			SET 
				descripcion=_descripcion, peso = _peso, estado = _estado
			WHERE id=_id;		
			SET _msj =  'Edición Exitosa.';
		END IF;
	END IF;
END$$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_registrar_familia`$$

CREATE PROCEDURE `sp_registrar_familia` (
    _id_usuario int,
    _codigo VARCHAR(20),
    _nombre VARCHAR(500),
    INOUT `_msj` VARCHAR(200)
) 
BEGIN 
	set @idfam = 0;
    IF(( SELECT COUNT(*) FROM tbl_familia WHERE codigo = _codigo ) > 0 ) THEN
		set @idfam = (select id from tbl_familia where codigo = _codigo limit 1);
    elseIF(( SELECT COUNT(*) FROM tbl_familia WHERE codigo = _codigo ) = 0 ) THEN
        insert into tbl_familia(codigo, nombre, estado) values(_codigo, _nombre, 'A');
        set @idfam = (SELECT LAST_INSERT_ID());
	END IF;
    IF( @idfam = 0 ) THEN
        SET _msj = 'Ocurrió un error, por favor vuelva a intentarlo luego de refrescar la página.';        
    ELSE
        update tbl_usuario set id_familia = @idfam where  id = _id_usuario;
        SET _msj = concat('Registro exitoso.$',@idfam,'|',_codigo,'|',_nombre);
    END IF;   
END $$


DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_registrar_usuario`$$

CREATE PROCEDURE `sp_registrar_usuario` (
	`_id_familia` INT,
    `_nrodoc` VARCHAR(25),
    `_apellidos` VARCHAR(500),
    `_nombres` VARCHAR(500),
    `_email` VARCHAR(550),
    `_contrasena` longtext,
    INOUT `_msj` VARCHAR(200)
) 
BEGIN 
    IF(( SELECT COUNT(*) FROM tbl_usuario WHERE email = _email ) > 0 ) THEN
        SET _msj = 'Email ya se encuentra registrado.';
    ELSEIF(( SELECT COUNT(*) FROM tbl_usuario WHERE nrodoc = _nrodoc  ) > 0 ) THEN
        SET _msj = 'Número de documento ya registrado.';        
    ELSE
        insert into tbl_usuario(id_familia, nrodoc, apellidos, nombres, email, contrasena, estado, fechareg)
        values (_id_familia, _nrodoc, _apellidos, _nombres , _email, md5(_contrasena), 'R', now());
        set @datausu=(select concat(cast(u.id as char),'|',u.apellidos,', ', u.nombres,'|',u.email,'|',u.nrodoc,'|',cast(u.id_familia as char),'|',ifnull((select f.codigo from tbl_familia f where f.id = u.id_familia limit 1),'')
    ,'|',ifnull((select f.nombre from tbl_familia f where f.id = u.id_familia limit 1),'') ) as DataUsu
			 FROM tbl_usuario u
             WHERE id = (SELECT LAST_INSERT_ID()));
        SET _msj = concat('Bienvenido$',@datausu);   
    END IF;   
END $$


DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_login`$$

CREATE PROCEDURE `sp_login` (
    `_email` VARCHAR(500), 
    `_contrasena` LONGTEXT, 
    INOUT `_msj` VARCHAR(200)
)   
BEGIN
	IF((SELECT COUNT(*) FROM tbl_usuario WHERE email = _email  or nrodoc = _email ) = 0) THEN
		SET _msj = 'Email no existe.'; 
	ELSEIF((SELECT COUNT(*) FROM tbl_usuario WHERE (email = _email  or nrodoc = _email ) and contrasena = md5(_contrasena )) = 0) THEN
		SET _msj = 'Contraseña erronea.';
	ELSEIF((SELECT COUNT(*) FROM tbl_usuario WHERE (email = _email  or nrodoc = _email ) and contrasena = md5(_contrasena ) and (estado in('A', 'R'))) = 0) THEN
		SET _msj = 'Usuario se encuentra inactivo.';
	ELSE
		set @datausu=(select concat(cast(u.id as char),'|',u.apellidos,', ', u.nombres,'|',u.email,'|',u.nrodoc,'|',cast(u.id_familia as char),'|',ifnull((select f.codigo from tbl_familia f where f.id = u.id_familia limit 1),'')
    ,'|',ifnull((select f.nombre from tbl_familia f where f.id = u.id_familia limit 1),'') ) as DataUsu
			 FROM tbl_usuario u
             WHERE (contrasena = md5(_contrasena) and (u.email = _email  or u.nrodoc = _email )));
		SET _msj = concat('Bienvenido$',@datausu);
	END IF;
END$$