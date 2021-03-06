<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Torneo Voley Liga Del Valle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/jquery-ui-1.11.4/jquery-ui.css', array('media' => 'screen')) }}

    {{-- trae le jquery ui desde internet --}}
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script>
  		$(function() {
    		$( "#datepicker" ).datepicker();
  		});
  	</script>

    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->
  </head>
  <body>
    {{-- Wrap all page content here --}}
    <div id="wrap">
      {{-- Begin page content --}}
      <div class="container">
        @yield('content')
      </div>
    </div>

    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    <script src="//code.jquery.com/jquery.js"></script>  	
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	

    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/jquery-ui-1.11.4/jquery-ui.theme.js') }}
    
  </body>
</html>