@foreach (config('laramin.plugins') as $plugin)
@if ($plugin['active'])
@if ($plugin['files'])
@foreach ($plugin['files'] as $asset)
@if ($asset['type'] == "css" || $asset['type'] == "CSS")
@if ($asset['active'])
<link rel="stylesheet" href="{{asset('laramin/assets/'.$asset['location'])}}">
@endif
@endif
@endforeach
@endif
@endif
@endforeach