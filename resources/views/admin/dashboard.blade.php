

<x-layouts.admin-layout>
    <div class="dashboard-content">
        <h2 class="balance flex my-4 text-gray-800 flex-row text-center items-center gap-3 justify-center font-bold text-2xl tracking-widest">
            Balance
            {{-- <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M320-414v-306h120v306l-60-56-60 56Zm200 60v-526h120v406L520-354ZM120-216v-344h120v224L120-216Zm0 98 258-258 142 122 224-224h-64v-80h200v200h-80v-64L524-146 382-268 232-118H120Z"/></svg> --}}
        </h2>

        <hr>

        <section class="charts">
            <div>
                <canvas id="doughnut"></canvas>
            </div>
            {{-- <div>
                <canvas id="polarArea"></canvas>
            </div> --}}
            <div>
                <canvas id="line"></canvas>
            </div>
            {{-- <div>
                <canvas id="barChart"></canvas>
            </div> --}}
        </section>

        @push('js')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const doughnut = document.getElementById('doughnut');
                // const polarArea = document.getElementById('polarArea');
                // const barChart = document.getElementById('barChart');
                const line = document.getElementById('line');

                // new Chart(barChart, {
                //     type: 'bar',
                //     data: {
                //     labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                //     datasets: [{
                //         label: '# of Votes',
                //         data: [12, 19, 3, 5, 2, 3],
                //         borderWidth: 1
                //     }]
                //     },
                //     options: {
                //     scales: {
                //         y: {
                //         beginAtZero: true
                //         }
                //     }
                //     }
                // });

                new Chart(doughnut, {
                    type: 'line',
                    data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3].reverse(),
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

                new Chart(line, {
                    type: 'doughnut',
                    data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
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

                // new Chart(polarArea, {
                //     type: 'polarArea',
                //     data: {
                //     labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                //     datasets: [{
                //         label: '# of Votes',
                //         data: [12, 19, 3, 5, 2, 3],
                //         borderWidth: 1
                //     }]
                //     },
                //     options: {
                //     scales: {
                //         y: {
                //         beginAtZero: true
                //         }
                //     }
                //     }
                // });

            </script>
        @endpush
    </div>
</x-layouts.admin-layout>
