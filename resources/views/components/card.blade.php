<div>
    <div class="{{config('laramin.global_card',true) ? config('laramin.card_wrapper_classes') : ''}}">
        <div class="card {{config('laramin.global_card',true) ? config('laramin.global_card_classes') : ''}}">
            <div
                class="card-header {{$theme ?? ''}} {{config('laramin.global_card',true) ? config('laramin.global_card_header_classes') : ''}}">
                <h4
                    class="card-title text-dark {{config('laramin.global_card',true) ? config('laramin.global_card_title_classes') : ''}}">
                    {{ $title }}
                </h4>

                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                @if (config('laramin.global_card_header_elements',true) && config('laramin.global_card',true))
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        @foreach (config('laramin.global_card_actions') as $action)
                        <li><a data-action="{{$action['data-action']}}"><i class="{{$action['action-icon']}}"></i></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @else
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                        {{ $heading_elements ?? '' }}
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
                            {{ $card_text ?? '' }}
                        </p>
                        <div class="d-flex justify-content-center">
                            {{ $buttons ?? '' }}
                        </div>
                    </div>
                    {{ $card_content }}
                </div>
            </div>
        </div>
    </div>
</div>