@extends('layouts.app')
@section('content')
    
    <div id="wrapper">
         <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center">
                    <div class="sidebar-brand-text mx-3">Tiketux</div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item">
                    <a class="nav-link" href="/mcoa/vreports">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Reports</span></a>
                </li>
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Main Menu
                </div>
                
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Menu</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Chart of Account</h6>
                            <a class="collapse-item" href="/mcoa">Master Chart of Account</a>
                            <a class="collapse-item" href="/mcoa/vkategori">Kategori Chart of Account</a>
                            <a class="collapse-item" href="/mcoa/vtransaction">Transaction</a>
                        </div>
                    </div>
                </li>
            </ul>

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content"> 
                    <div class="container-fluid">
                        <a class="btn btn-primary mb-4 mt-4" href="#" data-toggle="modal" data-target="#AddTransaction">
                             <i class="fas fa-plus-square pr-1"></i>
                                Add Reports
                        </a>

                        <a class="btn btn-primary mb-4 mt-4" href="/mcoa/exportreports" target="_blank">
                            <i class="fas fa-print"></i>
                                export Reports
                        </a>

                        <a class="btn btn-primary mb-4 mt-4" href="/mcoa/exportExcel">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Exports
                        </a>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Table Reports</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                             <tr>
                                                <th>No Reports</th>
                                                <th>Categori</th>
                                                <th>Date</th>
                                                <th>Chart of Account Name</th>
                                                <th>Edit</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roleTransaction as $item)
                                            <tr>
                                                <td><b>TRS-MMXXIII-{{ $item->id }}</b></td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->coa_nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary mb-4" href="/mcoa/{{ $item-> id }}/editReports">
                                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Edit
                                                    </a>
                                                </td>
                                                <td> 
                                                    <form action="/mcoa/vreports/{{ $item-> id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <input class="btn btn-danger" type="submit" name="submit" value="Delete">
                                                    </form>
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

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Tiketux 2023</span>
                        </div>
                    </div>
                </footer>

            </div>
        </div>

     <div class="modal fade" id="AddTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Data Reports</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="/mcoa/storeReports" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Category</label>
                            <select class="form-select" aria-label="Default select example" name="category">
                                    @foreach ($roleKategori as $item)
                                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                    @endforeach
                            </select>
                            <div id="namaHelp" class="form-text">Select your chart of account code.</div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="nikHelp" required>
                            <div id="namaHelp" class="form-text">Input your transaction date.</div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Category</label>
                            <select class="form-select" aria-label="Default select example" name="coa_nama">
                                    @foreach ($roleCoa as $item)
                                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                    @endforeach
                            </select>
                            <div id="namaHelp" class="form-text">Select your chart of account code.</div>
                        </div>
                            
                        {{-- <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" aria-describedby="deskripsiHelp" required>
                            <div id="namaHelp" class="form-text">Input your amount.</div>
                        </div>  --}}
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" value="save">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    
     
@endsection