<table border="1">
    @foreach ($data as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->roll_no}}</td>
        <td>{{$item->student_name}}</td>
        <td>{{$item->book_title}}</td>
        <td>{{$item->book_author}}</td>
        <td>{{$item->pages_count}}</td>
    </tr>
    @endforeach
</table>