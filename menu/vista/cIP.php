<?PHP
//echo 'login:',$login."<br>";
//echo 'id_del_usuario:',$id_del_usuario."<br>";
//$Id: cIP.php,v 1.0 2010/10/14 20:07:04 laudarch Exp $ */
# Set to true if you want to test the class

$TEST = true;
    
interface iIP {
	public static function getusrip();
}
    
class cIP implements iIP {
	/**
	 * Returns User IP Address
	 * @params
	 *        IN:  NONE
	 *        OUT: ip address(0.0.0.0)
	 */
	public static function getusrip()
	{
		$ip = null;
		if ((isset($_SERVER['HTTP_X_FORWARDED_FOR'])) &&
		    (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} elseif ((isset($_SERVER['HTTP_CLIENT_IP'])) &&
			  (!empty($_SERVER['HTTP_CLIENT_IP']))) {
			$ip = explode(".", $_SERVER['HTTP_CLIENT_IP']);
			$ip = "{$ip[3]}.{$ip[2]}.{$ip[1]}.{$ip[0]}";
		} elseif ((!isset($_SERVER['HTTP_X_FORWARDED_FOR'])) &&
			  (empty($_SERVER['HTTP_X_FORWARDED_FOR'])) &&
			  (!isset($_SERVER['HTTP_CLIENT_IP'])) &&
			  (empty($_SERVER['HTTP_CLIENT_IP'])) &&
			  (isset($_SERVER['REMOTE_ADDR'])) ) {
			   $ip = ($_SERVER['REMOTE_ADDR']);
		} else {
			// ip is null
	        }
            return ($ip);
	}
}
if ($TEST) { 
	$ip	=	cIP::getusrip();
	$ip_objeto_conexion_BD	=	new clase_conecta_postgresql;
	$query_de_la_ip	=	"INSERT INTO rrh_dtipent (fk_id_rrh_usuar, dti_ipent, dti_fehoy) VALUES ($id_del_usuario, '$ip', NOW())";
	$ip_objeto_conexion_BD->ejecutar_sql($query_de_la_ip);	
	print "ip: $ip\n<br />";
	print "TEST done!";
	exit;
} 
?>
