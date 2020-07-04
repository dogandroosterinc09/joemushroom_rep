@extends('admin.layouts.base')

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{ url('admin/team') }}">Team Member Archive</a></li>
        <li><span href="javascript:void(0)">Add New Team Member</span></li>
    </ul>



    <div class="block full">
        <div class="">
            <form method="POST" id="teamForm" action="{{ route('storeTeam') }}"  enctype="multipart/form-data">
            @csrf

            <div class="block-title">
                <h2><i class="fa fa-pencil"></i> <strong>Add new Member</strong></h2>
            </div>
            <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <h4 style="border-left: 3px solid #61dbd5; padding-left: 8px; margin-bottom: 20px;">Team Member</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group{{ $errors->has('memFname') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label" for="memFname">First name</label>
                        <div class="col-md-10">
                        
                            <input type="text" class="form-control" id="memFname" name="memFname" value="{{ old('memFname') }}"
                                    placeholder="Enter Member First name . ." required>
                                    
                            @error('memFname')
                                <p class=" animation-slideDown text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            
            <br>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group{{ $errors->has('memLname') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label" for="memLname">Last name</label>
                        <div class="col-md-10">
                        
                            <input type="text" class="form-control" id="memLname" name="memLname" value="{{ old('memLname') }}"
                                    placeholder="Enter Member Last name . ." required>
                                    
                            @error('memLname')
                                <p class=" animation-slideDown text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group{{ $errors->has('memPosition') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label" for="memPosition">Position</label>
                        <div class="col-md-10">
                        
                            <input type="text" class="form-control" id="memPosition" name="memPosition" value="{{ old('memPosition') }}"
                                    placeholder="Enter Member Position . ." required>
                                    
                            @error('memPosition')
                                <p class=" animation-slideDown text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group{{ $errors->has('memPic') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label" for="memPic">Photo</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <label class="input-group-btn">
                            <span class="btn btn-primary">
                                Choose File <input type="file" class="form-control" name="memPic" style="display: none;">
                                <input type="hidden" class="fld" name="memPic" value="">
                            </span>
                                </label>
                                <input type="text" class="form-control">
                            </div>
                            @error('memPic')
                                <p class=" animation-slideDown text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            

            <br>

            <!-- <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group{{ $errors->has('memFile') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label" for="memFile">Member Resume</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <label class="input-group-btn">
                            <span class="btn btn-primary">
                                Choose File <input type="file" class="form-control" name="memFile" style="display: none;">
                                <input type="hidden" class="fld" name="memFile" value="">
                            </span>
                                </label>
                                <input type="text" class="form-control">
                            </div>
                            
                            @error('memFile')
                                <p class=" animation-slideDown text-danger">{{ $message }}</p>
                            @enderror

                            
                        </div>
                    </div>
                </div>
            </div>
            <br> -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group{{ $errors->has('memBio') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label" for="memBio">Bio</label>
                        <div class="col-md-10">
                        
                            <textarea id="memBio" name="memBio" rows="9"
                                        class="form-control ckeditor"
                                        placeholder="Enter Member Bio..">{{ old('memBio') }}</textarea>
                            @if($errors->has('memBio'))
                                <span class="help-block animation-slideDown">{{ $errors->first('memBio') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group form-actions">
                        <div class="col-md-6 col-md-offset-2">
                            <a href="{{ url('admin/team') }}" class="btn btn-sm btn-warning">Cancel</a>
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
<script type="text/javascript" src="{{ asset('public/js/libraries/team.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>

<script>
function proceedSubmit() {
    $("#spanSave").text("Saving..");
    $('#btnSubmit').attr('disabled', true);
    $('#teamForm').submit();
}

</script>
@endpush