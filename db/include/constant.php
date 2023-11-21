<?php
ob_start();
session_start();
error_reporting(0);
header("Access-Control-Allow-Origin: *");
date_default_timezone_set("Asia/Kolkata");
ini_set('max_execution_time', 0);

DEFINE('DB_NAME', 'shailint_shail2021');
DEFINE('DB_USER', 'shailint_shaili');
DEFINE('DB_PASSWORD', 'qJ8wKyt][x5d');
DEFINE('DIR_PATH', '/');
DEFINE('DIR_PATH_FULL', 'https://www.shailinternationalgroup.com/');
DEFINE('FILE_NAME', basename($_SERVER['PHP_SELF']));


DEFINE('DB_HOST', 'localhost');
DEFINE('TBL_PRIFIX', 'shail_');
DEFINE('PRODUCT_CAT', 'product-cat');
DEFINE("LOGOUT_TIME", 100);

DEFINE("TIME24", 86400);
DEFINE("TIME23", 82800);

DEFINE('INSERT_DATA', 'Data insert succesfully');
DEFINE('UPDATE_DATA', 'Data update succesfully');
DEFINE('DELETE_DATA', 'Data delte succesfully');

DEFINE("NUM_OF_ROW", 3);
DEFINE('DISPLAY_ROW', 6);
DEFINE('DISPLAY_character', 600);

DEFINE('UI_IMAGE_PATH','admin/uploads/');

DEFINE('FROM_MAIL_ID','info@shailinternationalgroup.com');
DEFINE('SEND_MAIL_ID','info@shailinternationalgroup.com');
DEFINE('CONTACT_MAIL_ID','info@shailinternationalgroup.com');

DEFINE('SMTPDEBUG', '2');
DEFINE('MAILER', 'smtp');
DEFINE('HOST', 'smtp.gmail.com');
DEFINE('PORT', '587');
DEFINE('SMTPAUTH', true);
DEFINE('SMTPSECURE', 'SSL/TLS');
DEFINE('USERNAME', 'info@shailinternationalgroup.com');
DEFINE('PWD', 'zxrbxlnumlxzvwhv');
DEFINE('FROM', 'info@shailinternationalgroup.com');
DEFINE('FROMNAME', 'Shail International Group');

//TABLES
DEFINE('WEBSITE', 'website');
DEFINE('SOCIAL', 'social');
DEFINE('PAGE', 'page');
DEFINE('DEL', 'deleted');
DEFINE('SLU', 'slug');
DEFINE('SLIDER', 'sliders');
DEFINE('MEDI', 'media');
DEFINE('STAT', 'statusid');
DEFINE('BUSSICAT', 'pcategory');
DEFINE('COMMUCAT', 'community');
DEFINE('PHOTO','photos');
DEFINE('FINANCE','post');


?>