<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Register</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background-color: #fff;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .header {
            background-color: #A41D31;
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
            background: url('{{ asset("register.png") }}') no-repeat center center;
            background-size: cover;
            min-height: 700px;
            display: flex;
            align-items: center;
            justify-content: center; /* Centered for Register */
            padding: 40px 10%;
            position: relative;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.88); /* Transparent */
            width: 100%;
            max-width: 600px; /* Wider */
            padding: 45px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            border-radius: 0; /* Sharp Edges */
            z-index: 10;
        }

        .login-card h2 {
            color: #455a64;
            font-size: 32px;
            font-weight: 500;
            margin-bottom: 25px;
            line-height: 1.2;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: #444;
            font-size: 18px;
            margin-bottom: 8px;
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

        .btn-register {
            background-color: #d14a5b; /* Lighter Navbar Red */
            color: white;
            padding: 14px 30px;
            font-size: 20px;
            font-weight: 600;
            border: none;
            border-radius: 0;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s;
        }

        .btn-register:hover {
            background-color: #b33948;
        }

        .login-link {
            display: block;
            color: #1a73e8;
            text-decoration: none;
            font-size: 18px;
            margin-top: 25px;
            text-align: center;
        }

        .login-link:hover {
            text-decoration: underline;
        }

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
            <h2>Create New Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <div class="input-group">
                        <div class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text" id="name" name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                    </div>
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <div class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 012-2V7a2 2 0 01-2-2H5a2 2 0 01-2 2v10a2 2 0 012 2z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <div class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    @error('password')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <div class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="btn-register">
                        Register
                    </button>
                </div>
            </form>

            <a href="{{ route('login') }}" class="login-link">
                Already registered? Log in here
            </a>
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
</body>
</html>
