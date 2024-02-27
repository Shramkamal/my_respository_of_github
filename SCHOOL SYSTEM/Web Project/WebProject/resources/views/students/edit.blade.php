@extends('layouts.admin')
@section('admin-content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <li>Students</li>
                <li>Update</li>
            </ul>
        </div>
    </section>
    <div class="card-content bg-white">
        <div class="overflow-x-auto pt-2 ">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid md:grid-cols-4 md:gap-6">

                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="text" name="student_name" id="student_name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('student_name', $student->name) }}" placeholder=" " />
                        <label for="student_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Student
                            Name
                        </label>
                        @error('student_name')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="number" name="student_age" id="student_age"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('student_age', $student->age) }}" placeholder=" " />
                        <label for="student_age"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age
                        </label>
                        @error('student_age')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5 text-center">
                        <label class="block text-sm font-medium text-gray-500 dark:text-black">Gender</label>
                        <div class="grid grid-cols-2 md:gap-6 mt-2">
                            <div class="flex items-center ml-4">
                                <input type="radio" id="male" name="gender" value="male" class="mr-2"
                                    @if (old('gender', $student->gender) === 'male') checked @endif>
                                <label for="male" class="text-sm text-gray-700 dark:text-black">Male</label>
                            </div>

                            <div class="flex items-center ml-11">
                                <input type="radio" id="female" name="gender" value="female" class="mr-2"
                                    @if (old('gender', $student->gender) === 'female') checked @endif>
                                <label for="female" class="text-sm text-gray-700 dark:text-black">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="student_location" id="student_location"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('student_location', $student->location) }}" placeholder=" " />
                        <label for="student_location"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Location
                        </label>
                        @error('student_location')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- pattern="[0-9]{4}[0-9]{3}[0-9]{4}" --}}
                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="tel" name="student_fatherPhoneNumber" id="student_fatherPhoneNumber"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('student_fatherPhoneNumber', $student->father_mobile_number) }}" placeholder="" />
                        <label for="student_fatherPhoneNumber"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Father
                            Phone
                            Number (0700-000-0000)
                        </label>
                        @error('student_fatherPhoneNumber')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- pattern="[0-9]{4}[0-9]{3}[0-9]{4}" --}}
                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="tel" name="student_motherPhoneNumber" id="student_motherPhoneNumber"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('student_motherPhoneNumber', $student->mother_mobile_number) }}" placeholder="" />
                        <label for="student_motherPhoneNumber"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mother
                            Phone
                            Number (0700-000-0000)
                        </label>
                        @error('student_motherPhoneNumber')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="student_fatherWork" id="student_fatherWork"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('student_fatherWork', $student->father_work) }}" placeholder=" " />
                        <label for="student_fatherWork"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Father
                            Work
                        </label>
                        @error('student_fatherWork')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="student_motherWork" id="student_motherWork"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('student_motherWork', $student->mother_work) }}" placeholder=" " />
                        <label for="student_motherWork"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mother
                            Work
                        </label>
                        @error('student_motherWork')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="student_chronicDisease" id="student_chronicDisease"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('student_chronicDisease', $student->chronic_disease) }}" placeholder=" " />
                        <label for="student_chronicDisease"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Chronic
                            Disease
                        </label>
                    </div>


                    <div class="relative z-0 w-auto mb-5 group">
                        <select name="Student_bloodGroup" id="bloodGroup"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-700 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bloodGroup)
                                <option value="{{ $bloodGroup }}" @if (old('Student_bloodGroup', $student->blood_group) == $bloodGroup) selected @endif>
                                    Blood Group {{ $bloodGroup }}
                                </option>
                            @endforeach
                        </select>
                        <label for="bloodGroup"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Blood Group
                        </label>
                        @error('Student_bloodGroup')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="relative z-0 w-auto mb-5 group">
                        <select name="student_levelOfEducationStudent" id="student_levelOfEducationStudent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            @foreach($levelOfEducations as $levelOfEducation)
                                <option value="{{ $levelOfEducation->id }}" {{ $levelOfEducation->id == $student->level_of_education_id ? 'selected' : '' }}>
                                    {{ $levelOfEducation->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="student_levelOfEducationStudent" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Level of Education Student
                        </label>
                        @error('student_levelOfEducationStudent')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="student_fatherEducation" id="student_fatherEducation"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('student_fatherEducation', $student->father_education_level) }}"
                            placeholder=" " />
                        <label for="student_fatherEducation"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Level of Education for Father
                        </label>
                        @error('student_fatherEducation')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-auto mb-5 group">
                        <select name="student_class" id="class"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-700 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            @foreach (['A', 'B', 'C', 'D', 'E'] as $class)
                                <option value="{{ $class }}" @if (old('student_class', $student->class) === $class) selected @endif>
                                    Class {{ $class }}</option>
                            @endforeach
                        </select>
                        <label for="class"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Class
                        </label>
                        @error('student_class')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="relative z-0 w-auto mb-5 group">
                        <select name="student_Level" id="student_Level"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-700 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            @foreach (['10', '11', '12'] as $level)
                                <option value="{{ $level }}" @if (old('student_Level', $student->student_Level) == $level) selected @endif>
                                    Level
                                    {{ $level }}</option>
                            @endforeach
                        </select>
                        <label for="student_Level"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Student Level
                        </label>
                        @error('student_Level')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="relative z-0 w-auto mb-5 group">
                        <textarea name="note" id="note"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " /></textarea>

                        <label for="note"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Note
                        </label>
                    </div>
                </div>
                <div class="text-right mr-4">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        Update Student
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
