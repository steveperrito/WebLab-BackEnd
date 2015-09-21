<?php

date_default_timezone_set('America/Los_Angeles');

$my_ary_of_objs = ips_to_location(['46.19.37.108', '63.144.78.193', '157.166.226.25']);

echo detect_palindrome('mom') ? 'true' : 'false';

echo '<br><br>Reverse of reverse is: ' . str_reverse('reverse') . '<br><br>';

echo has_upper_case('hello') ? 'hello has a capital letter.' : 'hello does\'nt have a capital letter';

echo '<br><br>1442454610 is equal to: ' . make_unix_readable(1442454610) . ' (<em>That\'s in LA time</em>)';

echo '<br><br>the file in this url: http://www.google.com/file.php is: ' . get_file_frm_url('http://www.google.com/file.php');

echo '<br><br>here is the last sentence of the paragraph you\'re reading right now. This one. :' . last_sentence('here is the last sentence of the paragraph you\'re reading right now. This one.');

echo '<br><br>here is the email user for this email: steve@steve.com: ' . email_usr('steve@steve.com');

echo '<br><br>assuming these values are separated by a line break (jack, joe, bill), they\'ll show up as an array below:<br>';
echo '<pre>' . print_r(line_brk_to_ary("jack\njoe\nbill"), true) . '</pre>';

echo '<br><br>here is the data for these ips: 46.19.37.108, 63.144.78.193, 157.166.226.25<br><br>';
echo '<pre>' . print_r($my_ary_of_objs, true) . '</pre>';

echo '<br><br>sorting this up: [3,21,5,\'jack\']. Check it out: ' . '<pre>'. print_r(sort_it_up([3,21,5,'jack']), true).  '</pre>';

echo '<br><br>let\'s try 100 USD to GBP: ' . usd_to(100, 'GBP');

echo '<br><br>let\'s see this table:<br><br>';

echo json_to_table(json_encode($my_ary_of_objs));

//Palindrome detector:
function detect_palindrome($word) {
  $broke_up_wrd = str_split($word);
  $last_letter = count($broke_up_wrd) -1;
  $reverse = [];

  for ($i = $last_letter; $i >= 0; $i--) {
    $reverse[] = $broke_up_wrd[$i];
  }

  return $word == implode($reverse);
}

//Reverse a string
function str_reverse($str) {
  return implode(array_reverse(str_split($str)));
}

//Does string have upperCase?
function has_upper_case($string) {
  $string = str_split($string);

  $string = array_filter($string, "is_cap_ltr");

  return count($string) > 0;
}

function is_cap_ltr($ltr) {
  return ctype_upper($ltr);
}

//make unix readable
function make_unix_readable($unix) {
  return date('l, F d o g:i:s', $unix);
}

//Get file from url
function get_file_frm_url($url) {
  $url = explode('/', explode('?', $url)[0]);
  $file = $url[count($url) -1];

  if (preg_match('/./', $file) == 1) {
    return $file;
  } else {
    return 'no file';
  }

}

//return last sentence
function last_sentence($paragraph) {
  $sentences = explode('.', $paragraph);
  $last_sentence = $sentences[count($sentences) -1];

  if ($last_sentence == '') {
    return $sentences[count($sentences) - 2];
  } else {
    return $last_sentence;
  }
}

//Write a function that returns the first part of an email address
function email_usr($email) {
  return explode('@', $email)[0];
}

//Write a function that puts a list of items from a form into an array (text field)
function line_brk_to_ary($text_field_val) {
  return explode("\n", $text_field_val);
}

//Geolocate these IPs
function ips_to_location($ary_of_ips) {
  $all_geo_locations = [];
  foreach ($ary_of_ips as $ip) {
    $req = curl_init('http://www.telize.com/geoip/'. $ip);
    curl_setopt($req, CURLOPT_HEADER, false);
    curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($req);
    $all_geo_locations[$ip] = json_decode($data, true);
  }

  return $all_geo_locations;
}

//Write a function that sorts the items of an array.
function sort_it_up($array) {
  array_multisort($array);
  return $array;
}

//Write a function that converts currency from one type to another.  (USD, EUR, YEN, GBP)
function usd_to($amount, $currency) {
  $req = curl_init('http://api.fixer.io/latest?base=USD&symbols='. $currency);
  curl_setopt($req, CURLOPT_HEADER, false);
  curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
  $data = json_decode(curl_exec($req), true);

  return make_money(($amount*$data['rates'][$currency]));
}

//Write a function that converts an integer to currency with 2 decimal places and a dollar sign and commas.
function make_money($num) {
  return '$' . number_format($num, 2);
}

//Write a function that takes a JSON string and converts it to an array and displays the result in a table. I'm going to assume it's array of objects
function json_to_table($json_str) {
  $json_str = json_decode($json_str, true);
  $thead_start = '<table><thead><tr>';
  $thead_end = '</tr></thead><tbody>';

  $table_titles[0] = array_keys($json_str);
  $thead_html = [];
  $tbody_vals = [];

  foreach ($table_titles as $title) {
    $thead_html[] = '<th>' . $title . '</th>';
  }

  foreach ($json_str as $row) {
    foreach ($row as $t_val) {
      $tbody_vals[] = '<td>' . $t_val . '</td>';
    }
  }

  foreach ($tbody_vals as $key => $html_row) {
    $tbody_vals[$key] = '<tr>' . $html_row . '</tr>';
  }

  $thead_html = implode($thead_html);
  $tbody_vals = implode($tbody_vals);

  return $thead_start . $thead_html . $thead_end . $tbody_vals . '</tbody></table>';
}