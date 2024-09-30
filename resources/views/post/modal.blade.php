@foreach ($posts as $item)
    <div class="modal fade" id="viewPostModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Post</h1>

                    <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                </div>

                <div class="modal-body">
                    <div class="mb-3">


                        <div class="d-flex " style="justify-content: center;">
                            <img src="{{ asset('storage/post/' . $item->image) }}"
                                style="height: 300px;object-fit: cover; width:250px;"
                                class="img-preview  rounded border border-5 border-white shadow"alt="">
                        </div>
                        <div class="d-block mt-3">
                            <label>Title</label>
                            <input class="form-control" type="text" name="" id=""
                                value="{{ $item->title }}" disabled>
                        </div>

                        <div class="d-block mt-3">
                            <label>Description</label>
                            {{-- <div class="">
                                <p>
                                    {!! $item->desc !!}
                                </p>
                            </div> --}}
                            <textarea name="" class="form-control" id="" cols="30" rows="10" disabled>{{ $item->desc }}
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">back</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
