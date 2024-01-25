<?php

namespace App\Livewire\Modulos;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\VentaAbordaje;
use App\Models\EjecucionActividad;
use App\Models\Gifu;

class VentasAbordaje extends Component
{
    // Models ventas
    public $abordados, $interes_inicial, $interes_final, $presentacion, $genero, $edad, $cantidad;

    // Models gifus
    public $producto_gifu, $genero_gifu, $edad_gifu;

    // Useful vars
    public $ventas = [], $gifus = [], $combustibles = [], $dispositivos = [], $ejecucion;

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
        if (!($this->ejecucion->abordaje)){
            $VentaAbordaje = new VentaAbordaje;
            $VentaAbordaje->ejecucion_id = $this->ejecucion->id;
            $VentaAbordaje->save();
        }
    }

    public function getCombustibles(){
        $this->combustibles = Producto::select('id', 'descripcion')->where('tipo', 1)->get();
    }

    public function getDispositivos(){
        $this->dispositivos = Producto::select('id', 'descripcion')->where('tipo', 0)->get();
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
    
    public function storeVenta(){
        $this->validate([
            'interes_inicial' => 'required|numeric', 
            'interes_final' => 'required|numeric',
            'presentacion' => 'required|string',
            'genero' => 'required|string',
            'edad' => 'required|string',
            'cantidad' => 'required|numeric',
        ]);

        $venta = new Venta;
        $venta->ventas_abordaje_id = $this->ejecucion->abordaje->id;
        $venta->interes_inicial = $this->interes_inicial;
        $venta->interes_final = $this->interes_final;
        $venta->presentacion = $this->presentacion;
        $venta->genero = $this->genero;
        $venta->edad = $this->edad;
        $venta->cantidad = $this->cantidad;

        $venta->gusto_marca = 1;
        $venta->razon_gusto_marca = 1;

        $venta->gusto_marca_competencia = 1;
        $venta->razon_gusto_marca_competencia = 1;

        $venta->mesaje_dispositivos_entregado = 1;
        $venta->marca_mesaje_dispositivos = 1;

        $venta->mesaje_cigarrillos_entregado = 1;
        $venta->marca_mesaje_cigarrillos = 1;

        $venta->intervencion_alternativas_libres_humo = 1;
        $venta->intervencion_diferencia_fumar = 1;

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
            'cantidad'
        );
    }

    public function resetGifus(){
        $this->reset(
            'producto_gifu', 
            'genero_gifu',
            'edad_gifu'
        );
    }
}
  