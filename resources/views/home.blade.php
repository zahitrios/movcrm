@extends('layouts/master')

@section('content')
        <section id="content" class="table-layout animated fadeIn">
          <!-- begin: .tray-left-->
          <aside data-tray-mobile="#content &gt; .tray-center" data-tray-height="match" class="tray tray-left tray290">
            <!-- Demo HTML - Via JS we insert a cloned fullcalendar title-->
            <div class="fc-title-clone"></div>
            <!-- Demo HTML - Via JS we insert a sync minicalendar-->
            <div class="section admin-form theme-primary">
              <div class="inline-mp minimal-mp center-block"></div>
            </div>
            <h4 class="mt30 text-white">Citas<a id="compose-event-btn" href="#calendarEvent" data-effect="mfp-flipInY"><span class="fa fa-plus-square"></span></a></h4>
            <div id="external-events" class="bg-dotted">
              <!-- Standard Events-->
              <div data-event="primary" class="fc-event fc-event-primary">
                <div class="fc-event-icon"><span class="fa fa-exclamation"></span></div>
                <div class="fc-event-desc"><b>2:30am -</b> Cita en MOV
                </div>
              </div>
              <div data-event="info" class="fc-event fc-event-info">
                <div class="fc-event-icon"><span class="fa fa-info"></span></div>
                <div class="fc-event-desc"><b>2:30am -</b> Cita en MOV
                </div>
              </div>
              <div data-event="success" class="fc-event fc-event-success">
                <div class="fc-event-icon"><span class="fa fa-check"></span></div>
                <div class="fc-event-desc"><b>2:30am -</b> Cita en MOV
                </div>
              </div>
              <div data-event="warning" class="fc-event fc-event-warning">
                <div class="fc-event-icon"><span class="fa fa-question"></span></div>
                <div class="fc-event-desc"><b>2:30am -</b> Cita en MOV
                </div>
              </div>
              
            </div>
            <h4 class="mt30">Vista general</h4>
            <ul class="list-group">
              <li class="list-group-item"><span class="badge badge-primary">24</span>              Por confirmar</li>
              <li class="list-group-item"><span class="badge badge-success">10</span>              Confirmadas</li>              
              <li class="list-group-item"><span class="badge badge-warning">18</span>              Canceladas</li>
            </ul>
          </aside>
          <!-- begin: .tray-center-->
          <div class="tray tray-center">
            <!-- Calendar-->
            <div id="calendar" class="admin-theme fc-full"></div>
          </div>
        </section>
@endsection

@section('dialogos')
	
    <!-- Calendar Event Creation Modal/Form-->
    <div id="calendarEvent" class="admin-form theme-primary popup-basic popup-lg mfp-with-anim mfp-hide">
      <div class="panel">
        <div class="panel-heading"><span class="panel-title"><i class="fa fa-pencil-square"></i>Agendar nueva Cita</span></div>
        <form id="calendarEventForm" method="post" action="/">
          <div class="panel-body p25">
            <div class="section-divider mt10 mb40"><span>Información</span></div>
            <!-- .section-divider-->
            <div class="section row">
              <div class="col-md-6">
                <label for="firstname" class="field prepend-icon">
                  <input id="firstname" type="text" name="firstname" placeholder="Paciente" class="gui-input">
                  <label for="firstname" class="field-icon"><i class="fa fa-user"></i></label>
                </label>
              </div>
              <div class="col-md-6">
                <label for="eventDate" class="field prepend-icon">
                  <input id="eventDate" type="text" name="eventDate" placeholder="Fecha" class="gui-input">
                  <label class="field-icon"><i class="fa fa-calendar"></i></label>
                </label>
              </div>
            </div>
            <div class="section">
              <label for="email" class="field prepend-icon">
                <input id="email" type="email" name="email" placeholder="Correo del paciente" class="gui-input">
                <label for="email" class="field-icon"><i class="fa fa-envelope"></i></label>
              </label>
            </div>

            <div class="section">
                <label for="username" class="field prepend-icon">
                  <input id="username" type="text" name="username" placeholder="Servicio" class="gui-input">
                  <label for="username" class="field-icon"><i class="fa fa-flag"></i></label>
                </label>              
            </div>

            <div class="section">
              <label class="field prepend-icon">
                <textarea id="comment" name="comment" placeholder="Notas" class="gui-textarea"></textarea>
                <label for="comment" class="field-icon"><i class="fa fa-comments"></i></label><span class="input-footer hidden"><strong>Hint:</strong>Don't be negative or off topic! just be awesome...</span>
              </label>
            </div>
          </div>
          <div class="panel-footer text-right">
            <button type="submit" class="button btn-primary">Aceptar</button>
          </div>
        </form>
      </div>
    </div>
@endsection
