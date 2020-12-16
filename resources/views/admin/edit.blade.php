@extends('admin')
@section('content') 
<div class="container-fluid page-wrapper">
    <!-- Page Heading -->
    <div class="row mb-2 justify-content-between pl-1 pr-1 align-items-center">
        <div>
            <h1 class="a_dash d-inline-block p-0 m-0">
                Projects <small><span class="color-secondary">|</span> Edit</small>
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
            <form class="row" action="{{ route('update-project',$project->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-sm-6">
                    <label for="client">Select Client:</label>
                    <select class="form-control @error('client_name') is-invalid @enderror" id="client" name="client_name" value="{{ old('client_name') }}">
                        <option value="">Select Client</option>
                        @foreach ($clients as $client)
                            @if($client->id == $project->client_id)
                                <option selected value="{{$client->id}}">{{$client->name}}</option>
                            @else
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endif    
                        @endforeach
                    </select>
                    @error('client_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="pb-1 form-group col-sm-6">
                    <label for="project-code"> Project Code:</label>
                    <input class="form-control" type="text" value="{{$project->project_code}}" id="project-code" readonly name="project_code">
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-services">Select Main Service:</label>
                    <select class="form-control @error('main_service') is-invalid @enderror" id="main-services" name="main_service" value="{{ old('main_service') }}" onchange="loadMainSection(this.value)">
                        <option value="0">Select Service</option>
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

                    </select>
                    @error('main_section')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 d-none" id="specification">

                </div>
                <div class="form-group col-sm-6">
                    <label for="main-section">Select Sub Section:</label>
                    <select class="form-control @error('sub_section') is-invalid @enderror" id="sub-section" name="sub_section" onchange="loadListAndQuality(this.value)">

                    </select>
                    @error('sub_section')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="quality-list">Select List Of Quality:</label>
                    <select class="form-control" id="quality-list">

                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="option-list">Select List Of Options:</label>
                    <select class="form-control" id="option-list">

                    </select>
                </div>
                <div class="pb-1 form-group col-sm-6">
                    <label> Number of Renderings:</label>
                    <input class="form-control" name="renders" value="{{$project->no_of_renders}}" type="number">
                </div>
                <div class="pb-1 form-group col-sm-6">
                    <label> Assign To:</label>
                    <input class="form-control @error('assign_to') is-invalid @enderror" name="assign" value="{{$project->assign_to}}" required type="text">
                    @error('assign_to')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="main-section">Select Status:</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}">
                        <option value="1">Active</option>
                        <option value="2">On Hold</option>
                        <option value="3">In Review</option>
                        <option value="4">Completed</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" value="{{date($project->start_date)}}" required name="start_date">
                </div>
                <div class="form-group col-sm-6">
                    <label for="end_date">End Date:</label>
                    <input type="date" class="form-control" value="{{$project->end_date}}" required name="end_date">
                </div>
                <div class="pb-1 form-group col-12">
                    <label> Google Drive Link:</label>
                    <input class="form-control" name="g_drive" value="{{$project->g_drive}}" type="text">
                </div>
                <div class="form-group col-12">
                    <input class="form-control" name="docs[]" value="" type="file" multiple>
                </div>
                <div class="p-1">
                    <button type="submit" class="btn btn-dark">Update</button>
                </div>
            </form>            
        </div>
    </div>
</div>
<script>
    function loadMainSection(id){
        let display=`<option value="">select main section</option>`;
        $.ajax({
            url:'/api/main-section/'+id,
            type:'get',
            success:function(res){
                $.each(res.main_section,function(key,item){
                    display+=`<option value="${item.id}">${item.name}</option>`;
                });
                if(res.specification.length!=0){
                    let arr = [];
                    let group = {};
                    $.each(res.specification,function(key,item){
                            // console.log(item)
                        if(arr.indexOf(item.group)== -1){
                            arr.push(item.group);
                            group[item.group] = [];
                        }
                        group[item.group].push(item)
                    })
                    let checkbox = '';
                    for(let ob in group){
                        checkbox += `<div><h6 class="font-weight-bold">${ob}:</h6>`;
                        group[ob].forEach(ele =>{
                            checkbox+=`<label style="margin-right:5px;">${ele.name}</label><input style="margin-right:5px;" type="checkbox" id="" name="${ob}[]" value="${ele.id}">`;
                        })
                        checkbox+=`</div>`
                    }
                    // let colSize = 12/Object.keys(group).length;
                    $('#specification').removeClass('d-none').html(checkbox);
                }
                else{
                    $('#specification').addClass('d-none').html('');
                }
                $('#main-section').html(display);
            }
        })
    }
    function loadSubSection(id){
        let display=`<option value="">select sub section</option>`;
        $.ajax({
            url:'/api/sub-section/'+id,
            type:'get',
            success:function(res){
                console.log(res)
                $.each(res,function(key,item){
                    display+=`<option value="${item.id}">${item.name}</option>`;
                });
                $('#sub-section').html(display);
            }
        })
    }
    function loadListAndQuality(id){
        let displayOption=`<option value="">select option list</option>`;
        let displayQuality=`<option value="">select quality list </option>`;
        $.ajax({
            url:'/api/list/options/'+id,
            type:'get',
            success:function(res){
                if(res.option!=0){
                    $.each(res.option,function(key,item){
                        displayOption+=`<option value="${item.id}">${item.name}</option>`;
                });
                }
                else{
                    displayOption=`<option value="">No Applicable</option>`;
                }
                if(res.quality!=0){
                    $.each(res.quality,function(key,item){
                        displayQuality+=`<option value="${item.id}">${item.name}</option>`;
                    });
                }
                else{
                    displayQuality=`<option value="">No Applicable</option>`;   
                }
                $('#option-list').html(displayOption);
                $('#quality-list').html(displayQuality);
            }
        })
    }
</script>
@endsection