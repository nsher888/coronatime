<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
</head>

<body style="font-family: Inter;">
    <div style="max-width: 500px; margin: 0 auto;">
        <img src="{{public_path().'/images/confirmation-img.png'}}" alt="Confirmation Image"
            style="display: block; margin: 0 auto 56px;">

        <div style="text-align: center;">
            <h1
                style="font-style: normal; margin-bottom: 16px; font-weight: 900; font-size: 25px; color: #010414; text-align: center;">
                {{ __('mail.confirmation_email') }}
            </h1>
            <p
                style="font-style: normal; font-weight: 400; margin-bottom: 40px; font-size: 18px; color: #010414; text-align: center;">
                {{ __('mail.confirmation_email_message') }}
            </p>
        </div>

        <a href="{{ $actionUrl }}"
            style="display: inline-block; max-width: 392px; width:100%; height: 56px; background-color: #0FBA68; color: #ffffff; text-decoration: none; text-align: center; line-height: 56px; font-size: 16px; border-radius: 4px; font-weight: 900; display: block; margin: 0 auto;">
            {{ __('mail.confirmation_verify') }}

        </a>
    </div>
</body>

</html>