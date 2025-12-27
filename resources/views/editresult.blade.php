<!DOCTYPE html>
<html>
<head>
    <title>Edit Result - SRMS</title>
    <style>
        :root {
            --primary: #3b82f6;
            --dark: #1e293b;
            --bg: #f0f9ff;
            --white: #fff;
            --text: #0f172a;
            --hover-bg: rgba(255, 255, 255, 0.1);
            --radius: 12px;

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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        body {
            display: flex;
            background-color: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        aside {
            width: 280px;
            background: var(--dark);
            color: var(--white);
            padding: 40px 25px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 12px rgba(0, 0, 0, 0.08);
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: var(--primary);
            text-align: center;
            margin-bottom: 50px;
        }

        .sidebar-title {
            font-size: 16px;
            text-transform: uppercase;
            margin: 25px 0 10px;
            color: #94a3b8;
            letter-spacing: 1px;
        }

        nav ul {
            list-style: none;
        }

        nav ul li {
            margin-bottom: 8px;
        }

        nav a,
        nav button {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            background: none;
            border: none;
            color: var(--white);
            font-size: 18px;
            padding: 12px 20px;
            border-radius: var(--radius);
            transition: all 0.3s ease;
            cursor: pointer;
            width: 100%;
            position: relative;
        }

        nav a::before,
        nav button::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background-color: transparent;
            border-top-left-radius: var(--radius);
            border-bottom-left-radius: var(--radius);
            transition: background 0.3s ease;
        }

        nav a:hover::before,
        nav button:hover::before {
            background-color: var(--primary);
        }

        nav a:hover,
        nav button:hover {
            background-color: var(--hover-bg);
            color: var(--primary);
        }

        .dropdown {
            padding-left: 30px;
            margin-top: 5px;
            display: flex;
            flex-direction: column;
        }

        .dropdown a {
            font-size: 16px;
            padding: 8px 12px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: var(--radius);
            color: #f8fafc;
        }

        .dropdown a:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        main {
            margin-left: 280px;
            flex: 1;
            padding: 50px 40px;
        }

        .form-container {
            background: var(--form-bg);
            padding: 40px;
            border-radius: 20px;
            max-width: 600px;
            margin: 0 auto;
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
        }

        .gender-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
            margin-bottom: 20px;
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

        @media (max-width: 768px) {
            aside {
                width: 100%;
                position: relative;
            }

            main {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<aside>
<div class="logo">SRMS Admin</div>

<div class="sidebar-title">Student</div>
<nav>
    <ul>
        <li>
        <p style="font-size:20px">📚 Student</p><br>
            <div class="dropdown">
                <a href="{{ route('addstudent') }}">➕ Add Student</a>
                <a href="{{ route('viewstudent') }}">👁️ View Student</a>
            </div>
        </li>
    </ul>
</nav>

<div class="sidebar-title">Result</div>
<nav>
    <ul>
        <li>
        <p style="font-size:20px">📊 Result</p><br>
            <div class="dropdown">
                <a href="{{ route('addresult') }}">📝 Add Result</a>
                <a href="{{ route('viewresult') }}">📄 View Result</a>
            </div>
        </li>
    </ul>
</nav>

<div class="sidebar-title">Settings</div>
<nav>
    <ul>
        <li><a href="{{ route('change.password.form') }}">🔐 Change Password</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">🚪 Logout</button>
            </form>
        </li>
    </ul>
</nav>
</aside>

<main>
    <div class="form-container">
        <h2>Edit Result</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="error" style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('UpdateResult', $data->id) }}" method="POST">
            @csrf
            @method("PUT")

            <label for="seat">Seat No:</label>
            <input type="text" name="seat" value="{{ $data->seat }}" readonly>

            <label for="roll">Roll No:</label>
            <input type="text" name="roll" value="{{$data->roll }}" readonly>

            <label for="name">Student Name:</label>
            <input type="text" name="name" value="{{$data->name }}" readonly>

            <label>Class:</label>
            <select name="cla" id="classSelector" disabled>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $data->class == $i ? 'selected' : '' }}>
                        {{ $i }}{{ $i == 1 ? 'st' : ($i == 2 ? 'nd' : ($i == 3 ? 'rd' : 'th') ) }}
                    </option>
                @endfor
            </select>
            <input type="hidden" name="cla" value="{{ $data->class }}">

            <div id="subjectsContainer"></div>

            <input type="submit" value="Update Result">
        </form>
    </div>

    <script>
        const subjectsContainer = document.getElementById('subjectsContainer');
        const classValue = parseInt("{{ $data->class }}");

        const subjectTemplates = {
            "1-5": ["Gujarati", "English", "Math", "EVS"],
            "6-10": ["Gujarati", "English", "Math", "Science", "Social Science"],
            "11": ["Physics", "Chemistry", "Bio", "English"],
            "12": ["Physics", "Chemistry", "Bio", "English"]
        };

        const existingValues = @json($data);

        function renderSubjects(selectedClass, data = {}) {
            subjectsContainer.innerHTML = '';

            let subjects = [];

            if (selectedClass >= 1 && selectedClass <= 5) {
                subjects = subjectTemplates["1-5"];
            } else if (selectedClass >= 6 && selectedClass <= 10) {
                subjects = subjectTemplates["6-10"];
            } else if (selectedClass == 11) {
                subjects = subjectTemplates["11"];
            } else if (selectedClass == 12) {
                subjects = subjectTemplates["12"];
            }

            subjects.forEach(subject => {
                const fieldName = subject.toLowerCase().replace(/ /g, '');
                const value = data[fieldName] ?? '';
                subjectsContainer.innerHTML += `
                    <label>${subject}:</label>
                    <input type="text" name="${fieldName}" value="${value}" required>
                `;
            });
        }

        window.onload = function () {
            renderSubjects(classValue, existingValues);
        };
    </script>
</main>

</body>
</html>
