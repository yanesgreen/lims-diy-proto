<template>
    <div class="chart-pie">
        <canvas ref="graph" id="graph" :height="height"></canvas>
    </div>
</template>

<script>
    export default {
        name: "Graph",
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
                        labels: this.labels,
                        datasets: [
                            {
                                pointBackgroundColor: 'limegreen',
                                pointBorderColor: 'limegreen',
                                backgroundColor: this.bgcolors,
                                borderColor: this.stroke,
                                label: this.judul,
                                data: this.graphData
                            },
                        ],
                    },
                    options:{
                        responsive: true,
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                boxWidth: 12,
                                padding: 20
                            },
                            title: {
                                display: false,
                            }
                        }
                    }
                });
        }
    }
</script>

<style scoped></style>
