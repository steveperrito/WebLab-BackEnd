<?php
/**
 * Created by PhpStorm.
 * User: steveperry
 * Date: 9/14/15
 * Time: 6:41 PM
 */

$all_weather = [
  'Denver'=>'',
  'New York City'=>'',
  'Los Angeles'=>''
];

$cities = array_keys($all_weather);

$err = [];

/*$has_errors = isset($err['res']);*/

/*echo $has_errors ? json_encode($err) : '<pre>'. print_r(get_weather($cities, $all_weather), true) . '</pre>';*/

$all_weather = get_weather($cities, $all_weather);

function get_weather($ary, $ary_store) {
  foreach ($ary as $val) {
    $req = curl_init('http://api.openweathermap.org/data/2.5/weather?q='. urlencode($val));
    curl_setopt($req, CURLOPT_HEADER, false);
    curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($req);
    $ary_store[$val] = json_decode($data, true);
  }

  return $ary_store;
}

function kelvin_to_fahrenheit($int) {
  return (($int - 273.15)* 1.8) + 32;
}

?>
<html>
<head><title>Weather</title></head>
<body>
<table>
  <thead>
  <tr>
    <th>City</th>
    <th>Icon</th>
    <th>Description</th>
    <th>Temp</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($all_weather as $key => $val) { ?>
  <tr>
    <td><?php echo $key; ?></td>
    <td><?php echo '<img src="http://openweathermap.org/img/w/' . $val['weather'][0]['icon'] . '.png">'; ?></td>
    <td><?php echo $val['weather'][0]['description']; ?></td>
    <td><?php echo kelvin_to_fahrenheit($val['main']['temp']) . '&deg;'; ?></td>
  </tr>
  <?php } ?>
  </tbody>
</table>

</body>
</html>