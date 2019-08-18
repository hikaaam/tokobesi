<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
   td{
       font-family: monospace;
       padding: 10px 10px;
       border: 1px solid black;
   }
   th{
       font-family: monospace;
       padding: 10px 10px;
       border: 1px solid black;
       color:white;
       background-color: black;
   }
    </style>
</head>
<body onload="window.print();">
    <h1 style="font-family:monospace;">Laporan Penjualan Toko Besi Mekar Karya</h1>
    <br>
    <h4 style="font-family:monospace;">Tanggal : {{$dari.' - '.$sampai}}</h4>
    <br>
    <table>
            <thead >        
                <th>Nota Penjualan</th>
                <th>Nama Pembeli</th>
                <th>Total Pembelian</th>
                <th>Tanggal Beli</th>
            </thead>
 
        @foreach ($data as $item)
        <tr>
            
            <td>{{$item->nota}}</td>
            <td>{{$item->pelanggan}}</td>
            <td>{{$item->total}}</td>
            <td>{{$item->created_at->format('d M Y')}}</td>
        </tr>
        @endforeach
    </tbody>
        </table>
</body>
</html>