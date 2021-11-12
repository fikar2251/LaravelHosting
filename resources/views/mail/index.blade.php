<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p class="d-flex justify-content-center text-center">
        <img src="{{ $message->embed($logo) }}" alt="">
    </p>
    <p>
        Yth :
    </p>
    <p>
        Kepada bpk / ibu {{ $pegawai->nama }}
    </p>
    <hr>
    <p>
        anda akan jatuh tempo kenaikan {{ $type }} pada {{ Carbon\Carbon::parse($tanggal)->format('d M Y') }}. silahkan mempersiapkan berkas kenaikan {{ $type }}
    </p>
    <hr>
    <p>
        Terima kasih. Abaikan jika sudah mengajukan
    </p>
</body>

</html>