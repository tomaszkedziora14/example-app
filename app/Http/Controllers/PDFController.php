<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    public function generatePdfDoc(Request $request)
    {
        var_dump($request->title);

//        $pdf = PDF::loadView('pdf.invoice', $request->all());
//        return $pdf->download('invoice.pdf');
      return [];
    }
}
