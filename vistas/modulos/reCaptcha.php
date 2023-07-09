<?php

function generarCaptcha($longitud) {
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captcha = '';
    $caracteresLength = strlen($caracteres) - 1;

    for ($i = 0; $i < $longitud; $i++) {
        $posicion = rand(0, $caracteresLength);
        $captcha .= $caracteres[$posicion];
    }

    return $captcha;
}

// Generar un captcha de 6 caracteres
$captcha = generarCaptcha(6);

// Guardar el captcha en la sesión
$_SESSION['captcha'] = $captcha;

// Crear una imagen con el texto del captcha
$imagen = imagecreatetruecolor(200, 50);

// Colores
$colorFondo = imagecolorallocate($imagen, 255, 255, 255);
$colorTexto = imagecolorallocate($imagen, 0, 0, 0);

// Rellenar el fondo de la imagen
imagefilledrectangle($imagen, 0, 0, 200, 50, $colorFondo);

// Dibujar el texto del captcha en la imagen
imagettftext($imagen, 20, 0, 60, 35, $colorTexto, 'arial.ttf', $captcha);

// Mostrar la imagen generada como respuesta
header('Content-type: image/png');
imagepng($imagen);
imagedestroy($imagen);
?>

