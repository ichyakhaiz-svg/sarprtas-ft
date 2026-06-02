<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<style>

body{
    font-family: "Cambria";
    font-size: 12pt;
    line-height: 1.6;
}

.header{
    margin-bottom:30px;
}

table{
    width:100%;
}

.info{
    width:100%;
}

.info td{
    vertical-align:top;
}

.barang{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
    margin-bottom:20px;
}

.barang th,
.barang td{
    border:1px solid black;
    padding:6px;
}

.ttd{
    width:250px;
    float:right;
    text-align:center;
    margin-top:40px;
}

.clear{
    clear:both;
}

</style>

</head>

<body>

{{-- KOP SURAT --}}

@if(file_exists(public_path('kop-surat.png')))

<img
    src="{{ public_path('kop-surat.png') }}"
    width="100%"
>

@else

<h3 align="center">
    KOP SURAT BELUM DIUPLOAD
</h3>

@endif

<br>

<table class="info">

<tr>

<td width="100">
Nomor
</td>

<td width="20">
:
</td>

<td>
{{ $data['nomor'] }}
</td>

</tr>

<tr>

<td>
Lampiran
</td>

<td>
:
</td>

<td>
{{ $data['lampiran'] }}
</td>

</tr>

<tr>

<td>
Perihal
</td>

<td>
:
</td>

<td>
<b>{{ $data['perihal'] }}</b>
</td>

</tr>

</table>

<br><br>

Kepada Yth :

<br>

{{ $data['kepada'] }}

<br>

Di Tempat

<br><br>

Dengan Hormat,

<br><br>

<div style="text-align:justify">

{!! nl2br(e($data['isi'])) !!}

</div>

{{-- TABEL BARANG OPSIONAL --}}

@if(
    isset($data['nama_barang'])
    &&
    count(
        array_filter(
            $data['nama_barang']
        )
    ) > 0
)

<br>

<table class="barang">

    <tr>

        <th width="50">
            No
        </th>

        <th>
            Nama Barang
        </th>

        <th width="80">
            Jumlah
        </th>

        <th>
            Keterangan
        </th>

    </tr>

    @foreach($data['nama_barang'] as $i => $barang)

    @if(!empty($barang))

    <tr>

        <td align="center">
            {{ $i + 1 }}
        </td>

        <td>
            {{ $barang }}
        </td>

        <td align="center">
            {{ $data['jumlah_barang'][$i] ?? '' }}
        </td>

        <td>
            {{ $data['keterangan_barang'][$i] ?? '' }}
        </td>

    </tr>

    @endif

    @endforeach

</table>

@endif

<p>

Demikian pengajuan kami, atas perhatian dan kerjasamanya kami sampaikan terima kasih.

</p>

<div class="ttd">

Kediri,
{{ \Carbon\Carbon::parse($data['tanggal'])->translatedFormat('d F Y') }}

<br><br>

{{ $data['jabatan'] }}

<br><br><br><br>

<strong>
<u>{{ $data['penandatangan'] }}</u>
</strong>

<br>

NIK. {{ $data['nik'] }}

</div>

@if(
    !empty($data['paraf1']) ||
    !empty($data['paraf2']) ||
    !empty($data['paraf3']) ||
    !empty($data['paraf4']) ||
    !empty($data['paraf5'])
)

<div
    style="
        clear:both;
        margin-top:20px;
        text-align:right;
    "
>

    <table
    class="paraf-table"
    style="
        width:auto;
        margin-left:auto;
        margin-right:0;
        border-collapse:collapse;
    "
    >

        <!-- BARIS PARAF -->

        <tr>

            @if(!empty($data['paraf1']))
            <td
                style="
                    border:1px solid black;
                    width:35px;
                    height:25px;
                "
            ></td>
            @endif

            @if(!empty($data['paraf2']))
            <td
                style="
                    border:1px solid black;
                    width:35px;
                    height:25px;
                "
            ></td>
            @endif

            @if(!empty($data['paraf3']))
            <td
                style="
                    border:1px solid black;
                    width:35px;
                    height:25px;
                "
            ></td>
            @endif

            @if(!empty($data['paraf4']))
            <td
                style="
                    border:1px solid black;
                    width:35px;
                    height:25px;
                "
            ></td>
            @endif

            @if(!empty($data['paraf5']))
            <td
                style="
                    border:1px solid black;
                    width:35px;
                    height:25px;
                "
            ></td>
            @endif

        </tr>

        <!-- BARIS JABATAN -->

        <tr>

            @if(!empty($data['paraf1']))
            <td
                style="
                    border:1px solid black;
                    text-align:center;
                    font-size:8px;
                    padding:2px;
                "
            >
                {{ $data['paraf1'] }}
            </td>
            @endif

            @if(!empty($data['paraf2']))
            <td
                style="
                    border:1px solid black;
                    text-align:center;
                    font-size:8px;
                    padding:2px;
                "
            >
                {{ $data['paraf2'] }}
            </td>
            @endif

            @if(!empty($data['paraf3']))
            <td
                style="
                    border:1px solid black;
                    text-align:center;
                    font-size:8px;
                    padding:2px;
                "
            >
                {{ $data['paraf3'] }}
            </td>
            @endif

            @if(!empty($data['paraf4']))
            <td
                style="
                    border:1px solid black;
                    text-align:center;
                    font-size:8px;
                    padding:2px;
                "
            >
                {{ $data['paraf4'] }}
            </td>
            @endif

            @if(!empty($data['paraf5']))
            <td
                style="
                    border:1px solid black;
                    text-align:center;
                    font-size:8px;
                    padding:2px;
                "
            >
                {{ $data['paraf5'] }}
            </td>
            @endif

        </tr>

    </table>

</div>

@endif

<div class="clear"></div>

</body>

</html>