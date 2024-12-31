<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Stock Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            /* Default left alignment for both tables */
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: right;
        }

        /* Page Setup for PDF */
        @page {
            size: A4;
            margin: 10mm;
        }

        /* Prevent text overflow */
        table {
            table-layout: fixed;
        }

        th,
        td {
            word-wrap: break-word;
        }

        /* Center align td for the product table only */
        table.product-table tbody td {
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="2">
                    <img src="{{ asset('storage/images/header-image.jpeg') }}" alt="Header Image"
                        style="width: 100px; height: auto;">
                </th>
                <th colspan="2">
                    <h1>Pharmacy Stock Card</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Site Code:</strong></td>
                <td>{{ $siteCode }}</td>
                <td><strong>Art Code:</strong></td>
                <td>{{ $artCode->art_code }}</td>
            </tr>
            <tr>
                <td><strong>Site Name:</strong></td>
                <td colspan="3">{{ $siteName }}</td>
            </tr>
            <tr>
                <td><strong>RSP:</strong></td>
                <td colspan="3">{{ $artCode->rsp }}</td>
            </tr>
            <tr>
                <td><strong>Q sell suggest:</strong></td>
                <td colspan="3">{{ $artCode->q_sell_suggest }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Add a class for the second table to target its cells separately -->
    <table class="product-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Qty IN</th>
                <th>Qty OUT</th>
                <th>Sisa</th>
                <th>Exp/Batch</th>
                <th>PBF</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($product->date)->translatedFormat('j F Y') }}</td>
                    <td>{{ $product->product }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->qty_in }}</td>
                    <td>{{ $product->qty_out }}</td>
                    <td>{{ $product->sisa }}</td>
                    <td>{{ $product->exp_batch }}</td>
                    <td>{{ $product->pbf }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Generated on {{ now()->format('d-m-Y H:i:s') }}</p>
    </div>
</body>

</html>
