@extends('layouts.main_layout')

@section('content')
  <div class="main_content">
    <div class="container">
      <div class="row">
        {{-- BASIC --}}
        <div class="col-md-4">
          <div class="row justify-content-center">
            <h3>Basic</h3>
          </div>
          <div class="row justify-content-center">
            <button class="dropDown-menu" id="button_basic" type="button" name="button" value="1">Scegli</button>
          </div>
          <div class="row" id="dropdown_sponsor_basic">
            <div class="container basic">
              <div class="row justify-content-center">
                <div class="col-md-10 d-flex flex-column justify-content-center pippo">
                  <div id="dropin-container-basic"></div>
                  <button id="submit-button-basic">Request payment method</button>
                </div>
              </div>
            </div>

            <script>
              var buttonBasic = document.querySelector('#submit-button-basic');
              braintree.dropin.create({
                authorization: "{{ \Braintree\ClientToken::generate() }}",
                container: '#dropin-container-basic'
                }, function (createErr, instance) {
                    buttonBasic.addEventListener('click', function () {
                      var sponsorType = $('#button_basic').val();
                      instance.requestPaymentMethod(function (err, payload) {

                        $.ajax({
                          url: "{{ route('payment_process') }}",
                          method: "GET",
                          data: {
                              id: {{$apartment -> id}},
                              val: sponsorType,
                              payload: payload
                          },

                          success: function (result) {
                              console.log(result);
                              if (result.success) {
                                alert('Payment successfull!');
                              } else {
                                alert('Payment failed');
                                }
                          },
                          error: function(error, status){
                            console.log('errore:' + error);
                            }
                          });
                        });
                      });
                    });
            </script>
          </div>
        </div>

        {{-- STANDARD --}}
        <div class="col-md-4">
          <div class="row justify-content-center">
            <h3>Standard</h3>
          </div>
          <div class="row justify-content-center">
            <button class="dropDown-menu" id="button_standard" type="button" name="button" value="2">Scegli</button>
          </div>
          <div class="row" id="dropdown_sponsor_standard">
            <div class="container standard">
              <div class="row justify-content-center">
                <div class="col-md-10 d-flex flex-column justify-content-center pippo">
                  <div id="dropin-container-standard"></div>
                  <button id="submit-button-standard">Request payment method</button>
                </div>
              </div>
            </div>

            <script>
              var buttonStand = document.querySelector('#submit-button-standard');
              braintree.dropin.create({
                authorization: "{{ \Braintree\ClientToken::generate() }}",
                container: '#dropin-container-standard'
                }, function (createErr, instance) {
                    buttonStand.addEventListener('click', function () {
                      var sponsorType = $('#button_standard').val();
                      instance.requestPaymentMethod(function (err, payload) {

                        $.ajax({
                          url: "{{ route('payment_process') }}",
                          method: "GET",
                          data: {
                              id: {{$apartment -> id}},
                              val: sponsorType,
                              payload: payload
                          },

                          success: function (result) {
                              console.log(result);
                              if (result.success) {
                                alert('Payment successfull!');
                              } else {
                                alert('Payment failed');
                                }
                          },
                          error: function(error, status){
                            console.log('errore:' + error);
                            }
                          });
                        });
                      });
                    });
            </script>
          </div>
        </div>

        {{-- PREMIUM --}}
        <div class="col-md-4">
          <div class="row justify-content-center">
            <h3>Premium</h3>
          </div>
          <div class="row justify-content-center">
            <button class="dropDown-menu" id="button_premium" type="button" name="button" value="3">Scegli</button>
          </div>
          <div class="row" id="dropdown_sponsor_premium">
            <div class="container premium">
              <div class="row justify-content-center">
                <div class="col-md-10 d-flex flex-column justify-content-center pippo">
                  <div id="dropin-container-premium"></div>
                  <button id="submit-button-premium">Request payment method</button>
                </div>
              </div>
            </div>

            <script>
              var buttonPrem = document.querySelector('#submit-button-premium');
              braintree.dropin.create({
                authorization: "{{ \Braintree\ClientToken::generate() }}",
                container: '#dropin-container-premium'
                }, function (createErr, instance) {
                    buttonPrem.addEventListener('click', function () {
                      var sponsorType = $('#button_premium').val();
                      instance.requestPaymentMethod(function (err, payload) {

                        $.ajax({
                          url: "{{ route('payment_process') }}",
                          method: "GET",
                          data: {
                              id: {{$apartment -> id}},
                              val: sponsorType,
                              payload: payload
                          },

                          success: function (result) {
                              console.log(result);
                              if (result.success) {
                                alert('Payment successfull!');
                              } else {
                                alert('Payment failed');
                                }
                          },
                          error: function(error, status){
                            console.log('errore:' + error);
                            }
                          });
                        });
                      });
                    });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{asset('js/sponsor_apt.js')}}"></script>
@endsection