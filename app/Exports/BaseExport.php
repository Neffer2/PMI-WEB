<?php

namespace App\Exports;

use App\Models\EjecucionActividad;
use App\Models\Gifu;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\Punto;
use App\Models\User;
use App\Models\Ciudad;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BaseExport implements FromView, WithMultipleSheets 
{
    protected $vistas = ['EjecucionActividad', 'VentasAbordaje', 'Ventas', 'Gifus', 'Productos', 'Puntos', 'Usuarios', 'Ciudades'], $vista;

    public function __construct(string $vista)
    {
        $this->vista = $vista;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {   
        if ($this->vista == "EjecucionActividad" || $this->vista == "VentasAbordaje"){
            $data = EjecucionActividad::all();
        }elseif ($this->vista == "Gifus"){
            $data = Gifu::all();
        }elseif ($this->vista == "Ventas"){
            $data = Venta::all();
        }elseif ($this->vista == "Productos"){
            $data = Producto::all();
        }elseif ($this->vista == "Puntos"){
            $data = Punto::all();
        }elseif ($this->vista == "Usuarios"){
            $data = User::all();
        }elseif ($this->vista = "Ciudades") {
            $data = Ciudad::all(); 
        }

        return view("exports.{$this->vista}", ['data' => $data]);
    }

    public function sheets(): array
    {
        $sheets = [];
        for ($cont = 0; $cont <= count($this->vistas)-1; $cont++) {
            $sheets[] = new BaseExport($this->vistas[$cont]);
        }

        return $sheets;
    }
}    

