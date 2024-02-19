@extends('layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">DataTables.Net</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Tables</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Datatables</a>
                        </li>
                    </ul>
                </div>
                <div class="row">




                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Persediaan Barang</h4>

                                </div>
                            </div>
                            <div class="card-body">




                                <div class="table-responsive">
                                    <table id="table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>

                                                <th>No</th>
                                                <th>Nama Produk</th>
                                                <th>Satuan</th>
                                                <th>Stok Awal</th>
                                                <th>Stok Masuk</th>
                                                <th>Stok Keluar</th>
                                                <th>Stok AKhir</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1 @endphp
                                            @foreach ($data as $row)
                                                <tr>
                                                    {{-- <td>{{ $no++ }}</td>
                                                    <td>{{ $row->tanggal_transaksi}}</td>
                                                    <td>{{ $row->nama_produk }}</td>
                                                    <td>{{ $row->stok_keluar }}</td>
                                                    <td>{{ $row->harga }}</td>
                                                    <td>{{ $row->harga_jual }}</td>
                                                    <td>{{ $row->keuntungan }}</td>
                                                    <td>{{ $row->persentase }} %</td> --}}
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->nama_produk}}</td>

                                                    <td>{{ $row->satuan}}</td>
                                                    <td>{{ $row->stok_awal}}</td>
                                                    <td>{{ $row->stok_masuk}}</td>
                                                    <td>{{ $row->stok_keluar }}</td>
                                                    <td>{{ $row->stok_akhir}}</td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection