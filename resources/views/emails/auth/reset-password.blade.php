<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Reset Password Notification') }}</title>
</head>
<body style="margin:0; padding:0; background-color:#eef0f3; font-family:'Open Sans', Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#eef0f3; padding:30px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:480px; background-color:#ffffff; border-radius:4px; overflow:hidden; box-shadow:0 1px 3px rgba(0,0,0,0.1);">
                    <tr>
                        <td align="center" style="background-color:#2a2d3c; padding:28px 20px;">
                            <img src="{{ asset('assets/dist/img/light-logo.png') }}" alt="{{ config('app.name') }}" style="max-height:40px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px 32px 8px 32px;">
                            <h2 style="margin:0 0 4px 0; color:#2a2d3c; font-size:20px;">{{ __('Reset Password') }}</h2>
                            <p style="color:#777777; font-size:14px; margin:0 0 20px 0;">
                                {{ __('Hello, :name', ['name' => $user->name]) }}
                            </p>
                            <p style="color:#555555; font-size:14px; line-height:22px;">
                                {{ __('You are receiving this email because we received a password reset request for your account.') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:12px 32px 28px 32px;">
                            <a href="{{ $url }}" target="_blank" style="display:inline-block; background-color:#27c24c; color:#ffffff; text-decoration:none; font-size:14px; font-weight:600; padding:12px 28px; border-radius:3px;">
                                {{ __('Reset Password') }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0 32px 28px 32px;">
                            <p style="color:#999999; font-size:12px; line-height:20px; margin:0 0 8px 0;">
                                {{ __('This password reset link will expire in :count minutes.', ['count' => $expireMinutes]) }}
                            </p>
                            <p style="color:#999999; font-size:12px; line-height:20px; margin:0;">
                                {{ __('If you did not request a password reset, no further action is required.') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:1px solid #eeeeee; padding:16px 32px; background-color:#fafafa;">
                            <p style="color:#aaaaaa; font-size:11px; margin:0;">
                                {{ __('If you\'re having trouble clicking the ":actionText" button, copy and paste the URL below into your web browser:', ['actionText' => __('Reset Password')]) }}
                            </p>
                            <p style="word-break:break-all; margin:6px 0 0 0;">
                                <a href="{{ $url }}" style="color:#27c24c; font-size:11px;">{{ $url }}</a>
                            </p>
                        </td>
                    </tr>
                </table>
                <p style="color:#aaaaaa; font-size:11px; margin:16px 0 0 0;">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
