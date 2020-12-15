<template>
<div class="container">
    <div class="row justify-content-center" >
      <div class="col-md-6" style="width:500px; height:500px;">
        <canvas  id='imagen1' ref="canvas" :width="width" :height="height" ></canvas>
        
      </div>
      <div class="col-md-6" style="width:500px; height:500px;">
        <canvas id='imagen2'  ref="imagen2" :width="width" :height="height" ></canvas>
        
      </div>
      <div class="col-md-6" style="width:500px; height:500px;">
        <canvas id='imagen3'  ref="imagen3" :width="width" :height="height" ></canvas>
        
      </div>
    </div>




</div>
</template>
<script>
import VueCharts from 'vue-chartjs';
import {Pie } from 'vue-chartjs';
import Chart from 'chart.js';
import VueHtml2pdf from 'vue-html2pdf';
    import axios from 'axios';
export default {
          components: {
            VueHtml2pdf
        },
  extends: Pie,
          data:function(){
          return {
            datos:[],
            labels2:[],
            labels3:[],
            dinfo:[],
            dinfo3:[],
            verif:0,
            habi:0,
            inhab:0,
            datos2:[],
          }
          },

  mounted () {
    // Overwriting base render method with actual data.
    this.imagen1();

    this.imagen2();
    this.imagen3();
     axios.get('/reporte4/').then(res=>{
                   this.datos2=res.data;
                });
  },

  methods:{
  imagen1(){
        axios.get('/reporte').then(res=>{
              console.log(res.data);
              this.verif=res.data.no;
              this.habi=res.data.habi;
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
  },
  imagen3(){
        axios.get('/reporte3').then(res=>{
          console.log(res.data);
          this.labels3=[];
          this.dinfo3=[];
          res.data.forEach(dd => {
            this.labels3.push(dd.nombre);
            this.dinfo3.push(dd.total);
          });
            console.log(this.dinfo);
            new Chart(this.$refs.imagen3, {
              type: 'bar',
              data: {
              labels: this.labels3,
              datasets: [{label:'Total Revisados',data: this.dinfo3}]
                }
            });


        })
  },
              imprimir(){
               
                this.$refs.html2Pdf.generatePdf()
            },
  }
  
}
</script>