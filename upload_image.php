<?php
$arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg', 'application/pdf', 'application/msword']; 
 
if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
  echo "false";
  return;
} 
 
if (!file_exists('Resume')) {
  mkdir('Resume', 0777);
}
 
move_uploaded_file($_FILES['file']['tmp_name'], 'Resume/' . time() . '_' . $_FILES['file']['name']);
 
echo '' . time() . '_' . $_FILES['file']['name'];
?>