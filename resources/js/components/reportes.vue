<template>
<div class="container">
    <div class="row justify-content-center" style="width:500px; height:500px;">
        <canvas  ref="canvas" :width="width" :height="height" ></canvas>
    </div>
</div>
</template>

<script>
import VueCharts from 'vue-chartjs';
import { Bar } from 'vue-chartjs';
import DoughnutChart from 'vue-doughnut-chart';
export default {
  //extends: VueChartJs.Pie,
  mounted () {
    // Overwriting base render method with actual data.
    this.renderChart({
      labels: ['Inhabilitados', 'Habilitados', 'En verificacion'],
      datasets: [
        {
          label: 'Total Registrados',
          backgroundColor: ['red','green','yellow'],
          data: [40, 20, 12]
        }
      ]
    })
  }
}
</script>