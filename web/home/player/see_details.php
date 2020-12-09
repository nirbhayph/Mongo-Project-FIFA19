<!DOCTYPE html>
<html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Player Profile</title>
  <?php
  include "../header/header.php";
  ?>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
</head>

    <body>

        <?php
        include "../header/navigation.php";
        ?>

        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Player Profile</h4>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-sm-8">
                        <div class="bg-picture card-box">
                            <div class="profile-info-name">
                                <!--<img id="profile_pic_fifa" src=""
                                     class="img-thumbnail" alt="profile-image">-->

                                <div class="profile-info-detail">
                                    <p><img id="profile_pic_fifa" src="" style="width:50px; margin-left:12px; border:2px solid #394C57; border-radius: 5px;"></p>
                                    <p><h4 id="playerName" style="font-size: 22px;" class="m-0"></h4></p><br/>
                                    <p class="text-muted m-b-20"><span id="playerNationality" style="font-size: 16px;" class="badge badge-primary"></span> &nbsp; <span id="playerClub" style="font-size: 16px;" class="badge badge-secondary"></span> &nbsp; <span id="playerPosition" style="font-size: 16px;" class="badge badge-success"></span> &nbsp; <span id="playerJNo" style="font-size: 16px;" class="badge badge-danger"></span></p>
                                    <p id="playerDescription"></p>

                                    <div class="button-list m-t-20">
                                            <img id="country_pic_fifa" src="" style="width:40px; margin-left:12px;">
                                            <img id="club_pic_fifa" src="" style="width:40px;">
                                            <p style="margin-left:12px;"class="text-muted m-b-20"><span id="playerJoinDate" style="font-size: 16px;" class="badge badge-secondary"></span> &nbsp;<span id="playerExpDate" style="font-size: 16px;" class="badge badge-secondary"></span></p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!--/ meta -->

                        <div class="row">
                            <div class="col-xl-4 col-md-4">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 id="playerValue" class="text-custom"></h2>
                                        <h5>Value</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-4">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 id="playerWage" class="text-pink"></h2>
                                        <h5>Wage</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-4">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 id="playerRelease" class="text-warning"></h2>
                                        <h5>Release Clause</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 id="playerIRep" class="text-custom"></h2>
                                        <h5>International Reputation</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 id="playerSkill" class="text-pink"></h2>
                                        <h5>Skill Moves Rating Achieved</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 id="playerWFoot" class="text-warning"></h2>
                                        <h5>Weak Foot Power Rating</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 id="playerPFoot" class="text-info"></h2>
                                        <h5>Player's Preferred Foot</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center><span class="badge badge-primary"><b style="font-size:22px;">Real Overall Rating</b></span></center><br/>

                        <div class="row">
                          <div class="col-xl-3 col-md-3"></div>

                            <div class="col-xl-2 col-md-2">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 id="ls-val" class="text-pink"></h2>
                                        <h5>LS</h5>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-2 col-md-2">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 id="st-val" class="text-warning"></h2>
                                        <h5>ST</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-2">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 id="rs-val" class="text-pink"></h2>
                                        <h5>RS</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3"></div>
                        </div>
                         <div class="row">

                           <div class="col-xl-1 col-md-1">
                           </div>
                             <div class="col-xl-2 col-md-2">
                                 <div class="card-box widget-user">
                                     <div class="text-center">
                                         <h2 id="lw-val" class="text-pink"></h2>
                                         <h5>LW</h5>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-xl-2 col-md-2">
                                 <div class="card-box widget-user">
                                     <div class="text-center">
                                         <h2 id="lf-val" class="text-custom"></h2>
                                         <h5>LF</h5>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-xl-2 col-md-2">
                                 <div class="card-box widget-user">
                                     <div class="text-center">
                                         <h2 id="cf-val" class="text-warning"></h2>
                                         <h5>CF</h5>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-2 col-md-2">
                                 <div class="card-box widget-user">
                                     <div class="text-center">
                                         <h2 id="rf-val" class="text-custom"></h2>
                                         <h5>RF</h5>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-2 col-md-2">
                                 <div class="card-box widget-user">
                                     <div class="text-center">
                                         <h2 id="rw-val" class="text-pink"></h2>
                                         <h5>RW</h5>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-1 col-md-1">
                             </div>
                         </div>
                         <div class="row">
                           <div class="col-xl-3 col-md-3"></div>

                             <div class="col-xl-2 col-md-2">
                                 <div class="card-box widget-user">
                                     <div class="text-center">
                                         <h2 id="lam-val" class="text-pink"></h2>
                                         <h5>LAM</h5>
                                     </div>
                                 </div>
                             </div>


                             <div class="col-xl-2 col-md-2">
                                 <div class="card-box widget-user">
                                     <div class="text-center">
                                         <h2 id="cam-val" class="text-warning"></h2>
                                         <h5>CAM</h5>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-2 col-md-2">
                                 <div class="card-box widget-user">
                                     <div class="text-center">
                                         <h2 id="ram-val" class="text-pink"></h2>
                                         <h5>RAM</h5>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-3 col-md-3"></div>
                         </div>

                          <div class="row">

                            <div class="col-xl-1 col-md-1">
                            </div>
                              <div class="col-xl-2 col-md-2">
                                  <div class="card-box widget-user">
                                      <div class="text-center">
                                          <h2 id="lm-val" class="text-pink"></h2>
                                          <h5>LM</h5>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-xl-2 col-md-2">
                                  <div class="card-box widget-user">
                                      <div class="text-center">
                                          <h2 id="lcm-val" class="text-custom"></h2>
                                          <h5>LCM</h5>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-xl-2 col-md-2">
                                  <div class="card-box widget-user">
                                      <div class="text-center">
                                          <h2 id="cm-val" class="text-warning"></h2>
                                          <h5>CM</h5>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-2 col-md-2">
                                  <div class="card-box widget-user">
                                      <div class="text-center">
                                          <h2 id="rcm-val" class="text-custom"></h2>
                                          <h5>RCM</h5>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-2 col-md-2">
                                  <div class="card-box widget-user">
                                      <div class="text-center">
                                          <h2 id="rm-val"class="text-pink"></h2>
                                          <h5>RM</h5>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-1 col-md-1">
                              </div>
                          </div>

                           <div class="row">

                             <div class="col-xl-1 col-md-1">
                             </div>
                               <div class="col-xl-2 col-md-2">
                                   <div class="card-box widget-user">
                                       <div class="text-center">
                                           <h2 id="lwb-val" class="text-pink"></h2>
                                           <h5>LWB</h5>
                                       </div>
                                   </div>
                               </div>

                               <div class="col-xl-2 col-md-2">
                                   <div class="card-box widget-user">
                                       <div class="text-center">
                                           <h2 id="ldm-val" class="text-custom"></h2>
                                           <h5>LDM</h5>
                                       </div>
                                   </div>
                               </div>

                               <div class="col-xl-2 col-md-2">
                                   <div class="card-box widget-user">
                                       <div class="text-center">
                                           <h2 id="cdm-val" class="text-warning"></h2>
                                           <h5>CDM</h5>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-xl-2 col-md-2">
                                   <div class="card-box widget-user">
                                       <div class="text-center">
                                           <h2 id="rdm-val" class="text-custom"></h2>
                                           <h5>RDM</h5>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-xl-2 col-md-2">
                                   <div class="card-box widget-user">
                                       <div class="text-center">
                                           <h2 id="rwb-val" class="text-pink"></h2>
                                           <h5>RWB</h5>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-xl-1 col-md-1">
                               </div>
                           </div>

                            <div class="row">

                              <div class="col-xl-1 col-md-1">
                              </div>
                                <div class="col-xl-2 col-md-2">
                                    <div class="card-box widget-user">
                                        <div class="text-center">
                                            <h2 id="lb-val" class="text-pink"></h2>
                                            <h5>LB</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-md-2">
                                    <div class="card-box widget-user">
                                        <div class="text-center">
                                            <h2 id="lcb-val" class="text-custom"></h2>
                                            <h5>LCB</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-md-2">
                                    <div class="card-box widget-user">
                                        <div class="text-center">
                                            <h2 id="cb-val" class="text-warning"></h2>
                                            <h5>CB</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-2">
                                    <div class="card-box widget-user">
                                        <div class="text-center">
                                            <h2 id="rcb-val" class="text-custom"></h2>
                                            <h5>RCB</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-2">
                                    <div class="card-box widget-user">
                                        <div class="text-center">
                                            <h2 id="rb-val" class="text-pink"></h2>
                                            <h5>RB</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-md-1">
                                </div>
                            </div>

                        <div class="card-box">
                          <h4 class="header-title mt-0 m-b-30">Player Location</h4>
                          <div id="mapid" style="height: 300px;"></div>
                        </div>
                        <form id="commentForm" method="post" class="card-box">
                                    <span class="input-icon icon-right">
                                        <textarea id="commentMade" rows="2" class="form-control" placeholder="Post a new message"></textarea>
                                    </span>
                            <div class="p-t-10 pull-right">
                                <a id="commentFormSubmit" class="btn btn-sm btn-primary waves-effect waves-light">Send <i class="fa fa-location-arrow"></i></a>
                            </div>
                            <ul class="nav nav-pills profile-pills m-t-10">
                                <li>
                                    <i class="fa fa-user"></i> <i> &nbsp;Reviewer can comment anonymously</i>
                                </li>
                            </ul>
                        </form>
                        <div id="commentsSection" class="card-box">
                        </div>


                    </div>

                    <div class="col-sm-4">
                      <div class="card-box widget-user" style="background-color:#F9C752;">
                          <div class="text-center">
                              <h2 class="text-custom">
                                <canvas id="radar-chart" width="800" height="600"></canvas>
                              </h2>
                          </div>
                      </div>
                      <div class="card-box">
                          <h4 class="header-title mt-0 m-b-30">Overall Rating</h4>

                          <div class="widget-chart-1">
                              <div class="widget-chart-box-1">
                                  <input id="pOverall" data-plugin="knob" data-width="80" data-height="80" data-fgColor="#35b8e0 "
                                         data-bgColor="#B8E6F4" value=""
                                         data-skin="tron" data-angleOffset="180" data-readOnly=true
                                         data-thickness=".15"/>
                              </div>

                              <div class="widget-detail-1">
                                  <h2 id="playerOverall" class="p-t-10 mb-0"> </h2>
                                  <p class="text-muted m-b-10">Overall Rating Achieved</p>
                              </div>
                          </div>
                      </div>
                      <div class="card-box">
                          <h4 class="header-title mt-0 m-b-30">Potential</h4>

                          <div class="widget-chart-1">
                              <div class="widget-chart-box-1">
                                  <input id="pPotential" data-plugin="knob" data-width="80" data-height="80" data-fgColor="#10c469"
                                         data-bgColor="#AAE2C6" value=""
                                         data-skin="tron" data-angleOffset="180" data-readOnly=true
                                         data-thickness=".15"/>
                              </div>

                              <div class="widget-detail-1">
                                  <h2 id="playerPotential" class="p-t-10 mb-0"> </h2>
                                  <p class="text-muted m-b-10">Potential Achieved</p>
                              </div>
                          </div>
                      </div>
                      <!--
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">My Team Members</h4>

                            <ul class="list-group m-b-0 user-list">
                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <img src="../assets/images/users/avatar-2.jpg" alt="">
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Michael Zenaty</span>
                                            <span class="desc">CEO</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <img src="../assets/images/users/avatar-3.jpg" alt="">
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">James Neon</span>
                                            <span class="desc">Web Designer</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <img src="../assets/images/users/avatar-5.jpg" alt="">
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">John Smith</span>
                                            <span class="desc m-b-0">Web Developer</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <img src="../assets/images/users/avatar-6.jpg" alt="">
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Michael Zenaty</span>
                                            <span class="desc">Programmer</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <img src="../assets/images/users/avatar-1.jpg" alt="">
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Mat Helme</span>
                                            <span class="desc">Manager</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>-->

                    <div id="attackingPr" class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Attacking</h4>
                    </div>
                    <div id="skillPr" class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Skill</h4>
                    </div>
                    <div id="movementPr" class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Movement</h4>
                    </div>
                    <div id="powerPr" class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Power</h4>
                    </div>
                    <div id="defendingPr" class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Defending</h4>
                    </div>
                    <div id="mentalityPr" class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Mentality</h4>
                    </div>
                    <div id="goalkeepingPr" class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">GoalKeeping</h4>
                    </div>
                    </div>
                </div>


            </div> <!-- end container -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="../assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="mdi mdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="mdi mdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="../assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="mdi mdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- end wrapper -->


        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>

        <!-- Counter Up  -->
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>

        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
   integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
   crossorigin=""></script>
        <?php if(isset($_GET["id"])) { ?>
        <script>

        $.ajax({url: 'https://pothole.ml/php/gofifa/getPlayerDetails.php?id='+<?php echo $_GET["id"]; ?>,
        success: function(result){
          console.log(result);
          var json_result = JSON.parse(result);
          var talentArray = json_result["talent_array"];
          var photoLink = json_result["photo"];
          $('#profile_pic_fifa').attr("src",photoLink);
          var clubLink = json_result["club"];
          $('#club_pic_fifa').attr("src",clubLink);
          var countryLink = json_result["country"];
          $('#country_pic_fifa').attr("src",countryLink);
          var player = json_result["result"];
          var name = player["Name"];
          $('#playerName').html(name);
          var description = player["description"];
          $('#playerDescription').html(description);
          //
          var age = player["Age"];
          $('#playerAge').html(age);
          var nationality = player["Nationality"];
          $('#playerNationality').html(nationality);
          var club = player["Club"];
          $('#playerClub').html(club);
          var overall = player["Overall"];
          $('#playerOverall').html(overall);
          $('#pOverall').val(overall).trigger('change').trigger('draw');
          var potential = player["Potential"];
          $('#pPotential').val(potential).trigger('change').trigger('draw');
          $('#playerPotential').html(potential);

          var position = player["Position"];
          $('#playerPosition').html(position);

          var jersey = player["Jersey Number"];
          $('#playerJNo').html('JNo. '+jersey);

          var joinDate = player["Joined"];
          $('#playerJoinDate').html('Join Date: '+joinDate);
          var expDate = player["Contract Valid Until"];
          $('#playerExpDate').html('Contract Exp: '+expDate);

          var value = player["Value"];
          $("#playerValue").html(value);
          var wage = player["Wage"];
          $("#playerWage").html(wage);
          var releaseC = player["Release Clause"];
          $("#playerRelease").html(releaseC);

          var iRep = player["International Reputation"];
          $("#playerIRep").html(iRep);
          var sMoves = player["Skill Moves"];
          $("#playerSkill").html(sMoves);
          var wFoot = player["Weak Foot"];
          $("#playerWFoot").html(wFoot);
          var pFoot = player["Preferred Foot"];
          $("#playerPFoot").html(pFoot);

          var functionStats = function(stat){
            if(stat===""){
              return 0;
            }
            else{
              return stat;
            }
          }

          $("#ls-val").html(functionStats(player["LS"]));
          $("#st-val").html(functionStats(player["ST"]));
          $("#rs-val").html(functionStats(player["RS"]));
          $("#lw-val").html(functionStats(player["LW"]));
          $("#lf-val").html(functionStats(player["LF"]));
          $("#cf-val").html(functionStats(player["CF"]));
          $("#rf-val").html(functionStats(player["RF"]));
          $("#rw-val").html(functionStats(player["RW"]));
          $("#lam-val").html(functionStats(player["LAM"]));
          $("#cam-val").html(functionStats(player["CAM"]));
          $("#ram-val").html(functionStats(player["RAM"]));
          $("#lm-val").html(functionStats(player["LM"]));
          $("#lcm-val").html(functionStats(player["LCM"]));
          $("#cm-val").html(functionStats(player["CM"]));
          $("#rcm-val").html(functionStats(player["RCM"]));
          $("#rm-val").html(functionStats(player["RM"]));
          $("#lwb-val").html(functionStats(player["LWB"]));
          $("#ldm-val").html(functionStats(player["LDM"]));
          $("#cdm-val").html(functionStats(player["CDM"]));
          $("#rdm-val").html(functionStats(player["RDM"]));
          $("#rwb-val").html(functionStats(player["RWB"]));
          $("#lb-val").html(functionStats(player["LB"]));
          $("#lcb-val").html(functionStats(player["LCB"]));
          $("#cb-val").html(functionStats(player["CB"]));
          $("#rcb-val").html(functionStats(player["RCB"]));
          $("#rb-val").html(functionStats(player["RB"]));

          var progressStat = function(stat, color, field){
            if(stat===""){
              stat=0;
            }
            return '<p class="font-600 m-b-5">'+field+'<span class="text-'+color+' pull-right">'+stat+'%</span></p><div class="progress progress-bar-'+color+'-alt progress-sm m-b-20"><div class="progress-bar progress-bar-'+color+' progress-animated wow animated animated" role="progressbar" aria-valuenow="'+stat+'" aria-valuemin="0" aria-valuemax="100" style="width:'+stat+'%; visibility: visible; animation-name: animationProgress;"></div></div>';
          }

          $('#attackingPr').append(progressStat(player["Crossing"], "primary", "Crossing"));
          $('#attackingPr').append(progressStat(player["HeadingAccuracy"], "pink", "Heading"));
          $('#attackingPr').append(progressStat(player["ShortPassing"], "info", "ShortPassing"));
          $('#attackingPr').append(progressStat(player["Finishing"], "warning", "Finishing"));
          $('#attackingPr').append(progressStat(player["Volleys"], "danger", "Volleys"));

          $('#defendingPr').append(progressStat(player["Marking"], "primary", "Marking"));
          $('#defendingPr').append(progressStat(player["StandingTackle"], "pink", "StandingTackle"));
          $('#defendingPr').append(progressStat(player["SlidingTackle"], "info", "SlidingTackle"));

          $('#mentalityPr').append(progressStat(player["Aggression"], "primary", "Aggression"));
          $('#mentalityPr').append(progressStat(player["Interceptions"], "pink", "Interception"));
          $('#mentalityPr').append(progressStat(player["Positioning"], "info", "Positioning"));
          $('#mentalityPr').append(progressStat(player["Vision"], "warning", "Vision"));
          $('#mentalityPr').append(progressStat(player["Penalties"], "danger", "Penalties"));
          $('#mentalityPr').append(progressStat(player["Composure"], "success", "Composure"));

          $('#powerPr').append(progressStat(player["ShotPower"], "primary", "SPower"));
          $('#powerPr').append(progressStat(player["Jumping"], "pink", "Jumping"));
          $('#powerPr').append(progressStat(player["Stamina"], "info", "Stamina"));
          $('#powerPr').append(progressStat(player["Strength"], "warning", "Strength"));
          $('#powerPr').append(progressStat(player["LongShots"], "danger", "LongShots"));

          $('#skillPr').append(progressStat(player["Dribbling"], "primary", "Dribbling"));
          $('#skillPr').append(progressStat(player["Curve"], "pink", "Curves"));
          $('#skillPr').append(progressStat(player["FKAccuracy"], "info", "FKAccuracy"));
          $('#skillPr').append(progressStat(player["LongPassing"], "warning", "LPassing"));
          $('#skillPr').append(progressStat(player["BallControl"], "danger", "BControl"));

          $('#movementPr').append(progressStat(player["Acceleration"], "primary", "Acceleration"));
          $('#movementPr').append(progressStat(player["SprintSpeed"], "pink", "SprintSp"));
          $('#movementPr').append(progressStat(player["Agility"], "info", "Agility"));
          $('#movementPr').append(progressStat(player["Reactions"], "warning", "Reactions"));
          $('#movementPr').append(progressStat(player["Balance"], "danger", "Balance"));

          $('#goalkeepingPr').append(progressStat(player["GKDiving"], "primary", "GKDiving"));
          $('#goalkeepingPr').append(progressStat(player["GKHandling"], "pink", "GKHandling"));
          $('#goalkeepingPr').append(progressStat(player["GKKicking"], "info", "GKKicking"));
          $('#goalkeepingPr').append(progressStat(player["GKPositioning"], "warning", "GKPositioning"));
          $('#goalkeepingPr').append(progressStat(player["GKReflexes"], "danger", "GKReflexes"));

          new Chart(document.getElementById("radar-chart"), {
            type: 'radar',
            data: {
              labels: ["Pace", "Shooting", "Passing", "Dribbling", "Defending", "Physical"],
              datasets: [
              {
                label: name,
                fill: true,
                backgroundColor: "rgba(28, 138, 226, 0.2)",
                borderColor: "rgba(28, 138, 226,1)",
                pointBorderColor: "#fff",
                pointBackgroundColor: "rgba(28, 138, 226,1)",
                data: talentArray
              }
            ]
          },
          options: {
            title: {
              display: true,
              text: 'Stats Radar'
            }
          }
  });
  const playerLatLng =  L.latLng(player["Latitude"], player["Longitude"]);
  console.log("player details", player);
  var mymap = L.map('mapid').setView(playerLatLng, 9);

  L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    accessToken: 'pk.eyJ1IjoicGhlcndhbmkzNyIsImEiOiJja2lncXRzMW4wNXkzMnJwZXRwbDdnMHRqIn0.iQuKxMRPV4xIlJ9jMgD29g'
}).addTo(mymap);
var marker = L.marker(playerLatLng).addTo(mymap);
marker.bindPopup("<img src=\""+photoLink+"\">"+"<br/><b>Hi I am "+player["Name"]+"</b><br>I am from <b>"+player["Nationality"]+"</b><br/> Overall Combined Rating - <b>"+player["Special"]+"</b><br/> Age - <b>"+player["Age"]+"</b><br/> Weight - <b>"+player["Weight"]+"</b><br/> Height - <b>"+player["Height"]+"</b>").openPopup();

        }});


        window.setInterval(function(){
          $.ajax({url: 'https://pothole.ml/php/gofifa/getComments.php?id='+<?php echo $_GET["id"]; ?>,
          success: function(result){
            var getCommentTemplate = function(comment){
              return '<div class="comment"><img src="../assets/images/brand/dribbble-1.jpg" alt="" class="comment-avatar"><div class="comment-body"><div class="comment-text"><div class="comment-header"><b style="color:white; font-size:14px;">Anonymous</b></div>'+comment+'</div></div></div>';
            }
            var comments = JSON.parse(result);
            var text = "";
            for (i = 0; i < comments.length; i++) {
              text += getCommentTemplate(comments[i]);
            }
            $('#commentsSection').html(text);
          }});
        }, 30000);

        $("#commentFormSubmit").click(function() {
              var commentMade = $('#commentMade').val();
              if(commentMade === ""){
                alert("Try again by inserting something in the message box!");
              }else{
                $.ajax({url: 'https://pothole.ml/php/gofifa/addComment.php?id='+<?php echo $_GET["id"]; ?>+'&comment='+commentMade,
                success: function(result){
                  if(result==="Success"){
                    $('#commentMade').val("");
                  }else{
                    alert("Failed to insert message!");
                  }
                }});
              }
        });

</script>
<?php } ?>

    </body>
</html>
