<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - PassVault</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
    <div class="passvault-notification"></div>
    <div class="relative w-full md:w-2/3 lg:w-1/2 mx-auto p-8 bg-white border border-gray-300 shadow-lg rounded-lg">

        <!-- Image (Hidden in Mobile) -->
        <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 hidden md:block">
            <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="Secure User Icon" class="w-24 h-24 rounded-full border-4 border-white shadow-lg">
        </div>
    
        <!-- PassVault Branding -->
        <h1 class="text-3xl font-bold text-center text-blue-700 mt-12">PassVault</h1>
        <p class="text-center text-gray-500 mb-6">Securely manage your passwords</p>
        <h2 class="text-2xl font-semibold text-center text-gray-700">Create an Account</h2>
    
        <form id="registerclicked" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
    
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
    
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <div id="password-error" class="error-message" style="color:red;"></div>
                </div>
    
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <div id="confirm-password-error" class="error-message"  style="color:red;"></div>
                </div>
    
                <div>
                    <label for="encrypted_master_key" class="block text-sm font-medium text-gray-700">Master Password</label>
                    <input type="password" id="encrypted_master_key" name="encrypted_master_key" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <div id="master-password-error" class="error-message" style="color:red;"></div>
                </div>
    
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number (Optional)</label>
                    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>
    
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Create account</button>
        </form>
    
        <p class="mt-4 text-sm text-center text-gray-600">Already have an account? 
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>
    <script src="{{ asset('assets/js/passvault.js') }}"></script>
</body>
</html>
