@extends('layouts.admin')
@section('admin-content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('dist/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css') }}">
    </head>

    <body>
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>LevelOfEducation</li>
                    <li>Show</li>
                </ul>
                <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                    <a href="{{ route('levelofeducations.create') }}">Create Level Of Educations</a>
                </div>
            </div>
        </section>
        <div id="app">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                        Level Of Educations
                    </p>
                    <a href="#" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-reload"></i></span>
                    </a>
                </header>
                <div class="card-content">
                    <div class="overflow-x-auto">
                        <table id="example" class="table-auto border ">
                            <thead class="bg-slate-700 text-gray-200">
                                <tr class="text-[0.7rem]">
                                    <th>ID</th>
                                    <th>Level Of Education</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($levelofeducations as $levelofeducation)
                                    <tr class="text-[0.7rem]">
                                        <td>{{ $levelofeducation->id }}</td>
                                        <td>{{ $levelofeducation->name }}</td>
                                        <!-- ... (previous code) ... -->
                                        <td class="actions-cell">
                                            <div class="buttons right nowrap">
                                                <!-- Edit button -->
                                                <a href="{{ route('levelofeducations.edit', $levelofeducation->id) }}">
                                                    <button class="button small blue --jb-modal"
                                                        data-target="sample-modal-2" type="button">
                                                        <span class="icon"><i
                                                                class="mdi mdi-square-edit-outline"></i></span>
                                                    </button>
                                                </a>
                                                <!-- Delete button -->
                                                <form action="{{ route('levelofeducations.destroy', $levelofeducation->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="button small red btn-modal" data-target="sample-modal"
                                                        type="submit">
                                                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                        <!-- ... (remaining code) ... -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#example').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });
        </script>
    </body>
@endsection
