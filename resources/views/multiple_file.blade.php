<form action="upload-files" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="files[]" multiple>
    <button type="submit">Upload</button>
</form>

@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif
