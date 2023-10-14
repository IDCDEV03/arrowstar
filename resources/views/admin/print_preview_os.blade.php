<!-- resources/views/print_preview.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>พิมพ์โปรแกรมทัวร์ : ArrowStar Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script>
        window.print();
    </script>

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }

        .header,
        .header-space,
        .footer,
        .footer-space {
            height: 80px;
        }

        .header {
            position: fixed;
            top: 0;
        }

        .footer {
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>


    <table class="table">
        <thead>
            <tr>
                <td colspan="2">
                    <div class="header-space">
                        <img class="mb-5" src="{{ asset('assets/images/logo1.png') }}" width="80px"> &nbsp;
                        <label style="font-size: 12pt"><strong>ArrowStar Travel</strong> 
                   <br>
                            211/10 หมู่4 ต.หนองขอนกว้าง อ.เมือง จ.อุดรธานี 41000 &nbsp; โทร. 062-1481969
                            <br>
                            www.arrowstartravel114.com / Email: arrowstartravel114@gmail.com 
                        </label>
                    </div>
                </td>
            </tr>
        </thead>
        <tbody>
            <div class="content">
                <tr>
                    <td colspan="2">
                        @foreach ($pk_news as $row)
                            <span style="font-size: 20pt"><strong> {{ $row->package_name }} </strong></span>
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div class="row">
                            @foreach ($img_data as $img)
                                <div class="col-sm-3">
                                    <img src="{{ asset($img->travel_os_img) }}" class="img-thumbnail">
                                </div>
                            @endforeach
                        </div>
                    </td>
                </tr>

           
              
                    @foreach ($pk_news as $row)
                     @if ($row->program_remark != "")
                     <tr>
                     <td colspan="4" class="table-warning"><strong>*{{$row->program_remark}}</strong>
                     </td>
                    </tr>      
                     @endif
                    @endforeach
                    <tr>
                        <td colspan="4" class="table-primary"><strong>การเดินทาง</strong>
                        </td>
                       </tr>                    
        

                @foreach ($program_day_dt as $row)
                    <tr>
                        <td colspan="2" class="table-primary"><strong> วันที่ {{ $row->pk_day }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">{{  $row->pk_detail }}</td>

                    </tr>                    
                @endforeach

                <tr>
                    <td colspan="2" class="table-primary"><strong> ข้อมูลท่องเที่ยว</strong>
                    </td>
                </tr>
                @foreach ($print_data as $item)
                 
                <tr>
                    <td style="width:20%" ><span style="font-size: 12pt">
                         วันที่ {{ $item->program_day_count }}
                        {{ $item->travel_name }}</span></td>
                    <td colspan="2"><span style="font-size: 12pt">{{ $item->travel_detail }}</span></td>
                </tr>
            @endforeach



                @foreach ($single_data as $item)
                    <tr>
                        <td style="width:20%" class="table-success">
                            <span style="color:green;font-size: 14pt"><strong> ราคารวม </strong></span>
                        </td>
                        <td><span style="color:green;font-size: 12pt">{!!  $item->price_total !!}</span></td>

                    </tr>
                    <tr>
                        <td style="width:20%" class="table-danger">
                            <span style="color: brown"><strong> ราคาไม่รวม </strong></span>
                        </td>
                        <td><span style="color:brown;font-size: 12pt">{!! $item->price_notin !!}</span></td>

                    </tr>
                    @if ($item->program_spacial_req != '')
                        <tr>
                            <td style="width:20%" class="table-primary">
                                ความต้องการพิเศษ
                            </td>
                            <td>{{ $item->program_spacial_req }}</td>

                        </tr>
                    @endif
                    @if ($item->program_tips != '')
                        <tr>
                            <td style="width:20%" class="table-primary">
                                Tips
                            </td>
                            <td>{{ $item->program_tips }}</td>
                        </tr>
                    @endif
                @endforeach
            </div>
        </tbody>

    </table>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
