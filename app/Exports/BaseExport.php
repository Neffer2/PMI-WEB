<?php

namespace App\Exports;

use App\Models\EjecucionActividad;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BaseExport implements FromView, WithColumnFormatting, WithMultipleSheets 
{
    protected $vistas = ['EjecucionActividad', 'VentasAbordaje'], $vista;

    public function __construct(string $vista)
    {
        $this->vista = $vista;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {   
        $ejecuciones = EjecucionActividad::all();
        return view("exports.{$this->vista}", ['ejecuciones' => $ejecuciones]);
    }

    public function sheets(): array
    {
        $sheets = [];
        for ($cont = 0; $cont <= count($this->vistas)-1; $cont++) {
            $sheets[] = new BaseExport($this->vistas[$cont]);
        }

        return $sheets;
    }

    public function columnFormats(): array 
    {
        return [
            // 'I' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
            'K' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'L' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'M' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'N' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'P' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}    

