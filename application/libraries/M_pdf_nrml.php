<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'/third_party/mpdf/mpdf.php';

class M_pdf_nrml {

    public $param;
    public $pdf;

    public function __construct($param = "'L',
        '', '', '', '',
        30,
        30, 
        30, 
        30, 
        18, 
        12")
    {
         $this->param =$param;
        $this->pdf = new mPDF($this->param);

        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $footer='(প্রতিবেদনটি সফটওয়্যারে স্বয়ংক্রিয়ভাবে প্রস্তুতকৃত)<br>প্রতিবেদনটি জেনারেট হওয়ার তারিখ: '.str_replace(range(0, 9), $bn_digits, date('d-m-Y'));
        $this->pdf->SetFooter('<div style="font-weight: 0 !important">'.$footer.'</div>');
       // $this->pdf->falseBoldWeight = 8;
    }
}
