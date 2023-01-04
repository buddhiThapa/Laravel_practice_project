<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Exports\PHPExcel_Style_Fill;
use Maatwebsite\Excel\Concerns\WithMapping;



class UserExport implements FromCollection,WithHeadings,WithEvents,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function headings():array{
        return[
            'Id',
            'Name',
            'Email',
            'Created_at',
            'Updated_at' 
        ];
    } 

    public function collection()
    {
        $filter_data = User::select('id','name','email','created_at','updated_at');

        if($this->request->alphabet!=''){
            $filter_data->where('name','like',$this->request->alphabet.'%');
        }
        
        $filter_data->where('id','>',1)->get();
        return $filter_data->where('id','>',1)->get();
    }


    public function map($code): array{

        
        return [
            @$code['id'],
            @$code['name'],
            @$code['email'],
            @$code['created_at'],
            @$code['updated_at'],
         ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:M1'; // All headers
                $styleArray = [
                                'font' => [
                                    'bold' => true,
                                ],
                                'alignment' => [
                                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                                ],
                                'borders' => [
                                    'top' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                    ],
                                ],
                                'fill' => [
                                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                                    'rotation' => 90,
                                    'startColor' => [
                                        'argb' => 'FFA0A0A0',
                                    ],
                                    'endColor' => [
                                        'argb' => 'FFFFFFFF',
                                    ],
                                ],
                            ];
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
                // $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
            },     
        ];
    }
}
