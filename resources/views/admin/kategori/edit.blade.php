@extends('layouts.admin')

@section('content')
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
           
        </div>
    </div>
    <!--end breadcrumb-->

<h6 class="mb-0 text-uppercase">DataTable Kategori</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">

                        @php $no = 1; @endphp
                        <form action="{{route('kategori.update', $kategori->id)}}" {{--error cik--}} method="POST" enctype="multipart/form-data"> {{--//postnya badag!--}}
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Masukkan Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori', $kategori->kategori)}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">deskripsi</label>
                                <input type="text" class="form-control" @error('deskripsi') is-invalid @enderror name="deskripsi"
                                value="{{ old('deskripsi') }}" placeholder="deskripsi" required>
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <a href="{{route('kategori.index')}}" class="btn btn-primary mr-2">Back</a>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
            </div>
        </div>
    </div>

@endsection