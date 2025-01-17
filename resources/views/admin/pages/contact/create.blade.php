@extends('admin.layout.app')
@section('style')
<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-lg-9 mx-auto">
        <div class="card radius-15">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-0">Add Contact</h4>
                </div>
                <hr/>
               
                <form method="POST" action="{{ route('admin.contacts.store') }}">
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
                            <label class="col-sm-2 col-form-label">Client</label>
                            <div class="col-sm-10">
                                <select name="user" class="single-select form-control @error('user') is-invalid @enderror">   
                                    @foreach($users as $user)                               
                                        <option {{($user->id == old('user')) ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>									 
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                         
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                     name="name" value="{{ old('name') }}" placeholder="Please input name">
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                     name="phone_number" value="{{ old('phone_number') }}" placeholder="Please input phone number">
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email Address</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                     name="email" value="{{ old('email') }}" placeholder="Please input email">
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
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });		 
	</script>
@endsection