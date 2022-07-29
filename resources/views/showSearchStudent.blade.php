<table border="1">
    <tr>
        <td>Id</td>
        <td>Roll_no</td>
        <td>student_name</td>
        <td>Father_name</td>
        <td>Class</td>
        <td>DOB</td>
        <td>Book_id</td>
    </tr>
    @foreach($student as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['roll_no']}}</td>   
        <td>{{$item['student_name']}}</td>
        <td>{{$item['father_name']}}</td>
        <td>{{$item['class']}}</td>
        <td>{{$item['dob']}}</td>
        <td>{{$item['book_id']}}</td>
    </tr>
    @endforeach
</table>

<a href="stdlist"><button type="button">Back to Student Portal</button>