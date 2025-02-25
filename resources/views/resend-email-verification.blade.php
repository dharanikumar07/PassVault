<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resend verification Email</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full text-center">
            <h2 class="text-2xl font-bold text-gray-800">Verify Your Email</h2>
            <p class="text-gray-600 mt-2">
                A verification email was sent to your inbox. If you haven't received it, click below to resend.
            </p>
    
            <button id="resendEmailBtn"
                class="mt-5 w-full bg-blue-600 text-white font-semibold py-2 rounded-lg transition duration-200 hover:bg-blue-700 flex items-center justify-center">
                <span id="loadingIcon" class="hidden mr-2">
                    <svg class="animate-spin h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke-width="4"></circle>
                        <path
                            d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"
                            stroke-width="2"></path>
                    </svg>
                </span>
                Resend Verification Email
            </button>
            <div class="mt-4 text-sm text-gray-500">
                <p>Why verify your email?</p>
                <ul class="mt-2 text-left list-disc pl-5">
                    <li>Secure your account from unauthorized access</li>
                    <li>Enable important notifications & password recovery</li>
                    <li>Unlock all features on our platform</li>
                </ul>
            </div>
    
            <div class="mt-5 text-gray-600 text-sm">
                <p>Still facing issues?</p>
                <a href="/support" class="text-blue-500 hover:underline">Contact Support</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/passvault.js') }}"></script>
</body>
</html>