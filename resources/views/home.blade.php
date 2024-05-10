@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-title text-center fs-1 fw-bold">Hai <span class="text-danger">{{ Auth::user()->name }}</span>
                    !</div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-title text-center fs-2 pt-4">What are u going to do <span
                        class="text-danger">{{ Auth::user()->name }}</span> ?</div>
                <hr>
                <div class="card-body">
                    <form action="{{ route('StoreAct.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="col-12">
                            <label for="inputName" class="form-label fs-3 text-warning fw-bold">ACTIVITY</label>
                            <input type="text" class="form-control" id="inputname" name="name"
                                value="{{ old('name') }}">
                        </div>

                        <div class="col-12 mt-1">
                            <label for="inputimage" class="form-label fs-3 text-warning fw-bold">DEADLINE DATE</label>
                            <input type="date" class="form-control" id="inputimage" name="date">
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-warning text-white mx-2"><i
                                    class="bi bi-plus"></i>START!</button>
                            <button type="reset" class="btn btn-danger mx-2"><i class="bi bi-trash"></i>Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h1 class="text-center fs-1 text-white fw-bold mt-5">IN PROGRESS</h1>
    <div class="container mt-5">
        <div class="row">
            @forelse ($todo as $row)
                <div class="col-3">
                    <div class="card">
                        <div class="card-title text-center mt-3 fs-5 ">{{ $loop->iteration }}</div>
                        <div class="card-body">
                            <h1>{{ $row->name }}</h1>
                            <h4 class="text-end">DEADLINE</h4>
                            <p class="bg-danger p-2 fs-4 text-center text-white rounded">{{ $row->date }}</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-warning text-white" data-bs-toggle="modal"
                                    data-bs-target="#editModalCategory{{ $row->id }}">UPDATE</button>
                                @include('layouts.modal-edit')
                                <form action="{{ route('StoreAct.destroy', $row->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-success" type="submit">
                                        FINISH
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <h1 class="text-white text-center bg-danger p-2 rounded">ADD SOMETHING TO DO!</h1>
            @endforelse

        </div>
    </div>
@endsection
