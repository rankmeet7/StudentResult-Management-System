<!DOCTYPE html>
<html>
<head>
<style>
        :root {
            --primary-color: #00b4d8;
            --secondary-color: #90e0ef;
            --accent-color: #0077b6;
            --background-gradient: linear-gradient(to right, #f1f5f9, #e0f7fa);
            --form-bg: #ffffff;
            --input-bg: #f8fafc;
            --text-color: #1e293b;
            --border-color: #cbd5e1;
            --hover-color: #00a8e8;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: var(--background-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            color: var(--text-color);
        }

        .form-container {
            background: var(--form-bg);
            padding: 40px;
            border-radius: 20px;
            max-width: 550px;
            width: 100%;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            animation: fadeIn 0.6s ease-in-out;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--accent-color);
            font-size: 2rem;
            letter-spacing: 1px;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background: var(--input-bg);
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input::placeholder {
            color: #64748b;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--secondary-color);
            background-color: #fff;
        }

        .gender-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .gender-group label {
            font-weight: normal;
        }

        .gender-group input[type="radio"] {
            margin-right: 6px;
        }

        input[type="submit"] {
            margin-top: 30px;
            width: 100%;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: bold;
            background-color: var(--secondary-color);
            color: #fff;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover {
            background-color: var(--hover-color);
            transform: scale(1.03);
        }

        .success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 12px 18px;
            margin-bottom: 20px;
            border-left: 5px solid #10b981;
            border-radius: 6px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 25px 20px;
            }

            h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
</head>
<body>

    @if(session('success'))
        <alert><p style="color: green;">{{ session('success') }}</p></alert>
    @endif


    <div class="form-container">
        <h2>Register Student </h2>
        <form action="{{route('register')}}" method="POST">
    @csrf

            <label for="sid">Student ID</label>
            <input type="text" id="sid" name="sid" placeholder="Enter Student ID" required>

            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Full Name" required>

            <label>Gender</label>
            <div class="gender-group">
                <label><input type="radio" name="gen" value="Male" required> Male</label>
                <label><input type="radio" name="gen" value="Female"> Female</label>
                <label><input type="radio" name="gen" value="Others"> Others</label>
            </div>

            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" required>

            <label for="cla">Class</label>
            <select id="cla" name="cla" required>
                <option value="" disabled selected>Select Class</option>
                <option>1st</option>
                <option>2nd</option>
                <option>3rd</option>
                <option>4th</option>
                <option>5th</option>
                <option>6th</option>
                <option>7th</option>
                <option>8th</option>
                <option>9th</option>
                <option>10th</option>
                <option>11th</option>
                <option>12th</option>
            </select>

            <label for="roll">Roll Number</label>
            <input type="text" id="roll" name="roll" placeholder="Enter Roll Number" required>

            <label for="seat">Seat Number</label>
            <input type="text" id="seat" name="seat" placeholder="Enter Seat Number" required>

            <input type="submit" value="Register">
        </form>
    </div>

</body>
</html>
