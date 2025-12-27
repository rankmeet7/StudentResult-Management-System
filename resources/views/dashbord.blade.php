<!DOCTYPE html>
<html>
<head>
  <title>SRMS Admin Dashboard</title>
  <style>
    :root {
      --primary: #3b82f6;
      --dark: #1e293b;
      --bg: #f0f9ff;
      --white: #fff;
      --text: #0f172a;
      --hover-bg: rgba(255, 255, 255, 0.1);
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
      justify-content: flex-start;
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

    header {
      margin-bottom: 40px;
    }

    header h1 {
      font-size: 36px;
      color: var(--primary);
    }

    header p {
      font-size: 18px;
      color: #334155;
    }

    .content {
      display: flex;
      flex-wrap: wrap;
      gap: 300px;
    }

    .card,
    .card-link {
      background: var(--white);
      padding: 70px 70px;
      border-radius: var(--radius);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
      width: 300px;
      transition: all 0.3s ease;
      text-align: center;
      text-decoration: none;
      color: inherit;
      margin-left:80px;
    }

    .card:hover,
    .card-link:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
      cursor: pointer;
    }

    .card h3,
    .card-link h3 {
      font-size: 22px;
      color: var(--primary);
      margin-bottom: 12px;
    }

    .card p,
    .card-link p {
      font-size: 16px;
      color: #64748b;
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

      .content {
        justify-content: center;
      }
    }
  </style>
</head>
<body>

@if(session('error'))
    <script>alert("{{ session('error') }}");</script>
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
      <h1>Welcome Admin </h1>
      <p>Manage everything from one place easily</p>
    </header>

    <div class="content">

      <a href="{{ route('viewstudent') }}" class="card-link">
        <h3>Total Students</h3>
        <p>{{ $studentCount }} registered student{{ $studentCount == 1 ? '' : 's' }}.</p>
      </a>

      <a href="{{ route('viewresult') }}" class="card-link">
        <h3>Total Results</h3>
        <p>{{ $resultCount }} result{{ $resultCount == 1 ? '' : 's' }} published.</p>
      </a>
    </div>
  </main>

</body>
</html>
