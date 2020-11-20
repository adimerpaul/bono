<template>
    <div class="row ">
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
                            <tr v-for="(i,index) in dato.hijos" :key="index">
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
   

 
                </div>




</template>

<script>
    import VueHtml2pdf from 'vue-html2pdf'
    import axios from 'axios';

    export default {
        components: {
            VueHtml2pdf
        },
        data:function(){
            
          return {
              dato:{hijos:[{nombres:'',apellidos:''}]},
              param:null,

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
                   //this.dato.hijos=data[0].hijo;
                  }
              });  
            },
        },
        computed:{

        }
    }
</script>
