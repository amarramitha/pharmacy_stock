<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Art Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .appbar {
            background-color: #FFA500;
            /* Orange color */
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
            /* Yellow color for the buttons */
            padding: 10px 20px;
            border-radius: 4px;
        }

        .appbar a:hover {
            background-color: #FFC107;
        }

        .container {
            width: 50%;
            /* Reduced width */
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
        input[type="number"] {
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
        <h1>Create Art Code</h1>

        <form action="{{ route('art_codes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="site_code">Site Code:</label>
                <input type="text" name="site_code" required>
            </div>

            <div class="form-group">
                <label for="site_name">Site Name:</label>
                <input type="text" name="site_name" required>
            </div>

            <div class="form-group">
                <label for="art_code">Art Code:</label>
                <input type="text" name="art_code" required>
            </div>

            <div class="form-group">
                <label for="rsp">RSP:</label>
                <input type="text" name="rsp" required>
            </div>

            <div class="form-group">
                <label for="q_sell_suggest">Q Sell Suggest:</label>
                <input type="number" name="q_sell_suggest" required>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>
</body>

</html>
