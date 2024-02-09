<?php

namespace App\Livewire\Modulos;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\EjecucionActividad;
use App\Models\Gifu;
use App\Models\ProductoCiudad;
use Illuminate\Support\Facades\Auth;

class VentasAbordaje extends Component
{
    // Models ventas
    public $abordados, $interes_inicial, $interes_final, $presentacion, $genero, $edad, $cantidad, $preventa_iluma,
            $gusto_marca, $gusto_marca_otro,
            $gusto_marca_competencia, $gusto_marca_competencia_otro,
            $mesaje_dispositivos_entregado, $marca_mesaje_dispositivos,
            $mesaje_cigarrillos_entregado, $marca_mesaje_cigarrillos,
            $intervencion_alternativas_libres_humo, $intervencion_diferencia_fumar;

    // Models gifus
    public $producto_gifu, $genero_gifu, $edad_gifu;

    // Useful vars
    public $ventas = [], $gifus = [], $combustibles = [], $combustiblesCompetencia = [], $dispositivos = [], $ejecucion;

    // Filled
    public $ejecucion_id;

    public function render()
    {
        $this->getVentas();
        $this->getGifus();
        return view('livewire.modulos.ventas-abordaje');
    }

    public function mount(){
        $this->getEjecucion(); 
        $this->getCombustibles();
        $this->getDispositivos();
    }

    public function getCombustibles(){ 
        $this->combustibles = ProductoCiudad::where('ciudad_id', Auth::user()->ciudad_id)->get();
        $this->combustiblesCompetencia = Producto::select('id', 'descripcion', 'competencia')->where([
            ['tipo', 1],
            ['competencia', 1],
        ])->get();
    } 

    public function getDispositivos(){
        $this->dispositivos = Producto::select('id', 'descripcion', 'competencia')->where('tipo', 0)->get();
    }

    public function getVentas(){
        $this->ventas = Venta::where('ventas_abordaje_id', $this->ejecucion->abordaje->id)->get();
    }

    public function getGifus(){
        $this->gifus = Gifu::where('ventas_abordaje_id', $this->ejecucion->abordaje->id)->get();
    }

    public function getEjecucion(){
        $this->ejecucion = EjecucionActividad::find($this->ejecucion_id);
    }

    public function addAbordado(){
        $this->abordados += 1;
        $this->updatedAbordados();
    }

    public function subsAbordado(){
        $this->abordados -= 1;
        $this->updatedAbordados(); 
    }

    public function storeVentasAbordaje(){
        $this->validate([
            'abordados' => 'required|min:1'
        ]);

        $VentaAbordaje =  $this->ejecucion->abordaje;
        $VentaAbordaje->num_abrodadas = $this->abordados;
        $VentaAbordaje->preventa_iluma = 0; 
        // $VentaAbordaje->preventa_iluma = $this->preventa_iluma; 
        $VentaAbordaje->estado = 1;

        if ($VentaAbordaje->update()){
            return redirect()->route('home')->with('success', 'Ventas ejecución enviado');
        }
    }

