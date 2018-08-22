<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Site Title-->
    <title>MOV | CRM</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="icon" href="/assets/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="/plugins/css/fullcalendar.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/plugins/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin-tools/admin-forms/css/admin-forms.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Arimo:400,700%7CRoboto:400,300,500,700">
    <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">
        <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
        <![endif]-->
  </head>

  <body class="calendar-page">
    
    <!-- Start: Main-->
    <div id="main">



      <!-- INICIA EL SIDEBAR -->
      <aside id="sidebar_left" class="nano nano-light affix">
        <!-- Navbar Branding-->
        <div class="navbar-branding">
          <a href="/" class="navbar-brand">
            <span class="text-white">MOV | </span> CRM
          </a>
           <span id="toggle_sidemenu_l" class="ad ad-lines"></span></div>
        
        <!-- Start: Sidebar Left Content-->
        <div class="sidebar-left-content nano-content">

          <!-- Start: Sidebar Header-->
          <header class="sidebar-header">
              <!-- Sidebar Widget - Author-->
              <div class="sidebar-widget author-widget">
                <div class="media">
                  <div class="media-body">
                    <div class="media-links"></div>
                    <div class="media-author">{{ Session::get('user_name') }}</div>
                    <a href="/logout">Logout</a>
                  </div>
                </div>
              </div>
          </header>

          <!-- MENU -->
          <ul class="nav sidebar-menu">
            <li class="sidebar-label pt30">Menu</li>
             
             @foreach(Session::get('menus') as $key => $menu)
                  @if(Route::currentRouteName() == strtolower($key))
                      <li class="active">
                  @else
                      <li>
                  @endif
              
                      <a href="/{{ strtolower($menu["nombre"]) }}">
                          <span class="{{$menu["class"]}} "></span>
                          <span class="sidebar-title">{{$menu["nombre"]}}</span>
                      </a>
                 </li>
              @endforeach
            
          </ul>
        </div>
      </aside>
      <!-- FIN DEL SIDEBAR -->


      <!-- Start: Content-Wrapper-->
      <section id="content_wrapper">        
         @yield ('content')
      </section>
    </div>

      @yield ('dialogos')

    
    <script src="/plugins/core.min.js"></script>    
    <script src="/assets/admin-tools/admin-forms/js/jquery-ui-monthpicker.min.js"></script>
    <script src="/assets/admin-tools/admin-forms/js/jquery-ui-datepicker.min.js"></script>    
    <script src="/assets/js/utility/utility.js"></script>
    <script src="/assets/js/demo/demo.js"></script>
    <script src="/assets/js/main.js"></script>
    
    <script type="text/javascript">
      jQuery(document).ready(function () {
        "use strict";
        Core.init();
        
        // Init FullCalendar external events
        $('#external-events .fc-event').each(function () {
          // store data so the calendar knows to render an event upon drop
          $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true, // maintain when user navigates (see docs on the renderEvent method)
            className: 'fc-event-' + $(this).attr('data-event') // add a contextual class name from data attr
          });
          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 999,
            revert: true, // will cause the event to go back to its
            revertDuration: 0 //  original position after the drag
          });
        });
        var Calendar = $('#calendar');
        var Picker = $('.inline-mp');
        // Init FullCalendar Plugin
        Calendar.fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          editable: true,
          events: [{
            title: 'Rehabilitación',
            start: '2018-08-3',
            end: '2018-08-3',
            className: 'fc-event-success',
          }, {
            title: 'Consulta',
            start: '2018-08-14',
            end: '2018-08-16',
            className: 'fc-event-warning'
          }, {
            title: 'Estudio',
            start: '2018-08-26',
            end: '2018-08-26',
            className: 'fc-event-primary'
          },{
            title: 'Terapia',
            start: '2018-08-26',
            end: '2018-08-28',
            className: 'fc-event-primary'
          }
          ],
          viewRender: function (view) {
            // If monthpicker has been init update its date on change
            if (Picker.hasClass('hasMonthpicker')) {
              var selectedDate = Calendar.fullCalendar('getDate');
              var formatted = moment(selectedDate, 'MM-DD-YYYY').format('MM/YY');
              Picker.monthpicker("setDate", formatted);
            }
            // Update mini calendar title
            var titleContainer = $('.fc-title-clone');
            if (!titleContainer.length) {
              return;
            }
            titleContainer.html(view.title);
          },
          droppable: true, // this allows things to be dropped onto the calendar
          drop: function () {
            // is the "remove after drop" checkbox checked?
            if (!$(this).hasClass('event-recurring')) {
              $(this).remove();
            }
          },
          eventRender: function (event, element) {
            // create event tooltip using bootstrap tooltips
            $(element).attr("data-original-title", event.title);
            $(element).tooltip({
              container: 'body',
              delay: {
                "show": 100,
                "hide": 200
              }
            });
            // create a tooltip auto close timer
            $(element).on('show.bs.tooltip', function () {
              var autoClose = setTimeout(function () {
                $('.tooltip').fadeOut();
              }, 3500);
            });
          }
        });
        // Init MonthPicker Plugin and Link to Calendar
        Picker.monthpicker({
          prevText: '<i class="fa fa-chevron-left"></i>',
          nextText: '<i class="fa fa-chevron-right"></i>',
          showButtonPanel: false,
          onSelect: function (selectedDate) {
            var formatted = moment(selectedDate, 'MM/YYYY').format('MM/DD/YYYY');
            Calendar.fullCalendar('gotoDate', formatted)
          }
        });
        // Init Calendar Modal via "inline" Magnific Popup
        $('#compose-event-btn').magnificPopup({
          removalDelay: 500, //delay removal by X to allow out-animation
          callbacks: {
            beforeOpen: function (e) {
              // we add a class to body indication overlay is active
              // We can use this to alter any elements such as form popups
              // that need a higher z-index to properly display in overlays
              $('body').addClass('mfp-bg-open');
              this.st.mainClass = this.st.el.attr('data-effect');
            },
            afterClose: function (e) {
              $('body').removeClass('mfp-bg-open');
            }
          },
          midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
        });
        // Calendar Modal Date picker
        $("#eventDate").datepicker({
          numberOfMonths: 1,
          prevText: '<i class="fa fa-chevron-left"></i>',
          nextText: '<i class="fa fa-chevron-right"></i>',
          showButtonPanel: false,
          beforeShow: function (input, inst) {
            var newclass = 'admin-form';
            var themeClass = $(this).parents('.admin-form').attr('class');
            var smartpikr = inst.dpDiv.parent();
            if (!smartpikr.hasClass(themeClass)) {
              inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
            }
          }
        });
      });
    </script>
  </body>
</html>