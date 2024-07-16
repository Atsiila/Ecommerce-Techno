@extends('layouts.admin')


@section('styles')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet')}}" />
@endsection


@section('content')


<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Produk</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<h6 class="mb-0 text-uppercase">DataTable Produk</h6>
<hr>
<div class="card">
    <div class="card-body">
        <div class="ms-right" align="right">
            <div class="btn-group">
                <a href="{{route('produk.create')}}" class="btn btn-primary">Add Data</a>
            </div>
            <br>
            <br>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>deskripsi</th>
                        <th>harga</th>
                        <th>stock</th>
                        <th>image</th>
                        {{-- <th>Salary</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($produk as $data)
                  
                        
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->deskripsi}}</td>
                            <td>@rupiah($data->harga)</td>
                            <td>{{$data->stock}}</td>
                            
                            <td>
                                <img src="{{ asset('/storage/produk/' . $data->image) }}" class="rounded" width="10"
                                    style="width: 150px">
                            </td>                            
                            <td>
                                <form action="{{route('produk.destroy', $data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('produk.edit', $data->id)}}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <button href="{{route('produk.destroy', $data->id)}}" class="btn btn-danger" data-confirm-delete="true">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        
                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection


@push('scripts')
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endpush