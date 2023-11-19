<?php 


define('PICTURE_REGEX',"^[A-Za-z]{15}+$");
define('ID_REGEX',"^[0-9]+$");
define('DATE_REGEX',"^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$");
define('FIRSTNAME_REGEX',"^[a-zA-Z0-9 \-éèêëîïôöùûüàäâá]+$");
define('LASTNAME_REGEX',"^[a-zA-Z0-9 \-éèêëîïôöùûüàäâá]+$");
define('EMAIL_REGEX',"^[a-zA-Z0-9._-]{1,64}@([a-zA-Z0-9-]{2,252}\.[a-zA-Z.]{2,6}){5,255}$");
define('PHONE_REGEX',"^(\+33\s[1-9]{8})|(0[1-9]\s{8})$");
define('ZIPCODE_REGEX',"^\d{5}$");
define('CITY_REGEX',"^[A-Za-zÀ-ÿ\s\-']+$");
define('TEXTAREA_REGEX',"^[a-zA-Z0-9 \-., éèêëîïôöùûüàäâá]+$");
define('NAME_REGEX',"^[a-zA-Z0-9 \_-éèêëîïôöùûüàäâá]+$");
