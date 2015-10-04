@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                          
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('user.store.photo')}}" files="true" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Upload Photo ID</h2>
                            <hr>
                            <div class="form-group ">
                                <label for="readingdate" class="control-label col-lg-2">User ID*</label>     
                                <div class="col-lg-10"><input name="user_id" readonly value="{{$user->id}}" class="form-control input-medium " size="16" type="text"></div>
                            </div>
                            <div class="form-group ">
                                <label for="readingdate" class="control-label col-lg-2">User Name*</label>     
                                <div class="col-lg-10"><input name="name" disabled value="{{$user->getName()}}" class="form-control input-medium " size="16" type="text"></div>
                            </div>
                              <div class="form-group ">
                                <label for="details" class="control-label col-lg-2">Image*</label>     

                                <div class="col-lg-10">
                                      <div class="fileupload fileupload-new" data-provides="fileupload">
                                          <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                              <img src="" alt="">
                                          </div>
                                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                          <div>
                                              <span class="btn btn-theme02 btn-file">
                                                  <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                  <input type="file" class="default" name="file">
                                              </span>
                                              <a href="" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                                          </div>
                                      </div>
                                      <span class="label label-info">NOTE!</span>
                                     <span>
                                     Attached image thumbnail is
                                     supported in Latest Firefox, Chrome, Opera,
                                     Safari and Internet Explorer 10 only
                                     </span>
                                </div>
                            </div>
                            <input class="btn btn-theme" type="submit" value="Submit">
                            <input class="btn btn-theme04" type="submit" value="Reset">
                        </form> 
                        
                    </div>
                </div>
        </div>
    </div>
</div>


@stop

@section('script')
@stop

