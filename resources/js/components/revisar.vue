<template>
<div class="container">
        <div class="row justify-content-center">
        <div class="col-12">
            <blockquote class="blockquote text-center">
                <p class="mb-0">
                    REGISTRO UNICO <br>
                    LEY MUNICIPAL N° 089/2020 <br>
                    APOYO SOLIDARIO EXCEPCIONAL  A MADRES DE FAMILIA POR LA EMERGENCIA SANITARIA COVID-19
                </p>
<!--                <footer class="blockquote-footer">-->

<!--                </footer>-->
                <div>
                    <form @submit.prevent="actualizar">
                        <label for="">CI</label>
                        <input type="text" id="buscar" name="buscar" required v-model="param">
                        <button type="submit" class="btn btn-info">Buscar</button>
                        <button type="button" class="btn btn-info" @click="imprimir" ><i class="fa fa-print"></i>Imprirmir</button>
                    </form>
                </div>
            </blockquote>
                <p class="blockquote">DATOS BENEFICIARIA</p>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="Apellido Paterno">Apellido Paterno</label>
                        <br><label><b>{{dato.paterno}}</b></label>
         
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Apellido Materno">Apellido Materno</label>
                        <br><label><b>{{dato.materno}}</b></label>
 
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Apellido Conyugue">Apellido de Casada</label>
                        <br><label><b>{{dato.conyugue}}</b></label>
              
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Nombres">Nombres</label>
                        <br><label><b>{{dato.nombres}}</b></label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Fecha Nacimiento">Fecha Nacimiento</label>
                        <br><label><b>{{dato.fechanac}}</b></label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label >Sexo</label>
<!--                        <input type="date" class="form-control" v-bind:class="dato.sexo==null?'':dato.sexo==''?'is-invalid':'is-valid'" v-model="dato.sexo" id="Sexo" placeholder="Sexo" required>-->
                        <br><label><b>{{dato.sexo}}</b></label>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="Municipio">Municipio donde esta registrada para votar</label>
                        <br><label><b>{{dato.municipio}}</b></label>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="Carnet Identidad">CI o Pasaporte</label>
                        <br><label><b>{{dato.ci}}</b></label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Telefono fijo">Telefono fijo</label>
                        <br><label><b>{{dato.fijo}}</b></label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Celular">Celular</label>
                        <br><label><b>{{dato.celular}}</b></label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Dirección">Dirección Actual</label>
                        <br><label><b>{{dato.direccion}}</b></label>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="Recinto donde esta registrada para votar">Recinto donde realizo su voto</label>
                        <br><label><b>{{dato.recinto}}</b></label>
                    </div>
                    <hr>
                    <div class="col-md-12 mb-12">
                        <blockquote class="blockquote">
                            <p class="mb-0">INFORMACION FAMILIAR</p>
                            <footer class="blockquote-footer">
                                Información de los hijos
                            </footer>
                        </blockquote>
                    </div>
                    <p class="blockquote"></p>
                    <div class="col-md-12 mb-12">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(i,index) in dato.hijos" :key="index" >
                                <th scope="row">{{index+1}}</th>
                                <td><label><b>{{i.nombres}}</b></label></td>
                                <td><label><b>{{i.apellidos}}</b></label></td>
                            </tr>
                            </tbody>
                        </table>
                        <blockquote class="blockquote">
                            <p class="mb-0">ESTADO PARA COBRO</p>
                        </blockquote>

                    </div>
                        <div class="col-md-6 mb-6">
                            <label for="estado">HABILITADO</label>
                        <br><label><b>{{dato.estado}}</b></label>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label for="estado">DETALLE</label>
                        <br><label><b>{{dato.detalle}}</b></label>
                        </div>
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
                    <td style="border: 1px solid black;" colspan="4" >{{num}}</td>
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
            <td>Percibe el Bono Juana Azurduy?</td>
            <td></td>
            <td></td>
            <td>{{dato.juana}}</td>
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

          }
        },
        mounted() {
            console.log('Component mounted.');
            this.dato;
        },
        methods:{

            actualizar(){
                
              axios.get('/madre/'+this.param).then(res=>{
                  if(res.data=='')
                        this.dato={hijos:[{nombres:'',apellidos:''}]};
                  else{
                   this.dato=res.data[0];
                   this.num=this.dato.hijos.length;
                   //this.dato.hijos=data[0].hijo;
                  }
              });  
            },
            imprimir(){
                
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
