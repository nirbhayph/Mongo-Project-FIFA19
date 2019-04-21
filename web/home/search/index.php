<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <title>Home | Search</title>
        <!-- Plugins css-->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <link href="../assets/plugins/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/ion-rangeslider/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="../assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="../assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="../assets/js/modernizr.min.js"></script>
    </head>
<body>
  <?php
  include "../header/navigation.php";
  ?>
  <br/>
        <div class="wrapper">
            <div class="container-fluid">
<!--
              <div class="row">
              <div class="col-md-12">
                  <div class="card-box">
                      <h4 class="m-t-0 m-b-30 header-title">Search for any player</h4>

                      <form role="form" action="<?php //echo $api_base_url."server/upload_data.php"; ?>" method="POST" data-parsley-validate>
                          <div class="form-group">
                              <label for="playerName">Player Name</label>
                              <input type="text" class="form-control"  parsley-type="text" name="playerName" id="playerName" aria-describedby="textHelp" placeholder="Enter a player name" autocomplete="off">
                          </div>
                          <button type="submit" class="btn btn-primary btn-block">Search</button>
                      </form>
                  </div>
              </div>
              </div>
              <center><h4>OR</h4></center><br/>-->
              <div class="row">
              <div class="col-md-12">
                  <div id="loading-symbol" style="font-size:61px;"><br/><center><i class="fa fa-spin fa-refresh"></i></center></div>
                  <div class="card-box" id="custom-search" style="display:none">
                      <h4 class="m-t-0 m-b-30 header-title">Search on any of the player parameters</h4>

                      <form id="form-x" role="form" action="https://pothole.ml/php/gofifa/getSearchResults.php" method="GET" data-parsley-validate>
                        <div class="row">
                          <div class="col-xl-4">
                          <div class="form-group">
                              <label>Nationality</label>
                              <select id="countries" name="countries[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select or enter one or more country name(s)">
                              </select>
                          </div>
                          <div class="form-group">
                            <label>Clubs</label>
                            <select id="teams" name="teams[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select or enter one or more club name(s)">
                            </select>
                          </div>


                            <div class="form-group row">
                                    <label for="weight_range" class="col-sm-2 control-label"><b>Age</b></label>
                                    <div class="col-sm-10">
                                        <input name="age" type="text" id="age_range">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="rating_range" class="col-sm-2 control-label"><b>Overall Rating </b></label>
                                    <div class="col-sm-10">
                                        <input name="o-rating" type="text" id="rating_range">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="potential_range" class="col-sm-2 control-label"><b>Potential</b></label>
                                    <div class="col-sm-10">
                                        <input name="potential" type="text" id="potential_range">
                                    </div>
                            </div>

                        <div class="form-group">
                          <label>Position</label>
                          <select id="positions" name="positions[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select or enter one or more postition(s)">
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Preferred Foot</label>
                          <select id="preferredFoot" name="preferredFoot[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select any foot or both feet">
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Weak Foot</label>
                          <select id="weakFoot" name="weakFoot[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select strength level">
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Skill Moves</label>
                          <select id="skillMoves" name="skillMoves[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select skill move(s)">
                          </select>
                        </div>
                        <div class="form-group row">
                            <label for="height_range" class="col-sm-2 control-label"><b>Max Height (in ft)</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="heightRange" id="height_range">
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="weight_range" class="col-sm-2 control-label"><b>Weight (in lbs)</b></label>
                                <div class="col-sm-10">
                                    <input name="weightRange" type="text" id="weight_range">
                                </div>
                        </div>
                        <div class="form-group">
                            <label>Value in Euros (Max: 150000000)</label>
                                <input name="value" class="form-control"  type="text range" min="0"
                                       max="150000000" placeholder="Value"/>
                        </div>
                        <div class="form-group">
                            <label>Wage in Euros (Max: 600000)</label>
                                <input name="wage" class="form-control"  type="text range" min="0"
                                       max="600000" placeholder="Wage"/>
                        </div>
                        <div class="form-group">
                            <label>Release Clause in Euros (Max: 600000000)</label>
                                <input name="releaseClause" class="form-control"  type="text range" min="0"
                                       max="600000000" placeholder="Release Clause"/>
                        </div>
                        <h4> Attacking </h4>
                        <div class="form-group row">
                                <label for="crossing" class="col-sm-2 control-label"><b>Crossing</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="crossing" class="stats">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="finishing" class="col-sm-2 control-label"><b>Finishing</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="finishing" class="stats">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="haccuracy" class="col-sm-2 control-label"><b>Heading Accuracy</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="haccuracy" class="stats">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="spassing" class="col-sm-2 control-label"><b>Short Passing</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="spassing" class="stats">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="volleys" class="col-sm-2 control-label"><b>Volleys</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="volleys" class="stats">
                                </div>
                        </div>

                        <h4> Skill </h4>
                        <div class="form-group row">
                                <label for="dribbling" class="col-sm-2 control-label"><b>Dribbling</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="dribbling" class="stats">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="curve" class="col-sm-2 control-label"><b>Curve</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="curve" class="stats">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="fka" class="col-sm-2 control-label"><b>FK Accuracy</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="fka" class="stats">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="lpassing" class="col-sm-2 control-label"><b>Long Passing</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="lpassing" class="stats">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="bc" class="col-sm-2 control-label"><b>Ball Control</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="bc" class="stats">
                                </div>
                        </div>


                        </div>
                        <div class="col-xl-4">
                    <h4> Movement </h4>
                    <div class="form-group row">
                            <label for="acceleration" class="col-sm-2 control-label"><b>Accel..</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="acceleration" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="sprint" class="col-sm-2 control-label"><b>Sprint Speed</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="sprint" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="agility" class="col-sm-2 control-label"><b>Agility</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="agility" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="reactions" class="col-sm-2 control-label"><b>Reacti..</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="reactions" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="balance" class="col-sm-2 control-label"><b>Balanace</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="balance" class="stats">
                            </div>
                    </div>

                  <h4> Power </h4>
                  <div class="form-group row">
                          <label for="spower" class="col-sm-2 control-label"><b>Short Power</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="spower" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="jumping" class="col-sm-2 control-label"><b>Jumping</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="jumping" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="stamina" class="col-sm-2 control-label"><b>Stamina</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="stamina" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="strength" class="col-sm-2 control-label"><b>Strength</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="strength" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="lshots" class="col-sm-2 control-label"><b>Long Shots</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="lshots" class="stats">
                          </div>
                  </div>


                  <h4> Mentality </h4>
                  <div class="form-group row">
                          <label for="aggression" class="col-sm-2 control-label"><b>Aggress..</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="aggression" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="interceptions" class="col-sm-2 control-label"><b>Intercep..</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="interceptions" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="positioning" class="col-sm-2 control-label"><b>Positi..</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="positioning" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="vision" class="col-sm-2 control-label"><b>Vision</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="vision" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="penalties" class="col-sm-2 control-label"><b>Penalties</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="penalties" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="composure" class="col-sm-2 control-label"><b>Compos..</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="composure" class="stats">
                          </div>
                  </div>


                  <h4> Defending </h4>
                  <div class="form-group row">
                          <label for="marking" class="col-sm-2 control-label"><b>Marking</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="marking" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="standT" class="col-sm-2 control-label"><b>Standing Tackle</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="standT" class="stats">
                          </div>
                  </div>
                  <div class="form-group row">
                          <label for="slideT" class="col-sm-2 control-label"><b>Sliding Tackle</b></label>
                          <div class="col-sm-10">
                              <input type="text" name="slideT" class="stats">
                          </div>
                  </div>

                    <h4> GoalKeeping </h4>
                    <div class="form-group row">
                            <label for="gkd" class="col-sm-2 control-label"><b>GK Diving</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="gkd" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="gkh" class="col-sm-2 control-label"><b>GK Handling</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="gkh" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="gkk" class="col-sm-2 control-label"><b>GK Kicking</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="gkk" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="gkp" class="col-sm-2 control-label"><b>GK Positio..</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="gkp" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="gkr" class="col-sm-2 control-label"><b>GK Reflexes</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="gkr" class="stats">
                            </div>
                    </div>
                  </div>
                    <div class="col-xl-4">
                    <div class="form-group">
                      <label>International Reputation</label>
                      <select id="iReputation" name="iReputation[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="International Reputation(s)">
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Real Face </label>
                      <select id="rFace" name="rFace[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Real Face(s)">
                      </select>
                    </div>
                    <div class="form-group row">
                            <label for="ls_st_rs" class="col-sm-2 control-label"><b>LS ST RS</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="ls_st_rs" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="lw_rw" class="col-sm-2 control-label"><b>LW RW</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="lw_rw" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="lf_cf_rf" class="col-sm-2 control-label"><b>LF CF RF</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="lf_cf_rf" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="lam_cam_ram" class="col-sm-2 control-label"><b>LAM CAM RAM</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="lam_cam_ram" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="lm_rm" class="col-sm-2 control-label"><b>LM RM</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="lm_rm" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="ldm_cm_rcm" class="col-sm-2 control-label"><b>LDM CM RCM</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="ldm_cm_rcm" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="lcb_cb_rcb" class="col-sm-2 control-label"><b>LCB CB RCB</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="lcb_cb_rcb" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="lb_rb" class="col-sm-2 control-label"><b>LB RB</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="lb_rb" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="lwb_rwb" class="col-sm-2 control-label"><b>LWB RWB</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="lwb_rwb" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="pac" class="col-sm-2 control-label"><b>PAC</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="pac" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="sho" class="col-sm-2 control-label"><b>SHO</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="sho" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="pas" class="col-sm-2 control-label"><b>PAS</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="pas" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="dry" class="col-sm-2 control-label"><b>DRY</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="dry" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="def" class="col-sm-2 control-label"><b>DEF</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="def" class="stats">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="phy" class="col-sm-2 control-label"><b>PHY</b></label>
                            <div class="col-sm-10">
                                <input type="text" name="phy" class="stats">
                            </div>
                    </div>
                  </div>
                      </div>

                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </form>
                        </div>
                  </div>
              </div>
              <!-- end col -->
              </div>
              <!-- Footer -->
                  <footer class="footer">
                      <div class="container">
                          <div class="row">
                              <div class="col-12 text-center">
                                  Made with <i class="fa fa-heart"></i> in New York!
                              </div>
                          </div>
                      </div>
                  </footer>
                  <!-- End Footer -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <form style="display: hidden" action="search-results.php" method="POST" id="form-z">
              <input type="hidden" id="data" name="data" value=""/>
        </form>

        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>

        <!-- Plugins Js -->
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="../assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="../assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/moment/moment.js"></script>
        <script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="../assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="../assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <!-- range slider js -->
        <script src="../assets/plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>
        <script src="../assets/pages/jquery.ui-sliders.js"></script>
        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

        <script>

            jQuery(document).ready(function() {

                // Select2
                $(".select2").select2();

                $("#weight_range").ionRangeSlider({
                    type: "double",
                    grid: true,
                    min: 110,
                    max: 270,
                    from: 110,
                    to: 270
                });

                $("#age_range").ionRangeSlider({
                    type: "double",
                    grid: true,
                    min: 15,
                    max: 45,
                    from: 15,
                    to: 45
                });

                $("#rating_range").ionRangeSlider({
                    type: "double",
                    grid: true,
                    min: 0,
                    max: 99,
                    from: 0,
                    to: 99
                });

                $("#potential_range").ionRangeSlider({
                  type: "double",
                  grid: true,
                  min: 0,
                  max: 99,
                  from: 0,
                  to: 99
                });

                $(".stats").ionRangeSlider({
                  type: "double",
                  grid: true,
                  min: 0,
                  max: 99,
                  from: 0,
                  to: 99
                });

                $.ajax({url: 'https://pothole.ml/php/gofifa/getData.php',
                success: function(result){
                  var objJSON = JSON.parse(result);
                  $('#countries').html(objJSON["countries"]);
                  $('#teams').html(objJSON["teams"]);
                  $('#positions').html(objJSON["positions"]);
                  $('#preferredFoot').html(objJSON["preferredFoot"]);
                  $('#weakFoot').html(objJSON["weakFoot"]);
                  $('#skillMoves').html(objJSON["skillMoves"]);
                  $("#height_range").ionRangeSlider({
                      grid: true,
                      from: 3,
                      values: JSON.parse(objJSON["heights"])
                  });
                  $('#iReputation').html(objJSON["internationalReputation"]);
                  $('#rFace').html(objJSON["realFace"]);
                  $('#custom-search').css({display:'block'});
                  $('#loading-symbol').css({display:'none'});

                }});
            });

            $('#form-x').submit(function(){

              $('#custom-search').css({display:'none'});
              $('#loading-symbol').css({display:'block'});
                $.ajax({
                  url: $('#form-x').attr('action'),
                  type: 'GET',
                  data : $('#form-x').serialize(),
                  success: function(response){
                    $("#data").val(response);
                    $("#form-z").submit();
                  }
                });
                return false;
            });

        </script>
    </body>
</html>
