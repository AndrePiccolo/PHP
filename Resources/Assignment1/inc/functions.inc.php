<?php

#Functions to support order calculator
#Author: Andre Piccolo (300347025)

function generateOrder()
{
    $customerOrderData = array();

    for ($i = 0; $i < NUMBER_OF_CUSTOMERS; $i++) {

        do {
            $message = "Please enter the customer(" . ($i + 1) . ") four-digits id: ";
            $customerId = getInformationFromUser($message);
        } while (!inputIsValid($customerId, $customerOrderData));

        //id received from user and amount generated randomly
        array_push($customerOrderData, [
            'id' => $customerId,
            'amount' => [
                rand(MIN_AMOUNT, MAX_AMOUNT),
                rand(MIN_AMOUNT, MAX_AMOUNT),
                rand(MIN_AMOUNT, MAX_AMOUNT)
            ]
        ]);
    }

    return $customerOrderData;
}

function inputIsValid($input, $customerArray)
{
    if (trim($input) == '') { // check if only have white spaces
        displayInformationToUser("Empty ID is not allowed.");
        return false;
    } elseif (strlen(trim($input)) != 4) { // check if is a 4 digit ID
        displayInformationToUser("Only four-digits id is allowed. " . $input . " is not allowed");
        return false;
    }
    // check if there is duplicated ID and use array_column just to check values inside "id" key
    elseif (in_array($input, array_column($customerArray, 'id'))) {
        displayInformationToUser($input . " ID already in use.");
        return false;
    }
    return true;
}

function calculateAndPrintOrder($orderData, $price, $discountThreshold)
{
    displayHeaderTable();

    foreach ($orderData as $order) {
        $subTotal = 0;
        for ($i = 0; $i < count($order['amount']); $i++) {
            $subTotal += $order['amount'][$i] * $price[$i];
        }

        $discount = getDiscountPercentage($subTotal, $discountThreshold);

        displayCustomerRow($order, $discount, $subTotal);
    }
}

function getDiscountPercentage($subTotal, $discountThreshold)
{
    $selectedDiscount = 0;
    foreach ($discountThreshold as $key => $value) {
        // check if subtotal is bigger than actual value: 
        // false -> get previous discount / true -> get current discount and check another
        if ($subTotal >= $key) {
            $selectedDiscount = $value;
        } else {
            break;
        }
    }
    return $selectedDiscount;
}

function repeatOperation()
{
    // Repeat question while input is different from Y, y, N, n
    // strtoupper used for compare always upper case if user input lower case letters.
    do {
        $userSelection = getInformationFromUser("\n\nDo you want to rerun the order app (Y/N)? ");
    } while (strtoupper($userSelection) != "N" && strtoupper($userSelection) != "Y");
    return (strtoupper($userSelection) == "N") ? false : true;
}
