<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Stock</title>
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
            flex-wrap: wrap;
        }

        .appbar a {
            color: black;
            text-decoration: none;
            margin: 0 15px;
            background-color: #FFD700;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s;
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

        a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }

        a:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            text-align: center;
        }

        td {
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .actions a,
        .actions button {
            padding: 8px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .actions a:hover,
        .actions button:hover {
            background-color: #0056b3;
        }

        .actions button {
            background-color: #dc3545;
            border: none;
        }

        .actions button:hover {
            background-color: #c82333;
        }

        .product-view-btn {
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .product-view-btn:hover {
            background-color: #218838;
        }

        /* Responsiveness */
        @media screen and (max-width: 768px) {
            .appbar a {
                margin: 5px 10px;
                font-size: 14px;
                padding: 8px 16px;
            }

            .container {
                width: 95%;
                padding: 15px;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th,
            td {
                padding: 8px;
                font-size: 14px;
            }

            .actions {
                flex-direction: column;
            }

            .actions a,
            .actions button {
                margin: 5px 0;
            }
        }

        @media screen and (max-width: 480px) {
            h1 {
                font-size: 18px;
            }

            table {
                font-size: 12px;
            }

            .actions a,
            .actions button {
                padding: 6px 12px;
                font-size: 12px;
            }

            .product-view-btn {
                padding: 6px 12px;
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
        <h1>Pharmacy Stock</h1>

        <table>
            <thead>
                <tr>
                    <th>Art Code</th>
                    <th>Site Name</th>
                    <th>RSP</th>
                    <th>Q Sell Suggest</th>
                    <th>Products</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artCodes as $artCode)
                    <tr>
                        <td>{{ $artCode->art_code }}</td>
                        <td>{{ $artCode->site_name }}</td>
                        <td>{{ $artCode->rsp }}</td>
                        <td>{{ $artCode->q_sell_suggest }}</td>
                        <td>
                            <a href="{{ route('product.show', $artCode->art_code) }}" class="product-view-btn">View
                                Products</a>
                        </td>
                        <td class="actions">
                            <a href="{{ route('art_codes.edit', $artCode->id) }}">Edit</a>
                            <form action="{{ route('art_codes.destroy', $artCode->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
