<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;

class PdfController extends Controller
{
    public function index()
    {
        $filename='hello_world.pdf';

        $data=[
            'title'  =>'Hello  World !'
        ];

        $view= \View ::make('pdf.sample', $data);
        $html= $view ->render();

        $pdf= new TCPDF;

        PDF::setTitle('Hello World');
        PDF::AddPage();
        PDF::writeHTML($html,true,false,true,false,'');

        PDF::output(public_path($filename),'F');

        return response()->download(public_path($filename));
    }
}
