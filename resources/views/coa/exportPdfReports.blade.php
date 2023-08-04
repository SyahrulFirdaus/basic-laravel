@extends('layouts.app')
@section('content')
    
    <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content"> 
                    <div class="container-fluid">
                            <div class="card-body">
                                <div class="table-responsive mt-5">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                             <tr>
                                                <th>No Reports</th>
                                                <th>Categori</th>
                                                <th>Date</th>
                                                <th>Chart of Account Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roleTransaction as $item)
                                            <tr>
                                                <td><b>TRS-MMXXIII-{{ $item->id }}</b></td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->coa_nama }}</td>
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
        <script type="text/javascript">
            window.print();
        </script>
@endsection