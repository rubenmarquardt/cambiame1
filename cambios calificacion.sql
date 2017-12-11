ALTER TABLE `ofertas` ADD `rate2` FLOAT NULL DEFAULT NULL ;
ALTER TABLE `ofertas` ADD `comentario2` VARCHAR(180) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ;


ALTER TABLE `ofertas` ADD `medioPago` INT(10) NOT NULL DEFAULT '0' ;


--SELECT count(*) as cantidad FROM `ofertas` where (user_id='1' and rate>0) or (concretada=1 and rate2>0)
--pone usuario nuevo

SELECT * FROM acsm_2a39fc77f92d2fb.ofertas where created_at <'2017-08-04 00:00:01';
----si cambio la sentencia por delete acsm_2a39fc77f92d2fb.ofertas where created_at <'2017-08-04 00:00:01';.....
---- o lo puedo hacer manualmente por el workbench
