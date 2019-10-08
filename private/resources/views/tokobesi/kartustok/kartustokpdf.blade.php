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
<body style="margin-left: auto; margin-right: auto; width:35em" onload="window.print();">
    <h1 style="font-family:monospace;">Kartu Stok Toko Besi Mekar Jaya</h1>
    <hr>
    <br>
    <h4 style="font-family:monospace;">Tanggal : {{date('M, d Y')}}</h4>
    <br>
    <table style="width:100%">
            <thead >        
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </thead>
 
    
        <tr>
            
            <td>{{$data->nama}}</td>
            <td>{{$jumlah}}</td>
            <td>{{$data->created_at->format('d M Y')}}</td>
        </tr>
    
    </tbody>
        </table>
       
           <p>
              keterangan : {{$keterangan}}
           </p>
       
</body>
</html>