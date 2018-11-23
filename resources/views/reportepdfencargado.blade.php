
<h1>Reporte de herramientas por Encargado</h1>
<h2>{{$nombre}}</h2>



                    <table width="600">

                    <!-- Table Headings -->
                    <thead>
                        <tr align="right">
                       <th width="10%">Clave</th>
                        <th width="90%">Descripción</th>
                        </tr>
     
                    </thead>

                    <!-- Table Body -->
                     @foreach ($herramientas as $herramienta)
                       @php
                         $curUbicaciones = $herramienta->hasResponsables($id_responsable);
                         if (count($curUbicaciones) == 0){
                         continue;
                         }
                         @endphp
                     
                            <tr align="right">
                                <!-- Task Name -->
                                
                                <td valign="top">
                                   
                                    {{ $herramienta->clave }} 
                                  
                                </td>

                                
                                <td valign="top">
                                    
                                   
                                    {{ $herramienta->desc }}
                                   
                                    <br>
                                    
                                        <table>
                                     <!-- Table Headings -->
                                     <thead>
                                    <tr align="right">
                                    <th width="10%">#</th>
                                    <th width="40%">Ubicación</th>
                                    <th width="40%">Responsable</th>
                                    </tr>
                                  </thead> 
                       
                                  @foreach ($curUbicaciones as $ubicacion)
                                 
                               
                                    
                              @if(strcmp($ubicacion->obra->nombre,"Sin Asignar")==0 || strcmp($ubicacion->obra->desc,"Sin Asignar")==0)
                                
                               <tr class="bg-danger">
                              @else
                               <tr>
                              @endif
                              
                                    
                                <td><font color="#000000">{{$ubicacion->no_equipo }}</font></td> 
                                
                                 @if($ubicacion->obra)
                                <td><font color="#000000">{{ $ubicacion->obra->nombre }}</font></td>
                                @else
                                <td><font color="#ff0000">Sin Asignar</font></td>
                                @endif
                                
                                
                                @if($ubicacion->responsable)
                                <td><font color="#000000">{{ "{$ubicacion->responsable->nombre} {$ubicacion->responsable->apellidos}"}}</font></td>
                               @else
                                <td><font color="#ff0000">Sin Asignar</font></td>
                                @endif
                           
                              
                                 </tr>     
                               
                                @endforeach          
                                
                                 </table>
                             
                                
                                </td>
                    
                            </tr>
                            <tr>
                                
                                <td></td>    
                                <td></td>    
                                
                            </tr>
                    @endforeach
                    
                </table>
           
                    
                    
                    
                    
           