<?php
if (isset($_GET['transaction_id']) AND isset($_GET['status']) AND isset($_GET['tx_ref'])){
	$trans_id = htmlspecialchars($_GET['transaction_id']);
    $trans_status = htmlspecialchars($_GET['status']);
    $trans_ref = htmlspecialchars($_GET['tx_ref']);
//VERIFY END POINT

}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PAYMENT - VERIFIED</title>
</head>
<body>
	<h1>verified!</h1>
</body>
</html>