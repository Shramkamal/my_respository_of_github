@extends('layouts.admin')
@section('admin-content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <li>Student Payment</li>
                <li>Update</li>
            </ul>
        </div>
    </section>
    <div class="card-content bg-white">
        <div class="overflow-x-auto pt-2">
            <form action="{{ route('studentPayment.update', $studentPayments->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-4 md:gap-6">
                    <div class="relative z-0 w-auto mb-5 group">
                        <select name="student_id" id="student_id"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-700 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}"
                                        {{ old('student_id', $studentPayments->student_id) == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="student_id"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Student Name
                        </label>
                        @error('student_id')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group ">
                        <input type="number" step="0.01" name="studentPayment_amount" id="studentPayment_amount"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               value="{{ old('studentPayment_amount', $studentPayments->amount) }}" placeholder=" " />
                        <label for="studentPayment_amount"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Payment Amount
                        </label>
                        @error('studentPayment_amount')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="date" name="student_date_of_payment" id="student_date_of_payment"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer datepicker"
                               value="{{ old('student_date_of_payment', $studentPayments->date_of_payment) }}" placeholder="Select Date" />

                        <label for="student_date_of_payment"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date Of Payment
                            Date (MM/DD/YYYY)
                        </label>

                        @error('student_date_of_payment')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-auto mb-5 group">
                        <textarea name="studentPayment_note" id="studentPayment_note"
                                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                  placeholder=" ">{{ old('studentPayment_note', $studentPayments->note) }}</textarea>
                        <label for="studentPayment_note"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Note
                        </label>
                    </div>
                    <div class="text-right mr-4">
                        <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                            Update Student Payment
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
