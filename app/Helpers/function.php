<?php
/**
 * @description: converse num of price to the half string. Exp: 1200000: 1 triệu 2 trăm
 * @benefit: Giúp người nhập dễ kiểm tra con số nhập đúng không
 * @param int $num
 * @return string
 */
function readNum($num = 0)
{
    $text = '';
    $temp = 0;
    if ($num > 999999) {
        $temp = round(fdiv($num, 1000000));
            $text .= $temp . ' triệu ';
        }
    if ($num > 99999) {
        $temp = fmod($num, 1000000);
            $temp = floor(fdiv($temp, 100000));
            if ($temp > 0) $text .= $temp . ' trăm ';
        }
    if ($num > 999) {
        $temp = fmod($num, 100000);
            $temp = floor(fdiv($temp, 1000));
            if ($temp > 0)
                $text .= $temp . ' nghìn ';
        }
    $text .= fmod($num, 1000) . ' đồng.';
    return $text;
}
function numFormatVn($num):string
{
    return number_format($num, 0, '.', ',');
}
