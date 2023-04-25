<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--data cdn link table-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table,
        th,
        td {
            border: 3px solid black;
        }
    </style>


</head>

<body>

    <a href="{{ url('notes') }}">
        <button class="btn btn-primary d-inline-block m-2 float-right">ADD</button>
    </a>

    <div class="container-fluid mt-3">
        <table id="datatable" class="table">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>File</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                    <tr>
                        <td>{{ $note->id }}</td>
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->slug }}</td>
                        <td>{{ $note->file }}</td>
                        <td>{{ $note->description }}</td>
                        <td>
                            <a href="{{ route('people.delete', ['id' => $note->id]) }}">
                                <button type="button" class="btn btn-danger "
                                    onclick="return confirm('Are you sure want to delete?')">Delete</button> </a>


                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>

        {{-- ---- ---------For pagination we use this ------------------ --}}
        {{-- <div class="container-fluid   pt-5">
                 {{ $notes->links() }}
           </div> --}}


    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
 </script>

</body>
</html>
