<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container col-3">
        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 sm:text-left">
                <div class="flex items-center">
                    @foreach (config('translatable.locales') as $lang)
                    <a href="/{{ $lang }}/index/create" class="ml-1 underline btn btn-success"> {{ $lang }} </a>
                    @endforeach
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ __('messages.success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ __('messages.error') }}</div>
        @endif
        <form action="/index" method="post">
            @csrf
            <label for="name">{{ __('messages.name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="{{ __('messages.name') }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                {{ trans('validation.error') }}
            </span>
            @enderror
            <label for="email">{{ __('messages.email') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="{{ __('messages.email') }}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                {{ trans('validation.error') }}
            </span>
            @enderror
            <label for="password">{{ __('messages.password') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="{{ __('messages.password') }}" required>
            @error('password')
            <span class="invalid-feedback" role="alert">
                {{ trans('validation.error') }}
            </span>
            @enderror
            <button type="submit" class="btn btn-primary mt-3">{{ __('messages.button') }}</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
