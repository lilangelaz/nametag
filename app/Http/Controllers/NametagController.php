<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use SimpleSoftwareIO\QrCode\Generator as QrCodeGenerator;
use PDF;

class NametagController extends Controller
{
    public function process(Request $request)
    {
        $kode = $request->post('kode');
        $qrCodePath = public_path('qr_codes') . '/' . time() . '_qrcode.png';

        $name = $request->post('name');
        $instansi = $request->post('instansi');
        $divisi = $request->post('divisi');

        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/photos', $fileName); // Simpan ke direktori 'public/photos'
        $photoPath = 'storage/photos/' . $fileName;

        $outputfile = public_path() . '/' . $kode . '-' . $name . '.pdf';
        $this->fillPDF(public_path().'/master/template desain.pdf', $outputfile, $kode, $name, $instansi, $divisi, $photoPath, $qrCodePath);

        return response()->file($outputfile);
    }

    public function fillPDF($file, $outputfile, $kode, $name, $instansi, $divisi, $photoPath, $qrCodePath)
    {
        $fpdi = new FPDI;
        $pageCount = $fpdi->setSourceFile($file);

        for ($pageNumber = 1; $pageNumber <= $pageCount; $pageNumber++) {
            $template = $fpdi->importPage($pageNumber);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);

            // $fpdi->AddFont('Garet-Book', '', 'Garet-Book.ttf');

            // Write $name, $instansi, and $divisi only on the first page
            if ($pageNumber === 1) {
                // Set font and color
                $fpdi->SetFont('Helvetica', 'B', 19);
                $fpdi->SetTextColor(255, 255, 255);

                // Calculate position for $name
                $nameWidth = $fpdi->GetStringWidth($name);
                $nameX = ($size['width'] - $nameWidth) / 2;
                $fpdi->SetXY($nameX, 76);
                $fpdi->Write(0, $name);

                // Set font and color for $instansi
                $fpdi->SetFont('Helvetica', '', 9);
                $fpdi->SetTextColor(58, 71, 80);

                // Calculate position for $instansi
                $posisiWidth = $fpdi->GetStringWidth($instansi);
                $instansiX = ($size['width'] - $posisiWidth) / 2;
                $fpdi->SetXY($instansiX, 87);
                $fpdi->Write(0, $instansi);

                // Set font and color for $divisi
                $fpdi->SetFont('Helvetica', 'B', 13);
                $fpdi->SetTextColor(255, 255, 255);

                // Calculate position for $divisi
                $divisiWidth = $fpdi->GetStringWidth($divisi);
                $divisiX = ($size['width'] - $divisiWidth) / 2;
                $fpdi->SetXY($divisiX, 97);
                $fpdi->Write(0, $divisi);

                $photoWidth = 60;
                $photoHeight = 60;
                $photoX = ($size['width'] - $photoWidth) / 2;
                $photoY = 7 + (($size['height'] - 60 - $photoHeight) / 2);
                $fpdi->Image($photoPath, $photoX, $photoY, $photoWidth, $photoHeight);

            } else if ($pageNumber === 2) {
                // Generate QR code
                $url = 'http://118.97.163.52:8182/magang/tracking-pengajuan?kode_pengajuan=' . $kode;
                $qrCodeGenerator = new QrCodeGenerator();
                $qrCodeGenerator->size(500)->format('png')->generate($url, $qrCodePath);

                // Add QR code to PDF
                $qrCodeWidth = 43;
                $qrCodeHeight = 43;
                $qrCodeX = ($size['width'] - $qrCodeWidth) / 2;
                $qrCodeY = 6.5 + ($size['height'] - $qrCodeHeight) / 2;
                $fpdi->Image($qrCodePath, $qrCodeX, $qrCodeY, $qrCodeWidth, $qrCodeHeight);

                // Remove the temporary QR code image
                unlink($qrCodePath);
            }
        }
    
        $fpdi->Output($outputfile, 'F');
        return $outputfile;
    }
}
