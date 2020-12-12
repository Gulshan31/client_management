@extends('admin')
@section('content') 
<div class="container-fluid page-wrapper">
    <!-- Page Heading -->
    <div class="row mb-2 justify-content-between pl-1 pr-1 align-items-center">
        <div>
            <h1 class="a_dash d-inline-block p-0 m-0">
                Projects <small><span class="color-secondary">|</span> Add</small>
            </h1>
        </div>
        <div class="mt-1 mt-sm-0">
            <div class="btn-group">
                <a href="{{ route('project') }}" class="add_button position-relative"><i class="fas fa-arrow-left position-relative"></i> Back</a>
            </div>
        </div>
    </div>
    @if(\Session::has('message'))
    <div class="alert alert-success alert-dismissible" style="margin-top: 18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Success!</strong> {{ \Session::get('message') }}
    </div>
    @endif @if(\Session::has('exception'))
    <div class="alert alert-danger alert-dismissible" style="margin-top: 18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Error!</strong> {{ \Session::get('exception') }}
    </div>
    @endif
    <div class="card theme_set">
        <div class="card-body">
            <form class="row" action="{{ route('create-project') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-sm-6">
                    <label for="client">Select Client:</label>
                    <select class="form-control @error('client_name') is-invalid @enderror" id="client" name="client_name" onchange="generateProjectCode(this.value)" value="{{ old('client_name') }}">
                        <option value="">Select Client</option>
                        @foreach ($clients as $client)
                        <option value="{{$client->id}}-{{$client->client_code}}-{{$client->no_of_projects}}">{{$client->name}}</option>
                        @endforeach
                    </select>
                    @error('client_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="pb-1 form-group col-sm-6">
                    <label for="project-code"> Project Code:</label>
                    <input class="form-control" required value="" type="text" placeholder="auto generated when you select client" id="project-code" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-services">Select Main Service:</label>
                    <select class="form-control @error('main_service') is-invalid @enderror" id="main-services" name="main_service" value="{{ old('main_service') }}" onchange="loadMainSection(this.value)">
                        <option value="">Select Service</option>
                        @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach    
                    </select>
                    @error('main_service')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-section">Select Main Section:</label>
                    <select class="form-control @error('main_section') is-invalid @enderror" id="main-section" name="main_section" value="{{ old('main_section') }}" onchange="loadSubSection(this.value)">
                        <option>3D Renderings</option>
                    </select>
                    @error('main_section')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-section">Select Sub Section:</label>
                    <select class="form-control @error('sub_section') is-invalid @enderror" id="sub-section" name="sub_section" onchange="loadListAndQuality()">
                        <option>3D Renderings</option>
                    </select>
                    @error('sub_section')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-section">Select List Of Quality:</label>
                    <select class="form-control" id="quality-list">
                        <option>3D Renderings</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-section">Select List Of Options:</label>
                    <select class="form-control" id="option-list">
                        <option>3D Renderings</option>
                    </select>
                </div>
                <div class="pb-1 form-group col-sm-6">
                    <label> Number of Renderings:</label>
                    <input class="form-control" name="renders" value="" type="number">
                </div>
                <div class="pb-1 form-group col-12">
                    <label> Google Drive Link:</label>
                    <input class="form-control" name="g_drive" value="" type="text">
                </div>
                <div class="form-group col-12">
                    <input class="form-control" value="" type="file" accept="image/*" multiple>
                </div>
                <div class="p-1">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>            
        </div>
    </div>
</div>
<script>
    function generateProjectCode(context){
        let c = context.split('-')
        // First Id, Client Code, Number of projects
        // Generate project code
        let id = Number(c[0])
        let clientCode = c[1]
        let numberOfProjects = Number(c[2])+1;
        let projectCode = clientCode+'-00'+numberOfProjects
        document.getElementById('project-code').value = projectCode;
    }
    function loadMainSection(){

    }
    function loadSubSection(){

    }
    function loadListAndQuality(){
        
    }
</script>
@endsection