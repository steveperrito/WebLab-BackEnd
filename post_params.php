<?php
$url = 'http://oddsworthbetting.com/amember/api/invoices';

//The following array, looks like this when posted as query string:
//URL encoded query params: _key=iKWx4YGekXK3p7gQXNBw&public_id=TRAX&user_id=5143&paysys_id=offline¤cy=USD&first_subtotal=147.00&first_discount=0.00&first_tax=0.00&first_shipping=0.00&first_total=147.00&first_period=1m&rebill_times=99999&second_subtotal=147.00&second_discount=0.00&second_tax=0.00&second_shipping=0.00&second_total=147.00&second_period=1m&is_confirmed=1&status=1&nested%5Binvoice-items%5D%5B0%5D%5Binvoice_public_id%5D=TRAX&nested%5Binvoice-items%5D%5B0%5D%5Bitem_id%5D=1&nested%5Binvoice-items%5D%5B0%5D%5Bitem_type%5D=product&nested%5Binvoice-items%5D%5B0%5D%5Bitem_title%5D=Monthly+Premium+Subscriber&nested%5Binvoice-items%5D%5B0%5D%5Bitem_description%5D=Get+all+of+James%27+and+7%27s+Premium+Selections%21&nested%5Binvoice-items%5D%5B0%5D%5Bqty%5D=1&nested%5Binvoice-items%5D%5B0%5D%5Bfirst_discount%5D=0.00&nested%5Binvoice-items%5D%5B0%5D%5Bfirst_price%5D=147.00&nested%5Binvoice-items%5D%5B0%5D%5Bfirst_tax%5D=0.00&nested%5Binvoice-items%5D%5B0%5D%5Bfirst_shipping%5D=0.00&nested%5Binvoice-items%5D%5B0%5D%5Bfirst_total%5D=147.00&nested%5Binvoice-items%5D%5B0%5D%5Bfirst_period%5D=1m&nested%5Binvoice-items%5D%5B0%5D%5Brebill_times%5D=99999&nested%5Binvoice-items%5D%5B0%5D%5Bsecond_discount%5D=0.00&nested%5Binvoice-items%5D%5B0%5D%5Bsecond_tax%5D=0.00&nested%5Binvoice-items%5D%5B0%5D%5Bsecond_shipping%5D=0.00&nested%5Binvoice-items%5D%5B0%5D%5Bsecond_total%5D=147.00&nested%5Binvoice-items%5D%5B0%5D%5Bsecond_price%5D=147.00&nested%5Binvoice-items%5D%5B0%5D%5Bsecond_period%5D=1m&nested%5Binvoice-items%5D%5B0%5D%5Bcurrency%5D=USD&nested%5Binvoice-items%5D%5B0%5D%5Bbilling_plan_id%5D=1&nested%5Binvoice-payments%5D%5B0%5D%5Binvoice_public_id%5D=TRAX&nested%5Binvoice-payments%5D%5B0%5D%5Buser_id%5D=5143&nested%5Binvoice-payments%5D%5B0%5D%5Bpaysys_id%5D=offline&nested%5Binvoice-payments%5D%5B0%5D%5Breceipt_id%5D=test-receipt&nested%5Binvoice-payments%5D%5B0%5D%5Btransaction_id%5D=test-transaction&nested%5Binvoice-payments%5D%5B0%5D%5Bcurrency%5D=USD&nested%5Binvoice-payments%5D%5B0%5D%5Bamount%5D=147.00&nested%5Baccess%5D%5B0%5D%5Binvoice_public_id%5D=TRAX&nested%5Baccess%5D%5B0%5D%5Buser_id%5D=5143&nested%5Baccess%5D%5B0%5D%5Bproduct_id%5D=1&nested%5Baccess%5D%5B0%5D%5Btransaction_id%5D=test-transaction&nested%5Baccess%5D%5B0%5D%5Bbegin_date%5D=2015-09-21&nested%5Baccess%5D%5B0%5D%5Bexpire_date%5D=2015-10-21
//URL decoded query params: _key=iKWx4YGekXK3p7gQXNBw&public_id=TRAX&user_id=5143&paysys_id=offline¤cy=USD&first_subtotal=147.00&first_discount=0.00&first_tax=0.00&first_shipping=0.00&first_total=147.00&first_period=1m&rebill_times=99999&second_subtotal=147.00&second_discount=0.00&second_tax=0.00&second_shipping=0.00&second_total=147.00&second_period=1m&is_confirmed=1&status=1&nested[invoice-items][0][invoice_public_id]=TRAX&nested[invoice-items][0][item_id]=1&nested[invoice-items][0][item_type]=product&nested[invoice-items][0][item_title]=Premium Subscriber&nested[invoice-items][0][item_description]=Get all of James' and 7's Premium Selections!&nested[invoice-items][0][qty]=1&nested[invoice-items][0][first_discount]=0.00&nested[invoice-items][0][first_price]=147.00&nested[invoice-items][0][first_tax]=0.00&nested[invoice-items][0][first_shipping]=0.00&nested[invoice-items][0][first_total]=147.00&nested[invoice-items][0][first_period]=1m&nested[invoice-items][0][rebill_times]=99999&nested[invoice-items][0][second_discount]=0.00&nested[invoice-items][0][second_tax]=0.00&nested[invoice-items][0][second_shipping]=0.00&nested[invoice-items][0][second_total]=147.00&nested[invoice-items][0][second_price]=147.00&nested[invoice-items][0][second_period]=1m&nested[invoice-items][0][currency]=USD&nested[invoice-items][0][billing_plan_id]=1&nested[invoice-payments][0][invoice_public_id]=TRAX&nested[invoice-payments][0][user_id]=5143&nested[invoice-payments][0][paysys_id]=offline&nested[invoice-payments][0][receipt_id]=test-receipt&nested[invoice-payments][0][transaction_id]=test-transaction&nested[invoice-payments][0][currency]=USD&nested[invoice-payments][0][amount]=147.00&nested[access][0][invoice_public_id]=TRAX&nested[access][0][user_id]=5143&nested[access][0][product_id]=1&nested[access][0][transaction_id]=test-transaction&nested[access][0][begin_date]=2015-09-21&nested[access][0][expire_date]=2015-10-21

