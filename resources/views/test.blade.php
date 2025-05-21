{{-- {{ $page }} --}}
<form action="/test/aws" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="productImage" id="">
    <button type="submit">submit</button>
</form>
