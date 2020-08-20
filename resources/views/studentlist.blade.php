@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <a href="{{ route('student') }}"><button type="button" class="btn btn-info">Add Sudents</button></a>
        </div>
    </div>
    <div class="row justify-content-center" style="margin:20px">
        <form class="form-horizontal" id="pdf" method="post" action="">
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
                    <div>
                        <label class="form-check-label" for="inlineRadio1"><h5>* How many Half Yearly CT's you want to calculate ?</h5> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="hct1" name="hct1" {{ ($predata['hct1'] == true ? "checked" : '') }}>
                            <label class="form-check-label" for="hct1">CT1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="hct2" name="hct2" {{ ($predata['hct2'] == true ? "checked" : '') }}>
                            <label class="form-check-label" for="hct1">CT2</label>
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
                </div>
            </div>
        </form>
    </div>
        <div class="row">
            <div class="col-sm">
                <button type="button" id="button1" class="btn btn-warning">Print Preview</button>
            </div>
            <div class="col-sm">
                <button type="button" class="btn btn-success float-right">Print PDF</button>
            </div>
        </div>
    
    <div class="row justify-content-center">
        <table class="table-bordered table-sm">
            <thead>
                <tr class="text-center">
                    <th></th>
                    <th colspan="6">Half Yearly</th>
                    <th colspan="6">Final</th>
                    <th colspan="3">Grand</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Students</th>
                    <th>ct1</th>
                    <th>ct2</th>
                    <th>ct3</th>
                    <th>Half Yearly</th>
                    <th>C.CT+Half Yearly</th>
                    <th>Converted 100</th>
                    <th>ct1</th>
                    <th>ct2</th>
                    <th>ct3</th>
                    <th>Final</th>
                    <th>C.CT+Final</th>
                    <th>Converted 100</th>
                    <th>Grand Total</th>
                    <th>On 100</th>
                    <th>Merit Position</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allmark as $key => $mark)
                <tr>
                    <th>{{ $mark->name }}</th>
                    <td>{{ $mark->h_ct_one }}</td>
                    <td>{{ $mark->h_ct_two }}</td>
                    <td>{{ $mark->h_ct_three }}</td>
                    <td>{{ $mark->half_yearly }}</td>
                    <td>{{ $mark->h_and_avg_ct }}</td>
                    <td>{{ $mark->h_convert }}</td>
                    <td>{{ $mark->f_ct_one }}</td>
                    <td>{{ $mark->f_ct_two }}</td>
                    <td>{{ $mark->f_ct_three }}</td>
                    <td>{{ $mark->final }}</td>
                    <td>{{ $mark->f_and_avg_ct }}</td>
                    <td>{{ $mark->f_convert }}</td>
                    <td>{{ $mark->grand }}</td>
                    <td>{{ $mark->avg_grand }}</td>
                    <td>{{ $mark->rank }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $('#button1').click(function(){
        $('#pdf').attr('action', '{{ url("student/all") }}');
        $('#pdf').submit();
    });

    $('#button2').click(function(){
        $('#pdf').attr('action', 'page2');
    });
</script>
@endsection