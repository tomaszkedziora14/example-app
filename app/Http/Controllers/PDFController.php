<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    public function pdf()
    {
        return [];
    }
    public function generatePdfDoc(Request $request)
    {
        $pdf = PDF::loadView('pdf.invoice', $request->all());
        return $pdf->download('invoice.pdf');
    }


}