$vars = array(
    '_key' => 'iKWx4YGekXK3p7gQXNBw',
  // Invoice Record
    'public_id' => 'TRAX',
    'user_id' => 5143,//Change to whatever user
    'paysys_id' => 'offline',
    'currency' => 'USD',
    'first_subtotal' => '67.00',//item_id 1 => 147.00, item_id 3 => 67.00, item_4 => $7
    'first_discount' => '0.00',
    'first_tax' => '0.00',
    'first_shipping' => '0.00',
    'first_total' => '67.00',//change to match item
    'first_period' => '7d',//item_id 1 => 1m, item_id 3 => 7d, item_id 4 => 1d
    'rebill_times' => 0, // means until cancel
    'is_confirmed' => 1,
    'status' => 1,
    'nested' => array(
        'invoice-items' => array(
            array(
                'invoice_public_id' => 'TRAX',
                'item_id' => 3, //item_id 1 => 147.00, item_id 3 => 67.00, item_id 4 => $7
                'item_type' => 'product',
                'item_title' => 'Premium Subscriber',
                'item_description' => 'Get all of James\' and 7\'s Premium Selections!',
                'qty' => 1,
                'first_discount' => '0.00',
                'first_price' => '67.00',//change to match item
                'first_tax' => '0.00',
                'first_shipping' => '0.00',
                'first_total' => '67.00',//change to match item
                'first_period' => '7d',//item_id 1 => 1m, item_id 3 => 7d, item_id 4 => 1d
                'rebill_times' => 0,
                'currency' => 'USD',
                'billing_plan_id' => 3 // this equals the item_id
            )
        ),
        'invoice-payments' => array(
          // InvoicePayment record
            array(
                'invoice_public_id' => 'TRAX',
                'user_id' => 5143,//Change to whatever user
                'paysys_id' => 'offline',
                'receipt_id' => 'test-receipt',
                'transaction_id' => 'test-transaction',
                'currency' => 'USD',
                'amount' => '67.00'//change to match item
            )
        ),
        'access' => array(
          // Access record
            array(
                'invoice_public_id' => 'TRAX',
                'user_id' => 5143,//Change to whatever user
                'product_id' => 3,//product_id 1 => 147.00, product_id 3 => 67.00, product_id 4 => $7
                'transaction_id' => "test-transaction",
                'begin_date' => '2015-10-22',//give a month for item 1, a week for 3, and a day for 4.
                'expire_date' => '2015-10-29'
            )
        )
    ));

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($vars));
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
echo '<html><body>';

echo '<script> var res=' . $result . ';console.log(res);</script>';

echo '</body></html>';