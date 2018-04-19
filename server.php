<?php
error_reporting(E_ALL & ~E_STRICT);
define('PAPAYA_DOCUMENT_ROOT', __DIR__.'/htdocs/');

$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$requestPathOriginal = parse_url($uri, PHP_URL_PATH);
$requestedPath = preg_replace('(^/sid(?:admin)?(?:[^/]+))', '', $requestPathOriginal);

if (
  file_exists(PAPAYA_DOCUMENT_ROOT.$requestPathOriginal) &&
  is_file(PAPAYA_DOCUMENT_ROOT.$requestPathOriginal)
) {
  return FALSE;
} elseif (file_exists(PAPAYA_DOCUMENT_ROOT.$requestedPath)) {
  if (is_file(PAPAYA_DOCUMENT_ROOT.$requestedPath)) {
    header('Location: ' . $requestedPath);
  }
  chdir(PAPAYA_DOCUMENT_ROOT.$requestedPath);
  include('index.php');
} elseif (preg_match('(^(?<path>/papaya)/module_(?<module>.*)\.php)', $requestedPath, $match)) {
  chdir(PAPAYA_DOCUMENT_ROOT.'/papaya');
  include(PAPAYA_DOCUMENT_ROOT.'/papaya/module.php');
} elseif (preg_match('(^(?:/papaya-themes/.*(css|js)\\.php))', $requestedPath, $match)) {
  chdir(PAPAYA_DOCUMENT_ROOT);
  include(PAPAYA_DOCUMENT_ROOT.'/index.php');
} elseif (preg_match('(^(?<path>/.*)(?:/[^/]*))', $requestedPath, $match)) {
  chdir(PAPAYA_DOCUMENT_ROOT.$match['path']);
  return FALSE;
} else {
  chdir(PAPAYA_DOCUMENT_ROOT);
  include(PAPAYA_DOCUMENT_ROOT.'index.php');
}
