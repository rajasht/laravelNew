<h1>Students Portal</h1><br><br>
<?php 
if(session()->has('studentDeleteSuccess')){
        echo Session::get('studentDeleteSuccess');
    }
if(session()->has('studentUpdateSuccess')){
        echo Session::get('studentUpdateSuccess');
    }
?>
<br>
<a href="addstd"><button type="button" >Add Student</button></a>
<br>
<br>
<form  action="/getstd" method="post">
    @csrf
    <input type="text" name="student_id" placeholder="Enter Student Id">
    <button type="Submit">Search Student</button>
</form>
<br>
<br>
<table border="1">
    <tr>
        <td>Id</td>
        <td>Roll_no</td>
        <td>student_name</td>
        <td>Father_name</td>
        <td>Class</td>
        <td>DOB</td>
        <td>Book_id</td>
        <td>Remove</td>
        <td>Updaate</td>
    </tr>
    @foreach($students as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['roll_no']}}</td>   
        <td>{{$item['student_name']}}</td>
        <td>{{$item['father_name']}}</td>
        <td>{{$item['class']}}</td>
        <td>{{$item['dob']}}</td>
        <td>{{$item['book_id']}}</td>
        <td><a href="deletestud/{{$item['id']}}" onclick="return confirm('Are you sure to delete?')">
        <button type="button" class="btn btn-danger">Delete</button></a></td>
        <td><a href="editstd/{{$item['id']}}">
        <button type="button" class="btn btn-danger">Edit</button></a></td>
    </tr>
    @endforeach
</table>
<br><br>
<span>
    {{$students->links()}}
</span>


