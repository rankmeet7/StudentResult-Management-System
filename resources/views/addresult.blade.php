<!DOCTYPE html>
<html>
<head>
    <title>Add Result - SRMS</title>
    <style>
        :root {
            --primary: #3b82f6;
            --dark: #1e293b;
            --bg: #f0f9ff;
            --white: #fff;
            --text: #0f172a;
            --hover-bg: rgba(255, 255, 255, 0.1);
            --radius: 12px;
            --form-bg: #ffffff;
            --input-bg: #f8fafc;
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
            justify-content: flex-start;
            gap: 12px;
            text-decoration: none;
            background: none;
            border: none;
            color: var(--white);
            font-size: 18px;
            padding: 12px 20px;
            border-radius: var(--radius);
            cursor: pointer;
            width: 100%;
            position: relative;
            transition: 0.3s;
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

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--primary);
            font-size: 2rem;
        }

        .form-container {
            background: var(--form-bg);
            padding: 40px;
            border-radius: 20px;
            max-width: 550px;
            width: 100%;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            margin: auto;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: 500;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background: var(--input-bg);
            font-size: 1rem;
        }

        input[type="submit"] {
            margin-top: 30px;
            width: 100%;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: bold;
            background-color: var(--primary);
            color: #fff;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: var(--hover-color);
        }

        .success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 12px 18px;
            margin-bottom: 20px;
            border-left: 5px solid #10b981;
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            aside {
                position: relative;
                width: 100%;
                height: auto;
            }

            main {
                margin-left: 0;
                padding: 20px;
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
        <h2>Add Result</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('InsertResult') }}" method="POST">
        @csrf

        <label for="seat">Seat No:</label>
        <input type="text" name="seat" placeholder="Seat No" required>

        <label for="roll">Roll No:</label>
        <input type="text" name="roll" placeholder="Roll No" required>

        <label for="name">Student Name:</label>
        <input type="text" name="name" placeholder="Student Name" required>

        <label>Class:</label>
          <select name="cla" id="classSelector" required>
            <option value="" disabled selected>Select Class</option>
              @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}">{{ $i }}{{ $i == 1 ? 'st' : ($i == 2 ? 'nd' : ($i == 3 ? 'rd' : 'th')) }}</option>
              @endfor
          </select>

<div id="subjectsContainer"></div>

<script>
  const subjectsContainer = document.getElementById('subjectsContainer');
  const classSelector = document.getElementById('classSelector');

  const subjectTemplates = {
    "1-5": ["Gujarati", "English", "Math", "EVS"],
    "6-10": ["Gujarati", "English", "Math", "Science", "Social Science"],
    "11": ["Physics", "Chemistry", "Bio", "English"],
    "12": ["Physics", "Chemistry", "Bio", "English"]
  };

  classSelector.addEventListener('change', function () {
    const selectedClass = parseInt(this.value);
    subjectsContainer.innerHTML = '';

    let subjects = [];

    if (selectedClass >= 1 && selectedClass <= 5) {
      subjects = subjectTemplates["1-5"];
    } else if (selectedClass >= 6 && selectedClass <= 10) {
      subjects = subjectTemplates["6-10"];
    } else if (selectedClass === 11) {
      subjects = subjectTemplates["11"];
    } else if (selectedClass === 12) {
      subjects = subjectTemplates["12"];
    }

    subjects.forEach(subject => {
      subjectsContainer.innerHTML += `
        <label>${subject}:</label>
        <input type="text" name="${subject.toLowerCase().replace(/ /g, '')}" required>
      `;
    });
  });
</script>

        <input type="submit" value="Add Result">
        </form>
    </div>


</main>

</body>
</html>
