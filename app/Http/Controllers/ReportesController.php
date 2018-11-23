<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Herramienta;
use App\Ubicacion_Herramienta;
use App\Usuario;
use App\Obra;
use Mpdf\Mpdf;
use DB;

class ReportesController extends Controller
{
    //
      public function __construct()
    {   
    $this->middleware('auth');
    }
    
    
       public function index(Request $request)
       {
           
         return view('reportes');
          
           
       }
    
    
    public function reporteGeneral(Request $request)
    {
        $herramientas = Herramienta::orderBy('id', 'asc')->get();
        
           
             if ($request->has("orderByClave"))
            {
                $herramientas = Herramienta::orderBy('clave', 'asc')->get();
            }
            
            if ($request->has("orderByDesc"))
            {
                $herramientas = Herramienta::orderBy('desc', 'asc')->get();
            }
                
            if ($request->has("busqueda"))
            {
                
                $Busqueda = $request->get("busqueda");
                $herramientas = Herramienta::where('clave','like',"%".$Busqueda."%")->orderBy('clave', 'asc')->get();
                $herramientas2 = Herramienta::where('desc','like',"%".$Busqueda."%")->orderBy('desc', 'asc')->get();
                        
               $herramientas = $herramientas->merge($herramientas2);
            }
            
           
           
      
            
    return view('reporteGeneral', [
        'herramientas' => $herramientas
    ]);
        
   
    
    }
    
    /////////
    
