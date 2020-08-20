@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
            <div class="alert alert-errors">
                @foreach ($errors->all() as $error)
                    <div class="col-sm-12">
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
            @if (session('success'))
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            @endif
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ url('student/add') }}" autocomplete="off">
                    @csrf
                    <div class="card-header text-center">
                        Student Information
                        <span>
                            <a href="{{ route('allStudent') }}"><button type="button" class="btn btn-primary btn-sm float-right">All Sudents</button></a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Student Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" required="true" value="{{ old('name') }}" name="name" id="name" placeholder="Enter Student Name" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center">Half Yearly Information</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="h_ct_one" class="cols-sm-2 control-label">CT1</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" value="{{ old('h_ct_one') }}" name="h_ct_one" id="h_ct_one" required="true"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="h_ct_two" class="cols-sm-2 control-label">CT2</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" name="h_ct_two" id="h_ct_two" required="true"  value="{{ old('h_ct_two') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="h_ct_three" class="cols-sm-2 control-label">CT3</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" name="h_ct_three" id="h_ct_three" required="true"  value="{{ old('h_ct_three') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="half_yearly" class="cols-sm-2 control-label">Half Yearly</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" name="half_yearly" id="half_yearly" required="true"  value="{{ old('half_yearly') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center">Final Information</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="f_ct_one" class="cols-sm-2 control-label">CT1</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" name="f_ct_one" id="f_ct_one" required="true"  value="{{ old('f_ct_one') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="f_ct_two" class="cols-sm-2 control-label">CT2</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" name="f_ct_two" id="f_ct_two" required="true"  value="{{ old('f_ct_two') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="f_ct_three" class="cols-sm-2 control-label">CT3</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" name="f_ct_three" id="f_ct_three" required="true"  value="{{ old('f_ct_three') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="final" class="cols-sm-2 control-label">Final</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" name="final" id="final" required="true"  value="{{ old('final') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection