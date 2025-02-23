<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Password Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="relative w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
        <div class="absolute -top-14 left-1/2 transform -translate-x-1/2">
            <div class="w-28 h-28 rounded-full border-4 border-blue-500 shadow-lg overflow-hidden bg-gray-200 flex items-center justify-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User Avatar" class="w-full h-full object-cover">
            </div>
        </div>
        <h2 class="text-2xl font-semibold text-center text-gray-700 mt-16">PassVault</h2>
        <p class="text-center text-gray-500 mb-6">Securely manage your passwords</p>
        
        @if(session('error'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">{{ session('error') }}</div>
        @endif
        
        <form method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 border-gray-300 rounded">
                    <span class="ml-2 text-sm text-gray-600">Remember Me</span>
                </label>
                <a href="#" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
            </div>
            
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Login</button>
        </form>
        
        <p class="mt-4 text-sm text-center text-gray-600">Don't have an account? <a href="{{ route('register')}}" class="text-blue-600 hover:underline">Sign up</a></p>
    </div>
</body>
</html>
