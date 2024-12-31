<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Art Code</title>
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

    <h1>Edit Art Code</h1>

    <div class="container">
        <form action="{{ route('art_codes.update', $artCode->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table>
                <tr>
                    <th><label for="site_code">Site Code:</label></th>
                    <td><input type="text" name="site_code" value="{{ $artCode->site_code }}" required></td>
                </tr>
                <tr>
                    <th><label for="site_name">Site Name:</label></th>
                    <td><input type="text" name="site_name" value="{{ $artCode->site_name }}" required></td>
                </tr>
                <tr>
                    <th><label for="art_code">Art Code:</label></th>
                    <td><input type="text" name="art_code" value="{{ $artCode->art_code }}" required></td>
                </tr>
                <tr>
                    <th><label for="rsp">RSP:</label></th>
                    <td><input type="text" name="rsp" value="{{ $artCode->rsp }}" required></td>
                </tr>
                <tr>
                    <th><label for="q_sell_suggest">Q Sell Suggest:</label></th>
                    <td><input type="number" name="q_sell_suggest" value="{{ $artCode->q_sell_suggest }}" required>
                    </td>
                </tr>
            </table>

            <button type="submit">Update</button>
        </form>
    </div>

</body>

</html>
