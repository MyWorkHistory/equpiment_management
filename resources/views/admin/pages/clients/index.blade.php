@extends('admin.layout.app')
@section('style')
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <h2 class="card-header">Clients</h2>
        <div class="card-body">
       
            <div class="d-grid gap-2 mb-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('admin.clients.create') }}"> <i class="fa fa-plus"></i> Add Client</a>
            </div>
        
            
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>                
                        <th>Name</th>
                        <th>Email</th>               
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
            
        </div>
    </div>
      
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.clients.get_json') }}',
        columns: [              
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'city', name: 'city' },
                { data: 'state', name: 'state' },
                { data: 'zip', name: 'zip' },
                { data: 'address', name: 'address' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'action', name: 'action' }
            ]
        });
    });
   
</script>
@endsection