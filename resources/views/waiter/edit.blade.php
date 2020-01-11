@extends('partial.mainDashboard')
@section('title', 'Edit Menu')
@section('sidebar')
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li><a class="nav-link" href="/waiter"><i class="far fa-square"></i> <span>Order</span></a></li>
</ul>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Menu</h1>
    </div>
    <div class="section-body">
        <form method="POST" action="/waiter/{{$detail_order->id_detail_order}}">
            @method('put')
            {{-- <input type="hidden" name="_method" value="PUT"> --}}
            @csrf
            <div class="form-group">
                <label for="no_meja">No Meja</label>
                <select id="id_order" class="form-control" name="id_order" required>
                    @foreach ($order as $key=>$ord)
                        <option value="{{$key}}" @if (!empty($detail_order) && $detail_order->id_order==$key ) selected @endif>{{$ord}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_masakan">Nama Masakan</label>
                <select id="id_masakan" class="form-control" name="id_masakan" required>
                    @foreach ($masakan as $key=>$msk)
                    <option value="{{$key}}" @if (!empty($detail_order) && $detail_order->id_masakan==$key ) selected @endif>{{$msk}}</option>
                    @endforeach
                </select>
            </div>        
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                    placeholder="Masukkan Harga" name="keterangan" value="{{ $detail_order->keterangan }}">
            </div>
            <div class="form-group">
                <label for="status_detail_order">Status Detail Order</label>
                <input type="text" class="form-control @error('status_detail_order') is-invalid @enderror" id="status_detail_order"
                    placeholder="Masukkan Status Masakan" name="status_detail_order" value="{{ $detail_order->status_detail_order }}">

            </div>
            <div class="form-group">
                <label for="stok">QTY</label>
                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok"
                    placeholder="Masukkan Status Masakan" name="stok" value="{{ $detail_order->stok }}">

            </div>
            <button type="submit" class="btn btn-primary">Edit Data!</button>
            </form>

            </div>
</section>
@endsection
