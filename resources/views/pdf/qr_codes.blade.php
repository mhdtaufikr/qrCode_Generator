<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Codes</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
        }

        td {
            width: 50%;
            padding: 10px;
        }

        /* Style for each QR code value */
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>QR Codes</h1>

    <table>
        @foreach ($qrCodeValues as $index => $qrCodeValue)
            @if ($index % 2 == 0)
                <tr>
            @endif

            <td>
                <p>{{ $qrCodeValue }}</p>
                <!-- Include code to generate QR code based on $qrCodeValue -->
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $qrCodeValue }}" alt="QR Code">
            </td>

            @if ($index % 2 != 0 || $loop->last)
                </tr>
            @endif
        @endforeach
    </table>
</body>
</html>
