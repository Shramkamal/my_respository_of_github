@extends('layouts.admin')
@section('admin-content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <li>Curriculas</li>
                <li>Create</li>
            </ul>
        </div>
    </section>
    <div class="card-content bg-white">
        <div class="overflow-x-auto pt-2 ">
            <form action="{{ route('curriculas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid md:grid-cols-4 md:gap-6">
                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="curricula_name" id="curricula_name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('curricula_name') }}" placeholder=" " />
                        <label for="curricula_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Curricula
                            Name
                        </label>
                        @error('curricula_name')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="curricula_level_of_education" id="curricula_level_of_education"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('curricula_level_of_education') }}" placeholder=" " />
                        <label for="curricula_level_of_education"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Level
                            Of Education

                        </label>
                        @error('curricula_level_of_education')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="file" name="curriculum_upload" id="curriculum_upload"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('curriculum_upload') }}" placeholder=" " />
                        <label for="curriculum_upload"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Curriculum
                            Upload
                        </label>
                        @error('curriculum_upload')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="text-right mr-4">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                            Add Curricula
                        </button>
                    </div>
            </form>
        </div>
    </div>
@endsection
