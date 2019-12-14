@extends('partial.mainDashboard')
@section('title', 'Edit Menu')
@section('sidebar')
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li><a class="nav-link" href="/waiter"><i class="far fa-square"></i> <span>Entri Menu</span></a></li>
</ul>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Menu</h1>
    </div>
    <div class="section-body">
        <form method="POST" action="/waiter/{{$masakan->id_masakan}}">
            {{-- @method('put') --}}
            @csrf
            <div class="form-group">
                <label for="nama_masakan">Nama Masakan</label>
                <input type="text" class="form-control @error('nama_masakan') is-invalid @enderror" id="nama_masakan"
                    placeholder="Masukkan Nama Masakan" name="nama_masakan" value="{{ $masakan->nama_masakan }}">
                {{-- @error('nama_masakan')
                        <div class="invalid-feedback">{{ $message }}</div>
            @enderror --}}
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga"
            placeholder="Masukkan Harga" name="harga" value="{{ $masakan-> harga }}">
        {{-- @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
    </div>
    <div class="form-group">
        <label for="status_masakan">Status Masakan</label>
        <input type="text" class="form-control @error('status_masakan') is-invalid @enderror" id="status_masakan"
            placeholder="Masukkan Status Masakan" name="status_masakan" value="{{ $masakan->status_masakan }}">
        {{-- @error('status_masakan')
                        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
    </div>
    <button type="submit" class="btn btn-primary">Edit Data!</button>
    </form>

    </div>
</section>
@endsection
