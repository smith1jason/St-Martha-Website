<?php

function parse_path() {
  $path = array();
  if (isset($_SERVER['REQUEST_URI'])) {
    $request_path = explode('?', $_SERVER['REQUEST_URI']);

    $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
    $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
    $path['call'] = utf8_decode($path['call_utf8']);
    if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
      $path['call'] = '';
    }
    $path['call_parts'] = explode('/', $path['call']);

    $path['query_utf8'] = urldecode($request_path[1]);
    $path['query'] = utf8_decode(urldecode($request_path[1]));
    $vars = explode('&', $path['query']);
    foreach ($vars as $var) {
      $t = explode('=', $var);
      $path['query_vars'][$t[0]] = $t[1];
    }
  }
return $path;
}

$path_info = parse_path();

	// Page Title & File
	switch($path_info['call_parts'][0]) {
	  case 'about-us':
		$pageTitle = "About Us";
		$pageFile = "about-us";
		break;
	  case 'parish':
		$pageTitle = "Parish";
		$pageFile = "parish";
		break;
	  case 'school':
		$pageTitle = "School";
		$pageFile = "school";
		break;
	  case 'athletics':
		$pageTitle = "Athletics";
		$pageFile = "athletics";
		break;
	  case 'stewardship':
		$pageTitle = "Stewardship";
		$pageFile = "stewardship";
		break;
	  case 'news':
		$pageTitle = "News";
		$pageFile = "news";
		break;
	  case 'calendar':
		$pageTitle = "Calendar";
		$pageFile = "calendar";
		break;
	  default:
		$pageFile = "about-us";
	}

include("header.php");

include($pageFile . ".php");

include("footer.php");

?>