<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRController extends Controller
{
    public function generateQrCode()
    {
        QrCode::size(500)
            ->format('png')
            ->generate('codingdriver.com', public_path('unggah/qrcode.png'));

        return view('qr-Code');
    }
    public function downloadQRCode(Request $request, $id)
    {

        $imageName  = 'qr-code';
        $headers    = array('Content-Type' => ['png', 'svg', 'eps']);
        $type       = $request->qr_type == 'jpg' || $request->qr_type == 'transparent' ? 'png' : $request->qr_type;
        $image      = \QrCode::format($type)
            ->size(200)->errorCorrection('H')
            ->generate('codingdriver');

        \Storage::disk('public')->put($imageName, $image);

        if ($request->qr_type == 'jpg') {
            $type = 'jpg';
            $image = imagecreatefrompng('storage/' . $imageName);
            imagejpeg($image, 'storage/' . $imageName, 100);
            imagedestroy($image);
        }

        return response()->download('storage/' . $imageName, $imageName . '.' . $type, $headers)->deleteFileAfterSend();
    }
}
