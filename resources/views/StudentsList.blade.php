<h1>Students List</h1><br><br>
<?php 
if(session()->has('studentDeleteSuccess')){
        echo Session::get('studentDeleteSuccess');
    }
if(session()->has('studentUpdateSuccess')){
        echo Session::get('studentUpdateSuccess');
    }
?>
<br><br>
<table border="1">
    <tr>
        <td>Student_id</td>
        <td>Roll_no</td>
        <td>student_name</td>
        <td>Father_name</td>
        <td>Class</td>
        <td>DOB</td>
        <td>Issued_book_id</td>
        <td>Remove</td>
        <td>Updaate</td>
    </tr>
    @foreach($students as $item)
    <tr>
        <td>{{$item['student_id']}}</td>
        <td>{{$item['roll_no']}}</td>   
        <td>{{$item['student_name']}}</td>
        <td>{{$item['father_name']}}</td>
        <td>{{$item['class']}}</td>
        <td>{{$item['dob']}}</td>
        <td>{{$item['issued_book_id']}}</td>
        <td><a href="deletestud/{{$item['student_id']}}" onclick="return confirm('Are you sure to delete?')">
        <button type="button" class="btn btn-danger">Delete</button></a></td>
        <td><a href="editstd/{{$item['student_id']}}">
        <button type="button" class="btn btn-danger">Edit</button></a></td>
    </tr>
    @endforeach
</table>

<span>
    {{$students->links()}}
</span>


