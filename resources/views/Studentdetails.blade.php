<h1>STUDENT DETAILS</h1>
<form action="addstd" method="POST">
    @csrf
    <input type="text" name = "roll_no" placeholder="Enter Student's Roll No"><br><br>
    <input type="text" name = "student_name" placeholder="Enter Student Name"><br><br>
    <input type="text" name = "father_name" placeholder="Enter Father Name"><br><br>
    <input type="text" name = "class" placeholder="Enter Student class"><br><br>
    <input type="text" name = "dob" placeholder="DOB (yyyy-mm-dd)"><br><br>
    <input type="text" name = "book_id" placeholder="Allocated Book Id"><br><br>
    <button type="Submit">Add Student</button>
</form>