<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\QRCodeExport;
use Maatwebsite\Excel\Facades\Excel;
use BaconQrCode\Encoder\QrCode;
use PhpOffice\PhpSpreadsheet\IOFactory;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
       public function index()
    {
        return view('home.index');
    }

        public function excelFormat()
    {
        // Use the export class to generate and download the Excel file
        return Excel::download(new QRCodeExport, 'qrcode_format.xlsx');
    }

    public function showGenerateQRForm()
    {
        return view('generate_qr_form');
    }

    public function generateQR(Request $request)
    {
        $request->validate([
            'excel-file' => 'required|file|mimes:xlsx',
        ]);

        $file = $request->file('excel-file');

        $excelReader = IOFactory::createReader('Xlsx');
        $spreadsheet = $excelReader->load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();

        $qrCodeValues = [];

        // Loop through rows in the Excel file to get QR code values
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE);

            foreach ($cellIterator as $cell) {
                // Assuming the header is 'QR Code Value'
                if ($cell->getColumn() == 'A' && $row->getRowIndex() > 1) {
                    $qrCodeValues[] = $cell->getValue();
                }
            }
        }

        // Generate PDF with QR codes
        $pdf = Pdf::loadView('pdf.qr_codes', ['qrCodeValues' => $qrCodeValues])->setPaper('a4', 'landscape');;
        return $pdf->stream('pdf.qr_codes');
        // Download the PDF
    }
}
