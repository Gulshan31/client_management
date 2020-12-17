@extends('admin')
@section('content')
<div class="container-fluid page-wrapper">
      <div class="row mb-2 justify-content-between pl-1 pr-1 align-items-center">
         <div>
            <h1 class="a_dash p-0 m-0">Admin Dashboard</h1>
         </div>
      </div>
      <div id="crypto-stats-3" class="row">
         <div class="col-xl-3 col-lg-6 col-6"> 
            <div class="card pull-up">
               <div class="card-content">
                  <a href="{{ route('project') }}">
                     <div class="card-body">
                        <div class="media d-flex">
                              <div class="media-body text-left">
                                 <h3 class="info">{{count($clients)}}</h3>
                                 <h6>Clients</h6>
                              </div>
                              <div>
                                 <i class="icon-user info font-large-2 float-right"></i>
                              </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                           <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-6 col-6"> 
            <div class="card pull-up">
               <div class="card-content">
                  <a href="{{ route('project') }}">
                     <div class="card-body">
                        <div class="media d-flex">
                              <div class="media-body text-left">
                                 <h3 class="warning">{{count($projects)}}</h3> <h6>Projects</h6>
                              </div>
                              <div>
                                 <i class="icon-home warning font-large-2 float-right"></i>
                              </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                           <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <div class="card mb-4">
          <div class="card-header"><h4>Active Projects</h4></div>
         <div class="card-body">
            <div class="table-responsive" id="custom_table">
               @if(\Session::has('success'))
                  
                  <div class="alert alert-success alert-dismissible" style="margin-top:18px;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                      <strong>Success!</strong> {{ \Session::get('success') }}
                  </div>
               @endif
               <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Code</th>
                            <th>Client Name</th>
                            <th>Assign To</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp @forelse($projects as $project) @php $i++; @endphp
                        <tr>
                            <td>{{$i}}.</td>
                            <td>{{$project->project_code}}</td>
                            <td>{{isset($project->clients)?$project->clients->name:'Not Given'}}</td>
                            <td>{{isset($project->assign_to)?$project->assign_to:'Not Given'}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No Projects yet</td>
                        </tr>
                        @endforelse
                    </tbody>

                    <!-- Edit User popup modal-->
                </table>
            </div>
         </div>
      </div>
   </div>
@endsection