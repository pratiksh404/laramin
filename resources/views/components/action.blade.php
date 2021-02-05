<div>
    <div class="form-group text-center">
        <!-- Outline Round Floating button -->
        @if (auth()->user()->can('update',$model) && $edit)
        <a href="{{ adminEditRoute(trim($route),$model->id) }}" class="btn btn-warning btn-sm" title="Edit"
            data-toggle="tooltip" placement="top"><i class="fa fa-edit"></i></a>
        @endif
        @if (auth()->user()->can('view',$model) && $show)
        <a href="{{ adminShowRoute(trim($route),$model->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip"
            placement="top" title="Show"><i class="fa fa-eye"></i></a>
        @endif
        @if (auth()->user()->can('delete',$model) && $delete)
        <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
            data-target="#delete-{{$model->id}}">
            <i class="fa fa-trash"></i>
        </button>
        @endif
        {{$buttons ?? ''}}
    </div>
</div>
<!-- Modal -->
<div class="modal fade text-left" id="delete-{{$model->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog model-lg" role="document">
        @if ($deleteCondition)
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title" id="myModalLabel10">Confirm Delete !</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this data ?
                <form action="{{ adminDeleteRoute(trim($route),$model->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-danger">Delete it !</button>
            </div>
            </form>
        </div>
        @else
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title" id="myModalLabel10">Item cannot be deleted.</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <small>This item cannot be deleted yet, since it may have dependencies on other module</small>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        @endif
    </div>
</div>