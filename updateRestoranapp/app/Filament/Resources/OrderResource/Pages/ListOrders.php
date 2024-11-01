<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),  // Tombol New 
            Actions\Action::make('cetak_laporan') 
            ->label('Laporan Pendapatan')
            ->icon('heroicon-o-printer') 
            ->action(fn() => static::cetakLaporan()) // memanggil fungsi mencetak laporan
            ->requiresConfirmation() 
            ->modalHeading('Laporan Total Pendapatan Harian') 
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'), 
        ];
    }
    public static function cetakLaporan() 
    { 
        // Ambil data total pendapatan harian dan jumlah pesanan per tanggal
        $data = DB::table('orders')
            ->select(DB::raw('DATE(order_date) as tanggal, SUM(quantity * price) as total_pendapatan, COUNT(*) as total_pesanan'))
            ->join('menus', 'orders.menu_id', '=', 'menus.id')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();
    
        // Load view untuk cetak PDF 
        $pdf = \PDF::loadView('laporan.pendapatan', ['data' => $data]); 
    
        // Unduh file PDF 
        return response()->stream(
            fn() => print($pdf->output()), 
            200, 
            ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'attachment; filename="laporan_pendapatan_harian.pdf"']
        );
    }    
}
