<div class="col-auto">
    <a @click="$modal.show('edit')"  data="{{ $data->toJson() }}" title="{{ $title }}" class="btn btn-sm  btn-info" role="button"><i class="fa fa-edit"></i></a>
</div>
