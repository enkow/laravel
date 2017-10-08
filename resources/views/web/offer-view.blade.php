@extends('web.template.index')

@section('title'){{ 'Archemia' }}@stop
@section('description'){{ 'Archemia' }}@stop
@section('keywords'){{ 'Archemia' }}@stop

@section('body')
  <header style="background-image: url('../images/offer/{{ rand(1, 4) }}.png');">
    <div style="">
      <img src="/img/ikony/zarowka-duza.png" style="width:175px;position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);">
    </div>
  </header>

  <section class="bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto text-center">
            <h1 class="offer-title">PROJEKT KOMPLEKSOWY</h1>
        </div>

        <div class="col-md-9 mx-auto">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sollicitudin augue massa, ut lacinia nulla tristique et. Proin ultrices enim lacus, eu tincidunt purus venenatis at. Nam varius condimentum sem in accumsan. Pellentesque aliquet nec arcu in sodales. In hac habitasse platea dictumst. Quisque dignissim in augue eu aliquet. Pellentesque rhoncus bibendum tellus, at porta erat ornare vel. Phasellus aliquet ex sit amet ullamcorper laoreet.
<br><br>
          Mauris posuere blandit fringilla. Integer rhoncus dictum arcu, nec hendrerit ante viverra quis. Aliquam pellentesque aliquam sem, at tempor odio rhoncus at. Suspendisse vitae hendrerit mi. Cras pretium volutpat ante. Quisque mattis lobortis scelerisque. Ut blandit turpis vel rhoncus ullamcorper. Aliquam quis risus ut est venenatis dictum. Maecenas convallis sapien a molestie eleifend. Praesent sed odio blandit, imperdiet odio vel, auctor enim.
<br><br>
          Etiam semper ultricies justo, sit amet accumsan odio. Fusce consectetur lectus vel venenatis faucibus. Mauris feugiat porta faucibus. Suspendisse lobortis pulvinar semper. Aliquam facilisis finibus laoreet. Morbi egestas condimentum egestas. Nunc finibus sit amet urna quis sodales. Morbi ac nisi turpis. Vivamus bibendum condimentum urna, non congue lectus vehicula ac. Donec pulvinar eu nulla blandit gravida. Proin rhoncus ornare luctus. Etiam ullamcorper condimentum libero nec pretium. Integer in felis malesuada, ullamcorper libero non, venenatis nisi. Nunc id molestie tortor. Vivamus sagittis neque imperdiet, tristique sapien nec, gravida sapien.
<br><br>
          Aenean auctor nibh ut est blandit, vel finibus ante volutpat. Cras turpis urna, ornare vel blandit quis, tincidunt sit amet arcu. Nulla facilisis libero eget velit ultrices imperdiet. Proin dignissim sed leo nec molestie. Praesent lacinia tortor eget tristique facilisis. Sed finibus libero et mauris pharetra, id facilisis eros elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id nibh non massa tincidunt tincidunt id eget risus.
<br><br>
          Nam auctor velit at maximus blandit. Etiam tempus turpis nec suscipit fringilla. Donec sapien libero, semper sagittis sem at, varius mollis lorem. Quisque a arcu ante. Maecenas a venenatis tortor, ac dictum arcu. Nullam fermentum ante id lobortis elementum. Donec ornare mattis justo, sed tempus purus porttitor at. Aenean sodales eget metus a blandit. Proin vitae fringilla tortor. Phasellus aliquam fermentum pellentesque. Vivamus commodo nunc non eros dignissim vehicula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean commodo, neque sed aliquet porttitor, lacus nulla malesuada dolor, id congue dui ante et lorem. Donec venenatis maximus mauris, non iaculis justo.

          <div class="col-xs-12 mt-75 text-center">
            PRZYKŁAD<br><br>
            <a class="btn portfolio-btn btn-xl sr-button" href="">zobacz</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('scripts')

@stop
