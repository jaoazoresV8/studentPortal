<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | {{ config('app.name', 'CCDI Student Portal') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('ccdi_logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background-color: #fff;
            overflow-x: hidden;
            overflow-y: auto; /* Make it scrollable */
        }

        .header {
            background-color: #A41D31; /* Brand Red */
            height: 90px;
            width: 100%;
            display: flex;
            align-items: center;
            padding: 0 30px;
            border-bottom: 2px solid rgba(255,255,255,0.1);
        }

        .header-logo {
            height: 60px;
            margin-right: 15px;
        }

        .header-text h1 {
            color: #ffffff;
            font-size: 22px;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
            letter-spacing: 0.5px;
        }

        .header-text p {
            color: #ffffff;
            font-size: 14px;
            margin: 0;
            font-weight: 400;
        }

        .hero-section {
            background: url('{{ asset("school_bg_login.png") }}') no-repeat center center;
            background-size: cover;
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 40px 5%;
            position: relative;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.88); /* More transparent */
            width: 100%;
            max-width: 550px; /* Wider */
            padding: 30px; /* Reduced from 45px */
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            border-radius: 0;
            z-index: 10;
        }

        .login-card h2 {
            color: #455a64;
            font-size: 32px;
            font-weight: 500;
            margin-bottom: 20px; /* Reduced from 25px */
            line-height: 1.2;
        }

        .form-group {
            margin-bottom: 15px; /* Reduced from 25px */
        }

        .form-label {
            display: block;
            color: #444;
            font-size: 18px;
            margin-bottom: 5px; /* Reduced from 10px */
            font-weight: 500;
        }

        .input-group {
            display: flex;
            border: 1px solid #ccc;
            border-radius: 0;
            background-color: transparent;
            overflow: hidden;
        }

        .input-icon {
            background-color: #e0e0e0;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 1px solid #ccc;
            color: #444;
            width: 55px;
        }

        .input-group input {
            flex: 1;
            border: none;
            padding: 12px 15px;
            font-size: 18px;
            color: #333;
            outline: none;
            background-color: transparent;
        }

        .btn-login {
            background-color: #1a73e8; /* Brighter Blue */
            color: white;
            padding: 14px 40px;
            font-size: 20px;
            font-weight: 500;
            border: none;
            border-radius: 0;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-login:hover {
            background-color: #1557b0;
        }

        .btn-register {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #d14a5b; /* Lighter version of #A41D31 */
            color: white;
            padding: 14px;
            font-size: 18px;
            font-weight: 600;
            border: none;
            border-radius: 0;
            text-decoration: none;
            margin-top: 15px; /* Reduced from 25px */
            transition: background-color 0.2s;
        }

        .btn-register:hover {
            background-color: #b33948;
        }

        .forgot-password {
            display: block;
            color: #1a73e8;
            text-decoration: none;
            font-size: 18px;
            margin-top: 15px; /* Reduced from 25px */
        }

        /* Footer Section */
        .footer-container {
            background: #f8f9fa url('{{ asset("footer_bg.png") }}') repeat;
            padding: 60px 0 0 0;
            border-top: 1px solid #eee;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px 40px 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .contact-us h3 {
            font-size: 24px;
            color: #555;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: #0070c0;
            font-size: 18px;
            text-decoration: none;
        }

        .contact-item svg {
            margin-right: 15px;
            width: 24px;
            height: 24px;
            color: #666;
        }

        .mobile-app-btn {
            background-color: #0070c0;
            color: white;
            padding: 12px 20px;
            border-radius: 0;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-weight: 600;
            margin-top: 20px;
        }

        .mobile-app-btn svg {
            margin-right: 10px;
        }

        .orange-bar {
            background-color: #ff8c00;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            width: 100%;
        }

        .orange-bar a {
            color: white;
            text-decoration: underline;
        }

        .error-message {
            color: #d9534f;
            font-size: 13px;
            margin-top: 5px;
        }

        /* Admin Helper Box */
        .admin-helper-box {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border: 2px solid #A41D31;
            padding: 15px;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            max-width: 250px;
            position: relative; /* Added for close button positioning */
        }

        .admin-helper-box {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: rgba(255, 255, 255, 0.95);
            border: 2px solid #A41D31;
            padding: 20px 15px 15px 15px;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            max-width: 250px;
        }

        .close-helper {
            position: absolute;
            top: 5px;
            right: 8px;
            cursor: pointer;
            color: #A41D31;
            font-size: 18px;
            font-weight: bold;
            line-height: 1;
        }

        .close-helper:hover {
            color: #000;
        }

        .admin-helper-box h4 {
            margin: 0 0 10px 0;
            color: #A41D31;
            font-size: 16px;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .admin-helper-box p {
            margin: 5px 0;
            font-size: 13px;
            color: #444;
        }

        .btn-fill {
            background-color: #A41D31;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 13px;
            width: 100%;
            cursor: pointer;
            margin-top: 10px;
            font-weight: 600;
        }

        .btn-fill:hover {
            background-color: #8b0000;
        }
    </style>
</head>
<body>
    <header class="header">
        <img src="{{ asset('ccdi_logo.png') }}" alt="CCDI Logo" class="header-logo">
        <div class="header-text">
            <h1>COMPUTER COMMUNICATION DEVELOPMENT INSTITUTE</h1>
            <p>Learning Management System Portal</p>
        </div>
    </header>

    <div class="hero-section">
        <div class="login-card">
            <h2>Welcome to CCDI Learning Management System</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Username</label>
                    <div class="input-group">
                        <div class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" placeholder="Username" value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <div class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    @error('password')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn-login">
                        Log in
                    </button>
                </div>
            </form>

            <a href="{{ route('password.request') }}" class="forgot-password">
                Forgotten your username or password?
            </a>

            <div class="mt-4 pt-4 border-t border-gray-200">
                <a href="{{ route('register') }}" class="btn-register">
                    Register New Account
                </a>
            </div>
        </div>
    </div>

    <footer class="footer-container">
        <div class="footer-content">
            <div class="contact-us">
                <h3>Contact Us</h3>
                <a href="https://www.ccdisorsogon.edu.ph" target="_blank" class="contact-item">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    https://www.ccdisorsogon.edu.ph
                </a>
                <a href="tel:+63564215575" class="contact-item">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1.01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    Mobile : (056) 421 5575
                </a>
                <a href="mailto:ccdisorsogonadmission@gmail.com" class="contact-item">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 012-2V7a2 2 0 01-2-2H5a2 2 0 01-2 2v10a2 2 0 012 2z"></path></svg>
                    ccdisorsogonadmission@gmail.com
                </a>
            </div>

            <div class="mobile-app">
                <a href="https://download.moodle.org/mobile?version=2019111803&lang=en&iosappid=633359593&androidappid=com.moodle.moodlemobile" target="_blank" class="mobile-app-btn">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 01-2 2v14a2 2 0 002 2z"></path></svg>
                    Get the mobile app
                </a>
            </div>
        </div>
        <div class="orange-bar">
            &lt;/&gt; Maintained by <a href="https://ccdi-sorsogon.net/" target="_blank">CCDI Web Development Team</a>
        </div>
    </footer>
    <div class="admin-helper-box" id="adminHelper">
        <span class="close-helper" onclick="closeHelper()">&times;</span>
        <h4>Default Admin Account</h4>
        <p><strong>Username:</strong> admin@gmail.com</p>
        <p><strong>Password:</strong> Admin123</p>
        <button type="button" class="btn-fill" onclick="fillCredentials()">
            Auto-fill Credentials
        </button>
    </div>

    <script>
        function fillCredentials() {
            document.getElementById('email').value = 'admin@gmail.com';
            document.getElementById('password').value = 'Admin123';
        }

        function closeHelper() {
            document.getElementById('adminHelper').style.display = 'none';
        }
    </script>
</body>
</html>
