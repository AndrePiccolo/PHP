<?php

#Functions related to display information on screen
#Author: Andre Piccolo (300347025)

function displayHeader()
{
    $headerContent = "Item order calculator app by " . APP_DEVELOPER . " (" . APP_ID . ")";
    echo str_repeat("-", 70) . "\n";
    //str_pad used to centralize title with white spaces in both sides
    echo str_pad($headerContent, 70, " ", STR_PAD_BOTH) . "\n";
    echo str_repeat("-", 70) . "\n";
    echo "The customer order is generated automatically.\n";
}

function getInformationFromUser($message)
{
    echo $message;
    return stream_get_line(STDIN, 1024, PHP_EOL);
}

function displayInformationToUser($message)
{
    echo $message;
    echo "\n";
}

function displayHeaderTable()
{
    //str_pad used for table identation
    $customerHeader = str_pad("Customer", 12) . str_pad("Item A", 8) .
        str_pad("Item B", 8) . str_pad("Item C", 8) .
        str_pad("Discount", 12) . str_pad("Total Cost", 15);
    echo "\n" . $customerHeader;
}

function displayCustomerRow($order, $discount, $subTotal)
{
    //str_pad used for table identation
    $rowCustomer = str_pad($order['id'], 12) . str_pad($order['amount'][0], 8) .
        str_pad($order['amount'][1], 8) . str_pad($order['amount'][2], 8) .
        str_pad(($discount * 100) . "%", 12) .
        str_pad(sprintf("$%.2f", $subTotal * (1 - $discount)), 15);

    echo "\n" . $rowCustomer;
}
