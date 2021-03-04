@extends('layouts/admin-template')

@section('content')
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="col-sm-3">
            <ul class="sidebar-nav ">
                <li class="sidebar-brand">
                    @if (isset(Auth::user()->avatar))
                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                            style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: auto; float: left; margin-right: 7px;">
                    @endif
                    <a href="/settings/profile">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a href="/admin/plantreference/">Manage References</a>
                </li>
                <li>
                    <a href="/admin/account-management">Manage Accountss</a>
                </li>
                <li>
                    <a href="/admin/categories">Manage Categories</a>
                </li>
                <li>
                    <a href="/admin/keyword">Manage Keywords</a>
                </li>
                <li>
                    <a href="/admin/customer_application/">Manage Applications</a>
                </li>
                <li>
                    <a href="/articles">Manage Articles</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Sales', 'Expenses'],
                        ['2004', 1000, 400],
                        ['2005', 1170, 460],
                        ['2006', 660, 1120],
                        ['2007', 1030, 540]
                    ]);

                    var options = {
                        title: 'Company Performance',
                        curveType: 'function',
                        legend: {
                            position: 'bottom'
                        }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                    chart.draw(data, options);
                }

            </script>
        </head>

        <body>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <a href="#menu-toggle" class="float-left" id="menu-toggle"> <i class="fas fa-bars"></i></a>
                </div>
                <div class="container">

                    <h1 class="title">Dashboard</h1>
                    <div class=" mt-5">
                        <div class="col-lg-12 float-left" id="curve_chart" style="width: 900px; height: 500px"></div>
                    </div>



                </div>
            </div>

        </body>


    </div>
    <!-- /#page-content-wrapper -->

    </div>

@endsection
