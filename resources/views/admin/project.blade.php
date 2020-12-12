@extends('admin')
@section('content')
<div class="container-fluid page-wrapper">
    <div class=" row justify-content-between align-items-center pl-1 pr-1 mb-2">
      <div>
        <h1 class="a_dash d-inline-block m-0 p-0">Projects</h1>
      </div>
      <div class="mt-1 mt-sm-0">
         <div class="btn-group">
               <a href="{{route('add-project')}}" class="add_button"><i class="fas fa-plus position-relative"></i> Add</a>
         </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive" id="custom_table">
                @if(\Session::has('success'))

                <div class="alert alert-success alert-dismissible" style="margin-top: 18px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <strong>Success!</strong> {{ \Session::get('success') }}
                </div>
                @endif
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Code</th>
                            <th>Company Name</th>
                            <th>Services</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp @forelse($projects as $project) @php $i++; @endphp
                        <tr>
                            <td>{{$i}}.</td>
                            <td>{{$project->project_code}}</td>
                            <td>{{isset($project->clients)?$project->clients->name:'Not Given'}}</td>
                            <td>{{isset($project->services)?$project->services->name:'Not Given'}}</td>
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