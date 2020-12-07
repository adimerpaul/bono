<template>
<div class="container">
    <div class="row justify-content-center" >
      <div class="col-md-6" style="width:500px; height:500px;">
        <canvas  id='imagen1' ref="canvas" :width="width" :height="height" ></canvas>
        
      </div>
      <div class="col-md-6" style="width:500px; height:500px;">
        <canvas id='imagen2'  ref="imagen2" :width="width" :height="height" ></canvas>
        
      </div>
    </div>
</div>
</template>

<script>
import VueCharts from 'vue-chartjs';
import {Pie } from 'vue-chartjs';
import Chart from 'chart.js';
export default {
  extends: Pie,
          data:function(){
          return {
            datos:[],
            labels2:[],
            dinfo:[],
            verif:0,
            habi:0,
            inhab:0,
          }
          },

  mounted () {
    // Overwriting base render method with actual data.
    this.imagen1();

    this.imagen2();
  },

  methods:{
  imagen1(){
        axios.get('/reporte').then(res=>{
              console.log(res.data);
              this.verif=res.data.no;
              this.habi=res.data.hab;
              this.inhab=res.data.inhab;

    this.renderChart({
      labels: ['Inhabilitados', 'Habilitados', 'En verificacion'],
      datasets: [
        {
          label: 'Estado de los Registrados',
          backgroundColor: ['red','green','yellow'],
          data: [parseInt( this.inhab), parseInt(this.habi), parseInt(this.verif)],
          
        }
      ]
    })
    })
  },
  imagen2(){

        axios.get('/reporte2').then(res=>{
          console.log(res.data);
          this.labels2=[];
          this.dinfo=[];
          res.data.forEach(dd => {
            this.labels2.push(dd.fecha);
            this.dinfo.push(dd.numero);
          });
            console.log(this.dinfo);
            new Chart(this.$refs.imagen2, {
              type: 'line',
              data: {
              labels: this.labels2,
              datasets: [{label:'Registros por DIA',data: this.dinfo}]
                }
            });


        })
  }
  }
  
}
</script>