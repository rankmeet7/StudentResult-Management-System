<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Result Sheet</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #edf2f7, #e2e8f0);
      padding: 30px;
    }

    .container {
      background: white;
      max-width: 950px;
      margin: auto;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
      border: 1px solid #d1dbe5;
    }

    .header {
      text-align: center;
      border-bottom: 3px solid #3182ce;
      padding-bottom: 20px;
      margin-bottom: 30px;
    }

    .header h1 {
      font-size: 32px;
      color: #2c5282;
    }

    .header h4 {
      font-size: 17px;
      color: #4a5568;
      margin-top: 10px;
    }

    .section-title {
      font-size: 18px;
      color: #2d3748;
      margin: 25px 0 10px;
      font-weight: bold;
      border-left: 5px solid #3182ce;
      padding-left: 12px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 25px;
    }

    th, td {
      padding: 14px 18px;
      border: 1px solid #e2e8f0;
      font-size: 15px;
    }

    th {
      background: #2b6cb0;
      color: white;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      text-align: left;
    }

    td {
      color: #2d3748;
    }

    .summary {
      background: #f7fafc;
      border: 1px solid #e2e8f0;
      padding: 18px;
      border-radius: 10px;
    }

    .summary p {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .status-pass { color: green; font-weight: bold; }
    .status-fail { color: red; font-weight: bold; }

    .signature-box {
      display: flex;
      justify-content: space-between;
      margin-top: 50px;
      gap: 20px;
    }

    .signature {
      width: 30%;
      border-top: 1px solid #718096;
      text-align: center;
      font-size: 14px;
      padding-top: 5px;
      color: #4a5568;
    }

    .print-btn {
      display: block;
      margin: 30px auto 0;
      padding: 12px 24px;
      font-size: 16px;
      background: #3182ce;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .print-btn:hover {
      background: #2b6cb0;
    }

    @media print {
      .print-btn {
        display: none;
      }

      .container {
        box-shadow: none;
        border: none;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>ABC Public School</h1>
      <h4>Annual Result - Academic Year {{ date('Y') }}</h4>
    </div>

    <div class="section-title">🎓 Student Information</div>
    <table>
      <tr><th>Name</th><td>{{ $result->name }}</td><th>Roll No</th><td>{{ $result->roll }}</td></tr>
      <tr><th>Class</th><td>{{ $class }}</td><th>Seat No</th><td>{{ $result->seat }}</td></tr>
    </table>

    <div class="section-title">📘 Subject-wise Marks</div>
    <table>
      <tr>
        <th>Subject</th>
        <th>Max Marks</th>
        <th>Marks Obtained</th>
        <th>Result</th>
      </tr>

      @php
        $subjects = [];
        if(in_array($class, ['1','2','3','4','5'])) {
            $subjects = ['Gujarati' => $result->gujarati, 'English' => $result->english, 'Math' => $result->math, 'EVS' => $result->evs];
        } elseif(in_array($class, ['6','7','8','9','10'])) {
            $subjects = ['Gujarati' => $result->gujarati, 'English' => $result->english, 'Math' => $result->math, 'Science' => $result->science, 'Social Science' => $result->socialscience];
        } elseif(in_array($class, ['11','12'])) {
            $subjects = ['Physics' => $result->physics, 'Chemistry' => $result->chemistry, 'Math/Biology' => $result->mathbiology, 'English' => $result->english];
        }

        $total = array_sum($subjects);
        $max_total = count($subjects) * 100;
        $percentage = round(($total / $max_total) * 100, 2);

        if ($percentage >= 90) $grade = 'A+';
        elseif ($percentage >= 75) $grade = 'A';
        elseif ($percentage >= 60) $grade = 'B';
        elseif ($percentage >= 45) $grade = 'C';
        elseif ($percentage >= 33) $grade = 'D';
        else $grade = 'F';

        $status = $grade === 'F' ? 'Fail' : 'Pass';
      @endphp

      @foreach($subjects as $subject => $mark)
        <tr>
          <td>{{ $subject }}</td>
          <td>100</td>
          <td>{{ $mark }}</td>
          <td>{{ $mark >= 33 ? 'Pass' : 'Fail' }}</td>
        </tr>
      @endforeach
    </table>

    <div class="summary">
      <p><strong>Total Marks:</strong> {{ $total }} / {{ $max_total }}</p>
      <p><strong>Percentage:</strong> {{ $percentage }}%</p>
      <p><strong>Grade:</strong> {{ $grade }}</p>
      <p><strong>Status:</strong> <span class="{{ $status === 'Pass' ? 'status-pass' : 'status-fail' }}">{{ $status }}</span></p>
    </div>

    <div class="signature-box">
      <div class="signature">Class Teacher</div>
      <div class="signature">Principal</div>
    </div>

    <button class="print-btn" onclick="window.print()">🖨️ Print Result</button>
  </div>
</body>
</html>
