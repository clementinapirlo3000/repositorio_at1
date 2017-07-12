-- Creado con Kata Kuntur - Modelador de Datos
-- Versión: 2.5.4
-- Sitio Web: http://katakuntur.jeanmazuelos.com/
-- Si usted encuentra algún error le agradeceriamos lo reporte en:
-- http://pm.jeanmazuelos.com/katakuntur/issues/new

-- Administrador de Base de Datos: PostgreSQL
-- Diagrama: rrh
-- Autor: Fernando Paez
-- Fecha y hora: 07/07/2017 14:02:26

--GENERANDO TABLAS
CREATE TABLE "rrh_gusua" (
	"id_rrh_gusua" INTEGER NOT NULL ,
	"gus_descr" TEXT NOT NULL ,
	"gus_obser" TEXT NOT NULL ,
	"gus_color" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_gusua")
);
--COMENTARIOS DE TABLA rrh_gusua
COMMENT ON TABLE "rrh_gusua" IS 'Tabla del grupo de usurarios';

CREATE TABLE "rrh_zopos" (
	"id_rrh_zopos" INTEGER NOT NULL ,
	"zop_descr" INTEGER NOT NULL ,
	"zop_ciuda" TEXT NOT NULL ,
	"zop_estad" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_zopos")
);
--COMENTARIOS DE TABLA rrh_zopos
COMMENT ON TABLE "rrh_zopos" IS 'zonas postales de venezuela';

CREATE TABLE "rrh_codci" (
	"id_rrh_codci" INTEGER NOT NULL ,
	"cod_ciuda" TEXT NOT NULL ,
	"cod_estad" TEXT NOT NULL ,
	"cod_numer" INTEGER NOT NULL ,
	"cod_abrev" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_codci")
);
--COMENTARIOS DE TABLA rrh_codci
COMMENT ON TABLE "rrh_codci" IS 'codigos de las ciudades de venezuela';

CREATE TABLE "rrh_codce" (
	"id_rrh_codce" INTEGER NOT NULL ,
	"cod_nombr" TEXT NOT NULL ,
	"cod_celul" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_codce")
);
--COMENTARIOS DE TABLA rrh_codce
COMMENT ON TABLE "rrh_codce" IS 'codigo celular';

CREATE TABLE "rrh_bitac" (
	"id_rrh_bitac" INTEGER NOT NULL ,
	"bit_fecha" DATE NOT NULL ,
	"bit_hora" TIME NOT NULL ,
	"bit_movim" TEXT NOT NULL ,
	"bit_objet" TEXT NOT NULL ,
	"bit_antes" TEXT NOT NULL ,
	"bit_ahora" TEXT NOT NULL ,
	"bit_descr" TEXT NULL ,
	"fk_id_rrh_usuar" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_bitac")
);
CREATE TABLE "rrh_usuar" (
	"id_rrh_usuar" INTEGER NOT NULL ,
	"usu_liter" TEXT NOT NULL ,
	"usu_cedul" INTEGER NOT NULL ,
	"usu_nomb1" TEXT NOT NULL ,
	"usu_nomb2" TEXT NOT NULL ,
	"usu_apel1" TEXT NOT NULL ,
	"usu_apel2" TEXT NOT NULL ,
	"usu_fenac" DATE NOT NULL ,
	"usu_tehab" INTEGER NOT NULL ,
	"usu_tecel" INTEGER NOT NULL ,
	"usu_direc" TEXT NOT NULL ,
	"usu_email" TEXT NOT NULL ,
	"usu_login" TEXT NOT NULL ,
	"usu_clave" TEXT NOT NULL ,
	"usu_fehoy" TIMESTAMP NOT NULL ,
	"usu_sexo" VARCHAR(45) NOT NULL ,
	"fk_id_rrh_zopos" INTEGER NOT NULL ,
	"fk_id_rrh_codci" INTEGER NOT NULL ,
	"fk_id_rrh_codce" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_id_rrh_gusua" INTEGER NOT NULL ,
	"fk_id_rrh_profe" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_usuar")
);
--COMENTARIOS DE TABLA rrh_usuar
COMMENT ON TABLE "rrh_usuar" IS 'usuarios del sistema';

