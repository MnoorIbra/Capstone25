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
                                    <h4 class="card-title">Barang Masuk</h4>
                                    <a class="btn btn-warning btn-round ml-auto text-light" href="">
                                        <i class="fa fa-money-bill"></i>
                                        Piutang
                                    </a>
                                    <a class="btn btn-primary btn-round ml-2 text-light" href="/transaksi/add"> <i
                                            class="fa fa-plus"></i>
                                        Add Row
                                    </a>
                                </div>

                            </div>
                            <div class="card-body">
                                <!-- Modal tambah -->
                                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">
                                                        New</span>
                                                    <span class="fw-light">
                                                        Row
                                                    </span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="/kategori/store" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="nama_kategori"
                                                            placeholder="Nama kategori..." required>

                                                    </div>



                                                </div>
                                                <div class="modal-footer ">
                                                    <button type="submit" id="addRowButton" class="btn btn-primary"><i
                                                            class="fa fa-save"></i> Tambah</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                                            class="fa fa-undo"></i> Close</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- @foreach ($data as $d)
                                    <!-- Modal edit -->
                                    <div class="modal fade" id="EditRowModal{{ $d->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                            Edit</span>
                                                        <span class="fw-light">
                                                            Row
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="/kategori/update/{{ $d->id }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" name="nama_kategori"
                                                                value="{{ $d->nama_kategori }}"
                                                                placeholder="Nama kategori..." required>

                                                        </div>



                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button type="submit" id="addRowButton"
                                                            class="btn btn-primary"><i class="fa fa-save"></i>
                                                            Tambah</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach ($data as $d)
                                    <!-- Modal delete -->
                                    <div class="modal fade" id="DeleteRowModal{{ $d->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                            Edit</span>
                                                        <span class="fw-light">
                                                            Row
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="/kategori/delete/{{ $d->id }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <h4>Apakah Anda Ingin Menghapus data? </h4>
                                                    </div> --}}



                                {{-- <div class="modal-footer ">
                                                        <button type="submit" id="addRowButton"
                                                            class="btn btn-primary"><i class="fa fa-save"></i>
                                                            Hapus</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}

                                <div class="table-responsive">
                                    <form method="POST" action="{{ route('caritransaksi') }}">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <div class="form-group row mx-auto">
                                                        <label for="date" class="col-form-label col-sm-1">Tanggal Mulai</label>
                                                        <div class="col-sm-3">
                                                            <input type="date" class="form-control input-sm" id="form" name="fromdate" required>
                                                        </div>
                                                        <label for="date" class="col-form-label col-sm-1">Tanggal Akhir</label>
                                                        <div class="col-sm-3">
                                                            <input type="date" class="form-control input-sm" id="form" name="todate" required>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <button type="submit" class="btn" name="search" >search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No </th>
                                                <th>Kode</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Harga Jual</th>
                                                <th>Stok Keluar</th>
                                                <th>Produk</th>
                                                <th>Salesman</th>
                                                <th>Customer</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1 @endphp
                                            @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $row->kode_transaksi }}</td>
                                                    <td>{{ $row->tanggal_transaksi }}</td>
                                                    <td>{{ $row->harga_jual }}</td>
                                                    <td>{{ $row->stok_keluar }}</td>
                                                    <td>{{ $row->produk->nama_produk }}</td>
                                                    <td>{{ $row->salesman->nama_salesman }}</td>
                                                    <td>{{ $row->customer->nama_customer }}</td>
                                                    <td>
                                                        <a href="#ShowRowModal{{ $row->id }}" data-toggle="modal"
                                                            class="btn btn-xs btn-secondary"><i class="fa fa-cash"></i>
                                                            Edit</a>
                                                        <a href="#EditRowModal{{ $row->id }}" data-toggle="modal"
                                                            class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>
                                                            Edit</a>
                                                        <a href="#DeleteRowModal{{ $row->id }}" data-toggle="modal"
                                                            class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>
                                                            Delete</a>
                                                    </td>
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

    <script type="text/javascript">
        $(function() {

            //   $('#add-row').DataTable({
            //       processing: false,
            //       serverSide: true,
            //       ajax: "{{ route('transaksi') }}",
            //       columns: [
            //           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            //           {data: 'kode_transaksi', name: 'kode_transaksi'},
            //           {data: 'tanggal_transaksi', name: 'tanggal_transaksi'},
            //           {data: 'harga_jual', name: 'harga_jual'},
            //           {data: 'stok_keluar', name: 'stok_keluar'},
            //           {data: 'produk.nama_produk', name: 'produk.nama_produk'},
            //           {data: 'salesman.nama_salesman', name: 'salesman.nama_salesman'},
            //           {data: 'customer.nama_customer', name: 'customer.nama_customer'},
            //           {
            //               data: 'action',
            //               name: 'action',
            //               orderable: true,
            //               searchable: true
            //           },
            //       ]
            //   });



        });
    </script>
@endsection
