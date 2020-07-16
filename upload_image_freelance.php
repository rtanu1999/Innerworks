<?php
$arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];

if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
  echo "false";
  return;
}

if (!file_exists('upload')) {
  mkdir('upload', 0777);
}

move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . time() . '_' . $_FILES['file']['name']);

echo '' . time() . '_' . $_FILES['file']['name'];
?>
