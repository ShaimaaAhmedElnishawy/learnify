<?php

namespace App\Http\Controllers;

use App\Models\Enrollement;
use App\Models\Course; 
use Stripe\Stripe;          
use Stripe\StripeClient;   
use Stripe\Checkout\Session;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {

        $enrollment=$this->create_enrollment($request);
        $course=Course::findOrfail($request->input('course_id'));

       
        $stripe = new StripeClient(config('stripe.api_key.secret'));

        $checkout_session = $stripe->checkout->sessions->create(
            [
                'mode' => 'payment',
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $course->name ,
                            ],
                            'unit_amount' => $course->price * 100
                        ],
                        'quantity' => 1, // Quantity (e.g., 1 course)
                    ]
                ],

                'success_url' => env('APP_URL').'/success',
                'cancel_url' => env('APP_URL').'/cancel',

            ]
        );

        return redirect($checkout_session->url);
    }

    public function create_enrollment(Request $request){

        $user=auth()->user()->id;
        $course= $request->input('course_id');
        $enrollment= Enrollement::create([
            'user_id'=>$user,
            'course_id'=>$course,
        ]);
        
        return $enrollment;
    }
}
