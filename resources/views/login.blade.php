<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOV | CRM</title>

        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <link rel="icon" href="/assets/img/favicon.ico" type="image/x-icon">
        <!-- Stylesheets-->
        <link rel="stylesheet" type="text/css" href="/assets/admin-tools/admin-forms/css/admin-forms.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Arimo:400,700%7CRoboto:400,300,500,700">
        <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">
            <!--[if lt IE 10]>
        <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
        <script src="js/html5shiv.min.js"></script>
            <![endif]-->
    </head>
    <body class="external-page sb-l-c sb-r-c">
        <!-- Start: Main-->
        <div id="main" class="animated fadeIn">
          <!-- Start: Content-Wrapper-->
          <section id="content_wrapper">
            <!-- begin canvas animation bg-->
            <div id="canvas-wrapper">
              <canvas id="demo-canvas"></canvas>
            </div>
            <!-- Begin: Content-->
            <section id="content">
              <div id="login1" class="admin-form theme-primary">
                
                <div class="row mb15 table-layout">
                  <div class="col-xs-12 va-m pln"><img src="assets/img/logoWhite.png" title="AdminDesigns Logo" class="img-responsive w250"></a></div>                  
                </div>


                <div class="alert alert-primary alert-dismissable offset-6" style="display: {{$data["displayMensaje"]}};" >
                    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
                    <i class="fa fa-warning pr10"></i>
                    {{ $data["mensaje"] }}</a>.
                </div>


                <div class="panel panel-info mt10 br-n bg-gradient-1 mw500 mauto">



                    {{ Form::open(array('url' => 'login')) }}   
                            <div class="panel-body text-center p50 text-center">
                                    <div class="section">
                                        <p class="text-uppercase text-white ls100 fw700">Usuario</p>
                                        <label for="user" class="field prepend-icon">
                                          <input id="user" type="text" name="user"  class="gui-input">
                                        </label>
                                    </div>

                                    <div class="section">
                                        <p class="text-uppercase text-white ls100 fw700">Password</p>
                                        <label for="pss" class="field prepend-icon">
                                          <input id="pss" type="password" name="pss"  class="gui-input">
                                        </label>
                                    </div>

                                    <div class="panel-footer clearfix p10 ph15">
                                        <button type="submit" class="button btn-primary mr10 pull-right text-uppercase text-white ls100 fw700">Ingresar</button>
                                        
                                    </div>                      
                            </div>
                    {{ Form::close() }}

                </div>
              </div>
            </section>
          </section>
        </div>
        
        <script src="/plugins/core.min.js"></script>        
        <script src="/assets/js/utility/utility.js"></script>
        <script src="/assets/js/demo/demo.js"></script>
        <script src="/assets/js/main.js"></script>
        
        <script type="text/javascript">
            jQuery(document).ready(function () {
                "use strict";
                Core.init();
                CanvasBG.init({
                Loc: {
                        x: window.innerWidth / 2,
                        y: window.innerHeight / 3.3
                    },
                });
            });
        </script>
      </body>
    </html>