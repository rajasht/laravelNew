<h1>Book Portal</h1><br><br>
<?php 
if(session()->has('bookDeleteSuccess')){
        echo Session::get('bookDeleteSuccess');
    }
if(session()->has('bookUpdateSuccess')){
        echo Session::get('bookUpdateSuccess');
    }
?>
<br>
<a href="addbook"><button type="button" >Add Book</button></a>
<br>
<br>
<form  action="/getbook" method="post">
    @csrf
    <input type="text" name="book_id" placeholder="Enter Book Id">
    <button type="Submit">Search Book</button>
</form>
<br>

<br>
<table border="1">
    <tr>
        <td>id</td>
        <td>Book_title</td>
        <td>Book_author</td>
        <td>Pages_count</td>
        <td>Price</td>
        <td>Operation</td>
    </tr>
    @foreach($books as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['book_title']}}</td>
        <td>{{$item['book_author']}}</td>
        <td>{{$item['pages_count']}}</td>
        <td>{{$item['price']}}</td>
        <td><a href="deletebook/{{$item['id']}}" onclick="return confirm('Are you sure to delete?')">
        <button type="button" class="btn btn-danger">Delete</button></a></td>
        <td><a href="editbook/{{$item['id']}}">
        <button type="button" class="btn btn-danger">Edit</button></a></td>
    </tr>
    @endforeach
</table>
<br><br>
<span>
    {{$books->links()}}
</span>
