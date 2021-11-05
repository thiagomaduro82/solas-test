@extends('template')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form class="d-flex" action="{{ route('main.index') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input class="form-control me-2" type="file" name="data_file">
                                <button class="btn btn-outline-success btn-sm" type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="col">
                            <a href="{{ route('home.index') }}" class="btn btn-outline-info btn-sm float-end">Come
                                back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($affiliates))
                        <h4 class="mb-2 text-secondary">List of Affiliates 100km from Dublin.</h4>
                    @endif

                    <table id="table" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Distance to Dublin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($affiliates))
                                @foreach ($affiliates as $affiliate)
                                    <tr>
                                        <td>{{ $affiliate['affiliate_id'] }}</td>
                                        <td>{{ $affiliate['name'] }}</td>
                                        <td>{{ $affiliate['distance'] }}</td>
                                    </tr>

                                @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any() || isset($msg_error))
        <script>
            $(function() {
                $('#modal-erros').modal('show');
            })
        </script>
    @endif

    <!-- Error Modal -->
    <div class="modal fade" id="modal-erros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                </div>
                <div class="modal-body">
                    <ul>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endif
                        @if(isset($msg_error))
                            <li>{{ $msg_error }}</li>
                        @endif


                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
