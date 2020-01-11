@extends('partial.mainDashboard')
@section('title', 'Laporan Transaksi')
@section('sidebar')
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="nav-item">
        <a href="/kasir" class="nav-link"><i class="far fa-square"></i><span>Laporan Transaksi</span></a>
    </li>
    @endsection
    @section('content')
    <section class="section">
        <div class="section-header">
            <h1>Transaksi</h1>
        </div>
        <div class="section-body">
            {{-- <a href="/owner/export_excelview" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> --}}
		
            <div class="row">
                <div class="col-10">
                   @include('owner.table')
                </div>
            </div>
        </div>
    </section>
    @stop
