@extends('layouts.app')
@section('content')
    
        <div id="wrapper">

            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Tiketux</div>
                </a>

                <hr class="sidebar-divider my-0">

                <li class="nav-item">
                    <a class="nav-link" href="/mcoa">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
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
                        <div class="card shadow mb-4 mt-4 ">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Data Transaction</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="/mcoa/vtransaction/{{ $coa->id }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="nikHelp" value="{{ $coa->tanggal}}" @required(true)>
                                            <div id="namaHelp" class="form-text">Input your transaction date.</div>
                                        </div>
                                            
                                         <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Chart of Accounts Code</label>
                                            <select class="form-select" aria-label="Default select example" name="coa_kode">
                                                    @foreach ($roleCoa as $item)
                                                        <option value="{{ $item->kode }}">{{ $item->kode }}</option>
                                                    @endforeach
                                            </select>
                                            <div id="namaHelp" class="form-text">Select your chart of account code.</div>
                                        </div> 
                                        
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Name of Chart of Account</label>
                                            <select class="form-select" aria-label="Default select example" name="coa_nama">
                                                    @foreach ($roleCoa as $item)
                                                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                    @endforeach
                                            </select>
                                            <div id="namaHelp" class="form-text">Select your chart of account code.</div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Description</label>
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" aria-describedby="deskripsiHelp" value="{{ $coa->deskripsi }}" @required(true)>
                                            <div id="namaHelp" class="form-text">Input your chart of account description.</div>
                                        </div> 

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Debit</label>
                                            <input type="text" class="form-control" id="debit" name="debit" aria-describedby="debitHelp" value="{{ $coa->debit }}" @required(true)>
                                            <div id="namaHelp" class="form-text">Input the debit nominal amount for your chart of account.</div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Kredit</label>
                                            <input type="text" class="form-control" id="kredit" name="kredit" aria-describedby="kreditHelp" value="{{ $coa->kredit }}" @required(true)>
                                            <div id="namaHelp" class="form-text">Input the nominal credit amount for your chart of account.</div>
                                        </div>
                                    <a class="btn btn-warning" href="/mcoa">Cancel</a>
                                    <button type="submit" class="btn btn-primary" value="save">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="AddCoa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Coa</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="/mcoa/store" method="POST">
                            @csrf
                    <div class="modal-body">
                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode</label>
                                <input type="text" class="form-control" id="nama" name="kode" aria-describedby="kodeHelp">
                                <div id="kodeHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nikHelp">
                                <div id="namaHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>

                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    @foreach ($roleName as $item)
                                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" value="save">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



@endsection