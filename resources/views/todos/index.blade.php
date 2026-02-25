<!DOCTYPE html>
<html>
<head>
    <title>Todo Kegiatan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f7fb;
        }

        .card{
            border:none;
            border-radius:15px;
        }

        .important{
            border-left:5px solid red;
        }

        .done{
            text-decoration:line-through;
            color:gray;
        }

    </style>

</head>
<body>

<div class="container mt-5">

    <div class="card shadow p-4">

        <h3 class="mb-4">📋 Todo List Kegiatan</h3>


        {{-- FORM TAMBAH --}}
        <form method="POST" action="{{ route('todos.store') }}">
            @csrf

            <div class="row g-2">

                <div class="col-md-4">
                    <input name="title" class="form-control" placeholder="Nama kegiatan" required>
                </div>

                <div class="col-md-2">
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <input type="time" name="jam" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <select name="prioritas" class="form-control">
                        <option value="biasa">Biasa</option>
                        <option value="penting">Penting</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">
                        Tambah
                    </button>
                </div>

            </div>

        </form>


        {{-- SEARCH --}}
        <form class="mt-3">
            <input name="search" class="form-control" placeholder="Search..." value="{{ $search }}">
        </form>


        {{-- LIST --}}
        <table class="table mt-4">

            <thead>
                <th>Kegiatan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Prioritas</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>

            <tbody>

            @foreach($todos as $todo)

            <tr class="{{ $todo->prioritas == 'penting' ? 'important':'' }}">

                <td class="{{ $todo->is_done ? 'done':'' }}">
                    {{ $todo->title }}
                </td>

                <td>
                    {{ $todo->tanggal }}
                </td>

                <td>
                    {{ $todo->jam }}
                </td>

                <td>

                    @if($todo->prioritas == 'penting')

                        <span class="badge bg-danger">Penting</span>

                    @else

                        <span class="badge bg-secondary">Biasa</span>

                    @endif

                </td>

                <td>

                    @if($todo->is_done)

                        <span class="badge bg-success">Selesai</span>

                    @else

                        <span class="badge bg-warning">Belum</span>

                    @endif

                </td>


                <td>

                    {{-- TOGGLE --}}
                    <form method="POST" action="{{ route('todos.toggle',$todo->id) }}" class="d-inline">

                        @csrf
                        @method('PATCH')

                        <button class="btn btn-sm btn-success">
                            ✔
                        </button>

                    </form>


                    {{-- DELETE --}}
                    <form method="POST" action="{{ route('todos.destroy',$todo->id) }}" class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>


        {{ $todos->links() }}


    </div>

</div>

</body>
</html>
