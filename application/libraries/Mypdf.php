<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'assets/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Mypdf
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($view, $data = array())
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, true);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        $dompdf->stream('Laporan' . ".pdf", array("Attachment" => false));
    }

}