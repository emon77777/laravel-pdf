@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <a href="{{ route('student') }}"><button type="button" class="btn btn-info">Add Sudents</button></a>
        </div>
    </div>
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif
    <div class="row justify-content-center" style="margin:20px">
        <form class="form-horizontal"  id="pdf" method="post" action="">
            @csrf
            <div class="card">
                <div class="form-group">
                    <div>
                        <label class="form-check-label" for="inlineRadio1"><h5>* How you want to see Grand result ?</h5> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="examcount" id="inlineRadio1" value="both" {{ ($predata['examcount'] == 'both' ? "checked" : '') }}>
                            <label class="form-check-label" for="inlineRadio1">Half yearly and Final</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="examcount" id="inlineRadio2" value="final" {{ ($predata['examcount'] == 'final' ? "checked" : '') }}>
                            <label class="form-check-label" for="inlineRadio2">Only Final</label>
                        </div>
                    </div>
                    <div id="showHalfYear">
                        <label class="form-check-label" for="inlineRadio1"><h5>* How many Half Yearly CT's you want to calculate ?</h5> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="hct1" name="hct1" {{ ($predata['hct1'] == true ? "checked" : '') }}>
                            <label class="form-check-label" for="hct1">CT1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="hct2" name="hct2" {{ ($predata['hct2'] == true ? "checked" : '') }}>
                            <label class="form-check-label" for="hct2">CT2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="hct3" name="hct3" {{ ($predata['hct3'] == true ? "checked" : '') }}>
                            <label class="form-check-label" for="hct3">CT3</label>
                        </div>
                    </div>
                    <div>
                        <label class="form-check-label" for="inlineRadio1"><h5>* How many Final CT's you want to calculate ?</h5> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="fct1" name="fct1" {{ ($predata['fct1'] == true ? "checked" : '') }}>
                            <label class="form-check-label" for="fct1">CT1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="fct2" name="fct2" {{ ($predata['fct2'] == true ? "checked" : '') }}>
                            <label class="form-check-label" for="fct2">CT2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="fct3" name="fct3" {{ ($predata['fct3'] == true ? "checked" : '') }}>
                            <label class="form-check-label" for="fct3">CT3</label>
                        </div>
                    </div>
                    <div>
                        <label class="form-check-label" for="inlineRadio1"><h5>* Which Columns you want to see ?</h5> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="half_yearly_column" name="half_yearly_column" {{ ($predata['half_yearly_column'] == true ? "checked" : '') }}>
                            <label class="form-check-label" for="half_yearly_column">Half Yearly</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="final_column" name="final_column" {{ ($predata['final_column'] == true ? "checked" : '') }}>
                            <label class="form-check-label" for="final_column">Final Column</label>
                        </div>
                    </div>
                    <div>
                        <label class="form-check-label" for="inlineRadio1"><h5>* Which Page size you want to see ?</h5> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="landscape" name="landscape">
                            <label class="form-check-label" for="landscape">Landscape</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="afour" name="afour" checked>
                            <label class="form-check-label" for="afour">A4 size</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-sm">
            <button type="button" id="button1" class="btn btn-warning">Print Preview</button>
        </div>
        <div class="col-sm">
            <a href="{{ url('student/all') }}"><button type="button" class="btn btn-info">Clear Filter</button></a>
        </div>
        <div class="col-sm">
            <button type="button" id="button2" class="btn btn-success float-right">Print PDF</button>
        </div>
    </div>
    @include('table')
</div>

<script>
    @if($predata['examcount'] != "both")
    {
        $('#showHalfYear').hide();
    }
    @endif
    $('#button1').click(function(){
        $('#pdf').removeAttr("target");
        $('#pdf').attr('action', '{{ url("student/all") }}');
        $('#pdf').submit();
    });
    $('#button2').click(function(){
        $('#pdf').attr('target', '_blank');
        $('#pdf').attr('action', '{{ url("student/pdf") }}');
        $('#pdf').submit();
    });

    $('#inlineRadio1').click(function(){
        $('#showHalfYear').show();
    });
    $('#inlineRadio2').click(function(){
        $('#showHalfYear').hide();
    });
</script>
@endsection