<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <ul class="nav nav-tabs">
            @foreach (config('translatable.locales') as $lang)
            <li class="{{ $lang == 'az' ? 'active' : '' }}"><a data-toggle="tab" href="#{{ $lang }}">{{ $lang }}</a>
            </li>
            <li style="float: right;"><a href="/{{ $lang }}/post">{{ $lang }}</a></li>
            @endforeach
        </ul>
        @if (isset($post_find))
        @include('components.post_edit')
        @else
        <form action="/post" method="post">
            @csrf
            <div class="tab-content">
                @foreach (config('translatable.locales') as $lang)
                <div id="{{ $lang }}" class="tab-pane fade {{ $lang == 'az' ? 'in active' : '' }}">
                    <label for="title_{{ $lang }}">Title ({{ $lang }})</label>
                    <input type="text" name="title_{{ $lang }}" id="title_{{ $lang }}" class="form-control" required>
                    <label for="content_{{ $lang }}">Content ({{ $lang }})</label>
                    <textarea name="content_{{ $lang }}" id="content_{{ $lang }}" cols="20" rows="5"
                        class="form-control" required></textarea>
                </div>
                @endforeach
                <br><button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                @foreach (config('translatable.locales') as $lang)
                <th scope="col">Title ({{ $lang }})</th>
                <th scope="col">Content ({{ $lang }})</th>
                @endforeach
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $i=>$post)
            <tr>
                <th scope="col">{{ $i+=1 }}</th>
                @foreach (config('translatable.locales') as $lang)
                <th scope="col">{{ $post->translate($lang)->title }}</th>
                <th scope="col">{{ $post->translate($lang)->content }}</th>
                @endforeach
                <th scope="col">
                    <form action="/post/{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="/post/{{ $post->id }}/edit" class="btn btn-success">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
            @empty
            <tr>
                <td>
                    <p>Mezmun yoxdur</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
