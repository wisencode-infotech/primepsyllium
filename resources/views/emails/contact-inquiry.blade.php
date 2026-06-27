<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f5f3; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f5f3; padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px; background-color:#ffffff; border-radius:12px; overflow:hidden;">
                    <tr>
                        <td style="background-color:#17494b; padding:20px 28px;">
                            <span style="color:#ffffff; font-size:18px; font-weight:bold;">{{ config('app.name') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px; color:#1f2d2c; font-size:14px; line-height:1.6;">
                            {!! $body !!}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:16px 28px 28px; border-top:1px solid #e7e9e6; color:#8a8f8a; font-size:12px;">
                            This notification was sent automatically from the {{ config('app.name') }} website contact form.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
