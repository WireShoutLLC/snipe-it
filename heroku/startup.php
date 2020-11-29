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
  file_put_contents('./.env', 'DB_HOST='     . parse_url($url, PHP_URL_HOST). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'DB_USERNAME=' . parse_url($url, PHP_URL_USER). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'DB_PASSWORD=' . parse_url($url, PHP_URL_PASS). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'DB_DATABASE=' . ltrim(parse_url($url, PHP_URL_PATH), '/'). PHP_EOL, FILE_APPEND);
} else if (getenv("JAWSDB_MARIA_URL")) {      // JawsDB Maria
  echo "Using JawsDB Maria Heroku add-in.\n";
  $url = getenv("JAWSDB_MARIA_URL");
  file_put_contents('./.env', 'DB_HOST='     . parse_url($url, PHP_URL_HOST). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'DB_USERNAME=' . parse_url($url, PHP_URL_USER). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'DB_PASSWORD=' . parse_url($url, PHP_URL_PASS). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'DB_DATABASE=' . ltrim(parse_url($url, PHP_URL_PATH), '/'). PHP_EOL, FILE_APPEND);
} else if (getenv("JAWSDB_MYSQL_URL")) {      // JawsDB MySQL
  echo "Using JawsDB MySQL Heroku add-in.\n";
  $url = getenv("JAWSDB_MYSQL_URL");
  file_put_contents('./.env', 'DB_HOST='     . parse_url($url, PHP_URL_HOST). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'DB_USERNAME=' . parse_url($url, PHP_URL_USER). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'DB_PASSWORD=' . parse_url($url, PHP_URL_PASS). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'DB_DATABASE=' . ltrim(parse_url($url, PHP_URL_PATH), '/'). PHP_EOL, FILE_APPEND);
}

if (getenv("REDIS_URL")) {                    // Heroku Redis
  echo "Setting up Heroku Redis.\n";
  $url = getenv("REDIS_URL");
  file_put_contents('./.env', 'REDIS_HOST='     . parse_url($url, PHP_URL_HOST). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'REDIS_PASSWORD=' . parse_url($url, PHP_URL_PASS). PHP_EOL, FILE_APPEND);
  file_put_contents('./.env', 'REDIS_PORT='     . parse_url($url, PHP_URL_PORT). PHP_EOL, FILE_APPEND);
}

file_put_contents('./.env', 'APP_TRUSTED_PROXIES=10.0.0.0/8' . PHP_EOL, FILE_APPEND); //https://devcenter.heroku.com/articles/deploying-symfony4#trusting-the-heroku-router
?>