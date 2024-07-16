@extends('layouts.admin')
@section('style')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet"')}}" />
@endsection
@section('content')
<!--breadcrumb-->
 <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add Data</div>
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

<h6 class="mb-0 text-uppercase">DataTable produk</h6>
<hr>
<div class="card">
                <div class="card-header">
                    <div class="float-start">
                        <h5>produk</h5>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label">name</label>
                            <input type="text" class="form-control @error('produk') is-invalid @enderror" name="name"
                            value="{{ old('produk') }}" placeholder="name" required>
                            @error('produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="mb-2">
                            <label class="form-label">Masukan deskripsi</label>
                            <input type="text" class="form-control @error('produk') is-invalid @enderror" name="deskripsi"
                            value="{{ old('produk') }}" placeholder="deskripsi" required>
                            @error('produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">masukan harga</label>
                            <input type="integer" class="form-control @error('produk') is-invalid @enderror" name="harga"
                            value="{{ old('produk') }}" placeholder="harga" required>
                            @error('produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">masukan stock</label>
                            <input type="integer" class="form-control @error('produk') is-invalid @enderror" name="stock"
                            value="{{ old('produk') }}" placeholder="stock" required>
                            @error('produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Nama kategori</label>
                            <select name="id_kategori" id="" class="form-control">
                                @foreach ($kategori as $item)
                                    <option value="{{$item->id}}">{{ $item->Kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                value="{{ old('image') }}" required></input>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="float-end mt-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('produk.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </form>
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