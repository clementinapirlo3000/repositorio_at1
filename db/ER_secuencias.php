CREATE SEQUENCE public.contador_rrh_gusua
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_gusua
  OWNER TO postgres;
ALTER TABLE public.rrh_gusua
   ALTER COLUMN id_rrh_gusua SET DEFAULT NEXTVAL('contador_rrh_gusua');  
  
CREATE SEQUENCE public.contador_rrh_zopos
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_zopos
  OWNER TO postgres;
ALTER TABLE public.rrh_zopos
   ALTER COLUMN id_rrh_zopos SET DEFAULT NEXTVAL('contador_rrh_zopos');  
  
CREATE SEQUENCE public.contador_rrh_codci
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_codci
  OWNER TO postgres;
ALTER TABLE public.rrh_codci
   ALTER COLUMN id_rrh_codci SET DEFAULT NEXTVAL('contador_rrh_codci');  
  
CREATE SEQUENCE public.contador_rrh_codce
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_codce
  OWNER TO postgres;
ALTER TABLE public.rrh_codce
   ALTER COLUMN id_rrh_codce SET DEFAULT NEXTVAL('contador_rrh_codce');  
  
CREATE SEQUENCE public.contador_rrh_bitac
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_bitac
  OWNER TO postgres;
ALTER TABLE public.rrh_bitac
   ALTER COLUMN id_rrh_bitac SET DEFAULT NEXTVAL('contador_rrh_bitac');  
  
CREATE SEQUENCE public.contador_rrh_usuar
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_usuar
  OWNER TO postgres;
ALTER TABLE public.rrh_usuar
   ALTER COLUMN id_rrh_usuar SET DEFAULT NEXTVAL('contador_rrh_usuar');  
  
CREATE SEQUENCE public.contador_rrh_dtipent
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_dtipent
  OWNER TO postgres;
ALTER TABLE public.rrh_dtipent
   ALTER COLUMN id_rrh_dtipent SET DEFAULT NEXTVAL('contador_rrh_dtipent');  
  
CREATE SEQUENCE public.contador_rrh_estat
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_estat
  OWNER TO postgres;
ALTER TABLE public.rrh_estat
   ALTER COLUMN id_rrh_estat SET DEFAULT NEXTVAL('contador_rrh_estat');  
  
CREATE SEQUENCE public.contador_rrh_nacio
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_nacio
  OWNER TO postgres;
ALTER TABLE public.rrh_nacio
   ALTER COLUMN id_rrh_nacio SET DEFAULT NEXTVAL('contador_rrh_nacio');  
  
CREATE SEQUENCE public.contador_rrh_pais
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_pais
  OWNER TO postgres;
ALTER TABLE public.rrh_pais
   ALTER COLUMN id_rrh_pais SET DEFAULT NEXTVAL('contador_rrh_pais');  
  
CREATE SEQUENCE public.contador_rrh_provin
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_provin
  OWNER TO postgres;
ALTER TABLE public.rrh_provin
   ALTER COLUMN id_rrh_provin SET DEFAULT NEXTVAL('contador_rrh_provin');  
  
CREATE SEQUENCE public.contador_rrh_region
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_region
  OWNER TO postgres;
ALTER TABLE public.rrh_region
   ALTER COLUMN id_rrh_region SET DEFAULT NEXTVAL('contador_rrh_region');  
  
CREATE SEQUENCE public.contador_rrh_estad
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_estad
  OWNER TO postgres;
ALTER TABLE public.rrh_estad
   ALTER COLUMN id_rrh_estad SET DEFAULT NEXTVAL('contador_rrh_estad');  
  
CREATE SEQUENCE public.contador_rrh_munic
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_munic
  OWNER TO postgres;
ALTER TABLE public.rrh_munic
   ALTER COLUMN id_rrh_munic SET DEFAULT NEXTVAL('contador_rrh_munic');  
  
CREATE SEQUENCE public.contador_rrh_parro
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_parro
  OWNER TO postgres;
ALTER TABLE public.rrh_parro
   ALTER COLUMN id_rrh_parro SET DEFAULT NEXTVAL('contador_rrh_parro');  
  
CREATE SEQUENCE public.contador_rrh_ciuda
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_ciuda
  OWNER TO postgres;
ALTER TABLE public.rrh_ciuda
   ALTER COLUMN id_rrh_ciuda SET DEFAULT NEXTVAL('contador_rrh_ciuda');  
  
