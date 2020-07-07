@extends('admin.layouts.base')

@section('content')

<style>
.form-wrapper{
    display: flex;
}
</style>

    <div class="row text-center">
        <div class="col-sm-12 col-lg-12">
            <a href="{{ url('admin/faqs_create') }}" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background">
                    <h4 class="widget-content-light"><strong>Add New</strong> FAQS</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-primary animation-expandOpen"><i class="fa fa-plus"></i></span></div>
            </a>
        </div>
    </div>

    <div class="block full">
        <div class="block-title">
            <h2><i class="fa fa-list sidebar-nav-icon"></i>&nbsp;<strong>FAQS Archive</strong></h2>
        </div>
        <div class="alert alert-info alert-dismissable page-empty {{$faqs->count() == 0 ? '' : 'johnCena' }}">
            <i class="fa fa-info-circle"></i> No Record found.
        </div>
        
        <div class="table-responsive {{$faqs->count() == 0 ? 'johnCena' : '' }}">
            <table id="faqs-table" class="table table-bordered table-striped table-vcenter" >
                <thead>
                    <tr role="row">
                        <th><small><b>ID</b></small></th>
                        <th><small><b>Photo</b></small></th>
                        <th><small><b>Title</b></small></th>
                        <th><small><b>Description</b></small></th>
                        <th><small><b>Create At</b></small></th>
                        <th><small><b>Action</b></small></th>
                    </tr>
                </thead>
                <tbody>
                @if(count($faqs))
                        @foreach($faqs as $field)
                        <tr data-page-template-id="{{$field->id}}">
                            <td>{{ $field->id}}</td>
                            <td>
                                <a href="{{ url('public/'.$field->photo) }}" class="zoom img-thumbnail" style="cursor: default !important;" data-toggle="lightbox-image">
                                    <img src="{{ asset('public/'.$field->photo) }}" alt="{{ $field->title }}" class="img-responsive center-block" style="max-width: 100px;">
                                </a>
                            </td>
                            <td>{{ $field->title  }}</td>
                            <td>{{ $field->description  }}</td>
                            <td>{{ date('M j, Y', strtotime($field->created_at)) }}</td>
                            <td>
                                <div class="form-wrapper btn-group btn-group-xs">
                                    @if (auth()->user()->can('Update Permission Group'))
                                        <a href="{{ url('admin/faqs_edit/'.$field->id) }}"
                                        data-toggle="tooltip"
                                        title=""
                                        class="btn btn-default"
                                        data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                    @endif
                                    @if (auth()->user()->can('Delete Permission Group'))
                                    <form method="POST" id="deleteForm{{$field->id}}" action="{{ route('deleteFaqs') }}" enctype="multipart/form-data">
                                    @csrf
                                        <input type="text" value="{{$field->id}}" style="display:none;" id="id{{$field->id}}" name="id">
                                        <a href="javascript:void(0)" data-toggle="tooltip"
                                        title=""
                                        class="btn btn-xs btn-danger btnDelete"
                                        data-original-title="Delete"
                                        data-id="{{ $field->id }}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </form>
                                        
                                    
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('extrascripts')
<script type="text/javascript" src="{{ asset('public/js/libraries/faqs.js') }}"></script>
<script src="{{ asset('resources/assets/js/static/vendors/sweetalert-2.min.js') }}"></script>
<script>
    $(function(){
    $(".hideText").each(function(i){
        len=$(this).text().length;
        if(len>50)
        {
        $(this).text($(this).text().substr(0,50)+'...');
        }
    });       
    });
    // Delete Record
    $(".btnDelete").click(function(){
        var id = $(this).attr('data-id');
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            $("#deleteForm"+id).submit();
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }   
        });
        return false;
    });
</script>

@endpush


