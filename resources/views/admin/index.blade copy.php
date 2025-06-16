<div class="container">
    <table>
        <tr>
            <td>Nama Kost</td>
            <td>Alamat</td>
        </tr>
        <tr>
            @foreach ($kosts as $kost )
            <td>{{ $kost->nama_kost }}</td>
            <td>{{ $kost->alamat }}</td>
            @endforeach
            <td></td>
        </tr>
    </table>
</div>