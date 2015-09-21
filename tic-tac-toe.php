<?php
$players = ["X", "O"];
$current_player_idx = getPlayerIdx();
$player = $players[$current_player_idx];
$next_player_idx = getNextPlayerIdx($current_player_idx);
$board = [
    [null, null, null],
    [null, null, null],
    [null, null, null]
];
if(isset($_POST['select'])){
  $parts = explode(',', $_POST['select']);
  $board[$parts[0]][$parts[1]] = $player; // sets piece
  if(isset($_POST['board'])) {
    forEach ($_POST['board'] as $rowidx => $row) {
      forEach ($row as $colidx => $col) {
        $board[$rowidx][$colidx] = $col;
      }
    }
  }
}

$winner = winner($board) ? '<h1>' . $player . ' Wins! </h1>' : '';

function debug($val){
  $output = print_r($val, true);
  echo "<pre>". $output ."</pre>";
}
function getCell($row, $col){
  global $winner;
  global $board;

  $disable = $winner !== ''? 'disabled="disabled"' : '';
  $val = $board[$row][$col];
  if(is_null($val)){
    return "<input type='submit' value='$row,$col' name='select' $disable />";
  } else {
    return "<h1>$val</h1><input type='hidden' name='board[$row][$col]' value='$val' />";
  }
}
function getPlayerIdx(){
  $val = 1;
  if(isset($_POST['player'])){
    $val = intval($_POST['player']);
  }
  return $val;
}
function getNextPlayerIdx($idx){
  global $players;
  $val = $idx;
  $val++;
  if($val >= count($players)) $val = 0;
  return $val;
}
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
?>

  <html>
  <head>
    <title>Tic Tac Toe</title>
  </head>
  <body>
  <?= $winner ?>
  <form method="POST">
    <input type="hidden" value="<?= $next_player_idx; ?>"  name="player" />
    <table border="1", cellspacing="0" cellpadding="25">
      <tr>
        <td><?= getCell(0,0); ?></td>
        <td><?= getCell(0,1); ?></td>
        <td><?= getCell(0,2); ?></td>
      </tr>
      <tr>
        <td><?= getCell(1,0); ?></td>
        <td><?= getCell(1,1); ?></td>
        <td><?= getCell(1,2); ?></td>
      </tr>
      <tr>
        <td><?= getCell(2,0); ?></td>
        <td><?= getCell(2,1); ?></td>
        <td><?= getCell(2,2); ?></td>
      </tr>
    </table>
  </form>
  <?/*= debug($board); */?>
  </body>
  </html>