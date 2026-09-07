<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New Website Lead</title>
</head>
<body style="margin:0;background:#f8fafc;color:#0f172a;font-family:Arial,sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f8fafc;padding:24px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:620px;background:#ffffff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden;">
                    <tr>
                        <td style="background:#020617;color:#ffffff;padding:22px 26px;">
                            <h1 style="margin:0;font-size:22px;">New Website Lead</h1>
                            <p style="margin:8px 0 0;color:#cbd5e1;">A new inquiry was submitted from ClickVera.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:26px;">
                            <p style="margin:0 0 14px;"><strong>Name:</strong> {{ $lead->name }}</p>
                            <p style="margin:0 0 14px;"><strong>Email:</strong> <a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></p>
                            <p style="margin:0 0 14px;"><strong>Phone:</strong> {{ $lead->phone ?: 'Not provided' }}</p>
                            <p style="margin:0 0 8px;"><strong>Message:</strong></p>
                            <div style="white-space:pre-line;background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:16px;line-height:1.6;">{{ $lead->message }}</div>
                            <p style="margin:18px 0 0;color:#64748b;font-size:13px;">Submitted on {{ $lead->created_at?->format('M d, Y h:i A') }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
