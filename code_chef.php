<?php
/**
 * Created by PhpStorm.
 * User: steveperry
 * Date: 9/8/15
 * Time: 5:54 PM
 */

$res = 'middle '.middle_it(3,2,1).'<br><br>';
$res2 = middle_it_no_ary(10,10,10);
$res3 = middle_it_no_ary(3,2,1);
$res4 = middle_it_no_ary(2,1,3);
$res5 = middle_it_no_ary(1,3,2);
$res6 = middle_it_no_ary(3,2,2);
$res7 = middle_it_no_ary(3,2,2);
$res8 = middle_it_no_ary(3,3,2);

echo 'array solution gives: '.$res.'<br>';
echo 'logical solutions give: '.$res2.' '.$res3.' '.$res4.' '.$res5.' '.$res6.' '.$res7.' '.$res8;

//given 3 numbers, return the second largest one.
function middle_it($first, $second, $third) {
  $all = [$first, $second, $third];

  sort($all, SORT_NUMERIC);

  return $all[1];
}

function middle_it_no_ary($num1, $num2, $num3) {

 if (($num1 >= $num2 && $num1 <= $num3) ||
     ($num1 <= $num2 && $num1 >= $num3) ||
     ($num1 >= $num3 && $num1 <= $num2) ||
     ($num1 <= $num3 && $num1 >= $num2)) {
   return $num1;
 }
 elseif (($num2 > $num1 && $num2 < $num3)||
     ($num2 <= $num1 && $num2 >= $num3)||
     ($num2 >= $num3 && $num2 <= $num1)||
     ($num2 <= $num3 && $num2 >= $num1)) {
   return $num2;
 }
 else {
   return $num3;
  }
}