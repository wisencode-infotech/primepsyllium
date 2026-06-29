@props(['branding', 'footerNote' => null])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $branding->email_brand_name }}</title>
</head>
<body style="margin:0; padding:0; background-color:{{ $branding->email_background_color }}; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:{{ $branding->email_background_color }}; padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px; background-color:#ffffff; border-radius:12px; overflow:hidden;">
                    <tr>
                        <td style="background-color:{{ $branding->email_primary_color }}; padding:20px 28px;">
                            @if ($branding->email_logo_url)
                                <img src="{{ $branding->email_logo_url }}" alt="{{ $branding->email_brand_name }}" style="height:32px; vertical-align:middle; margin-right:10px;">
                            @endif
                            <span style="color:#ffffff; font-size:18px; font-weight:bold; vertical-align:middle;">{{ $branding->email_brand_name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px; color:{{ $branding->email_text_color }}; font-size:14px; line-height:1.6;">
                            {{ $slot }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:16px 28px 28px; background-color:{{ $branding->email_secondary_color }}; color:#ffffff; font-size:12px; text-align:center;">
                            @if ($footerNote)
                                <p style="margin:0 0 8px;">{{ $footerNote }}</p>
                            @endif
                            <p style="margin:0; font-weight:bold;">You are receiving this email from {{ $branding->email_brand_name }}.</p>
                            @if ($branding->address)
                                <p style="margin:4px 0 0;">{{ $branding->address }}</p>
                            @endif
                            <p style="margin:4px 0 0;">&copy; {{ now()->year }} {{ $branding->email_brand_name }}. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
