<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission - Merchant</title>
</head>
<body>
    <p>Hello Merchant,</p>

    <p>You have received a new message from the contact form:</p>

    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    
    @if ($data['phone'])
        <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    @endif

    @if ($data['company'])
        <p><strong>Company:</strong> {{ $data['company'] }}</p>
    @endif

    <p><strong>Message:</strong> {{ $data['message'] }}</p>

    <p>Thank you,</p>
    <p>Certify Recruit Team</p>
</body>
</html>
