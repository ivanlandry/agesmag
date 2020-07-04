@extends('layouts.mon_compte.mes_annonces')


@section('card')

    <div class="card">

        <div class="row" style="padding: 20px 20px 0 20px;">
            <div class="col-md-6 col-md-offset-4">
                <div class="row">
                    <div class="col-md-6"><h2><b>paiement</b></h2></div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <form id="payment-form" class="my-4">
                            <div id="card-element">
                                <!-- Elements will create input elements here -->
                            </div>

                            <!-- We'll put the error messages in this element -->
                            <div id="card-errors" role="alert"></div>

                        </form>
                    </div>
                    <button id="submit" class="btn btn-success my-4">Proceder au paiement</button>
                </div>
            </div>

        </div>
    </div>



@endsection

@section('paiement')

    <script !src="">

        var stripe = Stripe('pk_test_51H18IPKvuB13xNWIgE7ugGwCrvuFZcOB7i5KdMqdup430dVDgObDRHWah4EbWoql1Rrc3JLC62ZpQr9gI3oKUQbJ00xrjT7YWP');
        var elements = stripe.elements();

        // Set up Stripe.js and Elements to use in checkout form
        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        var card = elements.create("card", {style: style});

        card.mount("#card-element");

        card.on('change', ({error}) => {
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });


        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(ev) {
            ev.preventDefault();
            stripe.confirmCardPayment("{{ $clientSecret }}", {
                payment_method: {
                    card: card,

                }
            }).then(function(result) {
                if (result.error) {
                    // Show error to your customer (e.g., insufficient funds)
                    console.log(result.error.message);
                } else {
                    // The payment has been processed!
                    if (result.paymentIntent.status === 'succeeded') {
                       console.log(result.paymentIntent)
                    }
                }
            });
        });


    </script>

@endsection


