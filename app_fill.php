<?php
// b11 f23 e28
error_reporting(E_ALL^E_WARNING);


$arValues=$_REQUEST;
$arValues['date']=date('d.m.Y');
$arValues['tomorrow']=date('d.m.Y', time() + 86400); 
$arValues['5d']=date('d.m.Y', time() + 86400*5); 
$arValues['nextYear']=str_replace(date('Y'),date('Y')+1,date('d.m.Y')); 
$arValues['fran']=130000;
$arValues['bonus']=59000;

$arMatchApp=array(
'D2'=>'applicant',
'D4'=>'address',
'D6'=>'inn',
'D8'=>'rs',
'D10'=>'ks',
'D12'=>'bik',
'D14'=>'email',
'S14'=>'phone',
'D16'=>'income',
'D19'=>'sphere',
'S22'=>'limit',
'S45'=>'q1',
'S47'=>'q2',
'S49'=>'q3',
'S51'=>'q4',
'S53'=>'q5',
'S54'=>'q6',
'L77'=>'date',
'S61'=>'tomorrow'
);
$arMatchPol=array(
'C6'=>'applicant',
'C7'=>'address',
'C8'=>'inn',
'C9'=>'rs',
'C10'=>'ks',
'C11'=>'bik',
'C28'=>'limit',
'C29'=>'fran',
'C30'=>'bonus',
'B3'=>'date',
'D20'=>'tomorrow',
'D21'=>'nextYear'
);


$arMatchInv=array(
'B11'=>'applicant',
'B14'=>'address',
'B17'=>'inn',
'E28'=>'bonus',
'E24'=>'bonus',
'H15'=>'date',
'F23'=>'tomorrow',
'H23'=>'nextYear',
'D33'=>'5d'
);

$id=uniqid();
//usleep(250000);
//date_default_timezone_set('Europe/London');
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel.php';
//  printr($_SERVER);die();
//app
$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
$excel2 = $excel2->load('app.xlsx'); // Empty Sheet
$excel2->setActiveSheetIndex(0);
foreach($arMatchApp as $cell => $value)
{
    $excel2->getActiveSheet()->setCellValue($cell, $arValues[$value]);
}
$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
$objWriter->save("upload/docs/new_app_$id.xlsx");


// policy
$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
$excel2 = $excel2->load('policy.xlsx'); // Empty Sheet
$excel2->setActiveSheetIndex(0);
foreach($arMatchPol as $cell => $value)
{
    $excel2->getActiveSheet()->setCellValue($cell, $arValues[$value]);
}
$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
$objWriter->save("upload/docs/new_policy_$id.xlsx");

// invoice
$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
$excel2 = $excel2->load('invoice.xlsx'); // Empty Sheet
$excel2->setActiveSheetIndex(0);
foreach($arMatchInv as $cell => $value)
{
    $excel2->getActiveSheet()->setCellValue($cell, $arValues[$value]);
}
$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
$objWriter->save("upload/docs/new_invoice_$id.xlsx");

// конвертация в pdf unoconv -f pdf some-document.xls  /home/www/firstonlinebroker/public_html/
// и дальше просто exec сохраняется все там же, меняем расширение - профит!

echo '</br></br>';
printr("Спасибо! В ближайшее время наш менеджер свяжется с Вами.");
echo "<p><a id='app_link' class='btn btn-success' href='/upload/docs/new_app_$id.xlsx' target='_blank'>Скачать анкету</a></p>";

shell_exec("unoconv -f pdf /home/www/firstonlinebroker/public_html/upload/docs/new_policy_$id.xlsx");
//printr("unoconv -f pdf /home/www/firstonlinebroker/public_html/upload/docs/new_policy_$id.xlsx");
echo "<p><a id='app_link' class='btn btn-success' href='/upload/docs/new_policy_$id.pdf' target='_blank'>Скачать полис</a></p>";

shell_exec("unoconv -f pdf /home/www/firstonlinebroker/public_html/upload/docs/new_invoice_$id.xlsx");

echo "<p><a id='app_link' class='btn btn-success' href='/upload/docs/new_invoice_$id.pdf' target='_blank'>Скачать счет</a></p>";


function printr($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    
}
?>