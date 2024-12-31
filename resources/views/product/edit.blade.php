<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <h1>Edit Product</h1>

    <div class="container">
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table>
                <!-- Art Code - Read-Only -->
                <tr>
                    <th><label for="art_code">Art Code:</label></th>
                    <td><input type="text" name="art_code" value="{{ $product->art_code }}" readonly></td>
                </tr>
                <tr>
                    <th><label for="date">Date:</label></th>
                    <td><input type="date" name="date" value="{{ $product->date }}" required></td>
                </tr>
                <tr>
                    <th><label for="product">Product Name:</label></th>
                    <td><input type="text" name="product" value="{{ $product->product }}" required></td>
                </tr>
                <tr>
                    <th><label for="category">Category:</label></th>
                    <td><input type="text" name="category" value="{{ $product->category }}" required></td>
                </tr>
                <tr>
                    <th><label for="qty_in">Qty IN:</label></th>
                    <td><input type="number" name="qty_in" value="{{ $product->qty_in }}" min="0" required>
                    </td>
                </tr>
                <tr>
                    <th><label for="qty_out">Qty OUT:</label></th>
                    <td><input type="number" name="qty_out" value="{{ $product->qty_out }}" min="0" required>
                    </td>
                </tr>
                <tr>
                    <th><label for="sisa">Sisa:</label></th>
                    <td><input type="number" name="sisa" value="{{ $product->sisa }}" min="0" required></td>
                </tr>
                <tr>
                    <th><label for="exp_batch">Exp/Batch:</label></th>
                    <td><input type="text" name="exp_batch" value="{{ $product->exp_batch }}" required></td>
                </tr>
                <tr>
                    <th><label for="pbf">PBF:</label></th>
                    <td><input type="text" name="pbf" value="{{ $product->pbf }}" required></td>
                </tr>
            </table>

            <button type="submit">Update</button>
        </form>
    </div>


</body>

</html>
