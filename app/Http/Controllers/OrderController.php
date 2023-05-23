<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    class OrderController extends Controller
    {

    public function listProduct(){
        return view('user.makeOrder');
    } 

    public function generateQrCode()
    {
    $text = 'Hello, World!'; // Texto para o qual você deseja gerar o QR code

    $data = 'data:image/png;base64,' . base64_encode($this->generateQrCodeImage($text));

    return response()->json(['qrcode' => $data]);
    }

    private function generateQrCodeImage($text)
    {
    // Definir o tamanho do QR code
    $size = 300;

    // Criar uma imagem em branco
    $image = imagecreatetruecolor($size, $size);

    // Definir as cores do QR code (preto e branco)
    $black = imagecolorallocate($image, 0, 0, 0);
    $white = imagecolorallocate($image, 255, 255, 255);

    // Preencher a imagem com a cor branca
    imagefilledrectangle($image, 0, 0, $size, $size, $white);

    // Converter o texto para dados binários
    $data = utf8_encode($text);

    // Gerar o QR code manualmente
    $rows = str_split($data, 3);
    foreach ($rows as $rowIndex => $row) {
        $columns = str_split($row, 1);
        foreach ($columns as $columnIndex => $column) {
            if ($column === '1') {
                $x1 = $columnIndex * ($size / count($columns));
                $y1 = $rowIndex * ($size / count($rows));
                $x2 = $x1 + ($size / count($columns));
                $y2 = $y1 + ($size / count($rows));
                imagefilledrectangle($image, $x1, $y1, $x2, $y2, $black);
            }
        }
    }

    // Renderizar a imagem como um PNG e retornar os dados binários
    ob_start();
    imagepng($image);
    $data = ob_get_contents();
    ob_end_clean();

    return $data;
    }
}
