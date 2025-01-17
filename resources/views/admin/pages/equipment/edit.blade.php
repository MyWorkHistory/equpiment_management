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
                    <h4 class="mb-0">Edit Equipment</h4>
                </div>
                <hr/>
               
                 <form method="POST" action="{{ route('admin.equipments.update',$equipment->id) }}">
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
                            <label class="col-sm-2 col-form-label">Purchase Date</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control @error('purchase_date') is-invalid @enderror"
                                     name="purchase_date" value="{{ $equipment->purchase_date }}" placeholder="Please input purchase date">
                            </div>
                            <label class="col-sm-2 col-form-label">Purchase From</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('purchase_from') is-invalid @enderror"
                                     name="purchase_from" value="{{ $equipment->purchase_from }}" placeholder="Please input purchase from">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Invoice Number</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('invoice_number') is-invalid @enderror"
                                     name="invoice_number" value="{{ $equipment->invoice_number }}" placeholder="Please input invoice number">
                            </div>
                        </div> 
                                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Assign to</label>
                            <div class="col-sm-10">
                                <select name="user" class="single-select form-control @error('user') is-invalid @enderror">   
                                    @foreach($users as $user)                               
                                        <option {{($equipment->user == $user->id) ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>									 
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select name="equipment_type" class="single-select form-control @error('equipment_type') is-invalid @enderror">   
                                    @foreach($types as $type)                               
                                        <option {{($equipment->equipment_type == $type->id) ? 'selected' : ''}} value="{{$type->id}}">{{$type->type_name}}</option>									 
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                         
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Manufacture</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('manufacture') is-invalid @enderror"
                                     name="manufacture" value="{{ $equipment->manufacture }}" placeholder="Please input manufacture">
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Model</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('equipment_model') is-invalid @enderror"
                                     name="equipment_model" value="{{ $equipment->equipment_model }}" placeholder="Please input model">
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Serial Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('serial_number') is-invalid @enderror"
                                     name="serial_number" value="{{ $equipment->serial_number }}" placeholder="Please input serial number">
                            </div>
                        </div>    
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Asset Tag</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('asset_tag') is-invalid @enderror"
                                     name="asset_tag" value="{{ $equipment->asset_tag }}" placeholder="Please input asset tag">
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Case Color</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('case_color') is-invalid @enderror"
                                     name="case_color" value="{{ $equipment->case_color }}" placeholder="Please input case color">
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Operating System</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('operating_system') is-invalid @enderror"
                                     name="operating_system" value="{{ $equipment->operating_system }}" placeholder="Please input operating system">
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Separate Keyboard</label>
                            <div class="col-sm-4">
                                <select name="separate_keyboard" class="form-control @error('separate_keyboard') is-invalid @enderror">
                                    <option {{($equipment->separate_keyboard == '1') ? 'selected' : ''}} value="1">Yes</option>
                                    <option {{($equipment->separate_keyboard == '2') ? 'selected' : ''}} value="2">No</option>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Keyboard Model #</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('keyboard_model') is-invalid @enderror"
                                     name="keyboard_model" value="{{ $equipment->keyboard_model }}" placeholder="Please input keyboard model">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dongle</label>
                            <div class="col-sm-4">
                                <select name="dongle" class="form-control @error('dongle') is-invalid @enderror">
                                    <option {{($equipment->dongle == '1') ? 'selected' : ''}} value="1">Yes</option>
                                    <option {{($equipment->dongle == '1') ? 'selected' : ''}} value="2">No</option>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Dongle Asset Tag</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('dongle_asset_tag') is-invalid @enderror"
                                     name="dongle_asset_tag" value="{{ $equipment->dongle_asset_tag }}" placeholder="Please input dongle asset tag">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Power Adapter Asset Tag #</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('power_adapter_asset_tag') is-invalid @enderror"
                                     name="power_adapter_asset_tag" value="{{ $equipment->power_adapter_asset_tag }}" placeholder="Please input power adapter asset tag">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Computer Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('computer_name') is-invalid @enderror"
                                     name="computer_name" value="{{ $equipment->computer_name }}" placeholder="Please input computer name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Shipping Case Number</label>
                            <div class="col-sm-10">
                                <select name="shipping_case" class="single-select form-control @error('shipping_case') is-invalid @enderror">   
                                    @foreach($shippings as $ship)                               
                                        <option {{($equipment->shipping_case == $ship->id) ? 'selected' : ''}} value="{{$ship->id}}">{{$ship->model_number}}</option>									 
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-danger px-4">Update</button>
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