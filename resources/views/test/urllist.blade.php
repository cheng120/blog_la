<h1>结果列表</h1>
<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>id</th>
        <th>url</th>
        <th>抓取结果</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dataList as $item=>$value)
    <tr>
        <td>{{$value['id']}}</td>
        <td>{{$value['url']}}</td>
        <td>--</td>
    </tr>
    @endforeach
    </tbody>
</table>