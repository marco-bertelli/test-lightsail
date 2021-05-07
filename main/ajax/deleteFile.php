<?
  $file=$_POST['file'];
  $id=$_POST['richiesta'];
  $dirtype =   $_POST['type'];
  $destFile=$_SERVER['DOCUMENT_ROOT']."/standgreen/files/".$id."/".$dirtype."/".$file;
 $cancello= unlink($destFile);
   echo $dirtype;
 ?>
