move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
$resizeObj = new resize($destino.$img_nome1);
$resizeObj -> resizeImage(900, 640, 'crop');
$resizeObj -> saveImage($destino.$img_nome1, 100);
