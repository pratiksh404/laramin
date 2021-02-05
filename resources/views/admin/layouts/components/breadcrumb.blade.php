@if (isset($links))
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">Light Layout</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                @foreach ($links as $link)
                <li class="breadcrumb-item {{$loop->last ? 'active' : ''}}"><a
                        href="{{$link['url']}}">{{$link['name']}}</a>
                </li>
                @endforeach
            </ol>
        </div>
    </div>
</div>
@endif