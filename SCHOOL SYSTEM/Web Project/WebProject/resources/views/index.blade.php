@extends('layouts.admin')
@section('admin-content')
    <br>
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Dashboard
            </h1>
        </div>
        <br>
        <form action="{{ route('dashboard.report') }}" method="GET">
            <div class="flex items-center justify-between">
                <div class="widget-label text-black">
                    <label for="report_month">Select Month:</label>
                    <input type="month" id="report_month" name="report_month">
                </div>
                <button type="submit"
                    class="text-white bg-gray-600 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                    Generate Report
                </button>
            </div>
        </form>

    </section>
    <br>
    <section class="is-hero-bar flex items-center justify-center">
        <h1>Report for the {{ $month }}</h1>
    </section>

    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Income
                            </h3>
                            <h1>
                                {{ $income }}$
                            </h1>
                        </div>
                        <div class="pr-7">
                            <img src="{{ asset('icons/profits.png') }}" alt="Expenses" class="w-16 h-16">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Expenses
                            </h3>
                            <h1>
                                {{ $expenses }}$
                            </h1>
                        </div>
                        <div class="pr-7">
                            <img src="{{ asset('icons/expense.png') }}" alt="Expenses" class="w-20 h-20">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            @if ($profit > 0)
                                <h3>
                                    Profit
                                </h3>
                                <h1>
                                    {{ $profit }}$
                                </h1>
                        </div>
                        <span class="icon widget-icon text-green-500"><i class="mdi mdi-finance mdi-48px"></i></span>
                    @elseif($profit == 0)
                        <h3>
                            Profit
                        </h3>
                        <h1>
                            {{ $profit }}$
                        </h1>
                    </div>
                    <span class="icon widget-icon text-gray-600"><i class="mdi mdi-finance mdi-48px"></i></span>
                @else
                    <h3>
                        Loss
                    </h3>
                    <h1>
                        {{ $profit }}$
                    </h1>
                </div>
                <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
                @endif

            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            Best Teacher
                        </h3>
                        <br>
                        <div class="">
                            <h2 class="text-uppercase capitalize">
                                @if ($bestTeacher)
                                    <p> {{ $bestTeacher->TeacherName }}<br>
                                        Activities:{{ $bestTeacher->TeacherActivity }}</p>
                                @else
                                    <p>No data available for the best teacher in this month.</p>
                                @endif
                            </h2>
                        </div>
                    </div>
                    <div class="pr-2">
                        <img src="{{ asset('icons/teacher.png') }}" alt="Expenses" class="w-20 h-20">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            Best Student
                        </h3>
                        <br>
                        <div class="">
                            <h2 class="text-uppercase capitalize">
                                @if ($bestStudent)
                                    <p>{{ $bestStudent->studentName }}<br>
                                        Average Score : {{ $bestStudent->averageScore }}</p>
                                @else
                                    <p>No data available for the best student in this year.</p>
                                @endif
                            </h2>
                        </div>
                    </div>
                    <div class="pr-2">
                        <img src="{{ asset('icons/student.png') }}" class="w-20 h-20">
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-finance"></i></span>
                    Performance
                </p>
                <a href="#" class="card-header-icon">
                    <span class="icon"><i class="mdi mdi-reload"></i></span>
                </a>
            </header>
            <div class="card-content">
                <div class="chart-area">
                    <canvas id="financeChart" class="chartjs-render-monitor" style="height: 400px;"></canvas>
                </div>
            </div>
        </div>


        {{-- <div class="card mb-6">
            <header class="card-header">
              <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-finance"></i></span>
                Performance
              </p>
              <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
              </a>
            </header>
            <div class="card-content">
              <div class="chart-area">
                <div class="h-full">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                      <div></div>
                    </div>
                  </div>
                  <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor block" style="height: 400px; width: 1197px;"></canvas>
                </div>
              </div>
            </div>
          </div> --}}



        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="{{ asset('dist/css/styles.css') }}">
            <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css') }}">
        </head>

        <body>
            <div id="app">
                <div class="card has-table">
                    <header class="card-header">
                        <p class="card-header-title">
                            <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                            Expense Details:
                        </p>
                        <a href="#" class="card-header-icon">
                            <span class="icon"><i class="mdi mdi-reload"></i></span>
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="overflow-x-auto">
                            <div class="text-center">
                                <table id="example" class="table-auto border mx-auto">
                                    <thead class="bg-slate-700 text-gray-200">
                                        <tr class="">
                                            <th>Type</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expenseDetails as $expense)
                                            <tr class="">
                                                <td>{{ $expense->type }}</td>
                                                <td>{{ $expense->totalAmount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

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
        <script>
            document.getElementById('reportForm').addEventListener('submit', function(event) {
                event.preventDefault();

                // Get the selected month from the input
                var selectedMonth = document.getElementById('report_month').value;

                // Send an AJAX request to the controller with the selected month
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '{{ route('dashboard.report') }}?report_month=' + selectedMonth);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.getElementById('reportContainer').innerHTML = xhr.responseText;
                    } else {
                        console.error('Request failed. Status: ' + xhr.status);
                    }
                };
                xhr.send();
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get the initial data from the Blade template or backend
                var income = {{ $income }};
                var expenses = {{ $expenses }};
                var profit = {{ $profit }};

                // Get the chart canvas element
                var ctx = document.getElementById('financeChart').getContext('2d');

                // Define vibrant colors
                var colors = ['#FF6384', '#36A2EB', '#FFCE56'];

                // Initialize the chart with initial data and colors
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Income', 'Expenses', 'Profit'],
                        datasets: [{
                            data: [income, expenses, profit],
                            backgroundColor: colors,
                            hoverOffset: 5
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    fontColor: 'white'
                                }
                            },
                            title: {
                                display: true,
                                text: 'Financial Overview',
                                fontColor: 'black',
                                fontSize: 16
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(context) {
                                        var label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label += '$' + context.parsed;
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });

                // Function to update chart data
                function updateChart(newIncome, newExpenses, newProfit) {
                    // Update the chart's data
                    myChart.data.datasets[0].data = [newIncome, newExpenses, newProfit];
                    // Update the chart
                    myChart.update();
                }

                // Example of how to use the updateChart function:
                // Call this function with new values whenever your data changes
                // updateChart(newIncomeValue, newExpensesValue, newProfitValue);
            });
        </script>
    @endsection
