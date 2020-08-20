
<div class="row justify-content-center">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th></th>
                    @if($predata['half_yearly_column'] == true)
                    <th colspan="6">Half Yearly</th>
                    @endif
                    @if($predata['final_column'] == true)
                    <th colspan="6">Final</th>
                    @endif
                    <th colspan="3">Grand</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Students</th>
                    @if($predata['half_yearly_column'] == true)
                    <th>ct1</th>
                    <th>ct2</th>
                    <th>ct3</th>
                    <th>Half Yearly</th>
                    <th>C.CT+Half Yearly</th>
                    <th>Converted 100</th>
                    @endif
                    @if($predata['final_column'] == true)
                    <th>ct1</th>
                    <th>ct2</th>
                    <th>ct3</th>
                    <th>Final</th>
                    <th>C.CT+Final</th>
                    <th>Converted 100</th>
                    @endif
                    <th>Grand Total</th>
                    <th>On 100</th>
                    <th>Merit Position</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allmark as $key => $mark)
                <tr>
                    <th>{{ $mark->name }}</th>
                    @if($predata['half_yearly_column'] == true)
                    <td>{{ $mark->h_ct_one }}</td>
                    <td>{{ $mark->h_ct_two }}</td>
                    <td>{{ $mark->h_ct_three }}</td>
                    <td>{{ $mark->half_yearly }}</td>
                    <td>{{ $mark->h_and_avg_ct }}</td>
                    <td>{{ $mark->h_convert }}</td>
                    @endif
                    @if($predata['final_column'] == true)
                    <td>{{ $mark->f_ct_one }}</td>
                    <td>{{ $mark->f_ct_two }}</td>
                    <td>{{ $mark->f_ct_three }}</td>
                    <td>{{ $mark->final }}</td>
                    <td>{{ $mark->f_and_avg_ct }}</td>
                    <td>{{ $mark->f_convert }}</td>
                    @endif
                    <td>{{ $mark->grand }}</td>
                    <td>{{ $mark->avg_grand }}</td>
                    <td>{{ $mark->rank }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>