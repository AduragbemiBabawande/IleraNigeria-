<?php
// echo uniqid();
if(isset($_POST['donate'])){
  $Firstname = htmlspecialchars($_POST["Firstname"]);
  $Lastname = htmlspecialchars($_POST["Lastname"]);
  $email = htmlspecialchars($_POST["email"]);
  $phone_number = htmlspecialchars($_POST["phone"]);
  $amount = htmlspecialchars($_POST["amount"]);
  $currency = htmlspecialchars($_POST["currency"]);

  //integate rave payment
  $endpoint = "https://api.flutterwave.com/v3/payments";
  //required data
  $postdata = array(
    "tx_ref" => uniqid().uniqid(),
    "currency" => $currency,
    "amount" => $amount,
    "customer" =>array(
            "Firstname" => $Firstname,
            "Lastname" => $Lastname,
            "email" => $email,
            "phone_number" => $phone_number
       ),

    "customizations" =>array(
            "title" => "Donate to IleraNigeria",
            "description" => "A page for the collect",
            // "logo" => "ileranigeria/img/logo/logo.png"
      ), 

       "meta" =>array(
            "reason" => "To help the poor",
            "address" => "Nigeria"
       ),
      "redirect_url" => "‪‪http://localhost/IleraNigeria/verified.php"
  );

//init cURL handler
  $ch = curl_init();
//turn off ssl checking
  // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//set the end point
  curl_setopt($ch, CURLOPT_URL, $endpoint);

//turn on the cURL post method
  curl_setopt($ch, CURLOPT_POST, 0);

//encode post field
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));

//make it return data
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//set waiting timeout
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,200);
  curl_setopt($ch, CURLOPT_TIMEOUT,200);

//set the headers from endpoint
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer FLWSECK_TEST-886dd5e7fb896585400be3381a353981-X",
    "Content-Type: Application/json",
    "Cache-Control: no-cache"
  ));
//execute the cURL session
$request = curl_exec($ch);

$result = json_decode($request);

// var_dump($result);
header("Location: ".$result->data->link);

//close curl
curl_close($ch);

}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donate - IleraNigeria</title>
  <link rel="stylesheet"  href="style.css">
    <link rel="shortcut icon" href="img\logo\logo2.png">
    <script src="https://kit.fontawesome.com/7f614b2d1e.js" crossorigin="anonymous"></script>
</head>
<body>
  <div  class="logo2"><img src="img/logo/logo.png" width="100px" height="45px"></div>
  
</div >
<!-- 
<div class="back"><a href="index.html"><i class="fa fa-arrow-left" aria-hidden="true"></i><a><div> -->
<div class="bodyyy">
  <div class="boddy">
      <div class="form">
         <div class="form-login">
                
                <form action="#" method="POST">
                <div class="input-field2">
                  <h3 class="atext2">Firstname
                  <input type="text" name="Firstname" required>
                 </div>       
                <div class="input-field2">
                  <h3 class="atext2">Lastname
                  <input type="text" name="Lastname" required>
                 </div>                               
                  <div class="input-field2">
                  <h3 class="atext2">Email
                  <input type="email" name="email" required>
                  </div>                
                  <div class="input-field2">
                  <h3 class="atext2">Phone Number
                  <input type="text" name="phone" required>
                  </div>
                  <div class="input-field3" >
                  <h3 class="atext2">Amount</h3>
                  <select name="currency">
                    <option>NGN</option>
                    <option>GHS</option>
                    <option>USD</option>
                    <option>KES</option>
                    <option>EUR</option>
                    <option>ZAR</option>
                    <option>SLL</option>
                  </select>
                  <input type="text" name="amount" required placeholder="0.00">
                  </div> 
                  <div class="input-field2">               
                 <span><input type="submit" name="donate" value="Donate"></span>
                 </div>
                </form>
         </div>
      </div>
    </div>
</div>
<style type="text/css">
    body{
    position: relative;
    width: 100%;
    min-height: 100vh;
    background-image:linear-gradient(rgba(4, 9, 30, 0.7),rgba(4, 9, 30, 0.7)),url(img/logo/background.png);
    background-size: cover;
    background-repeat: no-repeat;
    }
</style>


</body>
</html>