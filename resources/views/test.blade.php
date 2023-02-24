<!-- assuming $locales is an array of supported locales -->
@foreach (config('translatable.locales') as $key => $lang)
    <a href="/{{ $key }}/test">{{ $lang }}</a>
@endforeach
<form method="POST" action="{{ route('test.store') }}">
    @csrf
    @foreach(config('translatable.locales') as $key => $lang)
        <label for="title_{{ $key }}">Title ({{ $key }})</label>
        <input type="text" name="title_{{ $key }}" id="title_{{ $key }}">
        <br>
        <label for="content_{{ $key }}">Content ({{ $key }})</label>
        <textarea name="content_{{ $key }}" id="content_{{ $key }}"></textarea>
        <br>
    @endforeach

    <button type="submit">Create Post</button>
</form>

<!-- assuming $posts is a collection of Post objects with translations -->

@foreach($posts as $post)
    <div class="post">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
    </div>
@endforeach

