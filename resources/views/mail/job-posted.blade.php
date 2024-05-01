<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .email-container {
            width: 80%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
        }

        .email-header {
            text-align: center;
            padding: 20px 0;
            background-color: #3490dc;
            color: #ffffff;
        }

        .email-body {
            padding: 20px;
        }

        .email-footer {
            text-align: center;
            padding: 20px 0;
            background-color: #3490dc;
            color: #ffffff;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3490dc;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Job Confirmation</h1>
        </div>
        <div class="email-body">
            <p>Dear {{ $job->employer->user->first_name }},</p>
            <p>Your job posting for the position of <strong>{{ $job->title }}</strong>at <strong>{{ $job->employer->name }}</strong> has been
                successfully posted, and is live now!.</p>
            <p>You can review or edit your job posting by clicking the button below:</p>
            <a href="{{ url('/jobs/' . $job->id) }}" class="button">Review Job Posting</a>
            <p>Thank you for using our platform. If you have any questions or need further assistance, please do not
                hesitate to contact us.</p>
            <p>Best regards,</p>
            <p>{{ config('app.name') }}</p>
            <p><a href="mailto:{{ config('app.email') }}">{{ config('app.email') }}</a></p>

        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
