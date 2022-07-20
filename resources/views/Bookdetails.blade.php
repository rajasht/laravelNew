<h1>BOOK DETAILS</h1>
<form action="addbook" method="POST">
    @csrf
    <input type="text" name = "book_title" placeholder="Title of the Book"><br><br>
    <input type="text" name = "book_author" placeholder="Author Name of the Book"><br><br>
    <input type="text" name = "pages_count" placeholder="Total No of Pages in Book"><br><br>
    <input type="text" name = "price" placeholder="Enter Book Price"><br><br>
    <input type="text" name = "published_on" placeholder="(YYYY-MM-DD)"><br><br>
    <button type="Submit">Add Book</button>
</form>
