<?php

namespace App\Exports;
use App\Invoice;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class getExport implements FromCollection , WithMapping,WithHeadings, ShouldAutoSize, WithEvents
{

    public function __construct($id)
    {
        $this->invoice_id = $id;
    }
    public function collection()
    {


        $Invoice = Invoice::where('invoices.id', $this->invoice_id)
                ->join('addresses', 'invoices.address_id', '=', 'addresses.id')
                ->join('users', 'invoices.user_id', '=', 'users.id')
                ->join('orders', 'invoices.id', '=', 'orders.invoice_id')
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->select('invoices.id','invoices.created_at','addresses.firstname',
                         'addresses.lastname', 'addresses.adress1', 'addresses.adress2',
                         'addresses.adress3','addresses.phonenumber','users.name as username',
                         'orders.product_id','orders.qty','products.name')
                         ->get();
              
                return $Invoice;

    }
    public function map($farm): array
   {
        return [
            $farm->id,
            $farm->created_at,
            $farm->username,
            $farm->firstname.' '.$farm->lastname.' '.$farm->adress2.' '.
            $farm->adress3.' '.$farm->adress1.' โทร '.$farm->phonenumber,
            $farm->name,
            $farm->qty


        ];
    }
    public function headings(): array
    {
        return [
            'รหัสการซื้อ',
            'วันที่สั่งซื้อ',
            'ชื่อผู้สั่ง',
            'ที่อยู่จัดส่ง',
            'รายการสินค้า',
            'จำนวน',


        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:D1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);


            },
        ];
    }
}
