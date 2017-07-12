<?php 
   //Inicia sesión  
 require ("session.php");

  // Desregistrar las siguientes variable de la sesión actual

  unset($_SESSION['nom_proyec']); 
  unset($_SESSION['idusuarios$nom_proyec']); 
  unset($_SESSION['cedula$nom_proyec']); 
  unset($_SESSION['nombre1$nom_proyec']); 
  unset($_SESSION['apellido1$nom_proyec']); 
  unset($_SESSION['login$nom_proyec']);  
  unset($_SESSION['nivelesacceso$nom_proyec']);  
	unset($_SESSION['nombre_proyecto']);	

//session_unregister('login_lab');	
  // Escribe los datos de la sesión actual y la finaliza
  session_write_close();
?>
<body>
  <form action='www.corposaludtachira.gob.ve' name='redirige'>
  </form>
  <script type='text/javascript'>
        document.redirige.submit();
  </script>
</body>
</html>

