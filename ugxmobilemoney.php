<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  method="post" action="ugxmobilemoney.php">
  <input type="hidden" name="public_key" value="FLWPUBK-c2f0306ee337259f4b946fa4bd72b7bb-X" />
    <input type="hidden" name="currency" value="UGX" />
    <input type="hidden" name="network" value="MTN" />
    <input type="hidden" name="type" value="mobile_money_uganda" />
    <div class="control-group">
    <input id="Dname" type="email" class="form-control" name="customer[email]" placeholder="Name" required="required" />
    </div>
    <div class="control-group">
    <input id="number" type="number" class="form-control" name="customer[number]" placeholder="Number +25678891000" required="required" />
    </div>
    <!-- <div class="control-group">
    <input id="email" type="email" class="form-control" name="customer[email]" placeholder="Email" required="required" />
    </div> -->
    <div class="control-group">
    <input id="Famount" type="number" name="amount" min="2000" class="form-control" placeholder="Amount ($  USD )" required="required" />
    </div>
    <div class="control-group">
        <select id="type">
            <option>MTN Uganda</option>
            <option>Airtel Uganda</option>
</select>
    
    </div>
     <button id="start-payment-button" class="btn btn-custom" type="submit">Donate Now</button>
      </form>
</body>
</html>

<?php
$flw = new \Flutterwave\Rave(getenv('FLWPUBK_TEST-ff25afea7e996ab0268eb655be6276dc-X'));
// Set `PUBLIC_KEY` as an environment variable
$email = $_POST['customer[email]'];
$amount = $_POST['amount'];
$number = $_POST['number'];


$mobileMoneyService = new \Flutterwave\MobileMoney();
$payload = [
    "type" => "mobile_money_uganda",
    "phone_number" => $number,
    "network" => "MTN",
    "amount" => $amount,
    "currency" => 'UGX',
    "email" => $email,
    "tx_ref" => $this->generateTransactionReference(),
];
$response = $mobileMoneyService->mobilemoney($payload);
print_r($response);

?>