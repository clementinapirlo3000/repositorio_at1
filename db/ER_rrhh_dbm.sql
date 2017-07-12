-- Database generated with pgModeler (PostgreSQL Database Modeler).
-- pgModeler  version: 0.8.1
-- PostgreSQL version: 9.4
-- Project Site: pgmodeler.com.br
-- Model Author: ---


-- Database creation must be done outside an multicommand file.
-- These commands were put in this file only for convenience.
-- -- object: rrhh | type: DATABASE --
-- -- DROP DATABASE IF EXISTS rrhh;
-- CREATE DATABASE rrhh
-- 	TABLESPACE = pg_default
-- 	OWNER = postgres
-- ;
-- -- ddl-end --
-- 

-- object: public.rrh_estat | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_estat;
CREATE TABLE public.rrh_estat(
	id_rrh_estat serial NOT NULL,
	est_nombr text NOT NULL,
	CONSTRAINT pk_id_rrh_estat PRIMARY KEY (id_rrh_estat)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_estat IS 'estatus de las tablas';
-- ddl-end --
ALTER TABLE public.rrh_estat OWNER TO postgres;
-- ddl-end --

-- object: public.rrh_pais | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_pais;
CREATE TABLE public.rrh_pais(
	id_rrh_pais serial NOT NULL,
	pai_nombr text,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_pais PRIMARY KEY (id_rrh_pais)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_pais OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_pais DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_pais ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_estad | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_estad;
CREATE TABLE public.rrh_estad(
	id_rrh_estad serial NOT NULL,
	est_nombr text NOT NULL,
	id_rrh_pais_rrh_pais integer,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_estad PRIMARY KEY (id_rrh_estad)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_estad OWNER TO postgres;
-- ddl-end --

-- object: rrh_pais_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_estad DROP CONSTRAINT IF EXISTS rrh_pais_fk CASCADE;
ALTER TABLE public.rrh_estad ADD CONSTRAINT rrh_pais_fk FOREIGN KEY (id_rrh_pais_rrh_pais)
REFERENCES public.rrh_pais (id_rrh_pais) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_estad DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_estad ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_munic | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_munic;
CREATE TABLE public.rrh_munic(
	id_rrh_munic serial NOT NULL,
	mun_nombr smallint,
	id_rrh_estad_rrh_estad integer,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_munic PRIMARY KEY (id_rrh_munic)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON COLUMN public.rrh_munic.mun_nombr IS 'nombre del municipio';
-- ddl-end --
ALTER TABLE public.rrh_munic OWNER TO postgres;
-- ddl-end --

-- object: rrh_estad_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_munic DROP CONSTRAINT IF EXISTS rrh_estad_fk CASCADE;
ALTER TABLE public.rrh_munic ADD CONSTRAINT rrh_estad_fk FOREIGN KEY (id_rrh_estad_rrh_estad)
REFERENCES public.rrh_estad (id_rrh_estad) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_munic DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_munic ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_parro | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_parro;
CREATE TABLE public.rrh_parro(
	id_rrh_parro serial NOT NULL,
	par_nombr text,
	id_rrh_munic_rrh_munic integer,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_parro PRIMARY KEY (id_rrh_parro)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_parro OWNER TO postgres;
-- ddl-end --

-- object: rrh_munic_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_parro DROP CONSTRAINT IF EXISTS rrh_munic_fk CASCADE;
ALTER TABLE public.rrh_parro ADD CONSTRAINT rrh_munic_fk FOREIGN KEY (id_rrh_munic_rrh_munic)
REFERENCES public.rrh_munic (id_rrh_munic) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_parro DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_parro ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_usuar | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_usuar;
CREATE TABLE public.rrh_usuar(
	id_rrh_usuar serial NOT NULL,
	usu_liter text NOT NULL,
	usu_cedul integer NOT NULL,
	usu_nomb1 text NOT NULL,
	usu_nomb2 text,
	usu_apel1 text NOT NULL,
	usu_apel2 text,
	usu_fenac date NOT NULL,
	usu_tehab integer,
	usu_tecel integer,
	usu_direc text,
	usu_email text,
	usu_login text,
	usu_clave text,
	usu_feing timestamp NOT NULL,
	usu_sexo text,
	usu_femod timestamp NOT NULL,
	id_rrh_gusua_rrh_gusua integer,
	id_rrh_zopos_rrh_zopos integer,
	id_rrh_codci_rrh_codci integer,
	id_rrh_codce_rrh_codce integer,
	id_rrh_profe_rrh_profe integer,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_usuar PRIMARY KEY (id_rrh_usuar)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_usuar OWNER TO postgres;
-- ddl-end --

-- object: public.rrh_gusua | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_gusua;
CREATE TABLE public.rrh_gusua(
	id_rrh_gusua serial NOT NULL,
	gus_descr text NOT NULL,
	gus_obser text NOT NULL,
	gus_color text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_gusua PRIMARY KEY (id_rrh_gusua)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_gusua OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_gusua DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_gusua ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_zopos | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_zopos;
CREATE TABLE public.rrh_zopos(
	id_rrh_zopos serial NOT NULL,
	zop_descr integer NOT NULL,
	zop_ciuda text NOT NULL,
	zop_estad text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_zopos PRIMARY KEY (id_rrh_zopos)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_zopos IS 'zonas postales de venezuela';
-- ddl-end --
ALTER TABLE public.rrh_zopos OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_zopos DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_zopos ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_codci | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_codci;
CREATE TABLE public.rrh_codci(
	id_rrh_codci serial NOT NULL,
	cod_ciuda text NOT NULL,
	cod_estad text NOT NULL,
	cod_numer integer NOT NULL,
	cod_abrev text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_codci PRIMARY KEY (id_rrh_codci)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_codci OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_codci DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_codci ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_codce | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_codce;
CREATE TABLE public.rrh_codce(
	id_rrh_codce serial NOT NULL,
	cod_nombr text NOT NULL,
	cod_celul integer NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_codce PRIMARY KEY (id_rrh_codce)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_codce OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_codce DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_codce ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_profe | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_profe;
CREATE TABLE public.rrh_profe(
	id_rrh_profe serial NOT NULL,
	pro_nombre text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	id_rrh_tprof_rrh_tprof smallint,
	CONSTRAINT pk_id_rrh_profe PRIMARY KEY (id_rrh_profe)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_profe IS 'profesion del empleado';
-- ddl-end --
ALTER TABLE public.rrh_profe OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_profe DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_profe ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_tprof | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_tprof;
CREATE TABLE public.rrh_tprof(
	id_rrh_tprof smallint NOT NULL,
	tpr_nombre text NOT NULL,
	tpr_literal text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_tprof PRIMARY KEY (id_rrh_tprof)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_tprof OWNER TO postgres;
-- ddl-end --

-- object: rrh_tprof_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_profe DROP CONSTRAINT IF EXISTS rrh_tprof_fk CASCADE;
ALTER TABLE public.rrh_profe ADD CONSTRAINT rrh_tprof_fk FOREIGN KEY (id_rrh_tprof_rrh_tprof)
REFERENCES public.rrh_tprof (id_rrh_tprof) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_tprof DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_tprof ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_gusua_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_usuar DROP CONSTRAINT IF EXISTS rrh_gusua_fk CASCADE;
ALTER TABLE public.rrh_usuar ADD CONSTRAINT rrh_gusua_fk FOREIGN KEY (id_rrh_gusua_rrh_gusua)
REFERENCES public.rrh_gusua (id_rrh_gusua) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_zopos_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_usuar DROP CONSTRAINT IF EXISTS rrh_zopos_fk CASCADE;
ALTER TABLE public.rrh_usuar ADD CONSTRAINT rrh_zopos_fk FOREIGN KEY (id_rrh_zopos_rrh_zopos)
REFERENCES public.rrh_zopos (id_rrh_zopos) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_codci_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_usuar DROP CONSTRAINT IF EXISTS rrh_codci_fk CASCADE;
ALTER TABLE public.rrh_usuar ADD CONSTRAINT rrh_codci_fk FOREIGN KEY (id_rrh_codci_rrh_codci)
REFERENCES public.rrh_codci (id_rrh_codci) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_codce_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_usuar DROP CONSTRAINT IF EXISTS rrh_codce_fk CASCADE;
ALTER TABLE public.rrh_usuar ADD CONSTRAINT rrh_codce_fk FOREIGN KEY (id_rrh_codce_rrh_codce)
REFERENCES public.rrh_codce (id_rrh_codce) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_profe_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_usuar DROP CONSTRAINT IF EXISTS rrh_profe_fk CASCADE;
ALTER TABLE public.rrh_usuar ADD CONSTRAINT rrh_profe_fk FOREIGN KEY (id_rrh_profe_rrh_profe)
REFERENCES public.rrh_profe (id_rrh_profe) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_usuar DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_usuar ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_menus | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_menus;
CREATE TABLE public.rrh_menus(
	id_rrh_menus serial NOT NULL,
	mod_descr text NOT NULL,
	mod_fecha timestamp NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_menus PRIMARY KEY (id_rrh_menus)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_menus IS 'modulos del sistema';
-- ddl-end --
ALTER TABLE public.rrh_menus OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_menus DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_menus ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_smenu | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_smenu;
CREATE TABLE public.rrh_smenu(
	id_rrh_smenu serial NOT NULL,
	dmo_descr text NOT NULL,
	id_rrh_menus_rrh_menus integer,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_smenu PRIMARY KEY (id_rrh_smenu)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_smenu IS 'detalle de los sub menus del sistema';
-- ddl-end --
ALTER TABLE public.rrh_smenu OWNER TO postgres;
-- ddl-end --

-- object: rrh_menus_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_smenu DROP CONSTRAINT IF EXISTS rrh_menus_fk CASCADE;
ALTER TABLE public.rrh_smenu ADD CONSTRAINT rrh_menus_fk FOREIGN KEY (id_rrh_menus_rrh_menus)
REFERENCES public.rrh_menus (id_rrh_menus) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_smenu DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_smenu ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_tcampo | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_tcampo;
CREATE TABLE public.rrh_tcampo(
	id_rrh_tcampo serial NOT NULL,
	tca_descr text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_tcampo PRIMARY KEY (id_rrh_tcampo)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_tcampo IS 'tipo de campos existentes para crear las tablas';
-- ddl-end --
ALTER TABLE public.rrh_tcampo OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_tcampo DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_tcampo ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_campos | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_campos;
CREATE TABLE public.rrh_campos(
	id_rrh_campos serial NOT NULL,
	cap_descr text NOT NULL,
	cap_taman integer NOT NULL,
	cap_nulo integer NOT NULL,
	id_rrh_estat_rrh_estat integer,
	id_rrh_tcampo_rrh_tcampo integer,
	CONSTRAINT pk_id_rrh_campos PRIMARY KEY (id_rrh_campos)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_campos OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_campos DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_campos ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_tcampo_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_campos DROP CONSTRAINT IF EXISTS rrh_tcampo_fk CASCADE;
ALTER TABLE public.rrh_campos ADD CONSTRAINT rrh_tcampo_fk FOREIGN KEY (id_rrh_tcampo_rrh_tcampo)
REFERENCES public.rrh_tcampo (id_rrh_tcampo) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_tabla | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_tabla;
CREATE TABLE public.rrh_tabla(
	id_rrh_tabla serial NOT NULL,
	tab_descr text NOT NULL,
	tab_obser text NOT NULL,
	id_rrh_tcampo_rrh_tcampo integer,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_tabla PRIMARY KEY (id_rrh_tabla)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_tabla IS 'para generar las tablas del sistema al insertar o modificar';
-- ddl-end --
ALTER TABLE public.rrh_tabla OWNER TO postgres;
-- ddl-end --

-- object: rrh_tcampo_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_tabla DROP CONSTRAINT IF EXISTS rrh_tcampo_fk CASCADE;
ALTER TABLE public.rrh_tabla ADD CONSTRAINT rrh_tcampo_fk FOREIGN KEY (id_rrh_tcampo_rrh_tcampo)
REFERENCES public.rrh_tcampo (id_rrh_tcampo) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_tabla DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_tabla ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_privi | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_privi;
CREATE TABLE public.rrh_privi(
	id_rrh_privi serial NOT NULL,
	pri_agreg integer NOT NULL,
	pri_consu integer NOT NULL,
	pri_modif integer NOT NULL,
	pri_elimi integer NOT NULL,
	id_rrh_estat_rrh_estat integer,
	id_rrh_usuar_rrh_usuar integer,
	id_rrh_smenu_rrh_smenu integer,
	CONSTRAINT pk_id_rrh_privi PRIMARY KEY (id_rrh_privi)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_privi OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_privi DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_privi ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_usuar_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_privi DROP CONSTRAINT IF EXISTS rrh_usuar_fk CASCADE;
ALTER TABLE public.rrh_privi ADD CONSTRAINT rrh_usuar_fk FOREIGN KEY (id_rrh_usuar_rrh_usuar)
REFERENCES public.rrh_usuar (id_rrh_usuar) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_smenu_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_privi DROP CONSTRAINT IF EXISTS rrh_smenu_fk CASCADE;
ALTER TABLE public.rrh_privi ADD CONSTRAINT rrh_smenu_fk FOREIGN KEY (id_rrh_smenu_rrh_smenu)
REFERENCES public.rrh_smenu (id_rrh_smenu) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_bitac | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_bitac;
CREATE TABLE public.rrh_bitac(
	id_rrh_bitac serial NOT NULL,
	bit_fecha date NOT NULL,
	bit_hora time NOT NULL,
	bit_movim text NOT NULL,
	bit_objet text NOT NULL,
	bit_antes text NOT NULL,
	bit_ahora text NOT NULL,
	bit_descr smallint NOT NULL,
	id_rrh_usuar_rrh_usuar integer,
	CONSTRAINT pk_id_rrh_bitac PRIMARY KEY (id_rrh_bitac)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
ALTER TABLE public.rrh_bitac OWNER TO postgres;
-- ddl-end --

-- object: rrh_usuar_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_bitac DROP CONSTRAINT IF EXISTS rrh_usuar_fk CASCADE;
ALTER TABLE public.rrh_bitac ADD CONSTRAINT rrh_usuar_fk FOREIGN KEY (id_rrh_usuar_rrh_usuar)
REFERENCES public.rrh_usuar (id_rrh_usuar) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_dtipent | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_dtipent;
CREATE TABLE public.rrh_dtipent(
	id_rrh_dtipent serial NOT NULL,
	dti_ipent text NOT NULL,
	dti_deipcol text NOT NULL,
	dti_feing timestamp NOT NULL,
	id_rrh_usuar_rrh_usuar integer,
	CONSTRAINT pk_id_rrh_dtipent PRIMARY KEY (id_rrh_dtipent)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_dtipent IS 'captura de la ip de la maquina entrante';
-- ddl-end --
ALTER TABLE public.rrh_dtipent OWNER TO postgres;
-- ddl-end --

-- object: rrh_usuar_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_dtipent DROP CONSTRAINT IF EXISTS rrh_usuar_fk CASCADE;
ALTER TABLE public.rrh_dtipent ADD CONSTRAINT rrh_usuar_fk FOREIGN KEY (id_rrh_usuar_rrh_usuar)
REFERENCES public.rrh_usuar (id_rrh_usuar) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_estab | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_estab;
CREATE TABLE public.rrh_estab(
	id_rrh_estab serial NOT NULL,
	est_nombre text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	id_rrh_distr_rrh_distr integer,
	id_rrh_testb_rrh_testb integer,
	CONSTRAINT pk_id_rrh_estab PRIMARY KEY (id_rrh_estab)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_estab IS 'establecimientos hospitalarios como tipo de hospitales (hospitales, ambulatorios, cdi)';
-- ddl-end --
ALTER TABLE public.rrh_estab OWNER TO postgres;
-- ddl-end --

-- object: public.rrh_distr | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_distr;
CREATE TABLE public.rrh_distr(
	id_rrh_distr serial NOT NULL,
	dis_nombre text NOT NULL,
	dis_sector text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_distr PRIMARY KEY (id_rrh_distr)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_distr IS 'distrito sanitario de corposalud del estado tachira';
-- ddl-end --
ALTER TABLE public.rrh_distr OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_distr DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_distr ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_estab DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_estab ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_testb | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_testb;
CREATE TABLE public.rrh_testb(
	id_rrh_testb serial NOT NULL,
	tes_nombre smallint NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_testb PRIMARY KEY (id_rrh_testb)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_testb IS 'tipo de establecimientos hospitalarios';
-- ddl-end --
ALTER TABLE public.rrh_testb OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_testb DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_testb ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_distr_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_estab DROP CONSTRAINT IF EXISTS rrh_distr_fk CASCADE;
ALTER TABLE public.rrh_estab ADD CONSTRAINT rrh_distr_fk FOREIGN KEY (id_rrh_distr_rrh_distr)
REFERENCES public.rrh_distr (id_rrh_distr) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_testb_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_estab DROP CONSTRAINT IF EXISTS rrh_testb_fk CASCADE;
ALTER TABLE public.rrh_estab ADD CONSTRAINT rrh_testb_fk FOREIGN KEY (id_rrh_testb_rrh_testb)
REFERENCES public.rrh_testb (id_rrh_testb) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_gremio | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_gremio;
CREATE TABLE public.rrh_gremio(
	id_rrh_gremio serial NOT NULL,
	gre_nombr text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_gremio PRIMARY KEY (id_rrh_gremio)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_gremio IS 'tipo de gremio al que pertenece de no ser asi debe tener un campo el cual debe decir N/APLICA';
-- ddl-end --
ALTER TABLE public.rrh_gremio OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_gremio DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_gremio ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_sindi | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_sindi;
CREATE TABLE public.rrh_sindi(
	id_rrh_sindi serial NOT NULL,
	sin_nombr text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_sindi PRIMARY KEY (id_rrh_sindi)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_sindi IS 'sindictos al que pretenece el empleado';
-- ddl-end --
ALTER TABLE public.rrh_sindi OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_sindi DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_sindi ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_emple | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_emple;
CREATE TABLE public.rrh_emple(
	id_rrh_emple serial NOT NULL,
	emp_cedul integer NOT NULL,
	emp_rif integer,
	emp_nomb1 text NOT NULL,
	emp_nomb2 text,
	emp_apel1 text NOT NULL,
	emp_apel2 text,
	emp_fenac date NOT NULL,
	emp_sexo text NOT NULL,
	emp_telhab integer,
	emp_telcel integer,
	emp_direc text NOT NULL,
	emp_fingr date,
	emp_email text NOT NULL,
	emp_hijo integer NOT NULL,
	id_rrh_estat_rrh_estat integer,
	id_rrh_ecivi_rrh_ecivi integer,
	id_rrh_profe_rrh_profe integer,
	id_rrh_zopos_rrh_zopos integer,
	id_rrh_codci_rrh_codci integer,
	id_rrh_codce_rrh_codce integer,
	id_rrh_estab_rrh_estab integer,
	id_rrh_gremio_rrh_gremio integer,
	id_rrh_sindi_rrh_sindi integer,
	CONSTRAINT pk_id_rrh_emple PRIMARY KEY (id_rrh_emple)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON COLUMN public.rrh_emple.emp_fingr IS 'fecha de ingreso del empleado';
-- ddl-end --
COMMENT ON COLUMN public.rrh_emple.emp_hijo IS 'numero de hijos';
-- ddl-end --
ALTER TABLE public.rrh_emple OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_emple DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_emple ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_ecivi | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_ecivi;
CREATE TABLE public.rrh_ecivi(
	id_rrh_ecivi integer NOT NULL,
	eci_nombr text NOT NULL,
	eci_liter text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_ecivi PRIMARY KEY (id_rrh_ecivi)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_ecivi IS 'estado civil del empleado segun lo referente a la cedula';
-- ddl-end --
ALTER TABLE public.rrh_ecivi OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_ecivi DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_ecivi ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_ecivi_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_emple DROP CONSTRAINT IF EXISTS rrh_ecivi_fk CASCADE;
ALTER TABLE public.rrh_emple ADD CONSTRAINT rrh_ecivi_fk FOREIGN KEY (id_rrh_ecivi_rrh_ecivi)
REFERENCES public.rrh_ecivi (id_rrh_ecivi) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_profe_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_emple DROP CONSTRAINT IF EXISTS rrh_profe_fk CASCADE;
ALTER TABLE public.rrh_emple ADD CONSTRAINT rrh_profe_fk FOREIGN KEY (id_rrh_profe_rrh_profe)
REFERENCES public.rrh_profe (id_rrh_profe) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_zopos_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_emple DROP CONSTRAINT IF EXISTS rrh_zopos_fk CASCADE;
ALTER TABLE public.rrh_emple ADD CONSTRAINT rrh_zopos_fk FOREIGN KEY (id_rrh_zopos_rrh_zopos)
REFERENCES public.rrh_zopos (id_rrh_zopos) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_codci_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_emple DROP CONSTRAINT IF EXISTS rrh_codci_fk CASCADE;
ALTER TABLE public.rrh_emple ADD CONSTRAINT rrh_codci_fk FOREIGN KEY (id_rrh_codci_rrh_codci)
REFERENCES public.rrh_codci (id_rrh_codci) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_codce_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_emple DROP CONSTRAINT IF EXISTS rrh_codce_fk CASCADE;
ALTER TABLE public.rrh_emple ADD CONSTRAINT rrh_codce_fk FOREIGN KEY (id_rrh_codce_rrh_codce)
REFERENCES public.rrh_codce (id_rrh_codce) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estab_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_emple DROP CONSTRAINT IF EXISTS rrh_estab_fk CASCADE;
ALTER TABLE public.rrh_emple ADD CONSTRAINT rrh_estab_fk FOREIGN KEY (id_rrh_estab_rrh_estab)
REFERENCES public.rrh_estab (id_rrh_estab) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_gremio_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_emple DROP CONSTRAINT IF EXISTS rrh_gremio_fk CASCADE;
ALTER TABLE public.rrh_emple ADD CONSTRAINT rrh_gremio_fk FOREIGN KEY (id_rrh_gremio_rrh_gremio)
REFERENCES public.rrh_gremio (id_rrh_gremio) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_sindi_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_emple DROP CONSTRAINT IF EXISTS rrh_sindi_fk CASCADE;
ALTER TABLE public.rrh_emple ADD CONSTRAINT rrh_sindi_fk FOREIGN KEY (id_rrh_sindi_rrh_sindi)
REFERENCES public.rrh_sindi (id_rrh_sindi) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_divisi | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_divisi;
CREATE TABLE public.rrh_divisi(
	id_rrh_divisi serial NOT NULL,
	car_nombr text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_divisi PRIMARY KEY (id_rrh_divisi)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_divisi IS 'nombres de los cargos empleados y obreros dos grandes distribuciones que hay';
-- ddl-end --
ALTER TABLE public.rrh_divisi OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_divisi DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_divisi ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_serie | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_serie;
CREATE TABLE public.rrh_serie(
	id_rrh_serie serial NOT NULL,
	ser_nombr text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	id_rrh_divisi_rrh_divisi integer,
	CONSTRAINT pk_id_rrh_serie PRIMARY KEY (id_rrh_serie)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_serie IS 'sub divisiones de empleados para administrativos y asistenciales ';
-- ddl-end --
ALTER TABLE public.rrh_serie OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_serie DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_serie ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_divisi_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_serie DROP CONSTRAINT IF EXISTS rrh_divisi_fk CASCADE;
ALTER TABLE public.rrh_serie ADD CONSTRAINT rrh_divisi_fk FOREIGN KEY (id_rrh_divisi_rrh_divisi)
REFERENCES public.rrh_divisi (id_rrh_divisi) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_tseri | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_tseri;
CREATE TABLE public.rrh_tseri(
	id_rrh_tseri serial NOT NULL,
	tse_nombr text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	id_rrh_serie_rrh_serie integer,
	CONSTRAINT pk_id_rrh_tseri PRIMARY KEY (id_rrh_tseri)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON COLUMN public.rrh_tseri.tse_nombr IS 'nombre de la serie tanto asistencialcomo administrativa dependiente de la serie';
-- ddl-end --
ALTER TABLE public.rrh_tseri OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_tseri DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_tseri ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_serie_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_tseri DROP CONSTRAINT IF EXISTS rrh_serie_fk CASCADE;
ALTER TABLE public.rrh_tseri ADD CONSTRAINT rrh_serie_fk FOREIGN KEY (id_rrh_serie_rrh_serie)
REFERENCES public.rrh_serie (id_rrh_serie) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_espec | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_espec;
CREATE TABLE public.rrh_espec(
	id_rrh_espec serial NOT NULL,
	esp_nombr text NOT NULL,
	id_rrh_estat_rrh_estat integer,
	CONSTRAINT pk_id_rrh_espec PRIMARY KEY (id_rrh_espec)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_espec IS 'tipo de instruccion realizada despues de la profesionalizacion port grado';
-- ddl-end --
ALTER TABLE public.rrh_espec OWNER TO postgres;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_espec DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_espec ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.rrh_cargo | type: TABLE --
-- DROP TABLE IF EXISTS public.rrh_cargo;
CREATE TABLE public.rrh_cargo(
	id_rrh_cargo serial NOT NULL,
	car_nombr text NOT NULL,
	id_rrh_tseri_rrh_tseri integer,
	id_rrh_profe_rrh_profe integer,
	id_rrh_serie_rrh_serie integer,
	id_rrh_estat_rrh_estat integer,
	id_rrh_estab_rrh_estab integer,
	id_rrh_espec_rrh_espec integer,
	CONSTRAINT pk_id_rrh_cargo PRIMARY KEY (id_rrh_cargo)
	USING INDEX TABLESPACE pg_default

)
TABLESPACE pg_default;
-- ddl-end --
COMMENT ON TABLE public.rrh_cargo IS 'recopilacion de relaciones para generar cargos';
-- ddl-end --
ALTER TABLE public.rrh_cargo OWNER TO postgres;
-- ddl-end --

-- object: rrh_tseri_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_cargo DROP CONSTRAINT IF EXISTS rrh_tseri_fk CASCADE;
ALTER TABLE public.rrh_cargo ADD CONSTRAINT rrh_tseri_fk FOREIGN KEY (id_rrh_tseri_rrh_tseri)
REFERENCES public.rrh_tseri (id_rrh_tseri) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_profe_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_cargo DROP CONSTRAINT IF EXISTS rrh_profe_fk CASCADE;
ALTER TABLE public.rrh_cargo ADD CONSTRAINT rrh_profe_fk FOREIGN KEY (id_rrh_profe_rrh_profe)
REFERENCES public.rrh_profe (id_rrh_profe) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_serie_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_cargo DROP CONSTRAINT IF EXISTS rrh_serie_fk CASCADE;
ALTER TABLE public.rrh_cargo ADD CONSTRAINT rrh_serie_fk FOREIGN KEY (id_rrh_serie_rrh_serie)
REFERENCES public.rrh_serie (id_rrh_serie) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estat_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_cargo DROP CONSTRAINT IF EXISTS rrh_estat_fk CASCADE;
ALTER TABLE public.rrh_cargo ADD CONSTRAINT rrh_estat_fk FOREIGN KEY (id_rrh_estat_rrh_estat)
REFERENCES public.rrh_estat (id_rrh_estat) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_estab_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_cargo DROP CONSTRAINT IF EXISTS rrh_estab_fk CASCADE;
ALTER TABLE public.rrh_cargo ADD CONSTRAINT rrh_estab_fk FOREIGN KEY (id_rrh_estab_rrh_estab)
REFERENCES public.rrh_estab (id_rrh_estab) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: rrh_espec_fk | type: CONSTRAINT --
-- ALTER TABLE public.rrh_cargo DROP CONSTRAINT IF EXISTS rrh_espec_fk CASCADE;
ALTER TABLE public.rrh_cargo ADD CONSTRAINT rrh_espec_fk FOREIGN KEY (id_rrh_espec_rrh_espec)
REFERENCES public.rrh_espec (id_rrh_espec) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --


-- Appended SQL commands --
INSERT INTO estados (id_estado, estado, iso_3166-2) VALUES
(1, 'Amazonas', 'VE-X'),
(2, 'Anzoátegui', 'VE-B'),
(3, 'Apure', 'VE-C'),
(4, 'Aragua', 'VE-D'),
(5, 'Barinas', 'VE-E'),
(6, 'Bolívar', 'VE-F'),
(7, 'Carabobo', 'VE-G'),
(8, 'Cojedes', 'VE-H'),
(9, 'Delta Amacuro', 'VE-Y'),
(10, 'Falcón', 'VE-I'),
(11, 'Guárico', 'VE-J'),
(12, 'Lara', 'VE-K'),
(13, 'Mérida', 'VE-L'),
(14, 'Miranda', 'VE-M'),
(15, 'Monagas', 'VE-N'),
(16, 'Nueva Esparta', 'VE-O'),
(17, 'Portuguesa', 'VE-P'),
(18, 'Sucre', 'VE-R'),
(19, 'Táchira', 'VE-S'),
(20, 'Trujillo', 'VE-T'),
(21, 'Vargas', 'VE-W'),
(22, 'Yaracuy', 'VE-U'),
(23, 'Zulia', 'VE-V'),
(24, 'Distrito Capital', 'VE-A'),
(25, 'Dependencias Federales', 'VE-Z');

INSERT INTO municipios (id_municipio, id_estado, municipio) VALUES
(7, 1, 'Río Negro'),
(8, 2, 'Anaco'),
(9, 2, 'Aragua'),
(10, 2, 'Bruzual'),
(10, 2, 'Manuel Ezequiel Bruzual'),
(11, 2, 'Diego Bautista Urbaneja'),
(12, 2, 'Peñalver'),
(12, 2, 'Fernando Peñalver'),
(13, 2, 'Francisco del Carmen Carvajal'),
(14, 2, 'General Sir Arthur McGregor'),
(15, 2, 'Guanta'),
(16, 2, 'Independencia'),
(17, 2, 'José Gregorio Monagas Monagas'),
(17, 2, 'José Gregorio Monagas'),
(18, 2, 'Juan Antonio Sotillo'),
(19, 2, 'Juan Manuel Cajigal'),
(20, 2, 'Libertad'),

INSERT INTO municipios (id_municipio, id_estado, municipio) VALUES
(69, 6, 'Gran Sabana'),
(70, 6, 'Heres'),
(71, 6, 'Piar'),
(72, 6, 'Raúl Leoni'),
(72, 6, 'Angostura (Raúl Leoni)'),
(73, 6, 'Roscio'),
(74, 6, 'Sifontes'),
(75, 6, 'Sucre'),
INSERT INTO municipios (id_municipio, id_estado, municipio) VALUES
(415, 22, 'San Felipe'),
(416, 22, 'Sucre'),
(417, 22, 'Urachiche'),
(418, 22, 'Veroes'),
(418, 22, 'José Joaquín Veroes'),
(441, 23, 'Almirante Padilla'),
(442, 23, 'Baralt'),
(443, 23, 'Cabimas'),
(444, 23, 'Catatumbo'),
(445, 23, 'Colón'),
(446, 23, 'Francisco Javier Pulgar'),
(447, 23, 'Guajira'),
(447, 23, 'Páez'),
(448, 23, 'Jesús Enrique Losada'),
(449, 23, 'Jesús María Semprún'),
(450, 23, 'La Cañada de Urdaneta'),
INSERT INTO municipios (id_municipio, id_estado, municipio) VALUES
(461, 23, 'Valmore Rodríguez'),
(462, 24, 'Libertador');
---
