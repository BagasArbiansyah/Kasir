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
<section class="section">
    <div class="section-header">
        <h1>Transaksi</h1>
    </div>
    <div class="section-body">
    <form method="POST" action="/kasir">
        {{ csrf_field() }} {{ method_field('POST') }}
            <div class="form-group">
                <label for="no_meja">No Meja</label><br>
                <select id="id_detail_order" name="id_detail_order" class="form-control" required>
                <option value="" selected disabled>Data Meja</option>
                    @foreach ($detail as $dtl)
                <option value="{{$dtl->id_detail_order}}">{{$dtl->no_meja}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_masakan">Nama Masakan</label>
                <input type="text" class="form-control" id="nama_masakan" name="nama_masakan" readonly>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" readonly>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal" readonly>
            </div>
            <div class="form-group">
                <label for="qty">Qty</label>
                <input type="text" class="form-control" col-md-1" id="qty" name="qty" readonly>
            </div>
            <div class="form-group">
                <label for="total_bayar">Total Bayar</label>
                <input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly>
            </div>
    <button type="submit" class="btn btn-primary">Tambah Data!</button>
    </form>
    </div>
</section>
@endsection

@section('scripts')
<script>
   $('#id_detail_order').change(function(){
    var id_detail_order = $(this).val();
    var url = '{{ route("getDetails", ":id_detail_order") }}';
    url = url.replace(':id_detail_order', id_detail_order);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#nama_masakan').val(response.nama_masakan);
                $('#harga').val(response.harga);
                $('#tanggal').val(response.tanggal);
                $('#qty').val(response.stok);
                $('#total_bayar').val(response.stok*response.harga);
            }
        }
    });
});
</script>
@endsection
