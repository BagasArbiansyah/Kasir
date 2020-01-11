@extends('partial.mainDashboard')
@section('title', 'Entri Meja')
@section('sidebar')
<ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item">
          <a href="/admin" class="nav-link"><i class="far fa-square"></i><span>Entri Meja</span></a>
        </li>
        <li><a class="nav-link" href="/admin/entribarang"><i class="far fa-square"></i> <span>Entri Menu</span></a></li>
    </ul>
    @endsection
    @section('content')      
    <section class="section">
        <div class="section-header">
            <h1>Entri Meja</h1>
        </div>
        <div class="section-body">
          <a href="/admin/entrimeja/create" class="btn btn-primary">Tambah Data</a><br><br>
          <div class="row">
              <div class="col-10">
                  <table class="table">
                      <thead class="thead-dark">
                          <th scope="col">Id Order</th>
                          <th scope="col">No_Meja</th>
                          <th scope="col">Tanggal</th>
                          {{-- <th scope="col">Id User</th> --}}
                          <th scope="col">Keterangan</th>
                          <th scope="col">Status Order</th>
                          <th scope="col">Aksi</th>
                        </thead>
                      <tbody>
                      @foreach( $order as $key=>$ord )
                      <tr>
                          <td>{{ $key + 1}}</td>
                          <td>{{ $ord->no_meja }}</td>    
                          <td>{{ $ord->tanggal }}</td>    
                          {{-- <td>{{ $ord->id_user }}</td> --}}
                          <td>{{ $ord->keterangan }}</td>
                          <td>{{ $ord->status_order }}</td>    
                          <td>
                            <a href="/admin/entrimeja/{{ $ord->id_order }}/edit" class="btn btn-success">Edit</a>    
                            <form action="/admin/entrimeja/{{ $ord->id_order }} " method="post" class="d-inline">
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
