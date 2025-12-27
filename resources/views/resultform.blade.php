<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Result</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ff416c, #1fddff);
            background-size: 300% 300%;
            animation: gradientBG 12s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            padding: 50px 35px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 430px;
            text-align: center;
            position: relative;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            font-size: 32px;
            margin-bottom: 28px;
            color: #fff;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-weight: 600;
            color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.2);
            font-size: 16px;
            color: #fff;
            margin-bottom: 25px;
            box-shadow: inset 2px 2px 5px rgba(255, 255, 255, 0.1),
                        inset -2px -2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 12px rgba(255, 255, 255, 0.4);
        }

        input[type="text"]::placeholder {
            color: #ddd;
        }

        button {
            background: linear-gradient(135deg, #00f2fe, #4facfe);
            color: white;
            border: none;
            padding: 14px 35px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 30px;
            cursor: pointer;
            box-shadow: 0 0 15px rgba(0, 242, 254, 0.6);
            animation: pulse 2.5s infinite;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            transform: scale(1.06);
            box-shadow: 0 0 20px rgba(0, 242, 254, 0.8);
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 15px rgba(0, 242, 254, 0.6); }
            50% { box-shadow: 0 0 25px rgba(0, 242, 254, 0.9); }
            100% { box-shadow: 0 0 15px rgba(0, 242, 254, 0.6); }
        }

        .error-message {
            background-color: rgba(255, 0, 0, 0.2);
            color: #f8d7da;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🎓 Check Your Result</h2>

        @if(session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ url('/result') }}">
            @csrf
            <label for="seat">Seat Number</label>
            <input type="text" id="seat" name="seat" placeholder="Enter your seat number" required>
            <button type="submit">Check Result</button>
        </form>
    </div>
</body>
</html>
