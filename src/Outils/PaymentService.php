<?php

namespace App\Outils;

use \Stripe\StripeClient;


class PaymentService
{
private $cartService;
private $stripe;

    public function __construct(CartService $cartservice)
    {
        $this->carteService= $cartservice;
        $this->stripe = new StripeClient('sk_test_51KMuRaLN5B3PviTYqmDr75voyfpuZpefmhSbasSJYrdCKGkppD06pSffoylQObKOsIlWxramfWLWUrkowXgcRYDw00WpS0wTc1');
    }
    public function create(): string
    {
        $cart=$this->cartService->get();
        $items= [];
        foreach ($cart['elements'] as $serviceId => $element)
        {
            $items[] = [
                'amount' => $element['service']->getPrince()*100,
                'currenty' => 'eur',
                'name' => $element['service']->getTitle()
            ];


        }
        $protocol =$_SERVER ['HTTPS'] ? 'https' : 'http';
        $host = $_SERVER['SERVER_NAME'];
        $successUrl = $protocol . '://'.$host . '/payment/success/{CHECKOUT_SESSION_ID}';
        $failureUrl = $protocol . '://'.$host . '/payment/failure/{CHECKOUT_SESSION_ID}';
      
        $session=$this->stripe->checkout->sessions->create([
            'successUrl'=> $successUrl,
            'cancel_url'=>$failureUrl,
                'payment_method_types'=>['card'],
                'mode' => 'payment',
                'line_items'=>$items
        ]);
      
        return $session->id;
        
        }
}