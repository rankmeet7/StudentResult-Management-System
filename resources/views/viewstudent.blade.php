<!DOCTYPE html>
<html>
<head>
  <title>View Students</title>
  <style>
    :root {
      --primary: #3b82f6;
      --dark: #1e293b;
      --bg: #f0f9ff;
      --white: #fff;
      --text: #0f172a;
      --hover-bg: rgba(255, 255, 255, 0.1);
      --danger: #e74c3c;
      --info: #3498db;
      --radius: 12px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
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
    }

    nav a:hover,
    nav button:hover {
      background-color: var(--hover-bg);
      color: var(--primary);
    }

    .dropdown {
      padding-left: 30px;
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

    header h1 {
      font-size: 36px;
      color: var(--primary);
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: var(--white);
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
    }

    th, td {
      padding: 14px 12px;
      text-align: center;
      border: 1px solid #ddd;
    }

    th {
      background-color: var(--primary);
      color: white;
      font-size: 16px;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #eef;
    }

    .btn {
      padding: 8px 14px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: bold;
      text-decoration: none;
      color: white;
      transition: 0.3s ease;
    }

    .btn.edit {
      background-color: var(--info);
    }

    .btn.edit:hover {
      background-color: #2980b9;
    }

    .btn.delete {
      background-color: var(--danger);
    }

    .btn.delete:hover {
      background-color: #c0392b;
    }

    .add-btn {
      display: inline-block;
      background-color: var(--primary);
      color: white;
      padding: 14px 24px;
      border-radius: var(--radius);
      text-decoration: none;
      font-size: 18px;
      font-weight: 600;
      margin-top: 30px;
      text-align: center;
    }

    .add-btn:hover {
      background-color: #2563eb;
    }

    @media (max-width: 768px) {
      aside {
        position: relative;
        width: 100%;
        height: auto;
        padding: 20px;
      }

      main {
        margin-left: 0;
        padding: 20px;
      }

      table, th, td {
        font-size: 13px;
      }
    }
  </style>
</head>
<body>

  @if(session('success'))
    <script>alert("{{ session('success') }}");</script>
  @endif

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
    <header>
      <h1>📋 View Students</h1>
    </header>

    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Class</th>
        <th>Roll No</th>
        <th>Seat No</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      @foreach($Data as $data)
      <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->Name }}</td>
        <td>{{ $data->Gender }}</td>
        <td>{{ $data->DateofBirth }}</td>
        <td>{{ $data->class }}</td>
        <td>{{ $data->RollNo }}</td>
        <td>{{ $data->SeatNo }}</td>
        <td><a href="{{ url('/viewstudent/edit', $data->id) }}" class="btn edit">Edit</a></td>
        <td><a href="{{ url('/viewstudent/delete', $data->id) }}" class="btn delete">Delete</a></td>
      </tr>
      @endforeach
    </table>

    <div style="text-align: center;">
      <a href="{{ url('addstudent') }}" class="add-btn">+ Add Student</a>
    </div>

    <div style="text-align: center; margin-top: 20px;">
      <a href="{{ route('dashbord') }}" style="font-size: 18px; color: #1e3a8a; text-decoration: none;">⬅️ Back to Dashboard</a>
    </div>
  </main>

</body>
</html>
