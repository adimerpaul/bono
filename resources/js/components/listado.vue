<template>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>LISTADO DE VERIFICADOS / HABILITADOS</h3>
                <br>
                TIPO DE LISTA
                <select name="lista" id="lista" @change="listar" v-model="tipo">
                    <option value="verificado" selected>VERIFICADOS</option>
                    <option value="habilitado">HABILITADO</option>
                </select>
<br>
                Fecha
                <input type="date" name="fecha" id="fecha" >

                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>ci</th>
                            <th>Nombre</th>
                            <th>Fecha Nac</th>
                            <th>Corte</th>
                            <th>AFP Fut</th>
                            <th>AFP Prev</th>
                            <th>Sereci</th>
                            <th>FECHA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(i,index) in datos" :key="index">
                            <td>{{i.id}}</td>
                            <td>{{i.ci}}</td>
                            <td>{{i.nombres}} {{i.paterno}} {{i.materno}} {{i.conyugue}}</td>
                            <td>{{i.fechanac}}</td>
                            <td>{{i.voto}}</td>
                            <td>{{i.apfuturo}}</td>
                            <td>{{i.aprevision}}</td>
                            <td>{{i.mama}}</td>
                            <td>{{i.updated_at}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import moment from 'moment';
export default {
            data:function(){
            
          return {
              datos:{},
              tipo:'verificado',
              //fec:'',

          }
        },
        mounted(){
            this.fec=moment();
            //this.cargarverif();
        },
        methods:{
            cargarverif(){
                this.datos=[];
                axios.get('/verificado').then(res=>{this.datos=res.data;});
            },
            cargarhabilitado(){
                this.datos=[];
                axios.get('/habilitado').then(res=>{this.datos=res.data;});
            },
            listar(){
                if(this.tipo=='verificado')
                    this.cargarverif();
                else
                    this.cargarhabilitado();    
            }

        } 
}
</script>