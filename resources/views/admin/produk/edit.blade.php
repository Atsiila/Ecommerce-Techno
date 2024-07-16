@extends('layouts.admin')

@section('content')
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">PRODUK</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

<h6 class="mb-0 text-uppercase">DataTable produk</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">

                        @php $no = 1; @endphp
                        <form action="{{route('produk.update', $produk->id)}}" {{--error cik--}} method="POST" enctype="multipart/form-data"> {{--//postnya badag!--}}
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Masukkan nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $produk->name)}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">Masukkan deskripsi</label>
                                <input type="text" class="form-control" @error('deskripsi') is-invalid @enderror name="deskripsi"
                                value="{{ old('deskripsi') }}" placeholder="deskripsi" required>
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Masukkan harga</label>
                                <input type="text" class="form-control" @error('harga') is-invalid @enderror name="harga"
                                value="{{ old('harga') }}" placeholder="harga" required>
                                @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Masukkan stock</label>
                                <input type="text" class="form-control" @error('stock') is-invalid @enderror name="stock"
                                value="{{ old('stock') }}" placeholder="stock" required>
                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Kategori</label>
                                <select name="id_kategori" id="" class="form-control">
                                    @foreach ($kategori as $item)
                                        <option value="{{$item->id}}" {{$item->id == $produk->id_kategori ? 'selected': ''}}>{{ $item->Kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                    value="{{ $produk->image }}"></input>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <a href="{{route('produk.index')}}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
            </div>
        </div>
    </div>

@endsection