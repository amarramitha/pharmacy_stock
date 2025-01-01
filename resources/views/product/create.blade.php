<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
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
            width: 50%;
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

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
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

        .form-group {
            margin-bottom: 20px;
        }

        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            width: 100%;
            margin-top: 20px;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                width: 80%;
            }

            h1 {
                font-size: 24px;
            }

            label {
                font-size: 12px;
            }

            input[type="text"],
            input[type="number"],
            input[type="date"],
            select {
                font-size: 12px;
                padding: 8px;
            }

            button {
                font-size: 14px;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 90%;
            }

            h1 {
                font-size: 20px;
            }

            button {
                font-size: 14px;
                padding: 10px;
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

    <!-- Main Container Section -->
    <div class="container">
        <h1>Create Product</h1>

        <!-- Display success message if available -->
        @if (session('success'))
            <div style="padding: 10px; background-color: #4CAF50; color: white; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form to create product -->
        <form action="{{ route('product.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="art_code">Art Code:</label>
                <select name="art_code" id="art_code" required>
                    <option value="">Select Art Code</option>
                    @foreach ($artCodes as $artCode)
                        <option value="{{ $artCode->art_code }}">{{ $artCode->art_code }} - {{ $artCode->site_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" required>
            </div>

            <div class="form-group">
                <label for="product">Product Name:</label>
                <input type="text" name="product" id="product" required>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" name="category" required>
            </div>

            <div class="form-group">
                <label for="qty_in">Quantity In:</label>
                <input type="number" name="qty_in" min="0" required>
            </div>

            <div class="form-group">
                <label for="qty_out">Quantity Out:</label>
                <input type="number" name="qty_out" min="0" required>
            </div>

            <div class="form-group">
                <label for="sisa">Sisa:</label>
                <input type="number" name="sisa" min="0" required>
            </div>

            <div class="form-group">
                <label for="exp_batch">EXP/Batch:</label>
                <input type="text" name="exp_batch" required>
            </div>

            <div class="form-group">
                <label for="pbf">PBF</label>
                <input type="text" name="pbf" required>
            </div>

            <button type="submit">Create Product</button>
        </form>
    </div>
</body>

</html>
