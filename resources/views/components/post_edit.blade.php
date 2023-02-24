<form action="/post/{{ $post_find->id }}" method="post">
    @csrf
    @method('PUT')
    <div class="tab-content">
        @foreach (config('translatable.locales') as $lang)
        <div id="{{ $lang }}" class="tab-pane fade {{ $lang == 'az' ? 'in active' : '' }}">
            <label for="title_{{ $lang }}">Title ({{ $lang }})</label>
            <input type="text" name="title_{{ $lang }}" value="{{ $post_find->translate($lang)->title }}" id="title_{{ $lang }}" class="form-control" required>
            <label for="content_{{ $lang }}">Content ({{ $lang }})</label>
            <textarea name="content_{{ $lang }}" id="content_{{ $lang }}" cols="20" rows="5" class="form-control"required>{{ $post_find->translate($lang)->content }}</textarea>
        </div>
        @endforeach
        <br><button type="submit" class="btn btn-success">Update</button>
    </div>
</form>