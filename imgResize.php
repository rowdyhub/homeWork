<?php
$filename = 'test.jpg'; //Исходное изображение

if(!is_file("normalize_200x100_{$filename}")){ //Если нет уже готового изображения под баннер, создаем его
    list($width, $height) = getimagesize($filename);   //Получаем ширину и высоту изображения
    $dst_w = 200; // Результирующий размер 
    $dst_h = 200; // изображения 200х200
    
    $thumb = imagecreatetruecolor(200, 100);   //Создается новое изображение (с размерами баннера)
    $source = imagecreatefromjpeg($filename);  //Получение ресурса исходного изображения
    
    imagecopyresized($thumb, $source, 0, -100, 0, 0, $dst_w, $dst_h, $width, $height);  // Перемещение исходного изображения на новое, 
                                                                                        // с размером 200х200, начиная с координаты -100
                                                                                        // для центрирования.
    
    imagejpeg($thumb, "normalize_200x100_{$filename}", 100);   //Сохранение изображения для последующего использования
    echo 'файл успешно обработан!<br/>';
}
else {
    echo 'Файл уже существует, обработка не требуется!<br/>';
}


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo "<img src='../normalize_200x100_{$filename}' width='200px' height='100px'>"
    ?>
</body>
</html>