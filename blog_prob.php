<?php
/**
 * Created by PhpStorm.
 * User: steveperry
 * Date: 9/8/15
 * Time: 7:59 PM
 */

$recursion_ary = [1,2,3,[4,5,6],7];
$rest_of_ary = [1,2,3,4,5,6,7];
$mix_a = [1,2,3];
$mix_b = ['a','b','c'];

echo 'recursion of [1,2,3,[4,5,6],7] :' . recursion_sum($recursion_ary).'<br>';
echo 'for loop sum :' . for_loop_sum($rest_of_ary).'<br>';
echo 'while loop sum :' . while_loop_sum($rest_of_ary).'<br>';
echo 'mixing these [1,2,3] && [\'a\',\'b\',\'c\'] :<br>';
echo '<pre>';
echo print_r(mix_em_up($mix_a, $mix_b));
echo '</pre>';
echo '<br>array of 100 Fibonaci numbers :<pre>';
echo print_r(fib_100());
echo '</pre>';

//sum list of numbers with foreach
function for_loop_sum($ary_of_nums) {
  $count = 0;
  foreach ($ary_of_nums as $val) {
    $count += $val;
  }
  return $count;
}

//sum list of number with while loop
function while_loop_sum ($ary2) {
  $count = 0;
  $iterator = 0;
  while ($iterator < count($ary2)) {
    $count += $ary2[$iterator];
    $iterator++;
  }
  return $count;
}

//use recursion to sum multi-dimensional array
function recursion_sum ($ary3) {
  $count = 0;
  foreach ($ary3 as $val) {
    if (is_array($val)) {
      $count += recursion_sum($val);
    } else {
      $count += $val;
    }
  }

  return $count;
}

//given two arrays of same length, cancat them while alternating indexes.
//example: [1,2,3] && ['a','b','c'] should result in [1,'a',2,'b',3,'c']
function mix_em_up($aryA, $aryB) {
  $switch = true;
  $return_ary = [];
  $iterations = count($aryA) + count($aryB);
  $A = 0;
  $B = 0;

  for ($i=0;$i < $iterations;$i++) {
    if ($switch) {
      $return_ary[] = $aryA[$A];
      $A++;
      $switch = !$switch;
    } else {
      $return_ary[] = $aryB[$B];
      $B++;
      $switch = !$switch;
    }
  }

  return $return_ary;
}

//Return the first 100 Fibonacci Numbers.
function fib_100() {
  $return_array = [0,1];
  $number_count_limit = 100;
  $ary_count = 0;

  while ($ary_count < $number_count_limit) {
    $last_el = count($return_array) - 1;
    $second_to_last = $last_el -1;
    $new_fib_num = $return_array[$second_to_last] + $return_array[$last_el];
    $return_array[] = $new_fib_num;
    $ary_count = count($return_array);
  }

  return $return_array;
}