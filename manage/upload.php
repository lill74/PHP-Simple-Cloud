<?php
include("../config.php");

if (isset($_FILES['myfile']))
{
     $error = $_FILES['myfile']['error'];
     $name = mt_rand(000000, 999999) . time();
     $realname = $_FILES['myfile']['name'];
     $date = $today = date("Y.m.d");   
          if ($error != UPLOAD_ERR_OK)
          {
               switch ($error)
               {
               case UPLOAD_ERR_INI_SIZE:
               case UPLOAD_ERR_FORM_SIZE:
                    echo "파일이 너무 큽니다. ($error)";
               break;

               case UPLOAD_ERR_NO_FILE:
                    echo "파일이 첨부되지 않았습니다. ($error)";
               break;

               default:
                    echo "파일이 제대로 업로드되지 않았습니다. ($error)";
               }

               exit;
          }
          else
          {
               move_uploaded_file($_FILES['myfile']['tmp_name'], "$datadir/$name");
               $q = "INSERT INTO file (name,realname,date) VALUES ('$name', '$realname','$date')";
               $mysqli->query($q);
               $mysqli->close();
               echo "업로드 성공!";
          }
}

?>