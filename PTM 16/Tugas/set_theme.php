<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Set Theme Preference</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        select,
        button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
            width: 100%;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Set Theme Preference</h1>
        <form action="save_theme.php" method="post">
            <label for="theme">Choose Theme:</label>
            <select name="theme" id="theme">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </select>
            <button type="submit">Save Preference</button>
        </form>
    </div>
</body>

</html>