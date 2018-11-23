<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ubicacion_Herramienta;
use App\Usuario;

class Herramienta extends Model
{
      protected $table = 'herramientas';
     protected $primaryKey = 'id';
    public $timestamps = true;
    
      protected $fillable = [
        'clave', 'desc','modelo' ,'marca','capacidad','id_estadoequipo','id_tipo','cantidad','costo','supervisor','active'
    ];
      
      
      public function getObra($num)
      {
          $ubicaciones = $this->Ubicaciones();
          
              $emptyObra = new Obra;
              $emptyObra->id=0;
              $emptyObra->nombre = "Sin Asignar";
              $emptyObra->desc = "Sin Asignar";
          
          if (count($ubicaciones)>=1)
          {
         
           $ubicacion = $ubicaciones->where('no_equipo',$num)->orderBy('id', 'desc')->first();
           if ($ubicacion)
           {
              
           $curObra = Obra::find($ubicacion->id_obra);
           
                    if ($curObra) {     
                    return $curObra;
                    }
                    
                    else
                    {
                        return $emptyObra;
                    }
           }
           
          
           else 
           {
              return $emptyObra;
           }
           
          
          }
          else
          {
              return $emptyObra;
               
          }
          
      }
      
      
      public function getUbicacion($num)
      {
             
              
               $ubicaciones = $this->Ubicaciones();
          
            
          if (count($ubicaciones)>=1)
          {
         
           $ubicacion = $ubicaciones->where('no_equipo',$num)->orderBy('id', 'desc')->first();
          
           if ($ubicacion)
           {
               return $ubicacion;
           }
           
           
          }
              
         return NULL;    
              
          
      }
      
      
       public function getResponsable($num)
      {
          $ubicaciones = $this->Ubicaciones();
          
          $emtpyResponsable = new Usuario;
          $emtpyResponsable->id=0;
          $emtpyResponsable->nombre = "Sin Asignar";
          $emtpyResponsable->desc = "Sin Asignar";
          
          
          if (count($ubicaciones)>=1)
          {
            $ubicacion = $ubicaciones->where('no_equipo',$num)->orderBy('id', 'desc')->first();
           
            if ($ubicacion)
            {
              $curUsuarioResponable = Usuario::find($ubicacion->id_responsable);
              if ($curUsuarioResponable) {
             return $curUsuarioResponable;
              }
              else {
                  return $emtpyResponsable;
              }
              
              
            }
            else
            {
             return $emtpyResponsable;
                
            }
            
            
          }
          else
          {
            return $emtpyResponsable;
              
              
          }
          
      }
      
      
      
      public function hasUbicaciones($id_obra)
      {
             $newCollection =  collect([]);
           
            
         
            
         for ($i=1;$i<$this->cantidad;$i++)
                {
             $curUbicacion = $this->getUbicacion($i);
             
                    if ($curUbicacion && $curUbicacion->id_obra == $id_obra)
                    {
                        $newCollection->push($curUbicacion);
                        //continue;
                    }
                            
                    
                }
            
            
          return $newCollection;  
            
          
      }

      
      public function hasNotUbicaciones()
      {
             $newCollection =  collect([]);
              
            
         
            
         for ($i=1;$i<$this->cantidad;$i++)
                {
             $curUbicacion = $this->getUbicacion($i);
             
             if ($curUbicacion == null)
             {
          $emtpyUbicacion = new Ubicacion_Herramienta;
          $emtpyUbicacion->id=0;
          $emtpyUbicacion->nombre = "Sin Asignar";
          $emtpyUbicacion->desc = "Sin Asignar";
          $emtpyUbicacion->no_equipo = $i;
          $emtpyUbicacion->id_obra=0;
          $emtpyUbicacion->id_responsable=0;
          $newCollection->push($emtpyUbicacion);
        continue;
             }
             
            
                    if ($curUbicacion->id_obra == 0)
                    {
                        $newCollection->push($curUbicacion);
                        //continue;
                    }
                            
                    
                }
            
            
          return $newCollection;  
            
          
      }

      
      
 public function hasResponsables($id_responsable)
      {
             $newCollection =  collect([]);
           
            
         
            
         for ($i=1;$i<$this->cantidad;$i++)
                {
             $curUbicacion = $this->getUbicacion($i);
             if ($curUbicacion == null) {continue;}
             
                    if ($curUbicacion->id_responsable == $id_responsable)
                    {
                        $newCollection->push($curUbicacion);
                        //continue;
                    }
                            
            
                }
            
            
          return $newCollection;  
            
          
          
      }
      
public function hasNotResponsables()
      {
             $newCollection =  collect([]);
           
            
         
            
         for ($i=1;$i<$this->cantidad;$i++)
                {
             $curUbicacion = $this->getUbicacion($i);
             if ($curUbicacion == null) {
           $emtpyUbicacion = new Ubicacion_Herramienta;
          $emtpyUbicacion->id=0;
          $emtpyUbicacion->nombre = "Sin Asignar";
          $emtpyUbicacion->desc = "Sin Asignar";
          $emtpyUbicacion->no_equipo = $i;
          $emtpyUbicacion->id_obra=0;
          $emtpyUbicacion->id_responsable=0;
          $newCollection->push($emtpyUbicacion);
            continue;
              
             }
             
                    if ($curUbicacion->id_responsable == 0)
                    {
                        $newCollection->push($curUbicacion);
                        //continue;
                    }
                            
            
                }
            
            
          return $newCollection;  
            
          
          
      }
      


      
      public function obra()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\Obra', 'id', 'id_obra');
       
    }  
      
     
      
      public function Foto()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\Herramienta_Fotos', 'id_herramienta',
                 'id');
       
    }  
 
      public function Mantenimiento()
    {
       // return $this->belongsTo('App\Obra', 'id_obra', 'id');
         return $this->hasOne('App\Mantenimiento', 'id_herramienta',
                 'id');
       
    }  
 
    public function Mantenimientos()
    {
        return $this->hasMany('App\Mantenimiento', 'id_herramienta',
                 'id');
    }
    
    public function Ubicaciones()
    {
        return $this->hasMany('App\Ubicacion_Herramienta', 'id_herramienta',
                 'id');
        
    }
    
   
}

