<table border='1'>

    <tr>
        <td>Kode</td>
        <td>Unit Kerja</td>
        <td>Level</td>
        <td>Action</td>
    </tr>
    @foreach($pelayanan_kesehatans as $pelayanan_kesehatan)
        <tr>
            <td>{{$pelayanan_kesehatan->kunker}}</td>                
            <td>{{$pelayanan_kesehatan->name}}</td>
            <td>{{$pelayanan_kesehatan->levelunker}}</td>
            <td>
                <a href="{{ route('addChild',$pelayanan_kesehatan->id)}}"> Add child </a>
            </td>
        </tr>
    @endforeach


</table>