 <?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 include_once("config.php");

if($_SERVER['REQUEST_METHOD']=='GET'){


$password = '8R@13#s34Af';
$method = 'aes-256-cbc';

// Must be exact 32 chars (256 bit)
$password = substr(hash('sha256', $password, true), 0, 32);
// IV must be exact 16 chars (128 bit)
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);


$arr=array();
$i=0;
$posts=array();

$Sql_Query = "select AppID,secret from authentication_details where IsActive=1";

 try {
$result = mysqli_query($link, $Sql_Query);
             if (mysqli_num_rows($result) > 0) {
  // output data of each row
 		while($row =mysqli_fetch_assoc($result))
    {
        $posts[] = $row;
    }
 		
	} else {
  		echo "0 results";
               
             }
         } catch (Exception $e) {
             error_log($e->getMessage());
         }
         mysqli_close($link);
         $plaintext=json_encode(array($posts));
       	echo "$plaintext";
       // $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv)); 
        //echo "$encrypted";

        }
 ?>
 
 
 
 