CREATE SEQUENCE public.contador_rrh_local
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_local
  OWNER TO postgres;
ALTER TABLE public.rrh_local
   ALTER COLUMN id_rrh_local SET DEFAULT NEXTVAL('contador_rrh_local');  
  
CREATE SEQUENCE public.contador_rrh_menus
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_menus
  OWNER TO postgres;
ALTER TABLE public.rrh_menus
   ALTER COLUMN id_rrh_menus SET DEFAULT NEXTVAL('contador_rrh_menus');  
  
CREATE SEQUENCE public.contador_rrh_smenu
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_smenu
  OWNER TO postgres;
ALTER TABLE public.rrh_smenu
   ALTER COLUMN id_rrh_smenu SET DEFAULT NEXTVAL('contador_rrh_smenu');  
  
CREATE SEQUENCE public.contador_rrh_tcampo
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_tcampo
  OWNER TO postgres;
ALTER TABLE public.rrh_tcampo
   ALTER COLUMN id_rrh_tcamp SET DEFAULT NEXTVAL('contador_rrh_tcampo');  

  
CREATE SEQUENCE public.contador_rrh_campos
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_campos
  OWNER TO postgres;
ALTER TABLE public.rrh_campos
   ALTER COLUMN id_rrh_campos SET DEFAULT NEXTVAL('contador_rrh_campos');  
  
CREATE SEQUENCE public.contador_rrh_tabla
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_tabla
  OWNER TO postgres;
ALTER TABLE public.rrh_tabla
   ALTER COLUMN id_rrh_tabla SET DEFAULT NEXTVAL('contador_rrh_tabla');  
  
CREATE SEQUENCE public.contador_rrh_privi
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_privi
  OWNER TO postgres;
ALTER TABLE public.rrh_privi
   ALTER COLUMN id_rrh_privi SET DEFAULT NEXTVAL('contador_rrh_privi');  
  
CREATE SEQUENCE public.contador_rrh_profe
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_profe
  OWNER TO postgres;
ALTER TABLE public.rrh_profe
   ALTER COLUMN id_rrh_profe SET DEFAULT NEXTVAL('contador_rrh_profe');  
  
CREATE SEQUENCE public.contador_rrh_tprof
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_tprof
  OWNER TO postgres;
ALTER TABLE public.rrh_tprof
   ALTER COLUMN id_rrh_tprof SET DEFAULT NEXTVAL('contador_rrh_tprof');  
  
CREATE SEQUENCE public.contador_rrh_distr
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_distr
  OWNER TO postgres;
ALTER TABLE public.rrh_distr
   ALTER COLUMN id_rrh_distr SET DEFAULT NEXTVAL('contador_rrh_distr');  
  
CREATE SEQUENCE public.contador_rrh_estab
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_estab
  OWNER TO postgres;
ALTER TABLE public.rrh_estab
   ALTER COLUMN id_rrh_estab SET DEFAULT NEXTVAL('contador_rrh_estab');  
  
CREATE SEQUENCE public.contador_rrh_testb
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_testb
  OWNER TO postgres;
ALTER TABLE public.rrh_testb
   ALTER COLUMN id_rrh_testb SET DEFAULT NEXTVAL('contador_rrh_testb');  
  
CREATE SEQUENCE public.contador_rrh_emple
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_emple
  OWNER TO postgres;
ALTER TABLE public.rrh_emple
   ALTER COLUMN id_rrh_emple SET DEFAULT NEXTVAL('contador_rrh_emple');  
  
CREATE SEQUENCE public.contador_rrh_ecivi
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_ecivi
  OWNER TO postgres;
ALTER TABLE public.rrh_ecivi
   ALTER COLUMN id_rrh_ecivi SET DEFAULT NEXTVAL('contador_rrh_ecivi');  
  
CREATE SEQUENCE public.contador_rrh_tnomin
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_tnomin
  OWNER TO postgres;
ALTER TABLE public.rrh_tnomin
   ALTER COLUMN id_rrh_nomin SET DEFAULT NEXTVAL('contador_rrh_tnomin');  
  
CREATE SEQUENCE public.contador_rrh_banco
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_banco
  OWNER TO postgres;
ALTER TABLE public.rrh_banco
   ALTER COLUMN id_rrh_banco SET DEFAULT NEXTVAL('contador_rrh_banco');  
  
CREATE SEQUENCE public.contador_rrh_deduc
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_deduc
  OWNER TO postgres;
