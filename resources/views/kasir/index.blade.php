@extends('partial.mainDashboard')
@section('title', 'Transaksi')
@section('sidebar')
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="nav-item">
        <a href="/kasir" class="nav-link"><i class="far fa-square"></i><span>Transaksi</span></a>
    </li>
@endsection
    @section('content')
        <div class="text-center mt-5">
             <h3>Transaksi</h3>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="/kasir/create" class="btn btn-primary">Tambah Transaksi</a><br><br>
            </div>
        <div class="panel-body">
                    <table class="table" id="table">
                        <thead class="thead-dark">
                            <th scope="col">Id Transaksi</th>
                            <th scope="col">No Meja</th>
                            <th scope="col">Nama Masakan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Kembalian</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
        </div>
    </section>

    @include('kasir/bayar')

    @stop

    @section('scripts')
    <script type="text/javascript">
    var table = $('#table').DataTable({
        "processing":true,
        "serverSide":true,
        "ajax" : {
            "url" : "{{route('json/kasir')}}"
        },
        "columns" : [
            { data: 'id_transaksi', render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1;}, "width": "10%", "className": "dt-center",},
            { data: 'no_meja', name: 'no_meja' , "className": "dt-center",},
            { data: 'nama_masakan', name: 'nama_masakan' , "className": "dt-center",},
            { data: 'harga', render: $.fn.dataTable.render.number( '.', ',', 2 ),"className": "dt-center",},
            { data: 'tanggal', name: 'tanggal' , "className": "dt-center",},
            { data: 'qty', name: 'qty' , "className": "dt-center",},
            { data: 'total_bayar', render: $.fn.dataTable.render.number( '.', ',', 2 ),"className": "dt-center",},
            { data: 'kembalian', render: $.fn.dataTable.render.number('.', ',', 2 ), "className": "dt-center",},
            { data: 'action', name: 'action', orderable:false, searchable: false, "className": "dt-center" } 
        ]
    });
    function editForm(id_transaksi) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "{{url ('kasir') }}" + '/' + id_transaksi + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Bayar');

                $('#id_transaksi').val(data.id_transaksi);
                $('#id_detail_order').val(data.id_detail_order);
                $('#tanggal').val(data.tanggal);
                $('#qty').val(data.qty);
                $('#total_bayar').val(data.total_bayar);
                $('#kembalian').val(data.kembalian);
            },
            error: function () {
                alert("Nothing Data");
            }
        })
    }
    $(function () {
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id_transaksi = $('#id_transaksi').val();
                // total_bayar = $('#total_bayar').val();
                url = "{{ url('kasir') . '/' }}" + id_transaksi;
                data = new FormData($("#modal-form form")[0]);
                // data = total_bayar <= total 
                $.ajax({
                    url: url,
                    type: "POST",
                    // data : $('#modal-form form').serialize(),
                    data: data,
                    // total_bayarr: data <= total_bayar,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: 'Berhasil Di Bayar',
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error: function (data) {
                        swal({
                            title: 'Oops...',
                            text: 'Uang Anda Kurang',
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
                return false;
            }
        });
    });
        
    </script>
    @endsection
