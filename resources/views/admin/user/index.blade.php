@extends('layouts.admin')


@section('styles')
<link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
@endsection


@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data User</h4>
        <p class="card-description">
          View user
        </p>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($users as $data)
                @if($loop->first)
                <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->isAdmin == 1 ? 'Admin' : 'User'}}</td>
                        <td>
                           <button class="btn btn-sm btn-danger" disabled>Can't Delete</button>
                        </td>
                    </tr>
                    @else
                    
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->isAdmin == 1 ? 'Admin' : 'User'}}</td>
                        <td>
                            <form action="{{route('user.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('user.edit', $data->id)}}" class="btn btn-warning">
                                    Edit
                                </a>
                                <button href="{{route('user.destroy', $data->id)}}" class="btn btn-danger" data-confirm-delete="true">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach

            </tbody>
        </table>
    </div>
</div>
</div>

  @endsection


@push('scripts')
<script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endpush