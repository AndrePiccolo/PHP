<?php

$totalExecution = 0;
$runOrderApp = true;

displayHeader();

while ($runOrderApp) {
    echo "\nOrder Number: " . ++$totalExecution;

    generateAndDisplayOrder();

    echo "\n\n";
    $userSelection = readline("Do you want to rerun the order app (Y/N)? ");

    if (strtoupper($userSelection) == "N") {
        echo "\nThank you for using our app $totalExecution time(s)\n";
        $runOrderApp = false;
    }
}

function displayHeader()
{
    include "inc/config.inc.php";
    $headerContent = "Item order calculator app by " . $appDeveloper . " (" . $appID . ")";
    echo str_repeat("=", 70) . "\n";
    echo str_pad($headerContent, 70, " ", STR_PAD_BOTH) . "\n";
    echo str_repeat("=", 70) . "\n";
    echo "The customer order is generated automatically.\n";
}

function generateAndDisplayOrder()
{
    include "inc/config.inc.php";
    $customerHeader = str_pad("Customer", 15) . str_pad("Item A", 8) .
        str_pad("Item B", 8) . str_pad("Item C", 8) .
        str_pad("Discount", 12) . str_pad("Total Cost", 15);
    echo "\n" . $customerHeader;
    for ($i = 0; $i < $numberOfCutomer; $i++) {
        generateOrder($i + 1);
    }
}

function generateOrder($customerNumber)
{
    include "inc/config.inc.php";
    $itemA = rand($minAmount, $maxAmount);
    $itemB = rand($minAmount, $maxAmount);
    $itemC = rand($minAmount, $maxAmount);

    $totalPrice = ($itemA * $itemCost) + ($itemB * $itemCost) + ($itemC * $itemCost);

    $discount = getDiscountPercentage($totalPrice);

    $rowCustomer = str_pad("Customer_" . $customerNumber, 15) . str_pad($itemA, 8) .
        str_pad($itemB, 8) . str_pad($itemC, 8) .
        str_pad(($discount * 100) . "%", 12) .
        str_pad(sprintf("$%.2f", $totalPrice * (1 - $discount)), 15);

    echo "\n" . $rowCustomer;
}

function getDiscountPercentage($subTotal)
{
    $totalDiscount = 0;

    if ($subTotal >= 500) {
        $totalDiscount = 0.25;
    } elseif ($subTotal >= 375) {
        $totalDiscount = 0.15;
    } elseif ($subTotal >= 250) {
        $totalDiscount = 0.1;
    } elseif ($subTotal >= 200) {
        $totalDiscount = 0.05;
    }

    return $totalDiscount;
}