     public function reporteObra(Request $request)
    {
        $id_obra = 1;
        $order = "id";
           
                   
             if ($request->has("orderByClave"))
            {
                $order = "clave";
                 //$herramientas = Herramienta::orderBy('clave', 'asc')->get();
            }
            
            if ($request->has("orderByDesc"))
            {
                $order = "desc";
            }
                
            
             if ($request->has("id_obra"))
            {
                 $id_obra = $request->get('id_obra');
            }
        
        
             
           if ($request->has("order"))
            {
                 $order = $request->get('order');
            }
        
             
            $obras = Obra::all(['id', 'desc'])->pluck('desc', 'id');
         
           $herramientas = Herramienta::orderBy($order, 'asc')->get();
         
            if ($request->has("requestPdf"))
            {
                ////////// PdF
        $curObra = Obra::find($id_obra);
            $name = $curObra->desc;
            
                $html =  view('reportespdfobra', ['herramientas' => $herramientas,'id_obra'=>$id_obra,'nombre'=>$name]);
            
        $namefile = 'reporte_de_herramientasObra_'.time().'.pdf';
 
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
 
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/fonts',
            ]),
            'fontdata' => $fontData + [
                'arial' => [
                    'R' => 'arial.ttf',
                    'B' => 'arialbd.ttf',
                ],
            ],
            'default_font' => 'arial',
            'default_font_size' => 12,
            // "format" => "A4",
            "format" => "Letter",
            //"format" => [264.8,188.9],
        ]);
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        // dd($mpdf);
           return $mpdf->Output($namefile,"D");
   
                
                //////// Pdf
                 
            }
        
          
           
    return view('reporteObra', [
        'herramientas' => $herramientas, 'id_obra'=>$id_obra, 'obras'=>$obras, 'order'=>$order
        ]);
        
   //return view('debug', ['datos' =>$newCollection]);
    
    }
    
    
    
     public function reporteSinObra(Request $request)
    {
        $order = "id";
           
                   
             if ($request->has("orderByClave"))
            {
                $order = "clave";
                 //$herramientas = Herramienta::orderBy('clave', 'asc')->get();
            }
            
            if ($request->has("orderByDesc"))
            {
                $order = "desc";
                $herramientas = Herramienta::orderBy('desc', 'asc')->get();
            }
          
            
            if ($request->has("order"))
            {
                 $order = $request->get('order');
            }   
            
         
           $herramientas = Herramienta::orderBy($order, 'asc')->get();
         
           if ($request->has("requestPdf"))
            {
                ////////// PdF
            
                $html =  view('reportepdfnoobra', ['herramientas' => $herramientas]);
            
        $namefile = 'reporte_de_herramientasObra_'.time().'.pdf';
 
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
 
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/fonts',
            ]),
            'fontdata' => $fontData + [
                'arial' => [
                    'R' => 'arial.ttf',
                    'B' => 'arialbd.ttf',
                ],
            ],
            'default_font' => 'arial',
            'default_font_size' => 12,
            // "format" => "A4",
            "format" => "Letter",
            //"format" => [264.8,188.9],
        ]);
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        // dd($mpdf);
           return $mpdf->Output($namefile,"D");
   
                
                //////// Pdf
                 
            }
        
          
           
           
           
          
           
    return view('reporteSinObra', [
        'herramientas' => $herramientas,'order'=>$order ]);
        
   //return view('debug', ['datos' =>$newCollection]);
    
    }
    
    
    public function reporteResponsable(Request $request)
    {
        $id_responsable = 1;
        $order = "id";
           
                   
             if ($request->has("orderByClave"))
            {
                $order = "clave";
                 //$herramientas = Herramienta::orderBy('clave', 'asc')->get();
            }
            
            if ($request->has("orderByDesc"))
            {
                $order = "desc";
                $herramientas = Herramienta::orderBy('desc', 'asc')->get();
            }
                
            
             if ($request->has("id_responsable"))
            {
                 $id_responsable = $request->get('id_responsable');
                 
             }
        
                if ($request->has("order"))
            {
                 $order = $request->get('order');
            }   
       
       
            $responsables = Usuario::all(['id', DB::raw("concat(nombre, ' ',apellidos) as full_name")])->pluck('full_name', 'id');
          
      //$responsables = collect(['0' => 'No asignado'] + $responsables->all());
      
           $herramientas = Herramienta::orderBy($order, 'asc')->get();
         
                            
           
            if ($request->has("requestPdf"))
            {
                ////////// PdF
             $curUsuario = Usuario::find($id_responsable);
                $name = $curUsuario->nombre." ".$curUsuario->apellidos;
                $html =  view('reportepdfencargado', ['herramientas' => $herramientas,'id_responsable'=>$id_responsable, 'order'=>$order,'nombre'=>$name]);
               
                
        $namefile = 'reporte_de_herramientasObra_'.time().'.pdf';
 
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
 
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/fonts',
            ]),
            'fontdata' => $fontData + [
                'arial' => [
                    'R' => 'arial.ttf',
                    'B' => 'arialbd.ttf',
                ],
            ],
            'default_font' => 'arial',
            'default_font_size' => 12,
            // "format" => "A4",
            "format" => "Letter",
            //"format" => [264.8,188.9],
        ]);
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        // dd($mpdf);
           return $mpdf->Output($namefile,"D");
   
                
                //////// Pdf
                 
            }
        
           
           
    //  return view('debug', ['datos'=>$newCollection]);             
          
            
    return view('reporteEncargado', [
        'herramientas' => $herramientas, 'id_responsable'=>$id_responsable, 'responsables'=>$responsables, 'order'=>$order
        ]);
    }
    
    
    public function reporteSinResponsable(Request $request)
    {
        $order = "id";
           
                   
             if ($request->has("orderByClave"))
            {
                $order = "clave";
                 //$herramientas = Herramienta::orderBy('clave', 'asc')->get();
            }
            
            if ($request->has("orderByDesc"))
            {
                $order = "desc";
                $herramientas = Herramienta::orderBy('desc', 'asc')->get();
            }
                
          if ($request->has("order"))
            {
                 $order = $request->get('order');
            }
        
       
       
           $herramientas = Herramienta::orderBy($order, 'asc')->get();
         
           
             if ($request->has("requestPdf"))
            {
                ////////// PdF
                 $html =  view('reportepdfnoencargado', ['herramientas' => $herramientas, 'order'=>$order]);
               
                
        $namefile = 'reporte_de_herramientasObra_'.time().'.pdf';
 
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
 
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/fonts',
            ]),
            'fontdata' => $fontData + [
                'arial' => [
                    'R' => 'arial.ttf',
                    'B' => 'arialbd.ttf',
                ],
            ],
            'default_font' => 'arial',
            'default_font_size' => 12,
            // "format" => "A4",
            "format" => "Letter",
            //"format" => [264.8,188.9],
        ]);
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        // dd($mpdf);
           return $mpdf->Output($namefile,"D");
   
                
                //////// Pdf
                 
            }
                            
    //  return view('debug', ['datos'=>$newCollection]);             
          
            
    return view('reporteSinEncargado', [
        'herramientas' => $herramientas,'order'=>$order]);
    }
    
    /////////
       public function generarPDF(Request $request)
       {
           
            $herramientas = Herramienta::orderBy('clave', 'asc')->get();
      
   $html =  view('reportespdf', ['herramientas' => $herramientas]);
            
            
        $namefile = 'reporte_de_herramientas_'.time().'.pdf';
 
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
 
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/fonts',
            ]),
            'fontdata' => $fontData + [
                'arial' => [
                    'R' => 'arial.ttf',
                    'B' => 'arialbd.ttf',
                ],
            ],
            'default_font' => 'arial',
            'default_font_size' => 12,
            // "format" => "A4",
            "format" => "Letter",
            //"format" => [264.8,188.9],
        ]);
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        // dd($mpdf);
           return $mpdf->Output($namefile,"D");
            //$mpdf->Output($namefile,"D");
       
        
           
       }
    
    
    
}
