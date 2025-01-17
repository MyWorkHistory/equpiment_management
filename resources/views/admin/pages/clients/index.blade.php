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
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            
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
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('admin.clients.destroy', 'id') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input id="id" name="id" hidden>
                    <h5 class="text-center">Are you sure you want to delete this client?</h5>                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete Client</button>
                </div>
                </form>
                 
            </div>
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
    $(document).on('click','.delete-modal',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });
</script>
@endsection