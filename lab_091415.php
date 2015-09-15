<?php
/**
 * Created by PhpStorm.
 * User: steveperry
 * Date: 9/14/15
 * Time: 6:41 PM
 */

$cities = [
  'Denver',
  'New York City',
  'Los Angeles'
];

$err = [];

$all_weather = get_weather($cities);

function get_weather($ary) {
  $all_weather = [];

  foreach ($ary as $val) {
    $req = curl_init('http://api.openweathermap.org/data/2.5/weather?q='. urlencode($val));
    curl_setopt($req, CURLOPT_HEADER, false);
    curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($req);
    $all_weather[$val] = json_decode($data, true);
  }

  return $all_weather;
}

function kelvin_to_fahrenheit($int) {
  return (($int - 273.15)* 1.8) + 32;
}

function prittify_text($str) {
  return ucfirst($str) . '.';
}

?>
<html>
<head>
  <title>Weather</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1>Weather in Various Cities <small>(PHP)</small></h1>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <table class="table table-bordered">
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
            <td class="text-center"><?php echo '<img src="http://openweathermap.org/img/w/' . $val['weather'][0]['icon'] . '.png">'; ?></td>
            <td><?php echo prittify_text($val['weather'][0]['description']); ?></td>
            <td><?php echo kelvin_to_fahrenheit($val['main']['temp']) . '&deg;'; ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>