<template>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>CI</th>
                            <th>Nombre Completo </th>
                            <th>Sexo</th>
                            <th>Fecha Nac </th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(i,index) in datos" :key="index">
                            <td>{{index+1}}</td>
                            <td>{{i.ci}}</td>
                            <td>{{i.nombres}} {{i.paterno}} {{i.materno}}</td>
                            <td>{{i.sexo}}</td>
                            <td>{{i.fechanac}}</td>
                            <td><button @click="imprimir(i)" class="btn btn-info"><i class="fa fa-print"></i> Imprimir</button></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <template>
   <div >
     <vue-html2pdf
        :show-layout="false"
        :float-layout="true"
        :enable-download="false"
        :preview-modal="true"
        :paginate-elements-by-height="2500"
        filename="hee hee"
        :pdf-quality="2"
        :manual-pagination="true"
        pdf-format="letter"
        pdf-orientation="portrait"
        pdf-content-width="100%"
 
        
        @hasStartedGeneration="hasStartedGeneration()"
        @hasGenerated="hasGenerated($event)"
        ref="html2Pdf"
    >
        <section slot="pdf-content">
            <!-- PDF Content Here -->
            <div style="margin: 50px 50px 50px; 50px;">
            <section class = "pdf-item" > 
            <h6>GOBIERNO AUTONOMO MUNICIPAL DE ORURO</h6>
            <h5 align="center">DECLARACION JURADA</h5>
            <h6 align="center">PARA LA PERCEPCION DE RECURSOS DEL APOYO SOLIDARIO EXCEPCIONAL</h6>
            <h6 align="center">A MADRES DE FAMILIA POR LA EMERGENCIA SANITARIA COVID-19</h6>
            <h5 align="center">Ley No 089/2020</h5>
            <span>DATOS DE LA BENEFICIARIA</span>
            <table style="border: 1px solid black; width:100%;" >
                <tr>
                        <td style="border: 1px solid black; width:25%; " rowspan='2'>BENEFICIARIA</td>
                        <td style="border: 1px solid black;">{{dato.paterno}}</td>
                        <td style="border: 1px solid black;">{{dato.materno}}</td>
                        <td style="border: 1px solid black;">{{dato.conyugue}}</td>
                        <td style="border: 1px solid black;">{{dato.nombres}}</td>
                </tr>                        
                    <tr>
                        <td style="border: 1px solid black;"> <small>Apellido Paterno</small></td> 
                        <td style="border: 1px solid black;"><small>Apellido Materno</small></td>
                        <td style="border: 1px solid black;"><small>Apellido de Casada</small></td>
                        <td style="border: 1px solid black;"><small>Nombres</small></td>
                    </tr>
                    <tr>    
                        <th style="border: 1px solid black;">ESTADO CIVIL</th>
                        <td style="border: 1px solid black;" colspan="2"></td>
                        <th style="border: 1px solid black;">EDAD</th>
                        <td style="border: 1px solid black;">{{dato.fechanac}}</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;" colspan="2">TIPO DE DOCUMENTO DE IDENTIDAD</td>
                        <td style="border: 1px solid black;">No</td>
                        <td style="border: 1px solid black;" colspan="2">{{dato.ci}}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid black;">DIRECCION</th>
                        <td style="border: 1px solid black;" colspan="4">{{dato.direccion}}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid black;">TELEFONO FIJO</th>
                        <td style="border: 1px solid black;">{{dato.fijo}}</td>
                        <th style="border: 1px solid black;">CELULAR</th>
                        <td style="border: 1px solid black;" colspan="2">{{dato.celular}}</td>
                    </tr>
            </table>
            </section>
            <section class = "pdf-item" > 
            <h5><b> INFORMACION FAMILIAR</b></h5>
            <table style="width:100%; ">
                <tr>
                    <td style="border: 1px solid black; width:25%;">NUMERO DE HIJOS</td>
                    <td style="border: 1px solid black;" colspan="4" >{{dato.hijos.length}}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;" rowspan="20">NOMBRES Y APELLIDOS DE LOS HIJOS</td>
                </tr>
                <tr v-for="(i,index) in dato.hijos" :key="index" >
                    <td style="border: 1px solid black;" >{{i.nombres}}&nbsp; {{i.apellidos}}</td>
                </tr>

            </table>
            </section>
    <br>
            <section class = "pdf-item" > 

    <h6>PERCEPCION DE INGRESOS</h6>
    <table style="width:100%;">
        <tr>
            <td style="width:80%;">Percibe ingresos por concepto de sueldos y/o salarios?</td>
            <td></td>
            <td></td>
            <td>{{dato.salario}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Es aportante actvivo a las AFP's</td>
            <td></td>
            <td></td>
            <td>{{dato.afp}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Es rentista?</td>
            <td></td>
            <td></td>
            <td>{{dato.rentista}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Percibe Bono discapacidad?</td>
            <td></td>
            <td></td>
            <td>{{dato.discapacidad}}</td>
            <td></td>
        </tr>

        <tr >
            <td rowspan="2" colspan="3" style="border: 1px solid black;">
                <b>DECLARACION JURADA:</b>
                    En mi calidad de beneficiaria, de acuerdo al codigo Civil Art. 1322, declaro que los datos insertados en el presente formulario son veridicos, por lo que solicito a la Secretaria de Desarrollo Humano procesar mi tramite de conformidad a la Ley Numero 089/2020 Apoyo Solidario a Madres de Familia por la emergencia sanitaria Covid-19.
                    <br>
                  En caso de advertirse falsedad de la informacion, me hago pasible a las sanciones establecidas en el Art. 198 (Falsedad Material ) y Art. 199 (Falsesas Ideologica) del Código Penal Boliviano.
            </td>
            <td style="border: 1px solid black; height:100px; width:100px;" colspan="2"></td>
        </tr>
        <tr>
            
            <td style="border: 1px solid black; " colspan="2"><b>HUELLA DIGITAL</b></td>
        </tr>
    </table>
            </section>
            <section class = "pdf-item" > 

    <table style="width:100%;">
        <tr >
            <td style="border: 1px solid black; width:20%;" ><b>FIRMA DE LA BENEFICIARIA</b></td>
            <td style="border: 1px solid black;" ></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;"><b>SELLO Y FIRMA DEL FUNCIONARIO VERIFICADOR</b></td>
            <td style="border: 1px solid black;" ></td>

        </tr>
        <tr>
            <td style="border: 1px solid black;"><b>OBSERVACIONES</b></td>
            <td style="border: 1px solid black;" ></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;"><b>FECHA</b></td>
            <td style="border: 1px solid black;" ></td>
        </tr>
    </table>
            </section>
    </div>
        </section>
    </vue-html2pdf>
   </div>
</template>
 
    </div> 
    
</template>
<script>
    import VueHtml2pdf from 'vue-html2pdf';
    import axios from 'axios';
export default {
            components: {
            VueHtml2pdf
        },
        data:function(){
            
          return {
              dato:{hijos:[{nombres:'',apellidos:''}]},
              param:null,
              num:0,
              datos:[],

          }
        },
        mounted(){

            axios.get('/education').then(res=>{this.datos=res.data;});
        },
        methods:{
                    actualizar(){
                
              axios.get('/education/'+this.param).then(res=>{
                  if(res.data=='')
                        this.dato={hijos:[{nombres:'',apellidos:''}]};
                  else{
                   this.dato=res.data[0];
                   this.num=this.dato.hijos.length;
                   //this.dato.hijos=data[0].hijo;
                  }
              });  
            },
            imprimir(i){
                this.dato=i;
                this.$refs.html2Pdf.generatePdf()
            },
            contar: function(){
                return this.hijos.length;
            }
        },
        computed:{
            activar(){
                if (this.dato=={hijos:[{nombres:'',apellidos:''}]}){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }

</script>