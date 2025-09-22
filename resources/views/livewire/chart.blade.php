<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Jobs per Status -->
        <div class="bg-white dark:bg-zinc-900 rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Jobs per Status</h2>
            <canvas id="jobsStatusChart"></canvas>
        </div>
        <!-- Interviews per Status -->
        <div class="bg-white dark:bg-zinc-900 rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Interviews per Status</h2>
            <canvas id="interviewsStatusChart"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('jobsStatusChart').getContext('2d');
        const ctx2 = document.getElementById('interviewsStatusChart').getContext('2d');

        const jobData = @json($jobStatuses);
        const interviewData = @json($interviewStatuses);

        new Chart(ctx, {
            type: 'bar', // You can change this to 'pie', 'doughnut', etc.
            data: {
                labels: Object.keys(jobData),
                datasets: [{
                    label: 'Jobs',
                    data: Object.values(jobData),
                    backgroundColor: [
                        '#4ade80', // green
                        '#60a5fa', // blue
                        '#fbbf24', // yellow
                        '#f87171', // red
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
        new Chart(ctx2, {
            type: 'bar', // You can change this to 'pie', 'doughnut', etc.
            data: {
                labels: Object.keys(interviewData),
                datasets: [{
                    label: 'Interviews',
                    data: Object.values(interviewData),
                    backgroundColor: [
                        '#4ade80', // green
                        '#60a5fa', // blue
                        '#fbbf24', // yellow
                        '#f87171', // red
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
