
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>@yield('pagename')</title>
 <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
      <link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist-custom.css')}}">
      <!--<link href="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" rel="stylesheet">-->

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

  <link rel="stylesheet" href="{{asset('style.css')}}">

  <link rel="stylesheet" href="{{asset('css/custom-style.css')}}">


  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">

  <!-- DATA TABLES-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

   <!-- GRAPHS-->
 <link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />

<style>
    .submit-button {
  margin-top: 10px;
}
.cardTab{
    padding: 0px;
}

.cardUlTab{
    padding:0px;

}
.cardUlTab.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #00aaff !important;
    cursor: default;
     background-color: #f5f5fa !important;
     border: none;
     border-bottom-color: none;}
.cardUlTab.nav-tabs>li>a {
    margin-right: 0px;
    line-height: 1.42857143;
    border:none;
    border-radius: 0px 0px 0 0;
    color:white;
}
.cardUlTab.nav-tabs>li {
    float: left;
    margin-bottom: 0px;
}
.process-modal {
  display: flex;
    height: 100%;
    align-items: center;
    margin-bottom: 0px;
    margin-top: 0px;
}
.bars{
    padding: 15px;
}
.panelt{
    width: 310px;
    position: absolute;
    right: 12px;
    margin-top:50px;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 7px;
    font-weight: 700;
}
li{
        padding: 0px;
        cursor:pointer;
}
price{
    color:green;
}
.tooltip {
  position: relative;
  display: inline-block;

}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 320px;
  height:100px;
  background-color: gray;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;


  position: absolute;
  z-index: 1;
  right:100%
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

</style>

</head>
<body>
  <!-- WRAPPER -->
  <div id="wrapper">

    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="brand">
          <a href="/" target="_blank"><b style="font-size: 20px; margin-left:-25px;">Library Management</b></a>
      </div>
        <div class="container-fluid">
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-item" href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- END NAVBAR -->

    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                  <ul class="nav">
                      @if(Auth::user()->role == 1)
                        <li><a href="/admin/books" class="#"><i class="">&#10004;</i> <span>Manage Books</span></a></li>
                        <li><a href="/admin/bookRequest" class="#"><i class="">&#10004;</i> <span>Borrow Requests</span></a></li>
                        <li><a href="/admin/bookExpired" class="#"><i class="">&#10004;</i> <span>Expire Requests</span></a></li>
                      @else
                        <li><a href="/user/books" class="#"><i class="">&#10004;</i> <span>Manage Books</span></a></li>
                        <li><a href="/user/expireBook" class="#"><i class="">&#10004;</i> <span>Books Expire</span></a></li>
                      @endif
                  </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->

    <!-- MAIN -->
    <div class="main">

      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid" id="ajax-extension">

          <!-- OVERVIEW -->
          @if(Session::has('message'))
            <p id="message" class="alert {{ Session::get('alert-class', 'alert-info') }} sessionmsg">{{ Session::get('message') }}</p>
            @else <p id="message"></p>
          @endif
          @yield('content')
        </div>
      </div>
      <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
      <div class="clearfix"></div>
    <footer>
      <div class="container-fluid">
        <p class="copyright"><a href="#"><span>Support</span></a> | &copy; 2020 <a href="#" target="_blank">Powered By Nauman</p>

      </div>
    </footer>
  </div>
  <!-- END WRAPPER -->

  <!-- Javascript -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{asset('assets/scripts/klorofil-common.js')}}"></script>
  <script src="{{asset('js/bootbox.all.min.js')}}"></script>

@yield('scripts')

</body>
</html>
