<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

        *,
        *:before,
        *:after {
            box-sizing: border-box
        }

        body {
            min-height: 100vh;
            font-family: 'Raleway', sans-serif;
        }

        .container {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .container:hover .top::before,
        .container:hover .top::after,
        .container:active .top::before,
        .container:active .top::after,
        .container:hover .bottom::before,
        .container:hover .bottom::after,
        .container:active .bottom::before,
        .container:active .bottom::after {
            margin-left: 200px;
            transform-origin: -200px 50%;
            transition-delay: 0s;
        }

        .container:hover .center,
        .container:active .center {
            opacity: 1;
            transition-delay: 0.2s;
        }

        .top::before,
        .top::after,
        .bottom::before,
        .bottom::after {
            content: '';
            display: block;
            position: absolute;
            width: 200vmax;
            height: 200vmax;
            top: 50%;
            left: 50%;
            margin-top: -100vmax;
            transform-origin: 0 50%;
            transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
            z-index: 10;
            opacity: 0.65;
            transition-delay: 0.2s;
        }

        .top::before {
            transform: rotate(45deg);
            background: #e46569;
        }

        .top::after {
            transform: rotate(135deg);
            background: #ecaf81;
        }

        .bottom::before {
            transform: rotate(-45deg);
            background: #60b8d4;
        }

        .bottom::after {
            transform: rotate(-135deg);
            background: #3745b5;
        }

        .center {
            position: absolute;
            width: 400px;
            height: 400px;
            top: 50%;
            left: 50%;
            margin-left: -200px;
            margin-top: -200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
            transition-delay: 0s;
            color: #333;
            z-index: 20;
            background: white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }

        .center input {
            width: 100%;
            padding: 15px;
            margin: 5px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-family: inherit;
        }

        .center button {
            padding: 12px;
            width: 100%;
            background: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="center">
            <h2>Please Sign In</h2>
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <form method="POST" action="{{ url('/logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>

            </form>
        </div>
    </div>
</body>

</html>
