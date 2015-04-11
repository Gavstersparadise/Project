<?php
class PayPal {
     
    public function __construct() {
        // Your Code here //
    }
     
    public function sendPayment($amount) {
        // Paying via Paypal //
        echo "Paying via PayPal: ". $amount;
    }
}
 
// Simple Interface for each Adapter we create
interface paymentAdapter {
    public function pay($amount);
}
 
class paypalAdapter implements paymentAdapter {
     
    private $paypal;
 
    public function __construct(PayPal $paypal) {
        $this->paypal = $paypal;
    }
     
    public function pay($amount) {
        $this->paypal->sendPayment($amount);
    }
}