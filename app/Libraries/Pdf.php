<?php

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
    public function load_view_pdf($view, $data = [])
    {
        $dompdf = new Dompdf();
        $html = view($view, $data);

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        $time = time();

        // Output the generated PDF to Browser
        $dompdf->stream("welcome-" . $time);
    }
}
