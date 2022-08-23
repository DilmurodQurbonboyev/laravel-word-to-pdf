<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;

class ConvertController extends Controller
{
    public function convertDocToPdf()
    {
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        Settings::setPdfRendererPath($domPdfPath);
        Settings::setPdfRendererName('DomPDF');

        $Content = IOFactory::load(public_path('sample.docx'));
        $PDFWriter = IOFactory::createWriter($Content, 'PDF');
        $PDFWriter->save(public_path('doc-pdf.pdf'));
        $a = public_path('doc-pdf.pdf');
        return response()->download($a)->deleteFileAfterSend(true);
    }
}
