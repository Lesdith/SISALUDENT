<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Presupuesto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
     <style>
        body {
            /* Set "my-sec-counter" to 0 */
            counter-reset: my-sec-counter;
        }
        u::before {
            /* Increment "my-sec-counter" by 1 */
            counter-increment: my-sec-counter;
            content: counter(my-sec-counter);
        }
        .header{background:#eee;color:#444;border-bottom:1px solid #ddd;padding:10px;}
        .client-detail{background:#ddd;padding:10px;}
        .client-detail th{text-align:left;}
        .items{border-spacing:0;}
        /* .items thead{background:#ddd;}
        .items tbody{background:#eee;}
        .items tfoot{background:#ddd;}*/
        .items th{padding:10px;}
        .items td{padding:10px;} 
        h1 small{display:block;font-size:16px;color:#888;}
        .text-left{text-align:left;}
        table{width:100%;}
        .text-right{text-align:right;}
        
    </style>
</head>
<body>
   <div class="container">
   <div >
        <div class="col-md-6" >
            <h1>
                Clinica Salud Dental
            </h1>
            <p>
                <h3>Dra. Sonia Rosina Olavarrueth</h3> <small>Teléfono: 7947-7648</small> --
                <small class="text-left">Email: dra.olavarrueth@gmail.com</small>
            </p>
        </div>
        <div class="col-md-6" align="right">
            <h4>Presupuesto de Plan de Tratamiento # {{ str_pad ($plan->id, 7, '0', STR_PAD_LEFT) }}</h4>
        </div>
    </div>
    <div class="well well-sm">
        <table class="client-detail">
            <tr>
                <th style="width:100px;">Paciente</th>
                <td>{{$plan->patient->names}} {{$plan->patient->surnames}}</td>
                <th style="width:150px;">Fecha de emisión</th>
                <td>{{\Carbon\Carbon::parse($plan->date)->format('d/m/Y')}}</td>
            </tr>
        
        </table>
    </div>
    <hr />
    <table class="items">
        <thead>
        <tr>
            <th style="width:10px;">#</th>
            <th class="text-left" style="width:100px;">Diente</th>
            <th class="text-right" style="width:100px;">Diagnostico</th>
            <th class="text-right" style="width:100px;">Tratamiento</th>
            <th class="text-right" style="width:100px;">precio</th>
            <th class="text-right" style="width:100px;">Descripción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($plan->detail_treatment_plans as $detail)
            
        <tr>
            <td><u></u></td>
            <td class="text-right" >{{$detail->tooth->name}} {{$detail->tooth->tooth_type->name}} {{$detail->tooth->tooth_stage->name}} {{$detail->tooth->tooth_position->name}}</td>
            <td class="text-right">{{$detail->diagnosis->name}}</td>
            <td class="text-right">{{$detail->tooth_treatment->name}}</td>
            <td class="text-right">Q. {{$detail->cost}}</td>
            <td class="text-right">{{$detail->description}}</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>Subtotal</b></td>
            <td class="text-right">Q. {{$plan->subtotal}}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Descuento</b></td>
            <td class="text-right">Q. {{$plan->discount}}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Total</b></td>
            <td class="text-right">Q. {{$plan->total}}</td>
        </tr>
        </tfoot>
    </table>

    </div>
    
</body>
</html>
