<?
putenv('PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin:/root/bin');
//exec("/usr/bin/unoconv -f pdf /home/www/firstonlinebroker/public_html/upload/docs/new_invoice.xlsx");
shell_exec("/usr/bin/unoconv -f pdf /home/www/firstonlinebroker/public_html/upload/docs/new_invoice.xlsx");
printr("unoconv -f pdf /home/www/firstonlinebroker/public_html/upload/docs/new_invoice.xlsx");

function printr($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    
}
?>