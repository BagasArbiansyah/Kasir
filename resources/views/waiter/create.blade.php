@extends('partial.mainDashboard')
@section('title', 'Tambah Order')
@section('sidebar')
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li><a class="nav-link" href="/waiter/order"><i class="far fa-square"></i> <span>Order</span></a></li>
</ul>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pesan Menu</h1>
    </div>
    <div class="section-body">
    <form method="POST" action="/waiter">
        {{ csrf_field() }} {{ method_field('POST') }}
            <div class="form-group">
                <label for="no_meja">No Meja</label>
                <select id="id_order" class="form-control" name="id_order" required>
                    <option value="" selected disabled>No Meja</option>
                    @foreach ($order as $key=> $ord)
                        <option value="{{$key}}">{{$ord}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_masakan">Nama Masakan</label>
                <select id="id_masakan" class="form-control" name="id_masakan" required>
                    <option value="" selected disabled>Nama Masakan</option>
                    @foreach ($masakan as $key=> $msk)
                        <option value="{{$key}}">{{$msk}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                    placeholder="Masukkan Keterangan" name="keterangan" value="{{ old('keterangan')}}">
            
            </div>
            <div class="form-group">
                <label for="status_detail_order">Status Detail Order</label>
                <input type="text" class="form-control @error('status_detail_order') is-invalid @enderror" id="status_detail_order"
                    placeholder="Masukkan Status Detail Order" name="status_detail_order" value="{{ old('status_detail_order')}}">
         
            </div>
            <div class="form-group">
                <label for="stok">QTY</label>
                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok"
                    placeholder="Masukkan Jumlah Beli" name="stok" value="{{ old('stok')}}">
         
            </div>
    <button type="submit" class="btn btn-primary">Tambah Data!</button>
    </form>
    </div>
</section>
@endsection