CREATE TABLE "rrh_dtipent" (
	"id_rrh_dtipent" INTEGER NOT NULL ,
	"dti_ipent" TEXT NOT NULL ,
	"dti_deipcol" TEXT NOT NULL ,
	"dti_fehoy" TIMESTAMP NOT NULL ,
	"fk_id_rrh_usuar" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_dtipent")
);
--COMENTARIOS DE TABLA rrh_dtipent
COMMENT ON TABLE "rrh_dtipent" IS 'captura de la ip de la maquina entrante';

CREATE TABLE "rrh_estat" (
	"id_rrh_estat" INTEGER NOT NULL ,
	"est_nombr" VARCHAR(45) NOT NULL ,
	"est_descr" VARCHAR(255) NOT NULL ,
	PRIMARY KEY("id_rrh_estat")
);
--COMENTARIOS DE TABLA rrh_estat
COMMENT ON TABLE "rrh_estat" IS 'tipos de estatus activo inactivo fijo contratado para los empleados posee dos relaciones para activo o inactivo-fijo o contratado';

CREATE TABLE "rrh_nacio" (
	"id_rrh_nacio" INTEGER NOT NULL ,
	"nac_descr" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_nacio")
);
CREATE TABLE "country" (
	"idcountry" INTEGER NOT NULL ,
	"Name" TEXT NOT NULL ,
	"Code" TEXT NOT NULL ,
	"Capital" TEXT NOT NULL ,
	"Province" TEXT NOT NULL ,
	"Area" INTEGER NOT NULL ,
	"Population" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("idcountry"),
	UNIQUE ("Name","Code")
);
--COMENTARIOS DE TABLA country
COMMENT ON TABLE "country" IS 'paises del mundo';

CREATE TABLE "province" (
	"idprovince" INTEGER NOT NULL ,
	"Name" TEXT NOT NULL ,
	"Country" TEXT NOT NULL ,
	"Population" INTEGER NOT NULL ,
	"Area" INTEGER NOT NULL ,
	"Capital" TEXT NOT NULL ,
	"CapProv" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_idcountry" INTEGER NOT NULL ,
	PRIMARY KEY("idprovince"),
	UNIQUE ("Name","Country")
);
--COMENTARIOS DE TABLA province
COMMENT ON TABLE "province" IS 'privincias del pais';

CREATE TABLE "rrh_region" (
	"id_rrh_region" INTEGER NOT NULL ,
	"reg_descr" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_idcountry" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_region")
);
--COMENTARIOS DE TABLA rrh_region
COMMENT ON TABLE "rrh_region" IS 'regiones del pais';

CREATE TABLE "rrh_estad" (
	"id_rrh_estad" INTEGER NOT NULL ,
	"est_descr" TEXT NOT NULL ,
	"fk_id_rrh_region" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_estad")
);
--COMENTARIOS DE TABLA rrh_estad
COMMENT ON TABLE "rrh_estad" IS 'estados del pais venezolano';

CREATE TABLE "rrh_munic" (
	"id_rrh_munic" INTEGER NOT NULL ,
	"mun_descr" TEXT NOT NULL ,
	"fk_id_rrh_estad" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_munic")
);
--COMENTARIOS DE TABLA rrh_munic
COMMENT ON TABLE "rrh_munic" IS 'municipios de los estados de veneazuela';

CREATE TABLE "rrh_parro" (
	"id_rrh_parro" INTEGER NOT NULL ,
	"par_desc" TEXT NOT NULL ,
	"par_urban" BIGINT NOT NULL ,
	"fk_id_rrh_munic" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_parro")
);
--COMENTARIOS DE TABLA rrh_parro
COMMENT ON TABLE "rrh_parro" IS 'parroquias de las ciudades de venezuela';

CREATE TABLE "city" (
	"idcity" INTEGER NOT NULL ,
	"Name" TEXT NOT NULL ,
	"Country" TEXT NOT NULL ,
	"Province" TEXT NOT NULL ,
	"Population" INTEGER NOT NULL ,
	"Longitude" DOUBLE PRECISION NOT NULL ,
	"Latitude" DOUBLE PRECISION NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_idprovince" INTEGER NOT NULL ,
	PRIMARY KEY("idcity"),
	UNIQUE ("Name","Country","Province")
);
--COMENTARIOS DE TABLA city
COMMENT ON TABLE "city" IS 'ciudades de venezuela';

CREATE TABLE "located" (
	"idlocated" INTEGER NOT NULL ,
	"City" TEXT NOT NULL ,
	"Province" TEXT NOT NULL ,
	"Country" TEXT NOT NULL ,
	"River" TEXT NOT NULL ,
	"Lake" TEXT NOT NULL ,
	"Sea" TEXT NOT NULL ,
	"fk_id_rrh_parro" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("idlocated")
);
--COMENTARIOS DE TABLA located
COMMENT ON TABLE "located" IS 'localidades del pais';

