<?php

#Main File
#Author: Andre Piccolo (300347025)

require_once('inc/config.inc.php');
require_once('inc/display.inc.php');
require_once('inc/functions.inc.php');

$numberOfExecution = 0;

displayHeader();

do {
    displayInformationToUser("\nOrder Number: " . ++$numberOfExecution);
    calculateAndPrintOrder(generateOrder(), $itemPriceArray, $discountThreshold);
} while (repeatOperation());

displayInformationToUser("\nYou have generated " . $numberOfExecution .
    " batch(es) of customer record(s). Good bye!");
