<div class="modal fade" id="exampleModalCategory_{{$category['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">edit</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control"
                       value="{{$category['cat_name']}}"
                       id="inputEditCategory_{{$category['id']}}">
            <input type="hidden" value="{{$category['id']}}"
                       id="idCategory{{$countCat}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close
                </button>
                <button type="button" class="btn btn-primary" onclick="editCategory('{{$category['id']}}')">Save changes
                </button>
            </div>
        </div>
    </div>
</div>
