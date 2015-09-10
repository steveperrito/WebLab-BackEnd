<?php

$board = [
  [null,null,null],
  [null,null,null],
  [null,null,null]
];

$winning_board = [
    [null,null,'x'],
    [null,null,'x'],
    [null,null,'x']
];

echo '<pre>';
echo winner($winning_board)? 'winner':'no winner';
echo '</pre>';

function winner($ary){
  $we_got_winna = false;

  $winning_combos = [
    'diagonal_lr' => [$ary[0][0], $ary[1][1], $ary[2][2]],
    'diagonal_rl' => [$ary[0][2], $ary[1][1], $ary[2][0]],
    'left_bar' => [$ary[0][0], $ary[1][0], $ary[2][0]],
    'middle_bar' => [$ary[0][1], $ary[1][1], $ary[2][1]],
    'right_bar' => [$ary[0][2], $ary[1][2], $ary[2][2]],
    'horz_top' => $ary[0],
    'horz_middle' => $ary[1],
    'horz_bottom' => $ary[2]
  ];

  foreach ($winning_combos as $key => $val) {
    global $we_got_winna;
    if ((count(array_unique($val)) <= 1) && !in_array(null, $val)) {
      $we_got_winna = true;
      break;
    }
  }



  return $we_got_winna;

}