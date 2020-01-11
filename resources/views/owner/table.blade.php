<table class="table"  id="table">
    <thead class="thead-dark">
        <tr>
        <th>Id Transaksi</th>
        <th>No Meja</th>
        <th>Nama Masakan</th>
        <th>Harga</th>
        <th>Tanggal</th>
        <th>Qty</th>
        <th>Total Bayar</th>
        <th>Kembalian</th>
        </tr>
    </thead>
    <tbody>
        @section('scripts')
        <script>
        var table = $('#table').DataTable({
        dom: 'lBfrtip',
        buttons: [           
        'copy', 'csv', 'excel', 'pdf', 'print'],
        "processing":true,
        "serverSide":true,
        "ajax" : {
            "url" : "{{route('json/owner')}}"
        },
        "columns" : [
            { data: 'id_transaksi', render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1;}, "width": "10%", "className": "dt-center",},
            { data: 'no_meja', name: 'no_meja' , "className": "dt-center",},
            { data: 'nama_masakan', name: 'nama_masakan' , "className": "dt-center",},
            { data: 'harga', render: $.fn.dataTable.render.number( '.', ',', 2 ),"className": "dt-center",},
            { data: 'tanggal', name: 'tanggal' , "className": "dt-center",},
            { data: 'qty', name: 'qty' , "className": "dt-center",},
            { data: 'total_bayar', render: $.fn.dataTable.render.number( '.', ',', 2 ),"className": "dt-center",},
            { data: 'kembalian', render: $.fn.dataTable.render.number('.', ',', 2 ), "className": "dt-center",}
        ]
    });
    </script>
    @endsection
    </tbody>
</table>
