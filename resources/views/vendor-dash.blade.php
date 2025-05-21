<x-vendor-layout vendor="{{ auth()->user()->business }}'s">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/vendor-dash.css') }}">
    @endpush
    <div>
        <h1 class="text-center mb-5">{{ auth()->user()->business }}'s Dashboard</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item dash-tab">
                <a class="nav-link {{ Request::segment(3) == 'products' ? 'active' : '' }}" aria-current="page"
                    href="products">Products</a>
            </li>
            <li class="nav-item dash-tab">
                <a class="nav-link {{ Request::segment(3) == 'sales' ? 'active' : '' }}" href="sales">Sales</a>
            </li>
            <li class="nav-item dash-tab">
                <a class="nav-link {{ Request::segment(3) == 'reports' ? 'active' : '' }}" href="reports">Reports</a>
            </li>
            <li class="nav-item dash-tab">
                <a class="nav-link {{ Request::segment(3) == 'add' ? 'active' : '' }}" href="add_products">Add
                    products</a>
            </li>
            <li class="nav-item dash-tab">
                <a class="nav-link {{ Request::segment(3) == 'settings' ? 'active' : '' }}" href="settings">My
                    Settings</a>
            </li>
        </ul>
        <div class="dash-content-div">
            @if ($page != '')
                @switch($page)
                    @case('products')
                        @include('show-products')
                    @break

                    @case('sales')
                        <div class='sales-chart-div container'>
                            <canvas id="salesChart" width="400" height="200"></canvas>
                            <script>
                                const ctx = document.getElementById('salesChart').getContext('2d');
                                const salesChart = new Chart(ctx, {
                                    type: 'bar', // or 'line', 'pie'
                                    data: {
                                        labels: @json($labels),
                                        datasets: [{
                                            label: 'Sales in $',
                                            data: @json($data),
                                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    @break

                    @case('reports')
                        @include('reports')
                    @break

                    @case('add_products')
                        @include('add-products')
                    @break

                    @default
                @endswitch
            @endif

        </div>
    </div>


</x-vendor-layout>
