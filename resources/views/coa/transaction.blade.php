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
                        <a class="btn btn-primary mb-4 mt-4" href="#" data-toggle="modal" data-target="#AddTransaction">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Add Transaction
                        </a>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Table Transaction</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No Transaction</th>
                                                <th>Tanggal</th>
                                                <th>Kode Chart of Account</th>
                                                <th>Nama Chart of Account</th>
                                                <th>Deskripsi</th>
                                                <th>Debit</th>
                                                <th>Kredit</th>
                                                <th>Hapus</th>
                                                <th>Edit</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            ?>
                                            @foreach ($roleTransaction as $item)
                                            <tr>
                                                <td><b>TRS-MMXXIII-{{ $item->id }}</b></td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->coa_kode }}</td>
                                                <td>{{ $item->coa_nama }}</td>
                                                <td>{{ $item->deskripsi }}</td>
                                                <td>{{ $item->debit }}</td>
                                                <td>{{ $item->kredit }}</td>
                                                <td>
                                                    <a class="btn btn-primary mb-4" href="/mcoa/{{ $item-> id }}/editTransaction">
                                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Edit
                                                    </a>
                                                </td>
                                                <td> 
                                                    <form action="/mcoa/vtransaction/{{ $item-> id }}" method="POST">
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
                            <span>Copyright &copy; Your Website 2020</span>
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
                        <h5 class="modal-title" id="exampleModalLabel">Add Data Transcation</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="/mcoa/storeTransaction" method="POST">
                            @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="nikHelp" required>
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
                            <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" aria-describedby="deskripsiHelp" required>
                            <div id="namaHelp" class="form-text">Input your chart of account description.</div>
                        </div> 

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Debit</label>
                            <input type="text" class="form-control" id="debit" name="debit" aria-describedby="deskripsiHelp" required>

                            {{-- <input
                                type="text"
                                name="debit"
                                id="txtExampleBoxOne"
                                value=""
                                class="form-control"
                                onBlur="formatCurrency(this, 'Rp ', 'blur');"
                                onkeyup="formatCurrency(this, 'Rp ');"
                            /> --}}
                            <div id="namaHelp" class="form-text">Input the debit nominal amount for your chart of account.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kredit</label>
                            <input 
                            type="text" 
                            class="form-control" 
                            id="kredit" name="kredit" 
                            aria-describedby="deskripsiHelp" 
                            required>

                            {{-- <input
                                type="text"
                                name="kredit"
                                id="txtExampleBoxOne"
                                value=""
                                class="form-control"
                                onBlur="formatCurrency(this, 'Rp ', 'blur');"
                                onkeyup="formatCurrency(this, 'Rp ');"
                            /> --}}
                            <div id="namaHelp" class="form-text">Input the nominal credit amount for your chart of account.</div>
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