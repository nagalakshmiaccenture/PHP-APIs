 <?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 include_once("config.php");

if($_SERVER['REQUEST_METHOD']=='POST'){

$encrypted=$_POST['d1']; 
$password = '8R@13#s34Af';
$method = 'aes-256-cbc';

// Must be exact 32 chars (256 bit)
$password = substr(hash('sha256', $password, true), 0, 32);
// IV must be exact 16 chars (128 bit)
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
//$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));

//decrypt
$decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);
    $arraydata = explode("," ,$decrypted);
    $arr=array();
    $i=0;
    foreach( $arraydata as $d){
        $arr[$i]= explode(":",$d)[1];
    
    $i++;
    }

if(strlen($arr[0])==0)
{
echo "please insert proper data";
}
else
{
	if(strlen($arr[1]) ==0 ){
		$arr[1]='1.4';
	}
$Sql_Query = "INSERT INTO start_hits (hitDate,userName,version) values(now(),'".$arr[0]."','".$arr[1]."')";
       echo "$Sql_Query" ;
 try {
             $result = mysqli_query($link,$Sql_Query);
             if (!$result) {
                 throw new Exception(mysqli_error($link));
             }
             else {
                echo"record inserted";
             }
         } catch (Exception $e) {
             error_log($e->getMessage());
         }
}
         mysqli_close($link);	
         
 }
 ?>
 
 
 
 
