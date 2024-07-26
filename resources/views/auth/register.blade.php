<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro Museo</title>
        <link rel="stylesheet" href="{{url('css/form.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        
    <img src="css/Header.jpg">
        <div class="container shadow-lg p-3 mb-5 bg-body rounded">
            <h5><span class="shadow mb-5 rounded">Registro de Museo</span></h5> 
            <h6>Datos generales del Museo</h6>
            <form class="row g-3" autocomplete="off" id="form">
                @csrf
                <div class="col-md-3">           
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre">
                    <span class="badge text-danger errors-nombre"></span>
                </div> 
                <div class="col-md-3">
                    <label for="segundo" class="form-label">Año/mes/dia de Inaguracion</label> 
                      <input type="date" name="fecha"> 
                    <span class="badge text-danger errors-segundo"></span>
                </div>
                <div class="col-md-3">
                    <label class="badge text-danger errors-segundo">Año Creacion</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa el año de creacion">
                    <span  class="badge text-danger errors-email"></span>
                </div>        
                <div class="col-md-6">
                    <label  for="confirmarpassword" class="form-label"> Legislacion que enmarca la creacion del museo:(Leyes, decretos y/o resoluciones u otra)</label>
                    <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Archivo (en formato PDF)') }}</label>
                                <div class="col-md-6">
                                <input type="file" name="file" id="file" class="form-control" placeholder="Subir archivo" value="{{ old('file') }}" required>
								<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">   
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                    </div>    
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Localidad</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa la localidad">
                    <span  class="badge text-danger errors-password"></span>
                </div>
                <div class="col-12">
                    <label for="direccion" class="form-label">Departamento</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa el departamento">
                    <span class="badge text-danger errors-direccion"></span>
                </div>
                <div class="col-md-5">
                    <label for="ciudad" class="form-label">Provincia</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa la provincia">
                    <span class="badge text-danger errors-ciudad"></span>
                </div>
                <div class="col-md-5">
                    <label for="ciudad" class="form-label">Autonomia</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa el municipio">
                    <span class="badge text-danger errors-ciudad"></span>
                </div>
                <div class="col-md-5">
                    <label for="ciudad" class="form-label">Municipio</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa el municipio">
                    <span class="badge text-danger errors-ciudad"></span>
                </div>
                <div class="col-md-12">
                    <label for="ciudad" class="form-label">Direccion</label>
                    <span class="badge text-danger errors-ciudad"></span>
                    <div class="mapform" >
                        <div class="row">
                            <div class="col-5">
                              <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                            </div>
                            <div class="col-5">
                              <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                            </div>
                        </div>
                        <div id="map" style="height:400px; width: 600px;" class="my-3"></div>
                        </div>
                        <script>
                        let map;
                        function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: { lat: -34.397, lng: 150.644 },
                            zoom: 8,
                            scrollwheel: true,
                        });

                        const uluru = { lat: -34.397, lng: 150.644 };
                        let marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                            draggable: true
                        });

                        google.maps.event.addListener(marker,'position_changed',
                            function (){
                                let lat = marker.position.lat()
                                let lng = marker.position.lng()
                                $('#lat').val(lat)
                                $('#lng').val(lng)
                            })

                        google.maps.event.addListener(map,'click',
                        function (event){
                            pos = event.latLng
                            marker.setPosition(pos)
                        })
                        }
                        </script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                        type="text/javascript"></script>
                </div>
                <div class="col-md-5">
                    <label for="ciudad" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa el telefono">
                    <span class="badge text-danger errors-ciudad"></span>
                </div>
                <div class="col-md-5">
                    <label for="ciudad" class="form-label">Pagina web</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa la pagina web">
                    <span class="badge text-danger errors-ciudad"></span>
                </div>
                <div class="col-md-5">
                    <label for="ciudad" class="form-label">Correo Electronico del Museo</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa el email">
                    <span class="badge text-danger errors-ciudad"></span>
                </div>
                <div class="col-md-5">
                    <label for="ciudad" class="form-label">Nombre del Responsable</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa el nombre del responsable del museo">
                    <span class="badge text-danger errors-ciudad"></span>
                
                </div>
                <div class="col-md-5">
                    <label for="ciudad" class="form-label">Cuenta con documentos que respalde la instituciion como: Acta de creacion, estatuto, carta formal emitida por la autoridad municipal o provincial de la cual depende o carta con firma y sello originales o cartas de referencia</label>
                    <select id="tiene" name="tiene" class="form-select">
                        <option value="">SI</option>
                        <option value="no">NO</option>
                    </select>
                    <span class="badge text-danger errors-ciudad"></span>
                            <div class="col-md-6">
                                <input type="file" name="file" id="file" class="form-control" placeholder="Subir archivo" value="{{ old('file') }}" required>
								<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                </div>
                <div class="col-md-6">
                    <label for="rol" class="form-label">Tipo de Museo</label>
                    <div class="form-check">
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Museo Militar</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">Museo de Arte</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">Museo de Historia Natural</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">Museo Arqueologico</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">Museo Historico</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">Museo de Arte Contemporaneo</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">Museo de Arte Colonial</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">Museo Etnografico</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">Museo Maritimo</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">Otros
                        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa el tipo">
                        </label></div> 
                    </div>
                    <script src="./select-multiple.js"></script>
                    <span class="badge text-danger errors-rol"></span>
                </div>
                <div class="col-md-5"> <h6>Propiedad</h6>
                    <label for="ciudad" class="form-label">Tipo de Propíedad</label>
                    <select id="tiene" name="tiene" class="form-select">
                        <option value="">Estatal</option>
                        <option value="no">Privada</option>
                        <option value="no">Comunitaria</option>
                        <option value="no">otro</option>
                    </select>
                </div>
                <div class="col-md-5"><h6>Visita</h6>
                    <label for="ciudad" class="form-label">Tipo de Apertura</label>
                    <select id="tiene" name="tiene" class="form-select">
                        <option value="">Permanente</option>
                        <option value="no">Estacional</option> 
                    </select>
                </div>
                <div class="col-md-8">
                    <label for="password" class="form-label">Horarios de Atencion</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa el horario de atencion">
                    <span  class="badge text-danger errors-password"></span>
                </div>
                    <label for="rol" class="form-label">Dias de Atencion</label>
                    <div class="form-check">
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Lunes</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Martes</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Miercoles</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Jueves</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Viernes</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Sabado</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Domingo</label></div>
                    </div>    
                    <label for="rol" class="form-label">Meses en los que el museo presta Atencion</label>
                    <div class="form-check">
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Enero</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Febrero</label></div>
                        <div> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Marzo</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Abril</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Mayo</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Junio</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Julio</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Agosto</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Septiembre</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Octubre</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Noviembre</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Diciembre</label></div>                   
                    </div>  
            <div class="col-md-8"><h6>Entrada</h6> 
                    <label for="ciudad" class="form-label">El costo de Ingreso es: </label>
                    <select id="tiene" name="tiene" class="form-select">
                        <option value="">De tipo Diferenciado</option>
                        <option value="no">Gratuito</option> 
                    </select>
            </div>
            <div class="col-md-12"> 
            <h6>Servicios y Espacios</h6>     
                <label for="rol" class="form-label">Servicios que Ofrece el Museo</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Estacionamiento</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Servicios Sanitarios</label></div>
                        <div> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Primeros Auxilios</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Wifi Libre</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Museografia Exclusiva</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Guardarropa/Guarda euipaje</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Guia personalizado</label></div>               
                    </div>
                <label for="rol" class="form-label">Espacios que Ofrece el Museo</label>
                    <div class="form-check">
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Areas Verdes/jardines</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Zonas de juego</label></div>
                        <div> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Areas de descanso</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Auditorio</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Laboratotios</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Restaurant/Cafeteria</label></div>
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Biblioteca</label></div>    
                        <div><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Deposito o Bodega</label></div>  
                    </div>                
            
            <div class="col-md-8">
            <h6>Recursos de Comunicacion y Acciones Educativas(Exposiciones)</h6> 
                      
                        <select id="tiene" name="tiene" class="form-select">
                        <option value="">Permanente</option>
                        <option value="no">Temporales</option>
                        <option value="no">Itinirantes</option> 
                        </select>
            </div>
            <div class="col-md-8">
            <h6>Visitantes (Libro de Registro)</h6> 
                        <div class="col-md-5">
                        <select id="tiene" name="tiene" class="form-select">
                        <option value="">SI</option>
                        <option value="no">NO</option>
                        </select>
                        </div>
                    <div class="col-md-8">
                    <label for="ciudad" class="form-label">Numero de total de visitantes por año: </label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa el  numero de visitantes">
                    <span class="badge text-danger errors-ciudad"></span>
                    </div>
            <div class="col-md-8">
                <label for="ciudad" class="form-label"><h6>COLECCIONES(Tipo de coleccion que existen en el museo)</h6></label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Tipo de coleccion">
                <span class="badge text-danger errors-ciudad"></span>
            </div>
            <div class="col-md-8"><h6>Seguridad</h6> 
                    <label for="ciudad" class="form-label">Existe un Sistema de Seguridad</label>
                    <select id="tiene" name="tiene" class="form-select">
                        <option value="">SI</option>
                        <option value="no">NO</option> 
                    </select>
            </div>
            <div class="col-md-8">
                    <label for="ciudad" class="form-label">El museo tiene una linea directa con la policia</label>
                    <select id="tiene" name="tiene" class="form-select">
                        <option value="">SI</option>
                        <option value="no">NO</option> 
                    </select>
            </div>
            <div class="col-md-8"> <h6>Planes de Contingencia</h6>
                <div>
                    <label for="ciudad" class="form-label">Contra inundaciones</label>
                    <select id="tiene" name="tiene" class="form-select">
                        <option value="">SI</option>
                        <option value="no">NO</option> 
                    </select>
                </div>
                <div>
                    <label for="ciudad" class="form-label">Contra terremotos</label>
                    <select id="tiene" name="tiene" class="form-select">
                        <option value="">SI</option>
                        <option value="no">NO</option> 
                    </select>
                </div>
                <div>
                    <label for="ciudad" class="form-label">Contra incendios</label>
                    <select id="tiene" name="tiene" class="form-select">
                        <option value="">SI</option>
                        <option value="no">NO</option> 
                    </select>
                </div>
                <div>
                    <label for="ciudad" class="form-label">En caso de ser SI existen protocolos de respuesta</label>
                    <select id="tiene" name="tiene" class="form-select">
                        <option value="">SI</option>
                        <option value="no">NO</option> 
                    </select>
                </div>
            </div>    
            <div class="col-md-10">
            <h6>Foto Museo</h6>
                <label for="">Imagen</label>
                <input type="file" name="image">
                <button type="submit" class="btn btn-success mt-3">Enviar</button>
                <div class="alert alert-success" style="display: none;">
                </div>
                <div class="col-12">
                    <button type="text" id="btn-enviar" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
        </div>
    </body>
    <script src="{{asset('js/index.js')}}"></script>
    </html>