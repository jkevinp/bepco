@extends('default.layout.layout')

@section('content')
<section class="wrapper site-min-height">
            <div class="row mt">
              <div class="col-lg-12">
          <div class="row content-panel">

               <div class="col-md-4 centered">
              <div class="profile-pic">
                <p>
                    @if($user->userphoto)
                      <img src="{{URL::asset('img-photo')}}/{{$user->userphoto->filename}}" width="300"  height="300" class="img-circle">
                    @else
                      <img src="{{URL::asset('img-template')}}/id.png" width="300"  height="300" class="img-circle">
                    @endif
                </p>
                <p>
                  @if($user->userphoto)

                  @else
                  <a class="btn btn-theme" href="{{route('user.upload.photo' , $user->id)}}"><i class="fa fa-check"></i>Upload Photo</a>
                  @endif
                </p>

              </div>

             
            </div><! --/col-md-4 -->
            <div class="col-md-4 profile-text">
              <h2>{{$user->getNoMiddleName()}} 
                @if($user->userbarcode)
                <img class="imageidcard" src="{{URL::asset('img-id')}}/{{$user->userbarcode->filename}}" class="img-thumbnail">
                @else
                <a class="btn btn-theme" href="{{route('user.upload.photo' , $user->id)}}"><i class="fa fa-check"></i>Generate Barcode</a>
                @endif
              </h2>
              <h5>Group: {{$user->getUserGroupName()}}</h5>
              <h5>Username: {{$user->username}}</h5>
              <h5>Email: {{$user->email}}</h5>

              <p>
                
              </p>
              <br>
            </div><! --/col-md-4 -->

            <div class="col-md-4 profile-text mt mb centered">
              <div class="right-divider hidden-sm hidden-xs">
                <h4 class="violet">User Identification card</h4>
                @if($user->useridcard)
                    <a href="{{URL::asset('img-idcard')}}/{{$user->useridcard->filename}}" data-width="500" data-lightbox="imageidcard" data-title="The User has a generated id card.">
                      <img class="imageidcard img-thumbnail" src="{{URL::asset('img-idcard')}}/{{$user->useridcard->filename}}" width="{{bepc\Models\Setting::where('keyname' , '=' , 'useridcardwidth')->first()->value}}"  height="{{bepc\Models\Setting::where('keyname' , '=' , 'useridcardheight')->first()->value}}" class="img-thumbnail">
                    </a>
                @else
                  <h6>User does not have a id card.</h6>
                      <img src="{{URL::asset('img-template')}}/background.png" width="{{bepc\Models\Setting::where('keyname' , '=' , 'useridcardwidth')->first()->value}}"  height="{{bepc\Models\Setting::where('keyname' , '=' , 'useridcardheight')->first()->value}}" class="img-thumbnail">
                @endif
                <p>
                  @if($user->useridcard)
                  @else
                  <a class="btn btn-theme" href="{{route('user.id' , $user->id)}}"><i class="fa fa-check"></i>Generate ID</a>
                  @endif
                </p>
              </div>
            </div><! --/col-md-4 -->
            
            
            
         
          </div><!-- /row -->    
              </div><! --/col-lg-12 -->
        
        <div class="col-lg-12 mt">    
          <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Overview</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#contact" class="contact-map">Permissions & Contact</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit">Edit Profile</a>
                  </li>
                </ul>
              </div><! --/panel-heading -->
              
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-6" >
                        <div class="detailed mt" >
                          <h4>Recent Activity <span class="label label-info label-xs  ">{{count($user->inventorylog)}}</span></h4>
                          <div class="recent-activity " style="border-right:1px;  border-right-style: solid;border-right-color:black;">
                            <div class="activity-icon bg-theme"><hr></div>
                            @if(count($user->inventorylog) === 0)
                              <div class="activity-panel">
                                <h5>No recent activities</h5>
                              </div>
                            @endif

                            @foreach($user->inventorylog as $log)
                              <div class="activity-panel">
                                
                                [{{$log->created_at}}]<span class="violet"> {{$log->message}}<br/><br/></span>
                              </div>
                            @endforeach
                            </div><! --/recent-activity -->
                          </div><!-- /detailed -->
                        </div><! --/col-md-6 -->
                      
                      <div class="col-md-6 detailed">
                         <?php
                                $progress = 0;
                                if(isset($user->userbarcode))$progress+= 100 /3;
                                if(isset($user->userphoto))$progress+= 100 /3;
                                if(isset($user->useridcard))$progress+= 100 /3;
                                $progress = number_format($progress ,2);
                            ?>
                        <h4>User Stats</h4>
                        <div class="row centered mt mb">
                          <div class="col-sm-4">
                            <h1><i class="fa fa-barcode" style=""></i></h1>
                            @if($user->userbarcode)
                             <h3><i class="fa fa-check" style="color:green;"></i> </h3>
                            @else
                            <h3><i class="fa fa-remove" style="color:red;"></i> </h3>
                            @endif
                            <h6>BARCODE ID</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-credit-card"></i></h1>
                             @if($user->useridcard)
                             <h3><i class="fa fa-check" style="color:green;"></i> </h3>
                            @else
                            <h3><i class="fa fa-remove" style="color:red;"></i> </h3>
                            @endif
                            <h6>IDENTIFICATION CARD</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-picture-o"></i></h1>
                             @if($user->userphoto)
                             <h3><i class="fa fa-check" style="color:green;"></i> </h3>
                            @else
                            <h3><i class="fa fa-remove" style="color:red;"></i> </h3>
                            @endif
                            <h6>PHOTO ID</h6>
                          </div>
                        </div><!-- /row -->
                           
                        <h4>User Status</h4>
                        <div class="row centered">
                          <div class="col-md-8 col-md-offset-2">
                            <h5>Profile Completeness ({{$progress}})%</h5>
                          
                              <div class="progress">
                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$progress}}%">
                                      <span class="sr-only">{{$progress}}% Complete (success)</span>
                                  </div>
                              </div>       
                          </div><! --/col-md-8 -->
                        </div><! --/row -->
                      </div><!-- /col-md-6 -->
                    </div><! --/OVERVIEW -->
                  </div><! --/tab-pane -->
                  
                  <div id="contact" class="tab-pane">
                    <div class="row">
                      <div class="col-md-6">
                        <div>
                             <table class="table table-hover table-bordered table-striped">
                              <thead>
                                <th>Privilege ID</th>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Permission Level</th>
                              </thead>  
                             @foreach($user->usergroup->getPrivileges() as $p)
                            <tr>
                              <td>{{$p->id}}</td>
                              <td>{{$p->name}}</td>
                              <td>{{$p->action}}</td>
                              <td>{{$p->control}}</td>
                            </tr>
                             @endforeach
                             </table>
                        </div>
                      </div><! --/col-md-6 -->
                      
                      <div class="col-md-6 detailed">
                        <h4>Contact Information <span class="pull-right "><a href="{{route('user.contact.create' , $user->id)}}" class="btn btn-theme"><i class="fa fa-plus"></i> Add Contact</a> <a href="{{route('user.address.create' , $user->id)}}" class="btn btn-theme"><i class="fa fa-plus"></i> Add Address</a></span></h4>
                        <div class="col-md-12">
                          <p>Primary Email: {{$user->email}}</p>
                          <div>
                           <table class="table table-hover table-bordered table-striped">
                            <thead>
                              <th>Phone#</th>
                              <th>Mobile#</th>
                              <th>Facebook</th>
                              <th>Additional Email</th>
                              <th>Actions</th>
                            </thead>  
                          @if(count($user->usercontact))
                            @foreach($user->usercontact as $uc)
                            <tr>
                              <td>{{$uc->phone}}</td>
                              <td>{{$uc->mobile}}</td>
                              <td><a href="https://facebook.com/{{$uc->facebook}}">{{$uc->facebook}}</a></td>
                              <td>{{$uc->additionalemail}}</td>
                              <td><a href="{{route('user.contact.edit' , $uc->id)}}" class="btn btn-theme btn-xs" title="edit contact information"><i class="fa fa-edit" ></a></td>
                            </tr>
                            @endforeach
                          @else
                            <tr>
                              <td colspan=5 class="text-center">No Contact Information Found!<br/></td>
                            </tr>

                          @endif
                           </table>
                        </div>

                          <div>
                           <table class="table table-hover table-bordered table-striped">
                            <thead>
                              <th>Street</th>
                              <th>State</th>
                              <th>City</th>
                              <th>Region</th>
                              <th>Country</th>
                              <th>Zip/Postal Code</th>
                              <th>Actions</th>
                            </thead>  
                          @if(count($user->useraddress))
                            @foreach($user->useraddress as $ua)
                            <tr>
                              <td>{{$ua->street}}</td>
                              <td>{{$ua->state}}</td>
                              <td>{{$ua->city}}</td>
                              <td>{{$ua->region}}</td>
                              <td>{{$ua->country}}</td>
                              <td>{{$ua->zippostal}}</td>
                              <td><a href="{{route('user.contact.edit' , $uc->id)}}" class="btn btn-theme btn-xs" title="edit contact information"><i class="fa fa-edit" ></a></td>
                            </tr>
                            @endforeach
                          @else
                            <tr>
                              <td colspan=7 class="text-center">No Address Information Found!<br/></td>
                            </tr>

                          @endif
                           </table>
                        </div>


                        </div>
                      </div><! --/col-md-6 -->
                    

                    </div><! --/row -->
                  </div><! --/tab-pane -->
                  
                  <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Personal Information</h4>
                          <div class=" blurlogin">
                              <div class="row mt">
                                <div class="col-md-12">
                                  <div>
                                    <br/>
                                    {!! Form::open(['route' => 'user.update' , 'method' => 'post']) !!}
                                    <div class="row">
                                      <div class="col-md-4 ">
                                        <input type="text" name="firstname" class="form-control input input-lg input-white text-center" value="{{$user->firstname}}" placeholder="Firstname"  required="true" /> 
                                      </div>
                                      <div class="col-md-4 ">
                                        <input type="text" name="middlename" class="form-control input input-lg input-white text-center"  value="{{$user->middlename}}"  placeholder="Middlename"  required="true"/>  
                                      </div>
                                      <div class="col-md-4 ">
                                        <input type="text" name="lastname" class="form-control input input-lg input-white text-center" value="{{$user->lastname}}"  placeholder="Lastname" required="true" />  
                                      </div>
                                    </div>
                                    <br style="clear:both;"/>
                                    <input type="email" name="email" class="form-control input input-lg input-white text-center"  value="{{$user->email}}"  placeholder="Email Address"  required="true"/> 
                                    <br style="clear:both;"/>
                                    <input type="text" name="username" class="form-control input input-lg input-white text-center"  value="{{$user->username}}"  placeholder="Username"  required="true"/>  
                                    <br style="clear:both;"/>
                                    <select class="form-control input input-lg text-center input-white" style="background:transparent;" name="usergroup_id">
                                      @foreach($usergroups as $ug)
                                            @if($user->usergroup_id == $ug->id)
                                              <option alt="{{$ug->description}}"   title="{{$ug->description}}" class="form-control" style="backround:white;color:black;" value="{{$ug->id}}" selected>{{$ug->name}}</option>
                                            @else
                                              <option alt="{{$ug->description}}"   title="{{$ug->description}}" class="form-control" style="backround:white;color:black;" value="{{$ug->id}}">{{$ug->name}}</option>
                                            @endif
                                      @endforeach
                                    </select>
                                    <br style="clear:both;"/>
                                    <div class="btn-group btn-group-justified">
                                          <div class="btn-group">
                                            <button type="submit" class="btn btn-theme btn-lg"><i class="fa fa-edit"></i> Update</button>
                                          </div>
                                          <div class="btn-group">
                                            <a  href="{{route('user.list')}}"  class="btn btn-theme04 btn-lg"><i class="fa fa-user"></i> Cancel</a>
                                          </div>
                                        </div>
                                    {!! Form::close() !!}
                                    <br/><br/><br/><br/>
                                  </div>
                                </div>
                              </div>
                            </div>

                                        
                      </div>
                    </div><! --/row -->
                  </div><! --/tab-pane -->
                </div><!-- /tab-content -->
              
              </div><! --/panel-body -->
              
            </div><!-- /col-lg-12 -->
          </div><! --/row -->
            </div><! --/container -->
      
    </section><! --/wrapper -->
@stop

@section('script')
@stop

