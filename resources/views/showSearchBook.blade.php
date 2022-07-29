<table border="1">
    <tr>
        <td>id</td>
        <td>Book_title</td>
        <td>Book_author</td>
        <td>Pages_count</td>
        <td>Price</td>
        <td>Published On</td>
    </tr>
    @foreach($book as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['book_title']}}</td>
        <td>{{$item['book_author']}}</td>
        <td>{{$item['pages_count']}}</td>
        <td>{{$item['price']}}</td>
        <td>{{$item['published_on']}}</td>
    </tr>
    @endforeach
</table>

<a href="booklist"><button>Back to Book Portal</button></a>