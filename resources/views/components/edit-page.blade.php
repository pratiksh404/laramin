<div>
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
            <h3 class="content-header-title">Edit {{ $name }}</h3>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{adminRedirectRoute('dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{adminRedirectRoute($route)}}">{{ $name }}</a>
                    </li>
                    <li class="breadcrumb-item active">Edit {{ $name }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="{{$route}}-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="{{config('laramin.global_card',true) ? config('laramin.card_wrapper_classes') : ''}}">
                        <div
                            class="card {{config('laramin.global_card',true) ? config('laramin.global_card_classes') : ''}}">
                            <div
                                class="card-header bg-amber bg-lighten-1 {{config('laramin.global_card',true) ? config('laramin.global_card_header_classes') : ''}}">
                                <h4
                                    class="card-title {{config('laramin.global_card',true) ? config('laramin.global_card_title_classes') : ''}}">
                                    Edit {{ $name }}
                                </h4>

                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                @if (config('laramin.global_card_header_elements',true) &&
                                config('laramin.global_card',true))
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        @foreach (config('laramin.global_card_actions') as $action)
                                        <li><a data-action="{{$action['data-action']}}"><i
                                                    class="{{$action['action-icon']}}"></i></a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @else
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        {{ $heading_elements }}
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <div
                                class="card-content collapse show {{config('laramin.global_card',true) ? config('laramin.global_card_content_classes') : ''}}">
                                <div
                                    class="card-body card-dashboard {{config('laramin.global_card',true) ? config('laramin.global_card_body_classes') : ''}}">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">
                                            {{ $card_text ?? "Edit ".$name." in the system" }} <br>
                                            <span class="text-secondary">The field labels marked with * are required
                                                input fields.</span>
                                        </p>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{adminRedirectRoute($route)}}"
                                                class="btn bg-amber bg-lighten-1">Back</a>
                                            {{ $buttons ?? '' }}
                                        </div>
                                    </div>
                                    <form action="{{adminUpdateRoute($route,$model->id)}}" method="post"
                                        enctype="multipart/form-data" class="{{$formclass ?? ''}}"
                                        id="{{$formid ?? ''}}">
                                        @method('PATCH')
                                        @csrf
                                        {{ $content ?? '' }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>