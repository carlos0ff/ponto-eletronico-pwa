<?php

/**
*--------------------------------------------------------------------------
* DATABASE CONFIGURATION
*--------------------------------------------------------------------------
*/
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "fullstackphp");

/**
 * --------------------------------------------------------------------------
 *  PROJECT URLs CONFIGURATION
 * --------------------------------------------------------------------------
**/
define("CONF_URL_BASE", "http://localhost/platform");
define("CONF_URL_TEST", "http://localhost/platform");
define("CONF_URL_ADMIN", "/admin");

/**
*--------------------------------------------------------------------------
* SITE CONFIGURATION
*--------------------------------------------------------------------------
*/
define("CONF_SITE_NAME", "Fada Hub");
define("CONF_SITE_TITLE", "Gestão inteligente de horas");
define("CONF_SITE_DESC", "");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "");

/**
*--------------------------------------------------------------------------
* 
*--------------------------------------------------------------------------
*/
define("CONF_SOCIAL_TWITTER_CREATOR", null);
define("CONF_SOCIAL_TWITTER_PUBLISHER", null);
define("CONF_SOCIAL_FACEBOOK_APP", null);
define("CONF_SOCIAL_FACEBOOK_PAGE", null);
define("CONF_SOCIAL_FACEBOOK_AUTHOR", null);
define("CONF_SOCIAL_GOOGLE_PAGE", null);
define("CONF_SOCIAL_GOOGLE_AUTHOR", null);
define("CONF_SOCIAL_INSTAGRAM_PAGE", null);
define("CONF_SOCIAL_YOUTUBE_PAGE", null);

/**
*--------------------------------------------------------------------------
* 
*--------------------------------------------------------------------------
*/
define("CONF_DATE_US", "Y-m-d H:i:s");
define("CONF_DATE_BR", "d/m/Y H:i:s");


/**
*--------------------------------------------------------------------------
* 
*--------------------------------------------------------------------------
*/
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
*--------------------------------------------------------------------------
* 
*--------------------------------------------------------------------------
*/
define("CONF_MESSAGE_CLASS", "trigger");
define("CONF_MESSAGE_INFO", "info");
define("CONF_MESSAGE_SUCCESS", "success");
define("CONF_MESSAGE_WARNING", "warning");
define("CONF_MESSAGE_ERROR", "error");

/**
*--------------------------------------------------------------------------
* 
*--------------------------------------------------------------------------
*/
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "dashboard");
define("CONF_VIEW_APP", "fadagroup");
define("CONF_VIEW_ADMIN", "developer");

/**
*--------------------------------------------------------------------------
* UPLOAD CONFIGURATION
*--------------------------------------------------------------------------
*/
define("CONF_UPLOAD_DIR", "../storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
*--------------------------------------------------------------------------
* 
*--------------------------------------------------------------------------
*/
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
*--------------------------------------------------------------------------
* 
*--------------------------------------------------------------------------
*/
define("CONF_MAIL_HOST", "");
define("CONF_MAIL_PORT", "");
define("CONF_MAIL_USER", "");
define("CONF_MAIL_PASS", "");
define("CONF_MAIL_SENDER", ["name" => "", "address" => ""]);
define("CONF_MAIL_SUPPORT", "");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");