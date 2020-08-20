@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <a href="{{ route('student') }}"><button type="button" class="btn btn-info">Add Sudents</button></a>
        </div>
    </div>
    <div class="row justify-content-center" style="margin:20px">
        <form class="form-horizontal" method="post" action="">
            <div class="card">
                <div class="form-group">
                    <div>
                        <label class="form-check-label" for="inlineRadio1"><h5>* How you want to see Grand result ?</h5> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="both" checked>
                            <label class="form-check-label" for="inlineRadio1">Half yearly and Final</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="final">
                            <label class="form-check-label" for="inlineRadio2">Only Final</label>
                        </div>
                    </div>
                    <div>
                        <label class="form-check-label" for="inlineRadio1"><h5>* How many Half Yearly CT's you want to calculate ?</h5> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ct1" value="ct1" checked>
                            <label class="form-check-label" for="ct1">CT1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ct2" value="ct2" checked>
                            <label class="form-check-label" for="ct2">CT2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ct3" value="ct3" checked>
                            <label class="form-check-label" for="ct3">CT3</label>
                        </div>
                    </div>
                    <div>
                        <label class="form-check-label" for="inlineRadio1"><h5>* How many Final CT's you want to calculate ?</h5> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ct1" value="ct1" checked>
                            <label class="form-check-label" for="ct1">CT1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ct2" value="ct2" checked>
                            <label class="form-check-label" for="ct2">CT2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ct3" value="ct3" checked>
                            <label class="form-check-label" for="ct3">CT3</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
        <div class="row">
            <div class="col-sm">
                <button type="button" class="btn btn-warning">Print Preview</button>
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
                <tr>
                    <th>Kamrul</th>
                    <td>13</td>
                    <td>15</td>
                    <td>8</td>
                    <td>63</td>
                    <td>75</td>
                    <td>60</td>
                    <td>15</td>
                    <td>20</td>
                    <td>6</td>
                    <td>83</td>
                    <td>100</td>
                    <td>90</td>
                    <td>150</td>
                    <td>75</td>
                    <td>3</td>
                </tr>
                <tr>
                    <th>Santo</th>
                    <td>13</td>
                    <td>15</td>
                    <td>8</td>
                    <td>63</td>
                    <td>75</td>
                    <td>60</td>
                    <td>15</td>
                    <td>20</td>
                    <td>6</td>
                    <td>83</td>
                    <td>100</td>
                    <td>90</td>
                    <td>150</td>
                    <td>75</td>
                    <td>4</td>
                </tr>
                <tr>
                    <th>Kaif</th>
                    <td>13</td>
                    <td>15</td>
                    <td>8</td>
                    <td>63</td>
                    <td>75</td>
                    <td>60</td>
                    <td>15</td>
                    <td>20</td>
                    <td>6</td>
                    <td>83</td>
                    <td>100</td>
                    <td>90</td>
                    <td>150</td>
                    <td>75</td>
                    <td>5</td>
                </tr>
                <tr>
                    <th>emon</th>
                    <td>13</td>
                    <td>15</td>
                    <td>8</td>
                    <td>63</td>
                    <td>75</td>
                    <td>60</td>
                    <td>15</td>
                    <td>20</td>
                    <td>6</td>
                    <td>83</td>
                    <td>100</td>
                    <td>90</td>
                    <td>150</td>
                    <td>75</td>
                    <td>2</td>
                </tr>
                <tr>
                    <th>Its me</th>
                    <td>13</td>
                    <td>15</td>
                    <td>8</td>
                    <td>63</td>
                    <td>75</td>
                    <td>60</td>
                    <td>15</td>
                    <td>20</td>
                    <td>6</td>
                    <td>83</td>
                    <td>100</td>
                    <td>90</td>
                    <td>150</td>
                    <td>75</td>
                    <td>1</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection