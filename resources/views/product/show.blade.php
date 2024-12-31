<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products - {{ $artCode }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .appbar {
            background-color: #FFA500;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .appbar a {
            color: black;
            text-decoration: none;
            margin: 0 15px;
            background-color: #FFD700;
            padding: 10px 20px;
            border-radius: 4px;
        }

        .appbar a:hover {
            background-color: #FFC107;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .action-buttons a,
        .action-buttons button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .action-buttons a:hover,
        .action-buttons button:hover {
            background-color: #45a049;
        }

        /* Responsive Table */
        @media (max-width: 768px) {
            table {
                width: 100%;
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th,
            td {
                display: inline-block;
                text-align: center;
                min-width: 100px;
            }
        }
    </style>
</head>

<body>
    <div class="appbar">
        <a href="{{ route('home') }}">Pharmacy Stock</a>
        <a href="{{ route('art_codes.create') }}">Art Codes</a>
        <a href="{{ route('product.create') }}">Products</a>
    </div>

    @if (session('success'))
        <div id="success-message" style="color: green; background-color: #d4edda; padding: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <script>
        // Hapus pesan sukses setelah 5 detik
        setTimeout(() => {
            const message = document.getElementById('success-message');
            if (message) {
                message.style.display = 'none';
            }
        }, 5000);
    </script>

    <div class="container">
        <h1>Products for Art Code: {{ $artCode }}</h1>
        {{-- <form method="GET" action="{{ route('products.show') }}"
            style="display: flex; gap: 10px; margin-bottom: 20px;">

            <a href="{{ route('export.pdf', request()->all()) }}"
                style="background-color: #FF5722; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px;">Export
                PDF</a>
        </form> --}}

        <table>
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
                    <th>Actions</th> <!-- New column for Edit/Delete -->
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
                        <td class="action-buttons">
                            <!-- Edit and Delete actions -->
                            <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