CREATE TABLE "rrh_menus" (
	"id_rrh_menus" INTEGER NOT NULL ,
	"mod_descr" TEXT NOT NULL ,
	"mod_fecha" TIMESTAMP NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_menus")
);
--COMENTARIOS DE TABLA rrh_menus
COMMENT ON TABLE "rrh_menus" IS 'modulos del sistema';

CREATE TABLE "rrh_smenu" (
	"id_rrh_smenu" INTEGER NOT NULL ,
	"dmo_descr" TEXT NOT NULL ,
	"fk_id_rrh_menus" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_smenu")
);
--COMENTARIOS DE TABLA rrh_smenu
COMMENT ON TABLE "rrh_smenu" IS 'detalle de los sub menus del sistema';

CREATE TABLE "rrh_tcampo" (
	"id_rrh_tcamp" INTEGER NOT NULL ,
	"tca_descr" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_tcamp")
);
--COMENTARIOS DE TABLA rrh_tcampo
COMMENT ON TABLE "rrh_tcampo" IS 'tipo de campos existentes para crear las tablas';

CREATE TABLE "rrh_campos" (
	"id_rrh_campos" INTEGER NOT NULL ,
	"cap_descr" TEXT NOT NULL ,
	"cap_taman" INTEGER NOT NULL ,
	"cap_nulo" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_id_rrh_tcamp" INTEGER NOT NULL ,
	"fk_id_rrh_tabla" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_campos")
);
--COMENTARIOS DE TABLA rrh_campos
COMMENT ON TABLE "rrh_campos" IS 'parar unir todas las tablas y sus respectivos campos';
COMMENT ON COLUMN "rrh_campos"."id_rrh_campos" IS 'encriptado';

CREATE TABLE "rrh_tabla" (
	"id_rrh_tabla" INTEGER NOT NULL ,
	"tab_descr" TEXT NOT NULL ,
	"tab_obser" TEXT NOT NULL ,
	"fk_id_rrh_tcamp" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_tabla")
);
--COMENTARIOS DE TABLA rrh_tabla
COMMENT ON TABLE "rrh_tabla" IS 'para generar las tablas del sistema al insertar o modificar';

CREATE TABLE "rrh_privi" (
	"id_rrh_privi" INTEGER NOT NULL ,
	"pri_agreg" INTEGER NOT NULL ,
	"pri_consu" INTEGER NOT NULL ,
	"pri_modif" INTEGER NOT NULL ,
	"pri_elimi" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_id_rrh_usuar" INTEGER NOT NULL ,
	"fk_id_rrh_smenu" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_privi")
);
--COMENTARIOS DE TABLA rrh_privi
COMMENT ON TABLE "rrh_privi" IS 'privilegios para agregar consultar modificar eliminar dentro del sistema';

CREATE TABLE "rrh_profe" (
	"id_rrh_profe" INTEGER NOT NULL ,
	"pro_nombre" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_id_rrh_tprof" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_profe")
);
--COMENTARIOS DE TABLA rrh_profe
COMMENT ON TABLE "rrh_profe" IS 'profesion de la persona';

CREATE TABLE "rrh_tprof" (
	"id_rrh_tprof" INTEGER NOT NULL ,
	"tpr_nombre" TEXT NOT NULL ,
	"tpr_literal" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_tprof")
);
--COMENTARIOS DE TABLA rrh_tprof
COMMENT ON TABLE "rrh_tprof" IS 'tipo de profesion de la carrera estudiadad ademas se debe colocar el J de jefe';
COMMENT ON COLUMN "rrh_tprof"."tpr_literal" IS 'debe ser sacada del string del nombre de la profesion';

CREATE TABLE "rrh_distr" (
	"id_rrh_distr" INTEGER NOT NULL ,
	"dis_nombre" TEXT NOT NULL ,
	"dis_sector" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_distr")
);
--COMENTARIOS DE TABLA rrh_distr
COMMENT ON TABLE "rrh_distr" IS 'distrito sanitario de corposalud del estado tachira';

CREATE TABLE "rrh_estab" (
	"id_rrh_estab" INTEGER NOT NULL ,
	"est_nombre" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_id_rrh_distr" INTEGER NOT NULL ,
	"fk_id_rrh_testb" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_estab")
);
--COMENTARIOS DE TABLA rrh_estab
COMMENT ON TABLE "rrh_estab" IS 'establecimientos hospitalarios como tipo de hospitales (hospitales, ambulatorios, cdi)';

