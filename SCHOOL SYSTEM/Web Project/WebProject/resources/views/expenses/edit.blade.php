@extends('layouts.admin')

@section('admin-content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <li>Expenses</li>
                <li>Update</li>
            </ul>
        </div>
    </section>

    <div class="card-content bg-white">
        <div class="overflow-x-auto pt-2">
            <form action="{{ route('expenses.update', $expenses->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-4 md:gap-6">

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="expenses_name" id="expenses_name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('expenses_name', $expenses->name) }}" placeholder=" " />
                        <label for="expenses_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Expenses
                            Name
                        </label>
                        @error('expenses_name')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Similar input fields for other columns -->
                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="expenses_type" id="expenses_type"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('expenses_type', $expenses->type) }}" placeholder=" " />
                        <label for="expenses_type"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Expenses
                            Type
                        </label>
                        @error('expenses_type')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="date" name="expenses_date" id="expenses_date"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer datepicker"
                            value="{{ old('expenses_date', $expenses->date) }}" placeholder="Select Date" />

                        <label for="expenses_date"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Expenses Date
                            Date (MM/DD/YYYY)
                        </label>

                        @error('expenses_date')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="expenses_for_who" id="expenses_for_who"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('expenses_for_who', $expenses->for_who) }}" placeholder=" " />
                        <label for="expenses_for_who"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">For
                            Who
                        </label>
                        @error('expenses_for_who')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="number" step="0.01" name="expenses_amount" id="expenses_amount"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('expenses_amount', $expenses->amount) }}" placeholder=" " />
                        <label for="expenses_amount"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Amount
                        </label>
                        @error('expenses_amount')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-right mr-4">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                            Update Expenses
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
