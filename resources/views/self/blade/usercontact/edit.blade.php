@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <div class="row mt">
            	<div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('user.contact.update')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Edit Contact Information of {{$usercontact->user->getName()}}</h2>
                            <hr>
                                <input name="id" class="form-control input-medium" type="hidden" readonly value="{{$usercontact->id}}">
                                <input name="user_id" class="form-control input-medium" type="hidden" readonly value="{{$usercontact->user_id}}">
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">Phone Number</label>     
                                <div class="col-lg-10"><input name="phone" value="{{$usercontact->phone}}" placeholder="4950253" class="form-control input-medium" type="text" /></div>
                            </div>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">Mobile Number</label>     
                                <div class="col-lg-10"><input name="mobile" value="{{$usercontact->mobile}}" placeholder="0905209XXXX" class="form-control input-medium" type="text" /></div>
                            </div>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">Facebook Link</label>     
                                <div class="col-lg-10"><input name="facebook" value="{{$usercontact->facebook}}" placeholder="facebook username" class="form-control input-medium" type="text" /></div>
                            </div>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">Additional Email</label>     
                                <div class="col-lg-10"><input name="additionalemail" value="{{$usercontact->additionalemail}}" placeholder="additionemail@domain.com" class="form-control input-medium" type="email" /></div>
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