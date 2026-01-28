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


if(strlen($arr[5])==0 || strlen($arr[2])==0 || strlen($arr[3])==0 ||strlen($arr[1])==0 || strlen($arr[0])==0)
{
echo "please insert proper data";
}
else
{
      $catarr=array();
      $catarr = explode(";" ,$arr[1]);

     $subarr=array();
     $subarr = explode(";" ,$arr[2]);
   print_r($subarr );
    
for($i=0; $i<count($subarr); $i++ ){
//echo"hi";
//if(strlen($arr[7])==0){
  //  $arr[7]='1.2';
//}
$Sql_Query = "INSERT INTO feedback (userName ,location,category,subCategory,ratting,comments,resolved,created_date) values('".$arr[0]."','".$arr[6]."','".$catarr[$i]."','".$subarr[$i]."','".$arr[3]."','".$arr[4]."','".$arr[5]."',now())";
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
}
 ?>
 
 
 
 
