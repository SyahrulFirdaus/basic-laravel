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
                        <div class="card shadow mb-4 mt-4 ">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Data Transaction</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="/mcoa/vreports/{{ $coa->id }}" method="POST">
                                        @method('put')
                                        @csrf
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
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="nikHelp" value="{{ $coa->tanggal }}" required>
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
                                    <a class="btn btn-warning" href="/mcoa/vreports">Cancel</a>
                                    <button type="submit" class="btn btn-primary" value="save">Save</button>
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

@endsection