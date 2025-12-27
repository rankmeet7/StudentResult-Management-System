<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
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
            width: 350px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-align: center;
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

        .success, .error {
            width: 85%;
            padding: 10px;
            border-radius: 8px;
            margin: 10px auto;
            font-size: 14px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .success {
            color: #155724;
            background: rgba(40, 167, 69, 0.2);
        }

        .error {
            color: rgb(255, 79, 79);
            background: rgba(255, 0, 0, 0.1);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="form">
        <h2>Change Password</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('change.password') }}" method="POST">
            @csrf
            <input type="password" name="current_password" placeholder="Current Password" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="new_password_confirmation" placeholder="Confirm New Password" required>
            <input type="submit" value="Change Password">
        </form>
    </div>
</body>
</html>
