@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form class="form-horizontal" method="post" action="">
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
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Student Name" />
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
                                                <input type="text" class="form-control" name="h_ct_one" id="h_ct_one" value="0" />
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
                                                <input type="text" class="form-control" name="h_ct_two" id="h_ct_two" value="0" />
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
                                                <input type="text" class="form-control" name="h_ct_three" id="h_ct_three" value="0" />
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
                                                <input type="text" class="form-control" name="half_yearly" id="half_yearly" value="0" />
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
                                                <input type="text" class="form-control" name="f_ct_one" id="f_ct_one" value="0" />
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
                                                <input type="text" class="form-control" name="f_ct_two" id="f_ct_two" value="0" />
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
                                                <input type="text" class="form-control" name="f_ct_three" id="f_ct_three" value="0" />
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
                                                <input type="text" class="form-control" name="final" id="final" value="0" />
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