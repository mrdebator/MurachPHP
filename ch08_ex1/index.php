<?php

$customer_type = $_POST['type'];
$invoice_subtotal = $_POST['subtotal'];

if ($customer_type == 'R' || $customer_type == 'r') {
    if ($invoice_subtotal < 100)
        $discount_percent = .0;
    elseif($invoice_subtotal >= 100 && $invoice_subtotal < 250)
        $discount_percent = .1;
    elseif($invoice_subtotal >= 250 && $invoice_subtotal < 500) //modified condition
        $discount_percent = .25;
    elseif($invoice_subtotal >= 500) //added condition
        $discount_percent = .3;
} elseif ($customer_type == 'C' || $customer_type == 'c') {
    $discount_percent = 0.2;
}
  elseif($customer_type == 'T' || $customer_type == 't'){ //added new customer type
    if($invoice_subtotal < 500){
      $discount_percent = 0.4;
    }
    elseif($invoice_subtotal >= 500){
      $discount_percent = 0.5;
    }
  }
  else {
    $discount_percent = 0.1; //changed discount value from 0 to 10%
}

$discount_amount = $invoice_subtotal * $discount_percent;
$invoice_total = $invoice_subtotal - $discount_amount;

$percent = number_format(($discount_percent * 100));
$discount = number_format($discount_amount, 2);
$total = number_format($invoice_total, 2);

include 'invoice_total.php';

?>