    public function storeVenta(){
        $this->validate([
            'interes_inicial' => 'required|numeric', 
            'interes_final' => 'required|numeric',
            'presentacion' => 'required|string',
            'genero' => 'required|string',
            'edad' => 'required|string',
            'cantidad' => 'required|numeric|min:0',
            'intervencion_alternativas_libres_humo' => 'required',
            'intervencion_diferencia_fumar' => 'required'
        ]);

        if (is_null($this->gusto_marca) && is_null($this->gusto_marca_competencia)){
            $this->validate([
                'gusto_marca' => 'required|message: Debes rellenar todos los campos.'
            ]);
        }

        if ($this->gusto_marca == "Otro"){
            $this->validate([
                'gusto_marca_otro' => 'required|string|max:500'
            ]);
        }

        if ($this->gusto_marca_competencia == "Otro"){
            $this->validate([
                'gusto_marca_competencia_otro' => 'required|string|max:500'
            ]);
        }

        $this->validate([
            'mesaje_dispositivos_entregado' => 'required|string'
        ]);

        if ($this->mesaje_dispositivos_entregado){
            $this->validate([
                'marca_mesaje_dispositivos' => 'required'
            ]);
        }

        $this->validate([
            'mesaje_cigarrillos_entregado' => 'required|string'
        ]);

        if ($this->mesaje_cigarrillos_entregado){
            $this->validate([
                'marca_mesaje_cigarrillos' => 'required'
            ]);
        }

        $venta = new Venta;
        $venta->ventas_abordaje_id = $this->ejecucion->abordaje->id;
        $venta->interes_inicial = $this->interes_inicial;
        $venta->interes_final = $this->interes_final;
        $venta->presentacion = $this->presentacion;
        $venta->genero = $this->genero;
        $venta->edad = $this->edad;
        $venta->cantidad = $this->cantidad;

        $venta->gusto_marca = $this->gusto_marca;
        $venta->razon_gusto_marca = $this->gusto_marca_otro;
        $venta->gusto_marca_competencia = $this->gusto_marca_competencia;
        $venta->razon_gusto_marca_competencia = $this->gusto_marca_competencia_otro;
        $venta->mesaje_dispositivos_entregado = $this->mesaje_dispositivos_entregado;
        $venta->marca_mesaje_dispositivos = $this->marca_mesaje_dispositivos;
        $venta->mesaje_cigarrillos_entregado = $this->mesaje_cigarrillos_entregado;
        $venta->marca_mesaje_cigarrillos = $this->marca_mesaje_cigarrillos;
        $venta->intervencion_alternativas_libres_humo = $this->intervencion_alternativas_libres_humo;
        $venta->intervencion_diferencia_fumar = $this->intervencion_diferencia_fumar;

        if ($venta->save()){
            $this->resetVentas();
        }
    }

    public function storeGifu(){
        $this->validate([
            'producto_gifu' => 'required|numeric', 
            'genero_gifu' => 'required|string',
            'edad_gifu' => 'required|string',
        ]);

        $gifu = new Gifu;
        $gifu->ventas_abordaje_id = $this->ejecucion->abordaje->id;
        $gifu->producto_id = $this->producto_gifu;
        $gifu->genero = $this->genero_gifu;
        $gifu->edad = $this->edad_gifu;

        if ($gifu->save()){
            $this->resetGifus();
        }
    }

    public function deleteVenta($id){ 
        $venta = Venta::find($id);
        $venta->delete();
    }

    public function deleteGifu($id){
        $gifu = Gifu::find($id);
        $gifu->delete();
    }
    
    public function resetVentas(){
        $this->reset(
            'interes_inicial', 
            'interes_final',
            'presentacion',
            'genero',
            'edad',
            'cantidad',
            'gusto_marca',
            'gusto_marca_otro',
            'gusto_marca_competencia',
            'gusto_marca_competencia_otro',
            'mesaje_dispositivos_entregado',
            'marca_mesaje_dispositivos',
            'mesaje_cigarrillos_entregado',
            'marca_mesaje_cigarrillos',
            'intervencion_alternativas_libres_humo',
            'intervencion_diferencia_fumar'
        );

    }

    public function resetGifus(){
        $this->reset(
            'producto_gifu', 
            'genero_gifu',
            'edad_gifu'
        );
    }

    // UPDATES 
    public function updatedCantidad(){
        if ($this->cantidad < 0){
            $this->cantidad = 0;
        }
    } 

    public function updatedAbordados(){
        $this->validate([
            'abordados' => 'required|min:1'
        ]);

        if ($this->abordados <= 0){
            $this->abordados = null;
        }
    }

    public function updatedGustoMarca(){
        $this->reset('gusto_marca_competencia_otro');
    }

    public function updatedGustoMarcaCompetenciaOtro(){
        $this->reset('gusto_marca');
    }

    public function updatedMesajeDispositivosEntregado(){
        if (!($this->mesaje_dispositivos_entregado)){
            $this->reset('marca_mesaje_dispositivos');
        }
    }

    public function updatedMesajeCigarrillosEntregado(){
        if (!($this->mesaje_cigarrillos_entregado)){
            $this->reset('marca_mesaje_cigarrillos');
        }
    }
}
  