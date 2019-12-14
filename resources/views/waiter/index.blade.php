@extends('partial.mainDashboard')
@section('title', 'Entri Menu')
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
        <h1>Entri Menu</h1>
    </div>
    <div class="section-body">
      <a href="/waiter/create" class="btn btn-primary">Tambah Data</a><br><br>
      <div class="row">
          <div class="col-10">
              <table class="table">
                  <thead class="thead-dark">
                      <th scope="col">Id Masakan</th>
                      <th scope="col">Menu Masakan</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Status Makanan</th>
                      <th scope="col">Aksi</th>
                    </thead>
                  <tbody>
                  @foreach( $masakan as $key=>$msk )
                  <tr>
                      <td>{{ $key + 1}}</td>
                      <td>{{ $msk->nama_masakan }}</td>    
                      <td>{{ $msk->harga }}</td>
                      <td>{{ $msk->status_masakan }}</td>
                      <td>
                        <a href="/waiter/{{ $msk->id_masakan }}/edit" class="btn btn-success">Edit</a>    
                        <form action="/waiter/{{ $msk->id_masakan }} " method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button onclick="return confirm('Yakin Hapus?')" type="submit" class="btn btn-danger">Delete</button>
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
