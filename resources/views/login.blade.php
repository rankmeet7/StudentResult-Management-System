<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #2c3e50, #4ca1af);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            width: 320px;
            height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 20px;
        }

        h2 {
            color: white;
            margin-bottom: 20px;
            font-size: 24px;
        }

        input {
            width: 85%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
            background: rgba(255, 255, 255, 0.8);
        }

        input:focus {
            background: white;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        input[type="submit"] {
            background: linear-gradient(45deg, #ff7b00, #ff5500);
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            width: 85%;
            padding: 12px;
        }

        input[type="submit"]:hover {
            background: linear-gradient(45deg, #ff5500, #ff3300);
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    @if(session('error'))
        <script>alert("{{ session('error') }}");</script>
    @endif

    <div class="form">
        <h2>Login</h2>
        
        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>
