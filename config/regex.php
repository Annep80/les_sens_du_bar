<?php
define('REGEX_NUMBERPHONE','^(?:\+33|0)[1-9](?:[\s-]?[0-9]{2}){4}$');
define('REGEX_NAME','^[a-zA-Z][éèôûöüà]{3,30}+$');
define('REGEX_MAIL','^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}+$');
define('REGEX_POSTAL', '^(?:[0-8][0-9]|9[0-5]|2[ab])[0-9]{3}$');
define('REGEX_PASSWORD', '^[a-zA-Z0-9_-]{8,20}$');