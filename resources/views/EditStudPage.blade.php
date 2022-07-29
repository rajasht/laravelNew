<h1>Edit Student Details</h1>
<br><br>
<form action="/editstud" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data[0]['id']}}">
    <h2>Roll No: <input type="text" name="roll_no" value="{{$data[0]['roll_no']}}"></h2>
    <h2>Student Name : <input type="text" name="student_name" value="{{$data[0]['student_name']}}"></h2>
    <h2>Father's Name : <input type="text" name="father_name" value="{{$data[0]['father_name']}}"></h2>
    <h2>Class : <input type="text" name="class" value="{{$data[0]['class']}}"></h2>
    <h2>Date of Birth : <input type="text" name="dob" value="{{$data[0]['dob']}}"></h2>
    <h2>Issued book id : <input type="text" name="book_id" value="{{$data[0]['book_id']}}"></h2><br>
    <button type="submit">Update</button>
</form>