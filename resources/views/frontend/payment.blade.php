@extends('includes.index')
@section('content')

   <!-- Header -->
   <header id="hello">
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="banner">
                    <h3>-introducing-</h3>
                    <h1>payment</h1>

                    <div class="inner_banner">
                        <div class="banner_content">
                            <p>A double layer of sear-sizzled 100% pure beef mingled with special sauce on a sesame seed bun and topped with melty American cheese, crisp lettuce, minced onions and tangy pickles.</p>
                            <p>*Based on pre-cooked patty weight.</p>             
                        </div>
                        <div class="stamp">
                            <img src="images/stamp.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Container end -->
    <p class="caption">*Limited Time Only</p>
</header><!-- Header end -->

<section class="container mt-2 my-5 py-5">
    <div class="container mt-2 text-center" >
        
        <h3 class="text-center mt-5">payment</h3>
        <h3 class="text-center mt-5">order_id : {{Session::get('order_id')}}</h3>
        <h4 style="color: blue; margin-top: 20px ;" class="text-center">total : {{ Session::get('total') }} </h4>
        <div class="text-center" style="margin-top: 20px" id="paypal-button-container"></div>

    </div>


    
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=AcCG2j9mhEyFwVB1YJxGVvnGLa7G5D6Iw4EgU9zmg-cCl4Fmw-xnJ-ed9LP8PRnMJZplFahHQ_j8oq11&currency=USD"></script>

  <script>
    paypal.Buttons({
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '{{Session::get('total')}}' // Can also reference a variable or function
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
          alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          // When ready to go live, remove the alert and show a success message within this page. For example:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');

          window.location.href = "/verify_payment/"+transaction.id;



        });
      }
    }).render('#paypal-button-container');
  </script>
</body>
</html>


</section> 

@endsection