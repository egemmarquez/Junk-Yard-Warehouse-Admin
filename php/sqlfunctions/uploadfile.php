<?Php
function uploadfiles($filevalue)
{

if( $_FILES["$filevalue"]["name"] == '')
{
}
else
{
if ((($_FILES["$filevalue"]["type"] == "image/gif")
|| ($_FILES["$filevalue"]["type"] == "image/jpeg")
|| ($_FILES["$filevalue"]["type"] == "image/pjpeg"))
&& ($_FILES["$filevalue"]["size"] < 2000000))
  {
  if ($_FILES["$filevalue"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["$filevalue"]["error"] . "<br />";
    }
  else
    {


    if (file_exists("fotos/" . $_FILES["$filevalue"]["name"]))
      {
      error('El archivo ya existe.');
      }
    else
      {
      move_uploaded_file($_FILES["$filevalue"]["tmp_name"],"fotos/" . $_FILES["$filevalue"]["name"]);
	  
	exito('Archivo cargado correctamente.');

      }
    }
  }
else
  {

  }
}

}

?>