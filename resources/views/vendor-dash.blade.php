<x-vendor-layout vendor="{{ auth()->user()->business }}'s">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/vendor-dash.css') }}">
    @endpush
    <div>
        @if (session()->has('success'))
            <div class="container container--narrow">
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            </div>
        @elseif(session()->has('error'))
            <div class="container container--narrow">
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <div>
            <div class="text-end"> <a href="/logout" class="button">Logout</a></div>
            <h1 class="text-center mb-5">{{ auth()->user()->business }}'s Dashboard</h1>
        </div>
        <div class="vendor-nav-container">
            <ul class="nav nav-tabs" id="vendorTabs">
                <li class="nav-item">
                    <a class="nav-link {{ $page == 'products' ? 'active' : '' }}" aria-current="page"
                        href="/vendor/dashboard/products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $page == 'sales' ? 'active' : '' }}" href="/vendor/dashboard/sales">Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $page == 'reports' ? 'active' : '' }}"
                        href="/vendor/dashboard/reports">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $page == 'add_products' ? 'active' : '' }}"
                        href="/vendor/dashboard/add_products">Add
                        products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $page == 'settings' ? 'active' : '' }}" href="/vendor/dashboard/settings">My
                        Settings</a>
                </li>
            </ul>
        </div>

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
                                type: 'bar',
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
</x-vendor-layout>
