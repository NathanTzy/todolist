<div class="modal fade" id="editModalCategory{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Something Wrong, <span class="fw-bold text-danger">{{ Auth::user()->name }}?</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('StoreAct.update', $row->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="inputName" class="form-label fs-5 mt-1 text-warning fw-bold">ACTIVITY</label>
                    <input type="text" class="form-control" id="inputname" name="name"
                        value="{{ old('name') }}">
                </div>

                <div class="col-12 mt-1">
                    <label for="inputimage" class="form-label fs-5 mt-1 text-warning fw-bold">DEADLINE DATE</label>
                    <input type="date" class="form-control" id="inputimage" name="date">
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-warning text-white mx-2"><i
                            class="bi bi-plus"></i>Update</button>
                    <button type="reset" class="btn btn-danger mx-2"><i class="bi bi-trash"></i>Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
