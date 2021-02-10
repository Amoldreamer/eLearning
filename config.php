<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_MqBTz1Hva2ntWkKloPpJpEJt00pzrQXPW0";
$secretKey="sk_test_r54WE0vy8qctOZZHmyKpSIGM00bvc0Y4Fv";

\Stripe\Stripe::setApiKey($secretKey);
?>