@extends('admin.layout.app')
@section('style')
 
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-lg-9 mx-auto">
        <div class="card radius-15">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-0">Add Client</h4>
                </div>
                <hr/>
               
                <form method="POST" action="{{ route('admin.clients.store') }}">
                    @csrf
                    @if ($errors->any())  
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                            @foreach ($errors->all() as $error)
                                
                                <li> {{ $error }}</li>   
                                 
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-body">                   
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                     name="name" value="{{ old('name') }}" placeholder="Please input Name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                     name="email"  placeholder="Please input Email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                     name="address"  placeholder="Please input Address" value="{{ old('address') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                     name="city"  placeholder="Please input City" value="{{ old('city') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('state') is-invalid @enderror"
                                     name="state"  placeholder="Please input State" value="{{ old('state') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Zip</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('zip') is-invalid @enderror"
                                     name="zip"  placeholder="Please input Zip" value="{{ old('zip') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                     name="phone_number"  placeholder="Please input Phone Number" value="{{ old('phone_number') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control @error('account_password') is-invalid @enderror"
                                     name="account_password"  placeholder="Please input Password" value="{{ old('account_password') }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-danger px-4">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
 
<script>
    
   
</script>
@endsection