CREATE TABLE "rrh_testb" (
	"id_rrh_testb" INTEGER NOT NULL ,
	"tes_nombre" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_testb")
);
--COMENTARIOS DE TABLA rrh_testb
COMMENT ON TABLE "rrh_testb" IS 'tipo de establecimientos hospitalarios';

CREATE TABLE "rrh_emple" (
	"id_rrh_emple" INTEGER NOT NULL ,
	"emp_cedul" INTEGER NOT NULL ,
	"emp_rif" INTEGER NOT NULL ,
	"emp_nomb1" TEXT NOT NULL ,
	"emp_nomb2" TEXT NOT NULL ,
	"emp_apel1" TEXT NOT NULL ,
	"emp_apel2" TEXT NOT NULL ,
	"emp_fenac" DATE NOT NULL ,
	"emp_sexo" TEXT NOT NULL ,
	"emp_telhab" INTEGER NOT NULL ,
	"emp_telcel" INTEGER NOT NULL ,
	"emp_direc" TEXT NOT NULL ,
	"emp_fingr" DATE NOT NULL ,
	"emp_email" TEXT NOT NULL ,
	"emp_hijo" INTEGER NOT NULL ,
	"fk_id_rrh_profe" INTEGER NOT NULL ,
	"fk_id_rrh_ecivi" INTEGER NOT NULL ,
	"fk_id_rrh_zopos" INTEGER NOT NULL ,
	"fk_id_rrh_codci" INTEGER NOT NULL ,
	"fk_id_rrh_codce" INTEGER NOT NULL ,
	"fk_id_rrh_nomin" INTEGER NOT NULL ,
	"fk_id_rrh_estab" INTEGER NOT NULL ,
	"fk_id_rrh_divisi" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_id_rrh_gremio" INT NOT NULL ,
	"fk_id_rrh_sindi" INT NOT NULL ,
	PRIMARY KEY("id_rrh_emple")
);
--COMENTARIOS DE TABLA rrh_emple
COMMENT ON TABLE "rrh_emple" IS 'empleados ';
COMMENT ON COLUMN "rrh_emple"."emp_fingr" IS 'fecha de ingraso del empleado';
COMMENT ON COLUMN "rrh_emple"."emp_hijo" IS 'cantidad de  hijos';

CREATE TABLE "rrh_ecivi" (
	"id_rrh_ecivi" INTEGER NOT NULL ,
	"eci_nombr" TEXT NOT NULL ,
	"eci_liter" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_ecivi")
);
--COMENTARIOS DE TABLA rrh_ecivi
COMMENT ON TABLE "rrh_ecivi" IS 'estado civil del empleado';

CREATE TABLE "rrh_tnomin" (
	"id_rrh_nomin" INTEGER NOT NULL ,
	"nom_nombr" TEXT NOT NULL ,
	PRIMARY KEY("id_rrh_nomin")
);
--COMENTARIOS DE TABLA rrh_tnomin
COMMENT ON TABLE "rrh_tnomin" IS 'tipo de nomina  a la que pertenece el empleado';

CREATE TABLE "rrh_banco" (
	"id_rrh_banco" INTEGER NOT NULL ,
	"ban_nombre" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_banco")
);
--COMENTARIOS DE TABLA rrh_banco
COMMENT ON TABLE "rrh_banco" IS 'nombre del banco a depositar la nomina';

CREATE TABLE "rrh_deduc" (
	"id_rrh_deduc" INTEGER NOT NULL ,
	"ded_nombr" TEXT NOT NULL ,
	"ded_porc" INTEGER NULL ,
	"ded_monto" INTEGER NULL ,
	PRIMARY KEY("id_rrh_deduc")
);
--COMENTARIOS DE TABLA rrh_deduc
COMMENT ON TABLE "rrh_deduc" IS 'tabla de del tipo de deducciones de la nomina del empleados';

CREATE TABLE "rrh_dded" (
	"id_rrh_dded" INTEGER NOT NULL ,
	"fk_id_rrh_emple" INTEGER NOT NULL ,
	"fk_id_rrh_deduc" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_dded")
);
--COMENTARIOS DE TABLA rrh_dded
COMMENT ON TABLE "rrh_dded" IS 'detalle de las deducciones';

