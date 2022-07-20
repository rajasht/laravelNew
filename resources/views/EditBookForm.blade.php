<h1>Edit Book Details</h1>
<br><br>
<form action="/editbook" method="POST">
    @csrf
    <input type="hidden" name="book_id" value="{{$bookdetails[0]['book_id']}}">
    <h2>Book Title : <input type="text" name="book_title" value="{{$bookdetails[0]['book_title']}}"></h2>
    <h2>Book Author : <input type="text" name="book_author" value="{{$bookdetails[0]['book_author']}}"></h2>
    <h2>No. of Pages : <input type="text" name="pages_count" value="{{$bookdetails[0]['pages_count']}}"></h2>
    <h2>Book Price : <input type="text" name="price" value="{{$bookdetails[0]['price']}}"></h2><br>
    <button type="submit">Update</button>
</form>