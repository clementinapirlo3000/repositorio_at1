<?php
	//-----	Obtenemos la Configuracion Inicial de los parametros declarados Objeto
	//-----	en configuracion_bd_inicial.php
	require("configuracion_bd_inicial.php");
 
	//--------------------------------------------------------//
	// Display de Errores de PHP                              //
	//--------------------------------------------------------//
	// Para solo desplegar errores personalizados descomentar
	// Para desplegar todos los errores descomentar
	// ini_set('error_reporting', 'all');
	//--------------------------------------------------------//

	//----- Inicio de la Clase Conexion_bd que extiende a la Clase Mysqli 
	class clase_conecta_mysqli extends mysqli
	{
		var $servidor;
		var $puerto;
		var $nombreBD;
		var $nombreDeUsuario;
		var $contrasenia;
		var $enlace_conexion;
		var $resultado;
		var $sql;
		var $estado_mysqli;
 
 		//Constructor de la Clase que conecta con Gestor MySQLi
		function clase_conecta_mysqli()
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
			//         $objDB->connect();
			//
			$this->conectar_mysqli_bd();
		}

		//Funcion que ejecuta Constructor de la Clase Padre Mysqli o instancia
		//un nuevo objeto de Conexion MySQLi
		function conectar_mysqli_bd()
		{
		    if (!isset($enlace_conexion))
			{
				//Ejecutamos el Constructor de la Clase que Extendemos mysqli para Conexion Automatica Con la Clase Padre
				//parent::__construct($this->servidor, $this->nombreDeUsuario, $this->contrasenia, $this->nombreBD);
				$this->enlace_conexion = new mysqli($this->servidor, $this->nombreDeUsuario, $this->contrasenia, $this->nombreBD);
				if ($this->enlace_conexion->connect_error)
				{
    				die('Error de Conexion con MySQL (' . $this->enlace_conexion->connect_errno . ') '. $this->enlace_conexion->connect_error);
				}
            }
			
		}
 
 		//mysqli::query -- mysqli_query — Realiza una consulta a la base de datos
 		//Valores Devueltos: Retorna FALSE en caso de error.
 		//Si una consulta del tipo SELECT, SHOW, DESCRIBE o EXPLAIN es exitosa, mysqli_query()
 		//retornara un objeto mysqli_result. Para otras consultas exitosas de mysqli_query() retornara TRUE.
 		//Nota:
 		//En el caso de pasarle una sentencia a mysqli_query() que sea mayor del valor de max_allowed_packet del servidor,
 		//los codigos de error retornados diferiran dependiendo de si se esta usando el Controlador Nativo de MySQL (mysqlnd)
 		//o la Biblioteca Cliente de MySQL (libmysqlclient). El comportamiento es el siguiente:
		//mysqlnd en Linux retorna un codigo de error 1153. Este mensaje de error significa que "se tiene un paquete mayor que max_allowed_packet bytes".
		//mysqlnd en Windows retorna un codigo de error 2006. Este mensaje de error significa que "el servidor no esta disponible".
		//libmysqlclient en toda las plataformas retorna el codigo de error 2006. Este mensaje de error significa que "el servidor no esta disponible".
		function ejecutar_sql($sentenciaSQL)
		{
			if($this->sql = $this->enlace_conexion->query($sentenciaSQL))
			{
				return true;
			}
		}

		//Obtiene el estado actual del sistema
		//Una cadena que describe el estado del servidor. FALSE si ocurrio un error. 
		//devuelve una cadena que contiene información similar a la proporcionada por el comando 'mysqladmin status'.
		//Incluye el tiempo en funcionamiento en segundos y el numero de hilos en ejecucion, de preguntas, de recargas y de tablas abiertas. 
		function ver_estado_mysqli()
		{
			if($this->estado_mysqli = $this->enlace_conexion->stat())
			{
				return $this->estado_mysqli;
			}
			else
			{
				$this->establecerError("ERROR: al ver el Estado de MySQLi",false);
			}
		}

		//Extrae la fila de deresultados como asociativo parametro(MYSQLI_ASSOC), un array numerico parametro(MYSQLI_NUM), o ambas parametro(MYSQLI_BOTH)
		//Retorna un array de strings que corresponde a la fila obtenida o NULL si no hay mas filas en el resultset. 
		//Nota: Los nombres de los campos devueltos por esta funcion son sensibles a mayusculas y minusculas.
		//Nota: Esta función define campos NULOS al valor NULL de PHP.
		//Si dos o mas columnas del resultado tienen el mismo nombre de campo,
		//la ultima columna tomara precedencia y sobrescribira la informacion anterior.
		//Para acceder a multiples columnas con el mismo nombre, hay que usar la versión numericamente indexada de la fila.
		function obtener_arreglo()
		{
			if($this->resultado = $this->sql->fetch_array(MYSQLI_BOTH))
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

		//Devuelve la fila actual del resultado en forma de un objeto
		//Nota: Los nombres de los campos devueltos por esta funcion son sensibles a mayusculas y minusculas.
		//Nota: Esta función define campos NULOS al valor NULL de PHP.
		//Devuelve un objeto con las propiedades de cadena que corresponden a la fila obtenida o NULL si no hay mas filas en el conjunto de resultados. 
		function obtener_arreglo_objeto()
		{
			if($this->resultado = $this->sql->fetch_object())
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

		//Extrae la fila de resultados como un array asociativo
		//Retorna un array asociativo correspondiente a la fila obtenida o NULL si no hubiera mas filas.
		//Nota: Los nombres de los campos devueltos por esta funcion son sensibles a mayusculas y minusculas.
		//Nota: Esta función define campos NULOS al valor NULL de PHP.
		//Devuelve un array asociativo de strings que representa a la fila obtenida del conjunto de resultados,
		//donde cada clave del array representa el nombre de una de las columnas de este;
		//o NULL si no hubieran mas filas en dicho conjunto de resultados. 
		function obtener_arreglo_asociado()
		{
			if($this->resultado = $this->sql->fetch_assoc())
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

		//Obtiene el numero de filas de un resultado 
		//Retorna el número de filas del resultado.
		//Nota: Si el numero de filas es mayor al maximo valor de PHP_INT_MAX, el numero sera retornado como un string.
		function devolver_numero_filas()
		{
			if($numFilas = $this->sql->num_rows)
			{
				return $numFilas;
			}			
		}

		//Obtiene el numero de campos de un resultado
		//El numero de campos de un resultset. 
		function devolver_numero_campos()
		{
			/* determinar el numero de campos del resultset */
			if($numCampos = $this->sql->field_count)
			{
				return $numCampos;
			}			
		}

		//Libera la memoria asociada con un resultado
		//mysqli_result::free()
		//mysqli_result::close()
		//mysqli_result::free_result()
		function liberar_resultado_sql()
		{
			if($this->sql->close())
			{
				return true;
			}			
		}

		//Comprueba si la conexion al servidor funciona. Si se ha perdido, y la opcion global mysqli.reconnect
		//esta habilitada, se intenta realizar una reconexion automática.
		//Esta funcion la pueden utilizar clientes que permanecen inactivos por mucho tiempo para comprobar
		//si el servidor ha cerrado la conexion y reconectar si fuera necesario. 
		//Devuelve TRUE en caso de exito o FALSE en caso de error. 
		function hacer_ping_servidor()
		{
			/* comprobar si el servidor sigue vivo */
			if ($this->enlace_conexion->ping())
			{
    			echo "¡La Conexion esta bien!\n";
			}
			else
			{
    			echo "Error: %s\n", $this->enlace_conexion->error;
			}			
		}

		//Cierra una conexion abierta previamente a base de datos.   
		//Devuelve TRUE en caso de exito o FALSE en caso de error. 
		function cerrar_conexion()
		{
			if($this->enlace_conexion->close())
			{
				return true;
			}
			else
			{
				$this->establecerError("ERROR: al cerrar la conexion con MySQLi",false);
			}
		}
 
 		//Con esta funciones recogemos el error que genere cualquier otra funcion de la Conexión y detenemos
 		//la ejecuccion del Sistema
		function establecerError($errMen,$return)
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
		  $sentenciaSQL=self::ejecutar_sql($comando_sql);
		  echo "<select name='$nameId' id='$nameId' title='$titulo'>";
		  echo "<option value=''>[Seleccione una Opci&oacute;n]</option>";
		  while($registro=self::obtener_arreglo())
		  {  
		    $contador++;
		    ?><option value="<?php echo $registro[0]; ?>" <?php if ($registro[0] == $selected) { ?> selected <?php } ?>> <?php echo $registro[0]." | ".$registro[1]; ?></option><?php
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
		  $sentenciaSQL=self::ejecutar_sql($comando_sql);
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
		Aqui se generan SELECTS dinamicos sql de Solicitudes
		****************************************************************************************************/
		public function generaSelectsqlOficios($comando_sql, $nameId, $selected, $titulo)
		{
		  $sentenciaSQL=self::ejecutar_sql($comando_sql);
		  echo "<select name='$nameId' id='$nameId' title='$titulo'>";
		  echo "<option value=''>[Seleccione una Opci&oacute;n]</option>";
		  while($registro=self::obtener_arreglo())
		  {
                    $fecha_registro = explode("-",$registro[4]);
                    $formato_fecha_registro = $fecha_registro[2]."/".$fecha_registro[1]."/".$fecha_registro[0];
		    ?><option value="<?php echo $registro[0]; ?>" <?php if ($registro[0] == $selected) { ?> selected <?php } ?>> <?php echo "$registro[0] | $registro[1] | $registro[2] | $registro[3] | $formato_fecha_registro"; ?></option><?php
		  }
		  echo "</select>";
		}
		/****************************************************************************************************
		---------------------------------------------------------------------------------------------------*/
 //Inserta los datos de la Bitacora en cada modulo registrado y necesitado dentro del sistema 
		public function bitacora($movimiento,$objeto,$antes,$ahora,$idusuario)
		{
			$fecha="";
			$hora = date("H:i",time()); //Hora del sistema en este momento
			$diahoy=date("d"); 	//Dia de hoy numerico
			$mes=date("m"); 	//Mes Numerico
			$ano=date("Y");		//Año
			$fecha.=$ano."-".$mes."-".$diahoy;
			/*echo "id usu ".$idusuario;
			echo "cedula ".$cedula;
			echo "nombre ".$nombre;
			echo "apellido ".$apellido;
			echo "fecha ".$fecha;
			echo "hora ".$hora;
			echo "movimiento ".$movimiento;
			echo "objeto ".$objeto;
			echo "antes ".$antes;
			echo "ahora ".$ahora;*/
			//	ya con todos los datos necesarios capturados procedo a almacenar el movimiento del usuario en la tabla respectiva  en este caso seria en la tabla bitacora
			
			$insertar_bitacora	=	"INSERT INTO bitacora (usuarios_idusuarios, fecha, hora, movimientos, objeto, antes, ahora) VALUES ($idusuario, '$fecha', '$hora', '$movimiento', '$objeto', '$antes', '$ahora')";
			$si_ejecuto=self::ejecutar_sql($insertar_bitacora);
			if (!$si_ejecuto)
				return false;	
			else
				return true;
		}
	}// Fin Clase
 
?>