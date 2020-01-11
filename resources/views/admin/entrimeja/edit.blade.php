@extends('partial.mainDashboard')
@section('title', 'Edit Meja')
@section('sidebar')
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="nav-item">
        <a href="/admin" class="nav-link"><i class="fas far fa-square"></i><span>Entri Meja</span></a>
    </li>
    <li><a class="nav-link" href="/admin/entribarang"><i class="far fa-square"></i> <span>Entri Menu</span></a></li>
</ul>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Meja</h1>
    </div>
    <div class="section-body">
        <form method="POST" action="/admin/entrimeja/{{$order->id_order}}">
            {{-- @method('put') --}}
            @csrf
            <div class="form-group">
                <label for="no_meja">No Meja</label>
                <input type="number" class="form-control @error('no_meja') is-invalid @enderror" id="no_meja"
                    placeholder="Masukkan No Meja" name="no_meja" value="{{ $order->no_meja }}">
                {{-- @error('no_meja')
                        <div class="invalid-feedback">{{ $message }}</div>
            @enderror --}}
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                    placeholder="Masukkan Tanggal" name="tanggal" value="{{ $order->tanggal }}">
                {{-- @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
            @enderror --}}
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                    placeholder="Masukkan Keterangan" name="keterangan" value="{{ $order->keterangan }}">
                {{-- @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
            @enderror --}}
            </div>
            <div class="form-group">
                <label for="status_order">Status Order</label>
                <input type="text" class="form-control @error('status_order') is-invalid @enderror" id="status_order"
                    placeholder="Masukkan Status Order" name="status_order" value="{{ $order->status_order }}">
                {{-- @error('status_order')
                                <div class="invalid-feedback">{{ $message }}</div>
            @enderror --}}
            </div>
            <button type="submit" class="btn btn-primary">Edit Data!</button>
            </form>

            </div>
        </section>
        @endsection