CREATE TABLE "rrh_asign" (
	"id_rrh_asign" INTEGER NOT NULL ,
	"asi_nombr" TEXT NOT NULL ,
	"asi_porce" INTEGER NULL ,
	"asi_monto" INTEGER NULL ,
	PRIMARY KEY("id_rrh_asign")
);
--COMENTARIOS DE TABLA rrh_asign
COMMENT ON TABLE "rrh_asign" IS 'tabla de las asignaciones';

CREATE TABLE "rrh_tcuent" (
	"id_rrh_tcuent" INTEGER NOT NULL ,
	"fk_id_rrh_emple" INTEGER NOT NULL ,
	"fk_id_rrh_fcuen" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_tcuent")
);
--COMENTARIOS DE TABLA rrh_tcuent
COMMENT ON TABLE "rrh_tcuent" IS 'relacion existente entre el tipo de cuenta y el nombre del banco y el empleado colocando el estatus hasta cuando las tuvo';

CREATE TABLE "rrh_dasig" (
	"id_rrh_dasig" INTEGER NOT NULL ,
	"fk_id_rrh_emple" INTEGER NOT NULL ,
	"fk_id_rrh_asign" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_dasig")
);
--COMENTARIOS DE TABLA rrh_dasig
COMMENT ON TABLE "rrh_dasig" IS 'detalle de la asignaciones de nomina';

CREATE TABLE "rrh_fcuen" (
	"id_rrh_fcuen" INTEGER NOT NULL ,
	"fcu_nombr" TEXT NOT NULL ,
	"fk_id_rrh_banco" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_fcuen")
);
--COMENTARIOS DE TABLA rrh_fcuen
COMMENT ON TABLE "rrh_fcuen" IS 'forma de la cuenta bancaria, corriente, ahorros';

CREATE TABLE "rrh_dnomin" (
	"id_rrh_dnomin" INTEGER NOT NULL ,
	"fk_id_rrh_emple" INTEGER NOT NULL ,
	"fk_id_rrh_nomin" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_dnomin")
);
--COMENTARIOS DE TABLA rrh_dnomin
COMMENT ON TABLE "rrh_dnomin" IS 'detalle de la nomina a pagar con sus relaciones especificas';

CREATE TABLE "rrh_nomin" (
	"id_rrh_nomin" INTEGER NOT NULL ,
	"nom_fpagoh" DATE NOT NULL ,
	"nom_fnomi" DATE NOT NULL ,
	"fk_id_rrh_tcontra" INTEGER NOT NULL ,
	"fk_id_rrh_nomin" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_nomin")
);
--COMENTARIOS DE TABLA rrh_nomin
COMMENT ON TABLE "rrh_nomin" IS 'nomina a desarrollar con sus relaciones';
COMMENT ON COLUMN "rrh_nomin"."nom_fpagoh" IS 'fecha de hoy';
COMMENT ON COLUMN "rrh_nomin"."nom_fnomi" IS 'fecha de la nomina';

CREATE TABLE "rrh_divisi" (
	"id_rrh_divisi" INTEGER NOT NULL ,
	"car_nombr" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_divisi")
);
--COMENTARIOS DE TABLA rrh_divisi
COMMENT ON TABLE "rrh_divisi" IS 'nombres de los cargos empleados y obreros dos grandes distribuciones que hay';

CREATE TABLE "rrh_parent" (
	"id_rrh_parent" INTEGER NOT NULL ,
	"par_nombr" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_parent")
);
--COMENTARIOS DE TABLA rrh_parent
COMMENT ON TABLE "rrh_parent" IS 'parentesco del familiar padre madre prime etc ';

CREATE TABLE "rrh_famil" (
	"id_rrh_famil" INTEGER NOT NULL ,
	"fam_cedul" INTEGER NOT NULL ,
	"fam_nomb1" TEXT NOT NULL ,
	"fam_nomb2" TEXT NOT NULL ,
	"fam_apel1" TEXT NOT NULL ,
	"fam_apel2" TEXT NOT NULL ,
	"fam_fenac" DATE NOT NULL ,
	"fam_sexo" TEXT NOT NULL ,
	"fam_civil" TEXT NOT NULL ,
	"fk_id_rrh_parent" INTEGER NOT NULL ,
	"fk_id_rrh_emple" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_famil")
);
--COMENTARIOS DE TABLA rrh_famil
COMMENT ON TABLE "rrh_famil" IS 'datos y tipo de familiar del empleado';

