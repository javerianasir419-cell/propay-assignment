<!DOCTYPE html>
<html>
<head>
    <title>LOGIN - ProPay</title>
    <style>
        body { 
            font-family: 'Times New Roman', Times, serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            background-color: #ffffff; 
            margin: 0; 
            color: #000000;
        }
        .login-box { 
            background: #ffffff; 
            padding: 40px; 
            width: 360px; 
        }
        
        h2 { 
            font-size: 22px; 
            font-weight: normal; 
            text-transform: uppercase; 
            letter-spacing: 3px; 
            border-bottom: 2px solid #000000; 
            padding-bottom: 12px; 
            margin-bottom: 30px; 
            text-align: center;
        }
        
        label {
            display: block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input { 
            display: block; 
            width: 100%; 
            padding: 12px; 
            margin-bottom: 15px;
            box-sizing: border-box; 
            border: 1px solid #cccccc; 
            background-color: #f0f4f8; 
            font-family: Arial, sans-serif; 
            font-size: 14px; 
            color: #000000;
            border-radius: 2px;
        }
        input:focus { 
            outline: none; 
            border-color: #000000; 
            background-color: #e3edf7; 
        }
        
        button { 
            width: 100%; 
            padding: 14px; 
            background: #2c2c2c; 
            color: white; 
            border: none; 
            border-radius: 2px;
            cursor: pointer; 
            font-family: 'Times New Roman', Times, serif; 
            text-transform: uppercase; 
            letter-spacing: 2px; 
            font-size: 14px; 
            margin-top: 20px;
            transition: background 0.2s;
        }
        button:hover { 
            background: #000000; 
        }
        
        .error { 
            color: #8b0000; 
            font-size: 14px; 
            margin-bottom: 20px; 
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>ProPay Login</h2>

        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <form action="/login" method="POST">
            @csrf 
            
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter username" required>
            
            <label>Password</label>
            <input type="password" name="password" placeholder="••••••••" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>