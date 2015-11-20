<html>
<body>

<u>Calling a web service test</u></br></br>

<?php

//file_get_contents is part of PHP 4 >= 4.3.0, PHP 5, PHP 7
//This is where we call the web service using it's address and it will return a json string
$jsonString = file_get_contents('http://cdpay.cdlink.ca/api/pandbservices/getcards?coNo=24&custNo=123');

//This is purely informative and not necesary to make the service work. It will dump the content of the jSon string returned and will show the variable names and content of the object, it is part of PHP 4, PHP 5, PHP 7

var_dump($jsonString);
echo '</br></br>';


//json_decode is part of PHP 5 >= 5.2.0, PECL json >= 1.2.0, PHP 7
//This will convert the JSON string into an Array object that is easy to refer to.
$Array = json_decode($jsonString, true);

//Returning the custno of the card being called
echo $Array["card"]["custNo"];

?>



</body>
</html> 