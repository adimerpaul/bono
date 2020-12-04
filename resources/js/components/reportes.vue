<template>
<div class="container">
    <div class="row justify-content-center" style="width:500px; height:500px;">
        <canvas  ref="canvas" :width="width" :height="height" ></canvas>
    </div>
</div>
</template>

<script>
import VueCharts from 'vue-chartjs';
import {Pie } from 'vue-chartjs';
import DoughnutChart from 'vue-doughnut-chart';
export default {
  extends: Pie,
          data:function(){
          return {
            datos:[],
            verif:0,
            habi:0,
            inhab:0,
          }
          },
  mounted () {
    // Overwriting base render method with actual data.
    axios.get('/reporte').then(res=>{
              console.log(res.data);
              this.verif=res.data.no;
              this.habi=res.data.hab;
              this.inhab=res.data.inhab;

    this.renderChart({
      labels: ['Inhabilitados', 'Habilitados', 'En verificacion'],
      datasets: [
        {
          label: 'Total Registrados',
          backgroundColor: ['red','green','yellow'],
          data: [parseInt( this.inhab), parseInt(this.habi), parseInt(this.verif)],
          
        }
      ]
    })
    })
  }
  
}
</script>