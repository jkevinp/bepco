@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <div class="row mt">
            	<div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('user.address.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Add Contact Information for {{$user->getName()}}</h2>
                            <hr>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">User ID</label>     
                                <div class="col-lg-10"><input name="user_id" class="form-control input-medium" type="text" readonly value="{{$user->id}}"></div>
                            </div>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">Address Line</label>     
                                <div class="col-lg-10"><input name="street" placeholder="933-B M.dela Fuente" class="form-control input-medium" type="text" /></div>
                            </div>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">State/Province</label>     
                                <div class="col-lg-10"><input name="state" placeholder="" class="form-control input-medium" type="text" /></div>
                            </div>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">City</label>     
                                <div class="col-lg-10"> 
                                    <select class="selectize" name="city">
                                    @foreach($cities as $city)
                                        <option value="{{$city}}">{{$city}} </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">Country</label>   
                                <div class="col-lg-10">
                                    <select name="country" class="selectize" readonly disabled>
                                      
                                        <option value="PH" selected>Philippines</option>
                                      
                                    </select>

                            </div>
                        </div>
                              <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">Region</label>     
                                <div class="col-lg-10">
                                    <select class="selectize" name="region">
                                    @foreach($region as $r)
                                        <option value="{{$r}}">{{$r}} </option>
                                    @endforeach
                                    </select>
                                </div>
                                </div>
                              <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">ZIP/POSTAL CODE</label>     
                                <div class="col-lg-10"><input name="zippostal" placeholder="XXXX" class="form-control input-medium" type="text" /></div>
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