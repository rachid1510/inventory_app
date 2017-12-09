<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Album') }}</title>
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <header id="header">
      <div class="logo pull-left"> OSWA - Inventory </div>
      <div class="header-content">
      <div class="header-date pull-left">
        <strong></strong>
      </div>
      <div class="pull-right clearfix">
        <ul class="info-menu list-inline list-unstyled">
          <li class="profile">
            <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
              <img src="#" alt="user-image" class="img-circle img-inline">
              <span> <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                  <a href="#">
                      <i class="glyphicon glyphicon-user"></i>
                      Profile
                  </a>
              </li>
             <li>
                 <a href="edit_account.php" title="edit account">
                     <i class="glyphicon glyphicon-cog"></i>
                     Settings
                 </a>
             </li>
             <li class="last">
                 <a href="#">
                     <i class="glyphicon glyphicon-off"></i>
                     Logout
                 </a>
             </li>
           </ul>
          </li>
        </ul>
      </div>
     </div>
    </header>
    <div class="sidebar">
       <ul>
        <li>
          <a href="home.php">
            <i class="glyphicon glyphicon-home"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <!--  <li>
          <a href="home.php">
            <i class="glyphicon glyphicon-home"></i>
            <span>Catégories</span>
          </a>
        </li> -->

        <li>
          <a href="#" class="submenu-toggle">
            <i class="glyphicon glyphicon-th-list"></i>
             <span>PRODUITS</span>
            </a>
            <ul class="nav submenu">
               <li><a href="sales.php">Boîtier</a> </li>
               <li><a href="add_sale.php">Cartes SIM</a> </li>
           </ul>
        </li>

          <li>
          <a href="home.php">
            <i class="glyphicon glyphicon-signal"></i>
            <span>INSTALLATIONS</span>
          </a>
        </li>
         <li>
          <a href="home.php">
            <i class="glyphicon glyphicon-th-large"></i>
            <span>INSTALLATEUR</span>
          </a>
        </li>
         <li>
          <a href="home.php">
            <i class="glyphicon glyphicon-picture"></i>
            <span>CLIENTS</span>
          </a>
        </li>
         
          <li>
          <a href="home.php">
            <i class="glyphicon glyphicon-indent-left"></i>
            <span>STATISTIQUE</span>
          </a>
        </li>

        
    </ul>

   </div>
   <div class="page">
     <div class="container-fluid">
     @yield('content')
     </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
<script>
    $(function() {
        $('#logout').click(function(e) {
            e.preventDefault();
            $('#logout-form').submit()
        })
    })

    $(function(){
  
        $('#addproduct').click(function() {
            $('#myModal').modal();
        });
  
        $(document).on('submit', '#formRegister', function(e) {  
            e.preventDefault();
              
            $('input+small').text('');
            $('input').parent().removeClass('has-error');
              
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json"
            })
            .done(function(data) {
                $('.alert-success').removeClass('hidden');
                $('#myModal').modal('hide');
            })
            .fail(function(data) {
                $.each(data.responseJSON, function (key, value) {
                    var input = '#formRegister input[name=' + key + ']';
                    $(input + '+small').text(value);
                    $(input).parent().addClass('has-error');
                });
            });
        });
  
    })
</script>
</body>
</html>