CREATE TABLE "rrh_tcontra" (
	"id_rrh_tcontra" INTEGER NOT NULL ,
	"tcon_nombr" TEXT NOT NULL ,
	"tcon_pomon" TEXT NOT NULL ,
	"tcon_monto" DOUBLE PRECISION NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_tcontra")
);
--COMENTARIOS DE TABLA rrh_tcontra
COMMENT ON TABLE "rrh_tcontra" IS 'tipos de la contrataciones colectivas realizadas';
COMMENT ON COLUMN "rrh_tcontra"."tcon_pomon" IS 'se pagara por porcentaje o monto';
COMMENT ON COLUMN "rrh_tcontra"."tcon_monto" IS 'monto del porcentaje o monto no variable de la contratacion';

CREATE TABLE "rrh_unidt" (
	"id_rrh_unidt" INTEGER NOT NULL ,
	"uni_valor" DOUBLE PRECISION NOT NULL ,
	"uni_ano" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_unidt")
);
--COMENTARIOS DE TABLA rrh_unidt
COMMENT ON TABLE "rrh_unidt" IS 'valor de la unidad tributaria y el periodo al que corresponde';

CREATE TABLE "rrh_serie" (
	"id_rrh_serie" INTEGER NOT NULL ,
	"ser_nombr" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_id_rrh_divisi" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_serie")
);
--COMENTARIOS DE TABLA rrh_serie
COMMENT ON TABLE "rrh_serie" IS 'sub divisiones de empleados para administrativos y asistenciales ';

CREATE TABLE "rrh_tseri" (
	"id_rrh_tseri" INTEGER NOT NULL ,
	"tse_nombr" TEXT NOT NULL ,
	"fk_id_rrh_serie" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_tseri")
);
--COMENTARIOS DE TABLA rrh_tseri
COMMENT ON TABLE "rrh_tseri" IS 'tipos de series asistenciales o administrrativa nombre del tipo de serie dependiente de la serie';
COMMENT ON COLUMN "rrh_tseri"."tse_nombr" IS 'nombre de la serie tanto asistencialcomo administrativa dependiente de la serie';

CREATE TABLE "rrh_cargo" (
	"id_rrh_cargo" INTEGER NOT NULL ,
	"car_nombr" TEXT NOT NULL ,
	"fk_id_rrh_tseri" INTEGER NOT NULL ,
	"fk_id_rrh_profe" INTEGER NOT NULL ,
	"fk_id_rrh_serie" INTEGER NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	"fk_id_rrh_estab" INTEGER NOT NULL ,
	"fk_id_rrh_divisi" INTEGER NOT NULL ,
	"fk_id_rrh_espec" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_cargo")
);
--COMENTARIOS DE TABLA rrh_cargo
COMMENT ON TABLE "rrh_cargo" IS 'recopilacion de relaciones para generar cargos';

CREATE TABLE "rrh_espec" (
	"id_rrh_espec" INTEGER NOT NULL ,
	"esp_nombr" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_espec")
);
--COMENTARIOS DE TABLA rrh_espec
COMMENT ON TABLE "rrh_espec" IS 'tipo de instruccion realizada despues de la profesionalizacion port grado';

CREATE TABLE "rrh_gremio" (
	"id_rrh_gremio" SERIAL NOT NULL ,
	"gre_nombr" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_gremio")
);
--COMENTARIOS DE TABLA rrh_gremio
COMMENT ON TABLE "rrh_gremio" IS 'tipo de gremio al que pertenece de no ser asi debe tener un campo el cual debe decir N/APLICA';

CREATE TABLE "rrh_sindi" (
	"id_rrh_sindi" SERIAL NOT NULL ,
	"sin_nombr" TEXT NOT NULL ,
	"fk_id_rrh_estat" INTEGER NOT NULL ,
	PRIMARY KEY("id_rrh_sindi")
);
--COMENTARIOS DE TABLA rrh_sindi
COMMENT ON TABLE "rrh_sindi" IS 'sindictos al que pretenece el empleado';


