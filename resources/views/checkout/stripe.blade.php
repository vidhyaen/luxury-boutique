<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<body>

  <div class="container">
    <div class='row'>
      <div class='col-md-4'></div>
      <div class='col-md-4'>
        <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
        <form accept-charset="UTF-8" action="/" class="require-validation" data-cc-on-file="false"
          data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post">
          <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input
              name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden"
              value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
          <div class='form-row card-register mt-5'>
            <div class='col-xs-12   form-group required'>
              <h3 class="text-center">Debit card/ credit card or cash on delivery </h3>

              <label class='control-label mt-5'>Name on Card</label>
              <input class='form-control' size='4' type='text'>
            </div>
          </div>
          <div class='form-row'>
            <div class='col-xs-12 form-group card required'>

              <label class='control-label'>Card Number</label>
              <input autocomplete='off' class='form-control card-number' size='20' type='text'>
            </div>
          </div>
          <div class='form-row'>
            <div class='col-xs-4 form-group cvc required'>
              <label class='control-label'>CVC</label>
              <input autocomplete='off' type="password" class='form-control card-cvc' placeholder='ex. 311' size='4'>
            </div>
            <div class='col-xs-4 form-group expiration required'>
              <label class='control-label'>Expiration</label>
              <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
            </div>
            <div class='col-xs-4 form-group expiration required'>
              <label class='control-label'> </label>
              <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
            </div>
          </div>
          <div class='form-row'>
            <div class='col-md-12'>
              <div class='form-control total btn btn-info'>
                Total:
                <span class='amount'>1600</span>
              </div>
            </div>
          </div>
          <div class='form-row'>
            <div class='col-md-12 form-group'>
              <button class='form-control btn btn-primary submit-button' type='submit'>Pay »</button>

            </div><br>




            <div class='form-row'>
              <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>
                  Please correct the errors and try again.
                </div>
              </div>
            </div>
        </form>
      </div>
      <div class='col-md-4'>

      </div>

      <div class="p-1">
        <h4 style="color: white">Cash on delivery is also available for all the materials </h4><br>
        <div class="text-center">
          <form action="{{route('placeorder')}}" method="POST">
            @csrf
            <input type="submit" value="Cash on delivery" class="btn float-right btn-success p-2 sawl ">
          </form>
          <a href="{{ route('home')}}" class="btn col-3 btn-warning p-2 float-left">Back</a>
        </div>
      </div>
    </div>



  </div>
</body>


<style>
  .submit-button {
    margin-top: 10px;
  }

  body {
    background-image:
      url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTYtsD18tWenOo8qIDP0q8_LPdkV8j9H1rCow&usqp=CAU');

    background-size: cover;
    background-repeat: no-repeat;
    color: white;
  }
  swal({
    title: "PlaceOrder!",
    text: "Your order is placed successfully",
    imageUrl: 'thumbs-up.jpg'
  });
</style>
<script>
  $(function() {
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(e.target).closest('form'),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;

    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault(); // cancel on first error
      }
    });
  });
});

$(function() {
  var $form = $("#payment-form");

  $form.on('submit', function(e) {
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
    if (response.error) {
      $('.error')
        .removeClass('hide')
        .find('.alert')
        .text(response.error.message);
    } else {
      // token contains id, last4, and card type
      var token = response['id'];
      // insert the token into the form so it gets submitted to the server
      $form.find('input[type=text]').empty();
      $form.append("<input type='hidden' name='reservation[stripe_token]' value='" + token + "'/>");
      $form.get(0).submit();
    }
  }
})
    
</script>