<template>
    <div class="chart-bar">
        <canvas ref="graph" id="graph" :height="height"></canvas>
    </div>
</template>

<script>
    export default {
        name: "GraphBar",
        props: ['judul', 'graphData', 'labels', 'type', 'height', 'bgcolors', 'stroke', 'route', 'laporan'],
        mounted() {
            // grafik
            const grafik = this.$refs.graph.getContext('2d');

            // make chart instance
            new Chart(
                grafik,
                {
                    type: this.type,
                    data: {
                        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31],
                        datasets: [
                            {
                                pointBackgroundColor: 'limegreen',
                                pointBorderColor: 'limegreen',
                                backgroundColor: this.bgcolors,
                                borderColor: this.stroke,
                                label: this.judul,
                                data: this.graphData
                            },
                            {
                                pointBackgroundColor: 'limegreen',
                                pointBorderColor: 'limegreen',
                                backgroundColor: 'pink',
                                borderColor: this.stroke,
                                label: this.judul,
                                data: this.graphData
                            },
                        ],
                    },
                    options: {
                        elements: {
                            line: {
                                tension: 0, // disables bezier curves
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
        }
    }
</script>

<style scoped>

</style>
