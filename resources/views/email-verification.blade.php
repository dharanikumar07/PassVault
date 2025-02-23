<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification By PassVault</title>
</head>
<body style="background-color: #f3f4f6; margin: 0; padding: 0; font-family: Arial, sans-serif;">
<div
    style="max-width: 600px; margin: 30px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <!-- Header -->
    <div style="background-color: #000000; color: #ffffff; text-align: center; padding: 20px;">
        <h1 style="margin: 0; font-size: 24px;">Email Verification</h1>
    </div>

    <!-- Content -->
    <div style="padding: 20px; color: #374151; line-height: 1.6;">
        <h2 style="font-size: 20px; margin-bottom: 15px;">Hello,</h2>
        <p style="margin-bottom: 15px;">
            Thank you for choosing PassVault! 
            Please confirm your email address by clicking the
            button below:
        </p>
        <div style="text-align: center; margin: 20px 0;">
            <a href="{{$verification_link}}"
               style="background-color: #000000; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; display: inline-block;">Verify
                Email</a>
        </div>
        <p style="margin-bottom: 15px;">
            If you didn't request this email, you can safely ignore it.
        </p>
        <p style="margin-bottom: 15px;">
            Feel free to contact our support team if you have any questions or concerns.
        </p>
        <p style="margin-bottom: 0;">Best regards,<br>PassVault Team</p>
    </div>

    <!-- Footer -->
    <div style="background-color: #f9fafb; text-align: center; padding: 10px; font-size: 12px; color: #9ca3af;">
        &copy; {{ date('Y') }} PassVault. All rights reserved.
    </div>
</div>
</body>
</html>
