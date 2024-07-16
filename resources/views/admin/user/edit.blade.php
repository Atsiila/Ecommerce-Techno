@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        <h5>Edit</h5>
                    </div>
                    
                </div>

                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control @error('user') is-invalid @enderror" name="name"
                            value="{{ old('user') }}" placeholder="UserName" required>
                            @error('user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" @error('email') is-invalid @enderror name="email"
                            value="{{ old('email') }}" placeholder="email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" @error('password') is-invalid @enderror name="password"
                            value="{{ old('password') }}" rows="3" placeholder="password" required></input>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Select Role</label>
                            <select class="form-control" name="isAdmin" id="isAdmin" required>
                                <option value="0" {{old('isAdmin')==0 ? 'selected' : ''}}>User</option>
                                <option value="1" {{old('isAdmin')==1 ? 'selected' : ''}}>Admin</option>
                            </select>
                        </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button type="reset" class="btn btn-primary mr-2">Reset</button>
                    
                        <button href="{{ route('user.index') }}" class="btn btn-primary mr-2">Kembali</button>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection