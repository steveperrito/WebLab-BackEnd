<?php
/**
 * Created by PhpStorm.
 * User: steveperry
 * Date: 9/8/15
 * Time: 7:41 PM
 */

$balance = 500;

echo get_new_balance(0.25, $balance);

function get_new_balance ($withdrawl, $balance) {
  if ($withdrawl > $balance) {
    return $balance;
  }
  elseif ($withdrawl < 5) {
    return $balance;
  }
  else {
    $is_multiple5 = ($withdrawl%5 === 0);
    if ($is_multiple5) {
      return $balance - ($withdrawl + 0.50);
    }
    else {
      return $balance;
    }
  }
}