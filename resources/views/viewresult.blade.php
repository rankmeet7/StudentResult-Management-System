<!DOCTYPE html>
<html>
<head>
  <title>View Results</title>
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
      background: none;
      border: none;
      color: var(--white);
      font-size: 18px;
      padding: 12px 20px;
      border-radius: var(--radius);
      transition: all 0.3s ease;
      cursor: pointer;
      width: 100%;
      text-decoration: none;
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
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    th, td {
      padding: 14px;
      text-align: center;
      border-bottom: 1px solid #e2e8f0;
    }

    th {
      background-color: var(--primary);
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9fafb;
    }

    tr:hover {
      background-color: #f1f5f9;
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
      text-align: center;
      transition: background 0.3s ease;
      margin-top: 20px;
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
      <h1>📄 View Results</h1>
    </header>

    @foreach($results as $class => $dataSet)
  <h2 style="margin: 30px 0 10px; color: #334155;">Class: {{ $class }}</h2>

  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Seat No</th>
        <th>Roll No</th>
        <th>Name</th>

        {{-- Conditional headers --}}
        @if(in_array($class, ['1', '2', '3', '4', '5']))
          <th>Gujarati</th>
          <th>English</th>
          <th>Math</th>
          <th>EVS</th>
          
        @elseif(in_array($class, ['6', '7', '8', '9', '10']))
          <th>Gujarati</th>
          <th>English</th>
          <th>Math</th>
          <th>Science</th>
          <th>Social Science</th>

        @elseif(in_array($class, ['11', '12']))
          <th>Physics</th>
          <th>Chemistry</th>
          <th>Bio</th>
          <th>english</th>
        @endif

        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($dataSet as $data)
        <tr>
          <td>{{ $data->id }}</td>
          <td>{{ $data->seat }}</td>
          <td>{{ $data->roll }}</td>
          <td>{{ $data->name }}</td>

          {{-- Conditional data --}}
          @if(in_array($class, ['1', '2', '3', '4', '5']))
            <td>{{ $data->gujarati }}</td>
            <td>{{ $data->english }}</td>
            <td>{{ $data->math }}</td>
            <td>{{ $data->evs }}</td>

          @elseif(in_array($class, ['6', '7', '8', '9', '10']))
            <td>{{ $data->gujarati }}</td>
            <td>{{ $data->english }}</td>
            <td>{{ $data->math }}</td>
            <td>{{ $data->science }}</td>
            <td>{{ $data->socialscience }}</td>

          @elseif(in_array($class, ['11', '12']))
            <td>{{ $data->physics }}</td>
            <td>{{ $data->chemistry }}</td>
            <td>{{ $data->bio }}</td>
            <td>{{ $data->english }}</td>
          @endif

          <td><a href="{{ url('/viewresult/edit', $data->id) }}" class="btn edit">Edit</a></td>
          <td><a href="{{ url('/viewresult/delete', $data->id) }}" class="btn delete">Delete</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endforeach


    <div style="text-align: center;">
      <a href="{{ url('addresult') }}" class="add-btn">+ Add Result</a>
    </div>

    <div style="text-align: center; margin-top: 20px;">
      <a href="{{ route('dashbord') }}" style="font-size: 18px; color: #1e3a8a; text-decoration: none;">⬅️ Back to Dashboard</a>
    </div>
  </main>

</body>
</html>
