<x-app-layout>
    @extends('pages.candidat.navigation')
    @section('content')
        <div class="w-full p-5">
            <!-- Monthly Applications Chart -->
            <div class="w-full">
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <script>
            fetch('/candidat/statistiques')
                .then(response => response.json())
                .then(data => {
                    const months = data.labels;
                    const counts = data.data;

                    const ctx = document.getElementById('monthlyChart').getContext('2d');
                    const monthlyChart = new Chart(ctx, {
                        type: 'bar', // Line chart
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'Job Applications per Month',
                                data: counts,
                                borderColor: 'rgb(75, 192, 192)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                fill: true,
                                tension: 0.1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: false,
                                    min: 1,
                                    ticks: {
                                        stepSize: 1, // Increment by 1
                                        // callback: function(value) {
                                        //     return Number.isInteger(value) ? value :
                                        //     null; // Ensure only integers are displayed
                                        // }
                                    },
                                    title: {
                                        display: true,
                                        text: 'Number of Applications'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Month'
                                    }
                                }
                            }
                        }
                    });

                })
                .catch(error => console.error('Error fetching employees:', error));
        </script>

        {{-- <script>
            // Data for chart
            const labels = @json($labels);
            const data = @json($data);

            const ctx = document.getElementById('monthlyChart').getContext('2d');
            const monthlyChart = new Chart(ctx, {
                type: 'line', // Line chart
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Job Applications per Month',
                        data: data,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Applications'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        }
                    }
                }
            });
        </script> --}}
    @endsection



</x-app-layout>