ALTER TABLE public.rrh_deduc
   ALTER COLUMN id_rrh_deduc SET DEFAULT NEXTVAL('contador_rrh_deduc');  
  
CREATE SEQUENCE public.contador_rrh_dded
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_dded
  OWNER TO postgres;
ALTER TABLE public.rrh_dded
   ALTER COLUMN id_rrh_dded SET DEFAULT NEXTVAL('contador_rrh_dded');  
  
CREATE SEQUENCE public.contador_rrh_asign
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_asign
  OWNER TO postgres;
ALTER TABLE public.rrh_asign
   ALTER COLUMN id_rrh_asign SET DEFAULT NEXTVAL('contador_rrh_asign');  
  
CREATE SEQUENCE public.contador_rrh_tcuent
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_tcuent
  OWNER TO postgres;
ALTER TABLE public.rrh_tcuent
   ALTER COLUMN id_rrh_tcuent SET DEFAULT NEXTVAL('contador_rrh_tcuent');  
  
CREATE SEQUENCE public.contador_rrh_dasig
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_dasig
  OWNER TO postgres;
ALTER TABLE public.rrh_dasig
   ALTER COLUMN id_rrh_dasig SET DEFAULT NEXTVAL('contador_rrh_dasig');  
  
CREATE SEQUENCE public.contador_rrh_dnomin
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_dnomin
  OWNER TO postgres;
ALTER TABLE public.rrh_dnomin
   ALTER COLUMN id_rrh_dnomin SET DEFAULT NEXTVAL('contador_rrh_dnomin');  
  
CREATE SEQUENCE public.contador_rrh_fcuen
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_fcuen
  OWNER TO postgres;
ALTER TABLE public.rrh_fcuen
   ALTER COLUMN id_rrh_fcuen SET DEFAULT NEXTVAL('contador_rrh_fcuen');  
  
CREATE SEQUENCE public.contador_rrh_nomin
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_nomin
  OWNER TO postgres;
ALTER TABLE public.rrh_nomin
   ALTER COLUMN id_rrh_nomin SET DEFAULT NEXTVAL('contador_rrh_nomin');  
  
CREATE SEQUENCE public.contador_rrh_tcontra
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_tcontra
  OWNER TO postgres;
ALTER TABLE public.rrh_tcontra
   ALTER COLUMN id_rrh_tcontra SET DEFAULT NEXTVAL('contador_rrh_tcontra');  
  
CREATE SEQUENCE public.contador_rrh_unidt
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_unidt
  OWNER TO postgres;
ALTER TABLE public.rrh_unidt
   ALTER COLUMN id_rrh_unidt SET DEFAULT NEXTVAL('contador_rrh_unidt');  
  
CREATE SEQUENCE public.contador_rrh_parent
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_parent
  OWNER TO postgres;
ALTER TABLE public.rrh_parent
   ALTER COLUMN id_rrh_parent SET DEFAULT NEXTVAL('contador_rrh_parent');  
  
CREATE SEQUENCE public.contador_rrh_famil
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_famil
  OWNER TO postgres;
ALTER TABLE public.rrh_famil
   ALTER COLUMN id_rrh_famil SET DEFAULT NEXTVAL('contador_rrh_famil');  
  
CREATE SEQUENCE public.contador_rrh_cargo
   INCREMENT 1
   START 1;
ALTER SEQUENCE public.contador_rrh_cargo
  OWNER TO postgres;
ALTER TABLE public.rrh_cargo
   ALTER COLUMN id_rrh_cargo SET DEFAULT NEXTVAL('contador_rrh_cargo');  
  
CREATE SEQUENCE public.contador_nomina
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.contador_nomina
  OWNER TO postgres;

CREATE SEQUENCE public.contador_rrh_serie
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.contador_rrh_serie
  OWNER TO postgres;

CREATE SEQUENCE public.contador_rrh_tseri
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.contador_rrh_tseri
  OWNER TO postgres;

CREATE SEQUENCE public.contador_rrh_divisi
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.contador_rrh_divisi
  OWNER TO postgres;

CREATE SEQUENCE public.contador_rrh_espec
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.contador_rrh_espec
  OWNER TO postgres;

CREATE SEQUENCE public.contador_city
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.contador_city
  OWNER TO postgres;

CREATE SEQUENCE public.contador_country
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.contador_country
  OWNER TO postgres;

CREATE SEQUENCE public.contador_province
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.contador_province
  OWNER TO postgres;

CREATE SEQUENCE public.contador_located
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.contador_located
  OWNER TO postgres;

