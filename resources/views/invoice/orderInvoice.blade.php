<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice Order# {{ $order->id }}</title>

    <link rel="stylesheet" href="{{ asset('app-assets/css/bootstrap.min.css') }}">

    <style>
        body {
            background: #fff none;
            font-size: 12px;
        }

        h2 {
            font-size: 28px;
            color: #ccc;
        }

        .container {
            padding-top: 30px;
        }

        .invoice-head td {
            padding: 0 8px;
        }

        .table th {
            vertical-align: bottom;
            font-weight: bold;
            padding: 8px;
            line-height: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table tr.row td {
            border-bottom: 1px solid #ddd;
        }

        .table td {
            padding: 8px;
            line-height: 20px;
            text-align: left;
            vertical-align: top;
        }


        .table td, .table th {
            border-top: 1px solid #00000014;
        }

    </style>
</head>
<body>
<div class="container">

    <table style="margin-left: auto; margin-right: auto;" width="1020">
        <tr>
            <td style="padding-top:0px;">
                <strong>{{ conf('title') }}</strong>
            </td>

            <!-- Organization Name / Image -->

            <td align="right">

              <strong>To:</strong> {{ $order->saleman->name }}
              <br>
              <strong>Date:</strong> {{ $order->date->format('M d,Y') }} &nbsp
            </td>
        </tr>

        <tr valign="top" >
            <!-- Organization Details -->

            <td colspan="2">




                <!-- Invoice Table -->
                <table width="100%" class="table mt-2" border="0">
                    <tr>
                        <th width="70%">Product</th>

                        <th width="10%">Quantity</th>
                        <th class="text-right">Price</th>
                    </tr>

                    <!-- Display The Invoice Items -->

                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td class="text-right">{{ $item->quantity * $item->salePrice }}</td>
                        </tr>
                    @endforeach


                    <tr>
                        <td colspan="2" class="text-right">
                            <strong>Total</strong>
                        </td>
                        <td  class="text-right">
                            <strong>
                              {{ $order->totalAmount() }}
                            </strong>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
        window.onafterprint = window.close;
        window.print();
     </script>
</body>
</html>
