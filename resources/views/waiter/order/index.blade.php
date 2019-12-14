@extends('partial.mainDashboard')
@section('title', 'Entri Order')
@section('sidebar')
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li><a class="nav-link" href="/waiter"><i class="far fa-square"></i> <span>Entri Menu</span></a></li>
    <li><a class="nav-link" href="/waiter/order"><i class="far fa-square"></i> <span>Order</span></a></li>
</ul>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Entri Order</h1>
    </div>
    <div class="section-body">
        <a href="/waiter/order/create" class="btn btn-primary">Tambah Data</a><br><br>
        <div class="row">
            <div class="col-10">
                <table class="table">
                    <thead class="thead-dark">
                        <th scope="col">Id Detail Order</th>
                        <th scope="col">No Meja</th>
                        <th scope="col">Nama Masakan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status Detail Order</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach( $detail_order as $key=>$dtl )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$dtl->no_meja}}</td>
                            <td>{{$dtl->nama_masakan}}</td>
                            <td>{{$dtl->harga}}</td>
                            <td>{{$dtl->status_detail_order}}</td>
                            <td>
                              <a href="/waiter//edit" class="btn btn-success">Edit</a>
                              <form action="/waiter/" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Yakin Hapus?')" type="submit"
                                class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
