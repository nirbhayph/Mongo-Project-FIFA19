<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">
            <!-- Logo container-->
            <div class="logo" style="float:left;">
                <!-- Text Logo -->
                <a href="https://gofifa.herokuapp.com/home" class="logo">
                    <span class="logo-small" style="font-size: 34px;"><i class="mdi mdi-soccer"></i>GoFifa</span>
                    <span class="logo-large" style="font-size: 34px;"><i class="mdi mdi-soccer"></i>GoFifa</span>
                  </a>
            </div>

                <!-- End Logo container-->

                <div class="menu-extras topbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="menu-item">
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <form id="form-m" class="app-search" style="width:300%;">
                                <input name="player_text" type="text" placeholder="Player Search ..."
                                class="form-control" autocomplete="off">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </li>
                        <!--
                        <li>
                            <div class="notification-box">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a href="javascript:void(0);" class="right-bar-toggle">
                                            <i class="mdi mdi-bell-outline noti-icon"></i>
                                        </a>
                                        <div class="noti-dot">
                                            <span class="dot"></span>
                                            <span class="pulse"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="/home/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ti-user m-r-5"></i> Profile
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ti-settings m-r-5"></i> Settings
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ti-lock m-r-5"></i> Lock screen
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ti-power-off m-r-5"></i> Logout
                            </a>

                        </div>
                    </li>
-->
                </ul>
            </div>
            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu">
                        <a href="https://gofifa.herokuapp.com/home/"><i class="mdi mdi-view-dashboard"></i> <span>Home</span> </a>
                    </li>
                    <li>
                    <a href="https://gofifa.herokuapp.com/home/search"><i class="mdi mdi-search-web"></i> <span>Custom Search</span> </a>
                  </li>
                  <li>
                  <a href="https://gofifa.herokuapp.com/home/miscellanious"><i class="mdi mdi-asterisk"></i> <span>Miscellanious</span> </a>
                </li>
                </ul>
        <!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div> <!-- end navbar-custom -->
<form style="display: hidden" action="/home/search/search-results.php" method="POST" id="form-r">
      <input type="hidden" id="playerDetails" name="data_player" value=""/>
      <input type="hidden" id="countP" name="playersCount" value=""/>
      <input type="hidden" id="queryP" name="playersDisplay" value=""/>
</form>
</header>
        <!-- End Navigation Bar-->
<script src="../assets/js/jquery.min.js"></script>
<script>
jQuery(document).ready(function() {
  $('#form-m').submit(function(){
      $.ajax({
        url: 'https://pothole.ml/php/gofifa/getSearchResults.php',
        type: 'GET',
        data : $('#form-m').serialize(),
        success: function(result){
          var response = JSON.parse(result);
          $("#playerDetails").val(response["results"]);
          $("#countP").val(response["count"]);
          $("#queryP").val(response["display"]);
          $("#form-r").submit();
        }
      });
      return false;
  });

});
</script>
