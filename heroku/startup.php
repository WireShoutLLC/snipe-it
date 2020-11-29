<?php
/* Snipe-IT Heroku Startup Script
 * Maintained by Jason Spriggs <jason@jasonspriggs.com>
 */

// If DB_<value> values are set, ignore parser
if (getenv("DB_DATABASE") || getenv("DB_HOST") || getenv("DB_USERNAME")) {
  echo "Database Environment variables are manually set. Ignoring add-ins.";
} else if (getenv("CLEARDB_DATABASE_URL")) {  // ClearDB
  echo "Using ClearDB Heroku add-in.";
  $url = getenv("CLEARDB_DATABASE_URL");
  exec('export DB_HOST='     . parse_url($url, PHP_URL_HOST));
  exec('export DB_USERNAME=' . parse_url($url, PHP_URL_USER));
  exec('export DB_PASSWORD=' . parse_url($url, PHP_URL_PASS));
  exec('export DB_DATABASE=' . parse_url($url, PHP_URL_PATH));
} else if (getenv("JAWSDB_MARIA_URL")) {      // JawsDB Maria
  echo "Using JawsDB Maria Heroku add-in.";
  $url = getenv("JAWSDB_MARIA_URL");
  exec('export DB_HOST='     . parse_url($url, PHP_URL_HOST));
  exec('export DB_USERNAME=' . parse_url($url, PHP_URL_USER));
  exec('export DB_PASSWORD=' . parse_url($url, PHP_URL_PASS));
  exec('export DB_DATABASE=' . parse_url($url, PHP_URL_PATH));
} else if (getenv("JAWSDB_MYSQL_URL")) {      // JawsDB MySQL
  echo "Using JawsDB MySQL Heroku add-in.";
  $url = getenv("JAWSDB_MYSQL_URL");
  exec('export DB_HOST='     . parse_url($url, PHP_URL_HOST));
  exec('export DB_USERNAME=' . parse_url($url, PHP_URL_USER));
  exec('export DB_PASSWORD=' . parse_url($url, PHP_URL_PASS));
  exec('export DB_DATABASE=' . parse_url($url, PHP_URL_PATH));
}


?>