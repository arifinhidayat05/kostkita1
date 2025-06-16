@extends('layout.main')
@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('kamar.create' ) }}" class="btn btn-primary">Tambah Kamar</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kost</th>
                            <th>Alamat</th>
                            <th>Tipe kamar</th>
                            <th>Fasilitas</th>
                            <th>Harga</th>
                            <th>gmabar </th>
                            <th>Status</th>
                            <th>action</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($kosts as $kost)
                        @foreach ($kost->kamars as $kamar)
                        <tr>
                            <td>{{ $kost->nama_kost }}</td>
                            <td>{{ $kost->alamat }}</td>
                            <td>{{ $kamar->nama_kamar }}</td>
                            <td>{{ $kamar->fasilitas }}</td>
                            <td>Rp{{ number_format($kamar->harga, 0, ',', '.') }}</td>
                            <td><img src="{{ asset( $kamar->gambar) }}" alt="Gambar Kamar" style="width: 100px;height: 100px;"></td>
                            <td>
                                <select name="status_kamar[{{ $kamar->kamar_id }}]"
                                    id="status_kamar_{{ $kamar->kamar_id }}"
                                    class="form-control status-select"
                                    data-kamar-id="{{ $kamar->kamar_id }}">
                                    <option value="tersedia" {{ $kamar->status_kamar === 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="tidak tersedia" {{ $kamar->status_kamar === 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                                </select>
                            </td>
                            <td><a href="{{ route('kamar.edit', ["id"=>$kamar->kamar_id])}}" class="btn btn-sm btn-warning mx-1" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route("kamar.delete",["id"=>$kamar->kamar_id]) }}" class="btn btn-sm btn-danger mx-1" title="Delete" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash-alt me-1"></i> Delete
                                </a>
                            </td>

                            <!-- <td>{{ ucfirst($kamar->status_kamar) }}</td> -->

                        </tr>

                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('.status-select').change(function() {
            var kamarId = $(this).data('kamar-id');
            var status = $(this).val();

            $.ajax({
                url: '{{ route("kamar.updateStatus", "") }}/' + kamarId,
                type: 'POST',
                data: {
                    status_kamar: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                },
            });
        });
    });
</script>



@endsection