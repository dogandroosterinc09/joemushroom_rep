@extends('admin.layouts.base')

@section('content')

<style>
.img-container {
  position: relative;
  max-width: 300px;
  margin-bottom: 50px;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
  border-radius: 5%;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.img-container:hover .image {
  opacity: 0.3;
}

.img-container:hover .middle {
  opacity: 1;
}
</style>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{ url('admin/faqs') }}">FAQS Archive</a></li>
        <li><span href="javascript:void(0)">Edit FAQS</span></li>
    </ul>
    
    <div class="block full">
        <form method="POST" id="form" action="{{ route('updateFaqs', $faqs->id) }}" enctype="multipart/form-data">
        @csrf
                <div class="block-title">
                    <h2><i class="fa fa-pencil"></i> <strong>Edit FAQS "{{ $faqs->title }}"</strong></h2>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h4 style="border-left: 3px solid #61dbd5; padding-left: 8px; margin-bottom: 20px;">FAQS Details</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label" for="title">Title</label>
                            <div class="col-md-10">
                            
                                <input type="text" class="form-control" id="title" name="title" value="{{ $faqs->title }}"
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
                            
                                <input type="text" class="form-control" id="description" name="description" value="{{ $faqs->description }}"
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
                                            placeholder="Enter Content ..">{{ $faqs->content }}</textarea>
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

                                <a href="{{ url('public/'.$faqs->photo) }}" class="zoom img-thumbnail" style="cursor: default !important;" data-toggle="lightbox-image">
                                    <img src="{{ asset('public/'.$faqs->photo) }}" alt="{{ $faqs->title }}" class="img-responsive center-block" style="max-width: 100px;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>



                <br>
                
                
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group form-actions">
                            <div class="col-md-9 col-md-offset-2">
                                <a href="{{ url('admin/faqs') }}" class="btn btn-sm btn-warning">Cancel</a>
                                <button type="button" onClick="proceedSubmit();" id="btnSubmit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i><span id="spanSave">Save</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

@endsection

@push('extrascripts')
<script type="text/javascript" src="{{ asset('public/js/libraries/faqs.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
<script>
function proceedSubmit() {
    $("#spanSave").text("Saving..");
    $('#btnSubmit').attr('disabled', true);
    $('#form').submit();
}
</script>

@endpush