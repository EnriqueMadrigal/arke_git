
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
                                    
                                  @for ($i = 1; $i <= $herramienta->cantidad; $i++)
                                
                                 
                                <tr>
                                    
                                @if(strcmp($herramienta->getObra($i)->nombre,"Sin Asignar")==0 || strcmp($herramienta->getResponsable($i)->nombre,"Sin Asignar")==0)
                                
                                    
                                <td><font color="#ff0000">{{$i }}</font></td> 
                                <td><font color="#ff0000">{{ $herramienta->getObra($i)->nombre }}</font></td>
                                <td><font color="#ff0000">{{ "{$herramienta->getResponsable($i)->nombre} {$herramienta->getResponsable($i)->apellidos}" }}</font></td>
                                
                             
                              
                            @else     
                         
                                   <td>{{$i }}</td> 
                                <td>{{ $herramienta->getObra($i)->nombre }}</td>
                                <td>{{ "{$herramienta->getResponsable($i)->nombre} {$herramienta->getResponsable($i)->apellidos}" }}</td>
                         
                            
                            
                            @endif     
                            </tr>     
                               
                                @endfor          
                                
                                 </table>
                             
                                
                                </td>
                    
                            </tr>
                            <tr>
                                
                                <td></td>    
                                <td></td>    
                                
                            </tr>
                    @endforeach
                    
                </table>
           
                    
                    
                    
                    
           