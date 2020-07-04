@extends('admin.layouts.base')

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{ url('admin/facility') }}">Facility Archive</a></li>
        <li><span href="javascript:void(0)">Add New Facility</span></li>
    </ul>



    <div class="block full">
        <div class="">
            <form method="POST" id="form" action="{{ route('storeFacility') }}"  enctype="multipart/form-data">
            @csrf

            <div class="block-title">
                <h2><i class="fa fa-pencil"></i> <strong>Add new Facility</strong></h2>
            </div>
            <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <h4 style="border-left: 3px solid #61dbd5; padding-left: 8px; margin-bottom: 20px;">Facility</h4>
                </div>
            </div>

            
            <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label" for="title">Title</label>
                            <div class="col-md-10">
                            
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                                        placeholder="Enter Title . ." required>
                                        
                                @error('title')
                                    <p class=" animation-slideDown text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <br>


                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label" for="description">Description</label>
                            <div class="col-md-10">
                            
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}"
                                        placeholder="Enter Description . ." required>
                                        
                                @error('description')
                                    <p class=" animation-slideDown text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label" for="content">Content</label>
                            <div class="col-md-10">
                            
                                <textarea id="content" name="content" rows="9"
                                            class="form-control ckeditor"
                                            placeholder="Enter Content ..">{{ old('content') }}</textarea>
                                @if($errors->has('content'))
                                    <span class="help-block animation-slideDown">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label" for="file">Photo</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Choose File <input type="file" class="form-control" name="photo" style="display: none;">
                                    <input type="hidden" class="fld" name="photo" value="">
                                </span>
                                    </label>
                                    <input type="text" class="form-control">
                                </div>
                                @error('photo')
                                    <p class=" animation-slideDown text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>



                <br>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group form-actions">
                        <div class="col-md-6 col-md-offset-2">
                            <a href="{{ url('admin/facility') }}" class="btn btn-sm btn-warning">Cancel</a>
                            <button type="button" onClick="proceedSubmit();" id="btnSubmit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i>&nbsp;<span id="spanSave">Save<span>
                            </button>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>

@endsection

@push('extrascripts')
<script type="text/javascript" src="{{ asset('public/js/libraries/facility.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>

<script>
function proceedSubmit() {
    $("#spanSave").text("Saving..");
    $('#btnSubmit').attr('disabled', true);
    $('#form').submit();
}

</script>
@endpush