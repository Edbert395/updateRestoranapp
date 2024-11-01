<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Laporan Total Pendapatan Harian</title> 
    <style> 
        body { font-family: Arial, sans-serif; } 
        table { width: 100%; border-collapse: collapse; } 
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; } 
    </style> 
</head> 
<body> 
    <h2>Total Pendapatan Harian</h2> 
    <table> 
        <thead> 
            <tr> 
                <th>Tanggal</th>
                <th>Total Pendapatan</th>
                <th>Total Pesanan</th>
            </tr> 
        </thead> 
        <tbody> 
            @foreach($data as $order)
            <tr>
                <td>{{ $order->tanggal }}</td>
                <td>{{ number_format($order->total_pendapatan, 2) }}</td>
                <td>{{ $order->total_pesanan }}</td>
            </tr>
            @endforeach
        </tbody> 
    </table> 
</body> 
</html>