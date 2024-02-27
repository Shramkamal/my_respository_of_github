@extends('layouts.admin')
@section('admin-content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <li>Teachers</li>
                <li>Create</li>
            </ul>
        </div>
    </section>
    <div class="card-content bg-white">
        <div class="overflow-x-auto pt-2 ">
            <form action="{{ route('teachers.store') }}" method="POST">
                @csrf
                <div class="grid md:grid-cols-4 md:gap-6">
                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="teacher_name" id="teacher_name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('teacher_name') }}" placeholder=" " />
                        <label for="teacher_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Teacher
                            Name
                        </label>
                        @error('teacher_name')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="tel" name="teacher_MobileNumber" id="teacher_MobileNumber"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('teacher_MobileNumber') }}" placeholder="" />
                        <label for="teacher_MobileNumber"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Teacher
                            Phone
                            Number (0700-000-0000)
                        </label>
                        @error('teacher_MobileNumber')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="teacher_securityCode" id="teacher_securityCode"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('teacher_securityCode') }}" placeholder=" " />
                        <label for="teacher_securityCode"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Security
                            Code
                        </label>
                        @error('teacher_securityCode')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="teacher_nationalCardNumber" id="teacher_nationalCardNumber"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('teacher_nationalCardNumber') }}" placeholder=" " />
                        <label for="teacher_nationalCardNumber"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">National
                            Card Number
                        </label>
                        @error('teacher_nationalCardNumber')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-auto mb-5 group">
                        <select name="teacher_bloodGroup" id="teacher_bloodGroup"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-700 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bloodGroup)
                                <option value="{{ $bloodGroup }}" @if (old('teacher_bloodGroup') == $bloodGroup) selected @endif>
                                    Blood Group {{ $bloodGroup }}
                                </option>
                            @endforeach
                        </select>
                        <label for="teacher_bloodGroup"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Blood Group
                        </label>
                        @error('teacher_bloodGroup')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="teacher_LevelOfEducation" id="teacher_LevelOfEducation"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('teacher_LevelOfEducation') }}" placeholder=" " />
                        <label for="teacher_LevelOfEducation"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Level
                            Of Education
                        </label>
                        @error('teacher_LevelOfEducation')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="date" name="teacher_InstallationDate" id="teacher_InstallationDate"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer datepicker"
                            value="{{ old('teacher_InstallationDate') }}" placeholder="Select Date" />

                        <label for="teacher_InstallationDate"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Installation
                            Date (MM/DD/YYYY)
                        </label>

                        @error('teacher_InstallationDate')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="teacher_StudyMaterials" id="teacher_StudyMaterials"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('teacher_StudyMaterials') }}" placeholder=" " />
                        <label for="teacher_StudyMaterials"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Study
                            Materials
                        </label>
                    </div>
                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="teacher_Assessment" id="teacher_Assessment"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('teacher_Assessment') }}" placeholder=" " />
                        <label for="teacher_Assessment"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Assessment
                        </label>
                    </div>
                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="teacher_HonoraryAward" id="teacher_HonoraryAward"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('teacher_HonoraryAward') }}" placeholder=" " />
                        <label for="teacher_HonoraryAward"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Honorary
                            Award
                        </label>
                    </div>
                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="number" name="Teacher_Activity" id="Teacher_Activity"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('Teacher_Activity') }}" placeholder=" " />
                        <label for="Teacher_Activity"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Activity
                        </label>
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <select name="curriculas_id" id="curriculas_id"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-700 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            @foreach ($curriculas as $curricula)
                                <option value="{{ $curricula->id }}"
                                    {{ old('curriculas_id') == $curricula->id ? 'selected' : ''}}>
                                    {{ $curricula->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="curriculas_id"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Curricular Name
                        </label>
                        @error('curriculas_id')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="teacher_Certificate" id="teacher_Certificate"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('teacher_Certificate') }}" placeholder=" " />
                        <label for="teacher_Certificate"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Certificate
                        </label>
                        @error('teacher_Certificate')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-auto mb-5 group">
                        <textarea name="teacher_note" id="teacher_note"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " /></textarea>
                        <label for="teacher_note"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Note
                        </label>
                    </div>
                </div>
                <div class="text-right mr-4">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        Add Teacher
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
