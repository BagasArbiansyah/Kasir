@extends('partial.mainDashboard')
@section('title', 'Edit Menu')
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
        <h1>Edit Menu</h1>
    </div>
    <div class="section-body">
        <form method="POST" action="/admin/entribarang/{{$masakan->id_masakan}}">
            @csrf
            <div class="form-group">
                <label for="nama_masakan">Nama Masakan</label>
                <input type="text" class="form-control @error('nama_masakan') is-invalid @enderror" id="nama_masakan"
                    placeholder="Masukkan Nama Masakan" name="nama_masakan" value="{{ $masakan->nama_masakan }}">
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga"
            placeholder="Masukkan Harga" name="harga" value="{{ $masakan->harga }}">
    </div>
    <div class="form-group">
        <label for="status_masakan">Status Masakan</label>
        <input type="text" class="form-control @error('status_masakan') is-invalid @enderror" id="status_masakan"
            placeholder="Masukkan Status Masakan" name="status_masakan" value="{{ $masakan->status_masakan }}">
    </div>
    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok"
            placeholder="Masukkan Status Masakan" name="stok" value="{{ $masakan->stok }}">
    </div>
    <button type="submit" class="btn btn-primary">Edit Data!</button>
    </form>

    </div>
</section>
@endsection
