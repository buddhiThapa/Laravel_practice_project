<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection,WithHeadings
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
            'City',
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
        // if ($this->request->start_date!='') {
        //     $filter_data->where('created_at','>',date('Y-m-d h:i:s' ,strtotime($this->request->start_data)));
        // }
        // if ($this->request->end_date!='') {
        //     $filter_data->where('created_at','<',date('Y-m-d h:i:s' ,strtotime($this->request->end_data)));
        // }
        
        $filter_data->where('id','>',1)->get();
        return $filter_data->where('id','>',1)->get();
    }
}
