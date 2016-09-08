@extends('layouts.master')

@section('title', 'Web | Custom')

@section('header')
  {{ Html::style('vendor/ion.rangeSlider-2.1.2/css/ion.rangeSlider.css') }}
  {{ Html::style('vendor/ion.rangeSlider-2.1.2/css/ion.rangeSlider.skinFlat.css') }}
  {{ Html::style('vendor/ion.rangeSlider-2.1.2/css/normalize.css') }}
@stop

@section('body')

  @include('commons.banner', [ 'banner' => $servicePage->image, 'banners' => $service->banner ] )

  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2"> 
          {{ Form::model($item, [ 'route' => ['service.web.custom.update', $item['rowid']], 'class' => 'form form-validate', 'id' => 'form-custom-plan', 'novalidate' , 'data-url' => route('service.web.custom.price'), 'method' => 'PUT']) }}
            <div class="card">
              <div class="card-head">
                <header class="custom-title">Edit Your Web Hosting Custom Plan</header>
                <div class="tools">
                  <a href="{{ route('cart.index') }}" class="btn btn-flat btn-primary ink-reaction">
                    <i class="fa fa-chevron-left"></i> Back to Cart
                  </a>
                </div>
              </div>
              @include('services.web.customForm')
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </section>
  
@stop

@section('footer')
  {{ Html::script('vendor/ion.rangeSlider-2.1.2/js/ion-rangeSlider/ion.rangeSlider.min.js') }}
  <script>
    var $form = $('#form-custom-plan');
    var $price = $('.service-price');
    var url = $form.data('url');

    var refreshPrice = function () {
      clearTimeout(queue);
      queue = setTimeout(function() {
        $.ajax({
          url: url,
          type: 'POST',
          data: $form.serialize(),
          success: function (response) {
            var p = response.split(' ')
            var term = $('[name=qty]').val();
            $price.html(parseFloat(p[0] * term).toFixed(2) + " " + p[1]);
          }
        });
      }, 500);
    };
  </script>
  {{ Html::script('assets/js/price.js') }}
@stop