<?php

#Config File
#Author: Andre Piccolo (300347025)

define('NUMBER_OF_CUSTOMERS', 4);
define('APP_DEVELOPER', 'ANDRE PICCOLO');
define('APP_ID', 300347025);
define('MIN_AMOUNT', 0);
define('MAX_AMOUNT', 5);
define('ITEM_COST', 50);

$itemPriceArray = [40, 60, 80];
$discountThreshold = [
    0 => 0,
    200 => 0.05,
    250 => 0.1,
    375 => 0.15,
    600 => 0.25
];
