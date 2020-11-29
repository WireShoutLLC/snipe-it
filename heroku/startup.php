<?php
/* Snipe-IT Heroku Startup Script
 * Maintained by Jason Spriggs <jason@jasonspriggs.com>
 */

// If DB_<value> values are set, ignore parser
if (getenv("DB_DATABASE") || getenv("DB_HOST") || getenv("DB_USERNAME")) {
  echo "Database Environment variables are manually set. Ignoring add-ins.";
} else if (getenv("CLEARDB_DATABASE_URL")) {  // ClearDB
  echo "Using ClearDB Heroku add-in.";
  $url = parse_url("CLEARDB_DATABASE_URL");
  putenv('DB_HOST='     . parse_url("CLEARDB_DATABASE_URL", PHP_URL_HOST));
  putenv('DB_USERNAME=' . parse_url("CLEARDB_DATABASE_URL", PHP_URL_USER));
  putenv('DB_PASSWORD=' . parse_url("CLEARDB_DATABASE_URL", PHP_URL_PASS));
  putenv('DB_DATABASE=' . parse_url("CLEARDB_DATABASE_URL", PHP_URL_PATH));
} else if (getenv("JAWSDB_MARIA_URL")) {      // JawsDB Maria
  echo "Using JawsDB Maria Heroku add-in.";
  $url = parse_url("JAWSDB_MARIA_URL");
  putenv('DB_HOST='     . parse_url("JAWSDB_MARIA_URL", PHP_URL_HOST));
  putenv('DB_USERNAME=' . parse_url("JAWSDB_MARIA_URL", PHP_URL_USER));
  putenv('DB_PASSWORD=' . parse_url("JAWSDB_MARIA_URL", PHP_URL_PASS));
  putenv('DB_DATABASE=' . parse_url("JAWSDB_MARIA_URL", PHP_URL_PATH));
} else if (getenv("JAWSDB_MYSQL_URL")) {      // JawsDB MySQL
  echo "Using JawsDB MySQL Heroku add-in.";
  $url = parse_url("JAWSDB_MYSQL_URL");
  putenv('DB_HOST='     . parse_url("JAWSDB_MYSQL_URL", PHP_URL_HOST));
  putenv('DB_USERNAME=' . parse_url("JAWSDB_MYSQL_URL", PHP_URL_USER));
  putenv('DB_PASSWORD=' . parse_url("JAWSDB_MYSQL_URL", PHP_URL_PASS));
  putenv('DB_DATABASE=' . parse_url("JAWSDB_MYSQL_URL", PHP_URL_PATH));
}


?>