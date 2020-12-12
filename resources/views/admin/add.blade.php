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
            <form class="row">
                <div class="form-group col-sm-6">
                    <label for="client">Select Client:</label>
                    <select class="form-control" id="client">
                        <option>Cristo homes</option>
                        <option>Test</option>
                    </select>
                </div>
                <div class="pb-1 form-group col-sm-6">
                    <label for="project-code"> Project Code:</label>
                    <input class="form-control" value="CRH-001" type="text" placeholder="Project Code" id="project-code" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-services">Select Main Service:</label>
                    <select class="form-control" id="main-services">
                        <option>3D Renderings</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-section">Select Main Section:</label>
                    <select class="form-control" id="main-section">
                        <option>3D Renderings</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-section">Select Sub Section:</label>
                    <select class="form-control" id="sub-section">
                        <option>3D Renderings</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-section">Select List Of Quality:</label>
                    <select class="form-control" id="sub-section">
                        <option>3D Renderings</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-section">Select List Of Options:</label>
                    <select class="form-control" id="sub-section">
                        <option>3D Renderings</option>
                    </select>
                </div>
                <div class="pb-1 form-group col-sm-6">
                    <label> Google Drive Link:</label>
                    <input class="form-control" value="" type="text">
                </div>
                <div class="form-group col-12">
                    <input class="form-control" value="" type="file" multiple placeholder="Drive link if any">
                </div>
                <div class="p-1">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>            
        </div>
    </div>
</div>

@endsection