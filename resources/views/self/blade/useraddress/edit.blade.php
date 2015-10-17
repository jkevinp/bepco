@extends('default.layout.layout')

@section('content')
<div class="row mt">
    <div class="col-md-8 col-md-offset-2">
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  method="post" action="{{route('user.address.update')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h2 class="violet">Edit Address Information for {{$useraddress->user->getName()}}</h2>
                            <hr>
                           
                                
                                <input name="id" class="form-control input-medium" type="hidden" readonly value="{{$useraddress->id}}">
                                <input name="user_id" class="form-control input-medium" type="hidden" readonly value="{{$useraddress->user->id}}">
                          
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">Address Line</label>     
                                <div class="col-lg-10"><input name="street" placeholder="933-B M.dela Fuente" class="form-control input-medium" type="text" value="{{$useraddress->street}}"/></div>
                            </div>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">State/Province</label>     
                                <div class="col-lg-10"><input name="state" placeholder="" class="form-control input-medium" type="text" value='{{$useraddress->state}}' /></div>
                            </div>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">City</label> 

                                <div class="col-lg-10"> 
                                    <select class="selectize" name="city">
                                            <option value="{{$useraddress->city}}" selected>{{$useraddress->city}} </option>
                                    @foreach($cities as $city)
                                        @if($useraddress->city != $city)
                                            <option value="{{$city}}">{{$city}} </option>
                                        @endif  
                                        
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">Country</label>   
                                <div class="col-lg-10">
                                    <select name="country" class="selectize" readonly>
                                        <option value="PH" selected>Philippines</option>
                                    </select>

                            </div>
                        </div>
                              <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">Region</label>     
                                <div class="col-lg-10">
                                    <select class="selectize" name="region">
                                        <option value="{{$useraddress->region}}" selected>{{$useraddress->region}} </option>
                                    @foreach($region as $r)
                                        @if($useraddress->region != $r)
                                        <option value="{{$r}}">{{$r}} </option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                </div>
                              <div class="form-group ">
                                <label for="fastinput" class="control-label col-lg-2">ZIP/POSTAL CODE</label>     
                                <div class="col-lg-10"><input name="zippostal" placeholder="XXXX" value="{{$useraddress->zippostal}}" class="form-control input-medium" type="text" /></div>
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