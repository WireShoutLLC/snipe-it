<?php
/* Snipe-IT Heroku Startup Script
 * Maintained by Jason Spriggs <jason@jasonspriggs.com>
 */

// If DB_<value> values are set, ignore parser
if (getenv("DB_DATABASE") || getenv("DB_HOST") || getenv("DB_USERNAME")) {
  echo "Database Environment variables are manually set. Ignoring add-ins.";
} else if (getenv("CLEARDB_DATABASE_URL")) {  // ClearDB
  echo "Using ClearDB Heroku add-in.\n";
  $url = getenv('CLEARDB_DATABASE_URL'); 
  file_put_contents("setupvars", "DB_HOST="     . parse_url($url, PHP_URL_HOST), FILE_APPEND | LOCK_EX);
  file_put_contents("setupvars", "DB_USERNAME=" . parse_url($url, PHP_URL_USER), FILE_APPEND | LOCK_EX);
  file_put_contents("setupvars", "DB_PASSWORD=" . parse_url($url, PHP_URL_PASS), FILE_APPEND | LOCK_EX);
  file_put_contents("setupvars", "DB_DATABASE=" . ltrim(parse_url($url, PHP_URL_PATH), '/'), FILE_APPEND | LOCK_EX);
} else if (getenv("JAWSDB_MARIA_URL")) {      // JawsDB Maria
  echo "Using JawsDB Maria Heroku add-in.\n";
  $url = getenv("JAWSDB_MARIA_URL");
  file_put_contents("setupvars", "DB_HOST="     . parse_url($url, PHP_URL_HOST), FILE_APPEND | LOCK_EX);
  file_put_contents("setupvars", "DB_USERNAME=" . parse_url($url, PHP_URL_USER), FILE_APPEND | LOCK_EX);
  file_put_contents("setupvars", "DB_PASSWORD=" . parse_url($url, PHP_URL_PASS), FILE_APPEND | LOCK_EX);
  file_put_contents("setupvars", "DB_DATABASE=" . ltrim(parse_url($url, PHP_URL_PATH), '/'), FILE_APPEND | LOCK_EX);
} else if (getenv("JAWSDB_MYSQL_URL")) {      // JawsDB MySQL
  echo "Using JawsDB MySQL Heroku add-in.\n";
  $url = getenv("JAWSDB_MYSQL_URL");
  file_put_contents("setupvars", "DB_HOST="     . parse_url($url, PHP_URL_HOST), FILE_APPEND | LOCK_EX);
  file_put_contents("setupvars", "DB_USERNAME=" . parse_url($url, PHP_URL_USER), FILE_APPEND | LOCK_EX);
  file_put_contents("setupvars", "DB_PASSWORD=" . parse_url($url, PHP_URL_PASS), FILE_APPEND | LOCK_EX);
  file_put_contents("setupvars", "DB_DATABASE=" . ltrim(parse_url($url, PHP_URL_PATH), '/'), FILE_APPEND | LOCK_EX);
}
?>