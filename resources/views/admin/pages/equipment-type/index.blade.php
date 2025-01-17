@extends('admin.layout.app')
@section('style')
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <h2 class="card-header">Equipment Type</h2>

        <div class="card-body">
       
            <div class="d-grid gap-2 mb-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('admin.equipment-types.create') }}"> <i class="fa fa-plus"></i> Add Equipment Type</a>
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
                        <th>Equipment Type</th>   
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
                <form action="{{ route('admin.equipment-types.destroy', 'id') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input id="id" name="id" hidden>
                    <h5 class="text-center">Are you sure you want to delete this equipment type?</h5>                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
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
        ajax: '{{ route('admin.equipment-types.get_json') }}',
        columns: [              
                { data: 'type_name', name: 'type_name' },    
                { data: 'action', name: 'action' },                          
            ]
        });
    });
    $(document).on('click','.delete-modal',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });
</script>
@endsection