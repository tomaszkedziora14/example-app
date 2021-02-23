<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    public function generatePdfDoc(Request $request)
    {
        $pdf = PDF::loadView('pdf.invoice', $request->all());
        return $pdf->download('invoice.pdf');
    }
}
