<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function  index()
    {
        $datos['producto']=Producto::paginate(1);
        return view('producto.index',$datos);
    }

        public function  create()
    {
        return view('producto.crearproducto');
    }

        public function store(Request $request){

            $datosPost = request()->except('_token');

            if($request->hasfile('foto')){

                $datosPost['foto']=$request->file('foto')->store('uploads' , 'public');
            }

            Producto::insert($datosPost);

            //return response()->json($datosPost);
            return redirect('producto')->with('mensaje','Producto añadido');
        }

        public function destroy($id){

            $producto=Producto::findOrFail($id);
            if (Storage::delete('public/'.$producto->foto)){
                Producto::destroy($id);
            }


            return redirect('producto')->with('mensaje','Producto eliminado del carrito');

        }


        public function edit($id){

            $producto=Producto::findOrFail($id);

            return view('producto.edit',compact('producto'));
        }


        public function update(Request $request,$id){
            $datosPost = request()->except('_token','_method');

            if($request->hasfile('foto')){

                $producto=Producto::findOrFail($id);

                Storage::delete(['public/'.$producto->foto]);

                $datosPost['foto']=$request->file('foto')->store('uploads' , 'public');
            }


            Producto::where('id','=',$id)->update($datosPost);
            $producto=Producto::findOrFail($id);
            //return view('post.edit',compact('post'));

            return redirect('producto')->with('mensaje','Post Modificado');

        }
}