--GENERANDO RELACIONES
ALTER TABLE "rrh_gusua" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_zopos" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_codci" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_codce" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_bitac" ADD FOREIGN KEY ("fk_id_rrh_usuar") REFERENCES "rrh_usuar" ("id_rrh_usuar");
ALTER TABLE "rrh_usuar" ADD FOREIGN KEY ("fk_id_rrh_zopos") REFERENCES "rrh_zopos" ("id_rrh_zopos");
ALTER TABLE "rrh_usuar" ADD FOREIGN KEY ("fk_id_rrh_codci") REFERENCES "rrh_codci" ("id_rrh_codci");
ALTER TABLE "rrh_usuar" ADD FOREIGN KEY ("fk_id_rrh_codce") REFERENCES "rrh_codce" ("id_rrh_codce");
ALTER TABLE "rrh_usuar" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_usuar" ADD FOREIGN KEY ("fk_id_rrh_gusua") REFERENCES "rrh_gusua" ("id_rrh_gusua");
ALTER TABLE "rrh_usuar" ADD FOREIGN KEY ("fk_id_rrh_profe") REFERENCES "rrh_profe" ("id_rrh_profe");
ALTER TABLE "rrh_dtipent" ADD FOREIGN KEY ("fk_id_rrh_usuar") REFERENCES "rrh_usuar" ("id_rrh_usuar");
ALTER TABLE "rrh_nacio" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "country" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "province" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "province" ADD FOREIGN KEY ("fk_idcountry") REFERENCES "country" ("idcountry");
ALTER TABLE "rrh_region" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_region" ADD FOREIGN KEY ("fk_idcountry") REFERENCES "country" ("idcountry");
ALTER TABLE "rrh_estad" ADD FOREIGN KEY ("fk_id_rrh_region") REFERENCES "rrh_region" ("id_rrh_region");
ALTER TABLE "rrh_estad" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_munic" ADD FOREIGN KEY ("fk_id_rrh_estad") REFERENCES "rrh_estad" ("id_rrh_estad");
ALTER TABLE "rrh_munic" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_parro" ADD FOREIGN KEY ("fk_id_rrh_munic") REFERENCES "rrh_munic" ("id_rrh_munic");
ALTER TABLE "rrh_parro" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "city" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "city" ADD FOREIGN KEY ("fk_idprovince") REFERENCES "province" ("idprovince");
ALTER TABLE "located" ADD FOREIGN KEY ("fk_id_rrh_parro") REFERENCES "rrh_parro" ("id_rrh_parro");
ALTER TABLE "located" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_menus" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_smenu" ADD FOREIGN KEY ("fk_id_rrh_menus") REFERENCES "rrh_menus" ("id_rrh_menus");
ALTER TABLE "rrh_smenu" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_tcampo" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_campos" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_campos" ADD FOREIGN KEY ("fk_id_rrh_tcamp") REFERENCES "rrh_tcampo" ("id_rrh_tcamp");
ALTER TABLE "rrh_campos" ADD FOREIGN KEY ("fk_id_rrh_tabla") REFERENCES "rrh_tabla" ("id_rrh_tabla");
ALTER TABLE "rrh_tabla" ADD FOREIGN KEY ("fk_id_rrh_tcamp") REFERENCES "rrh_tcampo" ("id_rrh_tcamp");
ALTER TABLE "rrh_privi" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_privi" ADD FOREIGN KEY ("fk_id_rrh_usuar") REFERENCES "rrh_usuar" ("id_rrh_usuar");
ALTER TABLE "rrh_privi" ADD FOREIGN KEY ("fk_id_rrh_smenu") REFERENCES "rrh_smenu" ("id_rrh_smenu");
ALTER TABLE "rrh_profe" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_profe" ADD FOREIGN KEY ("fk_id_rrh_tprof") REFERENCES "rrh_tprof" ("id_rrh_tprof");
ALTER TABLE "rrh_tprof" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_distr" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_estab" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_estab" ADD FOREIGN KEY ("fk_id_rrh_distr") REFERENCES "rrh_distr" ("id_rrh_distr");
ALTER TABLE "rrh_estab" ADD FOREIGN KEY ("fk_id_rrh_testb") REFERENCES "rrh_testb" ("id_rrh_testb");
ALTER TABLE "rrh_testb" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_profe") REFERENCES "rrh_profe" ("id_rrh_profe");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_ecivi") REFERENCES "rrh_ecivi" ("id_rrh_ecivi");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_zopos") REFERENCES "rrh_zopos" ("id_rrh_zopos");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_codci") REFERENCES "rrh_codci" ("id_rrh_codci");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_codce") REFERENCES "rrh_codce" ("id_rrh_codce");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_nomin") REFERENCES "rrh_tnomin" ("id_rrh_nomin");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_estab") REFERENCES "rrh_estab" ("id_rrh_estab");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_divisi") REFERENCES "rrh_divisi" ("id_rrh_divisi");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_gremio") REFERENCES "rrh_gremio" ("id_rrh_gremio");
ALTER TABLE "rrh_emple" ADD FOREIGN KEY ("fk_id_rrh_sindi") REFERENCES "rrh_sindi" ("id_rrh_sindi");
ALTER TABLE "rrh_ecivi" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_banco" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_dded" ADD FOREIGN KEY ("fk_id_rrh_emple") REFERENCES "rrh_emple" ("id_rrh_emple");
ALTER TABLE "rrh_dded" ADD FOREIGN KEY ("fk_id_rrh_deduc") REFERENCES "rrh_deduc" ("id_rrh_deduc");
ALTER TABLE "rrh_tcuent" ADD FOREIGN KEY ("fk_id_rrh_emple") REFERENCES "rrh_emple" ("id_rrh_emple");
ALTER TABLE "rrh_tcuent" ADD FOREIGN KEY ("fk_id_rrh_fcuen") REFERENCES "rrh_fcuen" ("id_rrh_fcuen");
ALTER TABLE "rrh_tcuent" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_dasig" ADD FOREIGN KEY ("fk_id_rrh_emple") REFERENCES "rrh_emple" ("id_rrh_emple");
ALTER TABLE "rrh_dasig" ADD FOREIGN KEY ("fk_id_rrh_asign") REFERENCES "rrh_asign" ("id_rrh_asign");
ALTER TABLE "rrh_fcuen" ADD FOREIGN KEY ("fk_id_rrh_banco") REFERENCES "rrh_banco" ("id_rrh_banco");
ALTER TABLE "rrh_fcuen" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_dnomin" ADD FOREIGN KEY ("fk_id_rrh_emple") REFERENCES "rrh_emple" ("id_rrh_emple");
ALTER TABLE "rrh_dnomin" ADD FOREIGN KEY ("fk_id_rrh_nomin") REFERENCES "rrh_nomin" ("id_rrh_nomin");
ALTER TABLE "rrh_nomin" ADD FOREIGN KEY ("fk_id_rrh_tcontra") REFERENCES "rrh_tcontra" ("id_rrh_tcontra");
ALTER TABLE "rrh_nomin" ADD FOREIGN KEY ("fk_id_rrh_nomin") REFERENCES "rrh_tnomin" ("id_rrh_nomin");
ALTER TABLE "rrh_divisi" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_parent" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_famil" ADD FOREIGN KEY ("fk_id_rrh_parent") REFERENCES "rrh_parent" ("id_rrh_parent");
ALTER TABLE "rrh_famil" ADD FOREIGN KEY ("fk_id_rrh_emple") REFERENCES "rrh_emple" ("id_rrh_emple");
ALTER TABLE "rrh_tcontra" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_serie" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_serie" ADD FOREIGN KEY ("fk_id_rrh_divisi") REFERENCES "rrh_divisi" ("id_rrh_divisi");
ALTER TABLE "rrh_tseri" ADD FOREIGN KEY ("fk_id_rrh_serie") REFERENCES "rrh_serie" ("id_rrh_serie");
ALTER TABLE "rrh_tseri" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_cargo" ADD FOREIGN KEY ("fk_id_rrh_tseri") REFERENCES "rrh_tseri" ("id_rrh_tseri");
ALTER TABLE "rrh_cargo" ADD FOREIGN KEY ("fk_id_rrh_profe") REFERENCES "rrh_profe" ("id_rrh_profe");
ALTER TABLE "rrh_cargo" ADD FOREIGN KEY ("fk_id_rrh_serie") REFERENCES "rrh_serie" ("id_rrh_serie");
ALTER TABLE "rrh_cargo" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_cargo" ADD FOREIGN KEY ("fk_id_rrh_estab") REFERENCES "rrh_estab" ("id_rrh_estab");
ALTER TABLE "rrh_cargo" ADD FOREIGN KEY ("fk_id_rrh_divisi") REFERENCES "rrh_divisi" ("id_rrh_divisi");
ALTER TABLE "rrh_cargo" ADD FOREIGN KEY ("fk_id_rrh_espec") REFERENCES "rrh_espec" ("id_rrh_espec");
ALTER TABLE "rrh_espec" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_gremio" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");
ALTER TABLE "rrh_sindi" ADD FOREIGN KEY ("fk_id_rrh_estat") REFERENCES "rrh_estat" ("id_rrh_estat");