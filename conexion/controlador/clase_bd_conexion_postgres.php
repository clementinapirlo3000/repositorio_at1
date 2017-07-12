<?php

	require("configuracion_bd_inicial.php");
 
	//--------------------------------------------------------//
	// Display de Errores de php                              //
	//--------------------------------------------------------//
	// Para solo desplegar errores personalizados descomentar
 
	// Para desplegar todos los errores descomentar
	// ini_set('error_reporting', 'all');
	//--------------------------------------------------------//
 
	class clase_conecta_postgresql 
	{
		var $servidor;
		var $puerto;
		var $nombreBD;
		var $nombreDeUsuario;
		var $contrasena;
		var $enlace;
		var $resultado;
		var $consulta;
 
		function clase_conecta_postgresql()
		{
			global $configuracion;
			$this->servidor = $configuracion->servidor;
			$this->puerto = $configuracion->puerto;
			$this->nombreBD = $configuracion->nombreBD;
			$this->nombreDeUsuario = $configuracion->nombreDeUsuario;
			$this->contrasenia = $configuracion->contrasenia;
 
			// conexion automatica al crear el objeto, para tareas no hay problema
			// para produccion no es recomendable, es ideal conectar solo al momento 
			// de usar el objeto.
			// Ejemplo:
			//         $objDB = new db();
			//         $objDB->conectar_bd();
			//
			$this->conectar_postgresql_bd();
		}
 
		function conectar_postgresql_bd()
		{
			$sConn = "host=$this->servidor port=$this->puerto dbname=$this->nombreBD user=$this->nombreDeUsuario password=$this->contrasenia";
			//$sConn = "host=localhost port=5432 dbname=laboratorio user=fernando password=123456789";
			$enlace = pg_connect($sConn);
			$stat = pg_connection_status($enlace);
			
			if($stat === PGSQL_CONNECTION_OK)
			{
				$this->enlace = $enlace;
				return true;
			}
			else
			{
				$this->setError("ERROR: al conectar a la base de datos","die");
			}
		}
 
		function ejecutar_sql($sentenciaSQL)
		{
			if($this->consulta = pg_query($this->enlace,$sentenciaSQL))
			{
				return true;
			}
			else
			{
				$stat = pg_connection_status($this->enlace);
			
				if($stat === PGSQL_CONNECTION_OK)
				{
					$errMen = pg_last_error($this->enlace);
					$errMen = $errMen."<br>EN LA CONSULTA: \"".$sentenciaSQL."\"";
				}
				else
				{
					$errMen = "ERROR AL EJECUTAR: \"".$sentenciaSQL."\"<br>NO CONECTADO A LA BASE DE DATOS";
				}        	
        	
				$this->setError($errMen,false);
			}
		}
 
		function obtener_arreglo_objeto()
		{
			if($this->resultado = pg_fetch_object($this->consulta))
			{
				return $this->resultado;
			}
			else
			{
				return false;
			}
		}
 
		function obtener_arreglo_asociado()
		{
			if($this->resultado = pg_fetch_assoc($this->consulta))
			{
				return $this->resultado;
			}
			else
			{
				return false;
			}
		}    
 
		function obtener_arreglo()
		{
			if($this->resultado = pg_fetch_array($this->consulta))
			{
				return $this->resultado;
			}
			else
			{
				// entra en este caso cuando se acaban los registros
				// no por error, es para que termine el while.
				return false; 
			}
		}
 
		function devolver_numero_filas()
		{
			if($numFilas = pg_num_rows($this->consulta))
			{
				return $numFilas;
			}
			else
			{
				$this->setError(pg_last_error($this->enlace),false);
			}
		}
 
		function liberar_resultado()
		{
			if(pg_free_result($this->consulta))
			{
				return true;
			}
			else
			{
				$this->setError("ERROR: al liberar el resultado",false);
			}
		}
 
		function cerrar_conexion()
		{
			if(pg_close($this->enlace))
			{
				return true;
			}
			else
			{
				$this->setError("ERROR: al cerrar la conexion",false);
			}
		}
 
		function setError($errMen,$return)
		{
			if($return)
			{
				die(); //detiene totalmente la ejecucion del script php
			}
			else
			{
				return false; //devuelve false para control externo del error
			}
		}
		
		/*---------------------------------------------------------------------------------------------------
		Aqui se generan SELECTS dinamicos para 2 Campos de una Tabla
		****************************************************************************************************/
		public function generaSelect($comando_sql, $nameId, $selected, $titulo)
		{
		  $contador = 0;
		  $sentenciaSQL=self::ejecutar_consulta($comando_sql);
		  echo "<select name='$nameId' id='$nameId' title='$titulo' style='width: 380px;'>";
		  echo "<option value='No Aplica' title='No Aplica el Diagn&oacute;stico'>[No Aplica]</option>";
		  while($registro=self::obtener_arreglo())
		  {  
		    ?><option value="<?php echo $registro[0]; ?>" <?php if ($registro[0] == $selected) { ?> selected <?php } ?> title="<?php echo $registro[1]; ?>"> <?php echo $registro[0]." | ".$registro[1]; ?></option><?php
		  }
		  echo "</select>";
		}
		/****************************************************************************************************
		---------------------------------------------------------------------------------------------------*/
		
		/*---------------------------------------------------------------------------------------------------
		Aqui se generan SELECTS dinamicos para 2 Campos de una Tabla
		****************************************************************************************************/
		public function generaSelectCIE($comando_sql, $nameId, $selected, $titulo)
		{
		  $contador = 0;
		  $sentenciaSQL=self::ejecutar_consulta($comando_sql);
		  echo "<select name='$nameId' id='$nameId' title='$titulo' style='width: 380px;'>";
		  echo "<option value='No Aplica' title='No Aplica el Diagn&oacute;stico'>[No Aplica]</option>";
		  while($registro=self::obtener_arreglo())
		  {  
		    ?><option value="<?php echo $registro[0]; ?>" <?php if ($registro[0] == $selected) { ?> selected <?php } ?> title="<?php echo "C&oacute;digo CIE: $registro[0]"; ?>"> <?php echo $registro[1]." | ".$registro[0]; ?></option><?php
		  }
		  echo "</select>";
		}
		/****************************************************************************************************
		---------------------------------------------------------------------------------------------------*/
		
		/*---------------------------------------------------------------------------------------------------
		Aqui se generan SELECTS dinamicos para 2 Campos de una Tabla
		****************************************************************************************************/
		public function generaSelectCIEReporte($comando_sql, $nameId, $selected, $titulo)
		{
		  $contador = 0;
		  $sentenciaSQL=self::ejecutar_consulta($comando_sql);
		  echo "<select name='$nameId' id='$nameId' title='$titulo' style='width: 380px;'>";
		  echo "<option value='' title='No Aplica el Diagn&oacute;stico'>[No Aplica]</option>";
		  while($registro=self::obtener_arreglo())
		  {  
		    ?><option value="<?php echo $registro[0]; ?>" <?php if ($registro[0] == $selected) { ?> selected <?php } ?> title="<?php echo "C&oacute;digo CIE: $registro[0]"; ?>"> <?php echo $registro[1]." | ".$registro[0]; ?></option><?php
		  }
		  echo "</select>";
		}
		/****************************************************************************************************
		---------------------------------------------------------------------------------------------------*/

        /*---------------------------------------------------------------------------------------------------
		Aqui se generan SELECTS dinamicos para 4 Campos de una Tabla
		****************************************************************************************************/
		public function generaSelectLargo($comando_sql, $nameId, $selected, $titulo)
		{
		  $contador = 0;
		  $sentenciaSQL=self::ejecutar_consulta($comando_sql);
		  echo "<select name='$nameId' id='$nameId' title='$titulo'>";
		  echo "<option value=''>[Seleccione una Opci&oacute;n]</option>";
		  while($registro=self::obtener_arreglo())
		  {
		    $contador++;
		    ?><option value="<?php echo $registro[0]; ?>" <?php if ($registro[0] == $selected) { ?> selected <?php } ?>> <?php echo $registro[2]." - ".$contador." | ".$registro[1]; ?></option><?php
		  }
		  echo "</select>";
		}
		/****************************************************************************************************
		---------------------------------------------------------------------------------------------------*/

                /*---------------------------------------------------------------------------------------------------
		Aqui se generan SELECTS dinamicos consulta de Solicitudes
		****************************************************************************************************/
		public function generaSelectConsultaPasivos($comando_sql, $nameId, $selected, $titulo)
		{
		  $sentenciaSQL=self::ejecutar_consulta($comando_sql);
		  echo "<select name='$nameId' id='$nameId' title='$titulo'>";
		  echo "<option value=''>[Seleccione una Opci&oacute;n]</option>";
		  while($registro=self::obtener_arreglo())
		  {
		    list($anio,$mes,$dia) = explode("-",$registro[1]);
            ?><option value="<?php echo $registro[0]; ?>" <?php if ($registro[0] == $selected) { ?> selected <?php } ?>> <?php echo $registro[0]." | ".$dia."/".$mes."/".$anio." | ".$registro[2]." - ".$registro[3]."  ".$registro[4]; ?></option><?php
		  }
		  echo "</select>";
		}
		/****************************************************************************************************
		---------------------------------------------------------------------------------------------------*/
		//Inserta los datos de la Bitacora en cada modulo registrado y necesitado dentro del sistema 
			public function bitacora($movimiento,$objeto,$antes,$ahora,$idusuario)
			{
				date_default_timezone_set('UTC');
				$fecha="";
				$hora = date("H:i",time()); //Hora del sistema en este momento
				$diahoy=date("d"); 	//Dia de hoy numerico
				$mes=date("m"); 	//Mes Numerico
				$ano=date("Y");		//Año
				$fecha.=$ano."-".$mes."-".$diahoy;
				$insertar_bitacora	=	"INSERT INTO lab_bitac (fk_id_lab_usuar, bit_fecha, bit_hora, bit_movim, bit_objet, bit_antes, bit_ahora) VALUES ('$idusuario', '$fecha', '$hora', '$movimiento', '$objeto', '$antes', '$ahora')";
				$si_ejecuto=self::ejecutar_sql($insertar_bitacora);
				if (!$si_ejecuto)
					return false;	
				else
					return true;
			}
	}// Fin Clase
 
?>