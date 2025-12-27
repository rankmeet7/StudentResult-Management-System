    <!doctype html>
    <html>
    <head>
        <title>SRMS - Home</title>
        <style>
            :root {
                --primary-color: #264653;
                --secondary-color: #2a9d8f;
                --accent-color: #e9c46a;
                --background-color: #1b1f27;
                --footer-color: #222831;
                --text-light: #ffffff;
                --hover-bg: rgba(255, 255, 255, 0.1);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Roboto', sans-serif;
                background-color: var(--background-color);
                color: var(--text-light);
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            header {
                background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
                padding: 30px 20px;
                text-align: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            }

            header h1 {
                font-size: 2.5rem;
                font-weight: 700;
                color: var(--accent-color);
            }

            nav {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 20px;
                background-color: var(--secondary-color);
                padding: 15px 20px;
            }

            nav a {
                text-decoration: none;
                font-size: 1.1rem;
                color: var(--text-light);
                padding: 10px 25px;
                border-radius: 8px;
                background-color: transparent;
                transition: all 0.3s ease;
            }

            nav a:hover {
                background-color: var(--hover-bg);
                color: var(--accent-color);
            }

            .hero {
                position: relative;
                width: 100%;
                max-height: 500px;
                overflow: hidden;
            }

            .hero img {
                width: 100%;
                height: 500px;
                object-fit: cover;
                display: block;
                filter: brightness(75%);
            }

            .hero-text {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: var(--text-light);
                text-align: center;
                font-size: 2rem;
                font-weight: 700;
                background-color: rgba(0, 0, 0, 0.5);
                padding: 20px 30px;
                border-radius: 12px;
            }

            footer {
                background-color: var(--footer-color);
                color: var(--text-light);
                text-align: center;
                padding: 20px;
                font-size: 1rem;
                margin-top: auto;
                border-top: 1px solid #444;
            }

            @media (max-width: 768px) {
                header h1 {
                    font-size: 2rem;
                }

                nav {
                    flex-direction: column;
                    align-items: center;
                }

                nav a {
                    width: 100%;
                    max-width: 300px;
                    text-align: center;
                }

                .hero-text {
                    font-size: 1.5rem;
                    padding: 15px 20px;
                }
            }
        </style>
    </head>
    <body>
    @if(session('success'))
        <script>alert("{{ session('success') }}");</script>
    @endif
    <header>
        <h1>Student Result Management System</h1>
    </header>

    <nav>
        <a href="{{ route('register') }}" title="Student Registration">Student Registration</a>
        <a href="{{route('showForm')}}" title="Students">Results</a>
    </nav>

    <div class="hero">
        <img src="{{ asset('image/r1.jpg') }}" alt="SRMS Banner">
    
    </div>

    <footer>
        &copy;Student Result Management System. All rights reserved.
    </footer>

    </body>
    </html>
