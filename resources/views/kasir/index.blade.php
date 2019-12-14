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
            <a href="/kasir/create" class="btn btn-primary">Tambah Data</a><br><br>
            <div class="row">
                <div class="col-10">
                    <table class="table">
                        <thead class="thead-dark">
                            <th scope="col">Id Transaksi</th>
                            <th scope="col">No Meja</th>
                            <th scope="col">Nama Masakan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach( $transaksi as $tsk )
                            <tr>
                                {{-- <td>{{$key + 1}}</td> --}}
                            {{-- @endforeach --}}

                            {{-- @foreach ($order as $ord) --}}
                            <td>{{ $tsk->no_meja}}</td>
                            {{-- @endforeach --}}
                            
                            {{-- @foreach ($tsk as $msk) --}}
                            <td>{{$tsk->nama_masakan}}</td>
                            {{-- <td>{{$tsk->harga}}</td> --}}
                            {{-- @endforeach --}}
                            
                            {{-- @foreach( $transaksi as $key => $tsk ) --}}
                            <td>{{$tsk->tanggal}}</td>
                                {{-- <td>{{$tsk->total_bayar}}</td> --}}
                                {{-- <td> --}}
                                    {{-- @foreach($tsk->masakans as $t) --}}
                                    {{-- {{$tsk->harga}} --}}
                                    {{-- @endforeach --}}
                                    {{-- </td>
                                        <td>{{$tsk->tanggal }}</td>
                                        <td>{{$tsk->total_bayar }}</td> --}}
                                {{-- <td>
                                    <a href="/kasir/edit" class="btn btn-success">Edit</a>
                                    <form action="/kasir" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('Yakin Hapus?')" type="submit"
                                        class="btn btn-danger">Delete</button>
                                    </form>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @endsection
