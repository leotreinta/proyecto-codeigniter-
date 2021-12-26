<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\libro;
class Libros extends Controller{

    public function index(){
        $libro= new libro();
        $datos['libros']= $libro->orderBy('id','ASC')->findAll();
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view('libros/lista', $datos);
    }
    public function crear(){
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('libros/crear',$datos);
    }

    public function guardar(){
       $libro= new libro();
     
      
            
            if($imagen=$this->request->getfile('imagen')){
                $nuevoNombre=$imagen->getRandomName();
                $imagen->move('../public/uploads/', $nuevoNombre);
                        $datos=[
                            'nombre'=>$this->request->getvar('nombre'),
                            'imagen'=>$nuevoNombre
                        ];

                        $libro->insert($datos);

                        
            }
            return $this->response->redirect(site_url('/lista'));


    }
    public function borrar ($id=null){
        $libro= new libro();

        $datosLibro=$libro->where('id',$id)->first();
        
        $ruta=('../public/uploads/'.$datosLibro['imagen']);
        unlink($ruta); 

        $libro->where('id',$id)->delete($id);


        return $this->response->redirect(site_url('/lista'));

        

    }
 }
