<template>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5><br>
                                <h6 class="text-right" style="align:right;"><b>USUARIO : <span>{{user}}</span></b></h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form>
                                            <div class=" row">
                                                    <label for="nombre" class=" col-sm-6 col-form-label-sm"><b>IDENTIFICADOR</b> </label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control-plaintext form-control-sm" id="nombre" v-bind:value="dato.id">
                                                </div>
                                            </div>
                                            <div class=" row">
                                                    <label for="nombre" class=" col-sm-6 col-form-label-sm"><b>NOMBRE COMPLETO</b> </label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control-plaintext form-control-sm" id="nombre" v-bind:value="dato.paterno +' '+dato.materno+' '+dato.nombres">
                                                </div>
                                            </div>
                                            <div class=" row">
                                                    <label for="fechanac" class="col-sm-6 col-form-label-sm"><b>FECHA NAC:</b> </label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control-plaintext form-control-sm" id="fechanac" v-bind:value="dato.fechanac">
                                                </div>
                                            </div>
                                            <div class=" row">
                                                    <label for="ci" class="col-sm-6 col-form-label-sm"><b>CI :</b></label>
                                                <div class="col-sm-6">
                                                    <input type="text" readonly class="form-control-plaintext form-control-sm" id="ci" v-bind:value="dato.ci">
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <hr />
                                    <br>
                                    <div class=" col-md-12 ">
                                        <form @submit.prevent="daralta">
                                            <div class="row col-md-12">
                                                <div class="row col-12">
                                                    <label class="col-md-6">Voto municipio Oruro?</label>
<!--                                                    <input type="text" class="form-control" id="estado" placeholder="estado">-->

                                                    <div class="form-check col-md-3">
                                                        <input type="radio" id="voto2" name="voto" value="NO" class="form-check-input" v-model="dato.voto" required @change="detallecontrol">
                                                        <label class="form-control-label" for="voto2">NO</label>
                                                    </div>
                                                    <div class="form-check col-md-3">
                                                        <input required class="form-check-input" type="radio" name="voto" id="voto3" value="SI" v-model="dato.voto" @change="detallecontrol">
                                                        <label class="form-check-label" for="voto3">
                                                            SI
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row  col-md-12">
                                                <div class="row col-12 ">
                                                    <label class="col-md-6">Aportes AFP Prevision?</label>
<!--                                                    <input type="text" class="form-control" id="estado" placeholder="estado">-->
                                                    <div class="form-check col-md-3">
                                                        <input type="radio" id="afprevision2" name="afprevision" value="NO" class="form-check-input" v-model="dato.aprevision" required @change="detallecontrol">
                                                        <label class="form-control-label" for="afprevision2">NO</label>
                                                    </div>
                                                    <div class="form-check col-md-3">
                                                        <input required class="form-check-input" type="radio" name="afprevision" id="afprevision3" value="SI" v-model="dato.aprevision" @change="detallecontrol">
                                                        <label class="form-check-label" for="afprevision3">
                                                            SI
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="row col-md-12">
                                                <div class="row col-12">
                                                    <label class="col-md-6" >Aportes AFP Futuro?</label>
<!--                                                    <input type="text" class="form-control" id="estado" placeholder="estado">-->

                                                    <div class="form-check col-md-3">
                                                        <input type="radio" id="afpfuturo2" name="afpfuturo" value="NO" class="form-check-input" v-model="dato.apfuturo" required @change="detallecontrol">
                                                        <label class="form-control-label" for="afpfuturo2">NO</label>
                                                    </div>
                                                    <div class="form-check col-md-3">
                                                        <input required class="form-check-input" type="radio" name="afpfuturo" id="afpfuturo3" value="SI" v-model="dato.apfuturo" @change="detallecontrol">
                                                        <label class="form-check-label" for="afpfuturo3">
                                                            SI
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="detalle"><b>DETALLE</b></label>
<!--                                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">-->
                                                    <textarea name="" class="form-control" id="detalle" cols="15" rows="10" v-model="dato.detalle"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-trash"></i> Cerrar</button>
                                                <button type="submit"  class="btn btn-success"><i class="fa fa-save" :disabled="activar"></i> Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-dark text-white">Madres registradas por dia</div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="f1">Id Inicio</label>
                                    <input type="text" class="form-control" id="f1" v-model="f1">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="f2">Id Final</label>
                                    <input type="text" class="form-control" id="f2" v-model="f2">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="f1">Actualizar</label>
                                    <button type="button" :disabled="d" @click="actualizar" class="btn btn-success btn-block"><i class="fa fa-cogs"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre Completo</th>
                                    <th scope="col">CI</th>
<!--                                    <th scope="col">Concepto de sueldos y/o salarios?</th>-->
<!--                                    <th scope="col">Es aportante activo de las AFP's?</th>-->
<!--                                    <th scope="col">Es rentista?</th>-->
<!--                                    <th scope="col">Percibe Bono Juana Azurduy?</th>-->
<!--                                    <th scope="col">Percibe Bono de discapacidad?</th>-->
                                    <th scope="col">Estado</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(i,index) in datos " :key="index">
                                    <th scope="row">{{i.id}}</th>
                                    <td>{{i.paterno}} {{i.materno}} {{i.nombres}}</td>
                                    <td>{{i.ci}}</td>
<!--                                    <td>{{i.salario}}</td>-->
<!--                                    <td>{{i.afp}}</td>-->
<!--                                    <td>{{i.rentista}}</td>-->
<!--                                    <td>{{i.juana}}</td>-->
<!--                                    <td>{{i.discapacidad}}</td>-->
                                    <td><div class="badge " :class="i.estado=='SI'||i.estado=='HABILITADO'?'badge-success':i.estado=='NO'||i.estado=='INHABILITADO'?'badge-danger':''">{{i.estado}}</div></td>
                                    <td>
                                        <button @click="ver(i)" class="btn btn-warning btn-sm p-1">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    export default {
        data:function(){
            return {
                datos:[],
                dato:{},
                f1:0,
                f2:0,
                d:false,
                user:'',
                cadena:'',
            }
        },
        mounted() {
            // console.log('Component mounted.')
            this.misdatos();
            axios.get('/madre/info').then(res=>{
                console.log(res.data);
                this.user=res.data;
            });

        },
        methods:{
            hola(){
              console.log('a');
            },
            detallecontrol(){
                this.cadena='';
                if(this.dato.voto=='NO')
                    this.cadena+='NO ESTA REGISTRADA EN EL MUNICIPIO DE ORURO; ';
                if(this.dato.apfuturo=='SI')
                    this.cadena+='REALIZA APORTES A LA AFP FUTURO ; ';
                if(this.dato.aprevision=='SI')
                    this.cadena+='REALIZA APORTES A LA AFP PREVISION; ';
                this.dato.detalle=this.cadena; 
                if(this.dato.voto=='SI' && this.dato.apfuturo=='NO' && this.dato.aprevision=='NO')
                    {this.dato.estado='HABILITADO';
                    this.dato.detalle='HABILITADO PARA REALIZAR EL COBRO DEL BONO MUJER';}
                else               
                    this.dato.estado='INHABILITADO';
            },

            daralta(){
                // console.log('aaa');
                this.$fire({
                    // title: 'Seguro ?',
                    text: "Seguro de Actualizar?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'SI'
                }).then((result) => {
                    if (result.value) {
                        axios.put('/confirmar/'+this.dato.id,this.dato).then(res=>{
                            $('#exampleModal').modal('hide');
                            this.$fire({
                                title: "Actualizado",
                                text: "Correctamente",
                                type: "success",
                                timer: 3000
                            })
                            this.misdatos();
                        })
                    }
                })

            },
            ver(i){
                this.dato=i;
                $('#exampleModal').modal('show');
                // this.misdatos();
            },
            actualizar(){
                this.misdatos();
            },
            crear(){
                this.dato={};
            },
            modificar(i){
                $('#update').modal('show');
                this.dato=i;
            },
            pass(i){
                $('#pass').modal('show');
                this.dato=i;
            },
            misdatos(){
                this.d=true;
                axios.get('/madreregister/'+this.f1+'/'+this.f2).then(res=>{
                    console.log(res);
                    this.datos=res.data;
                    this.d=false;
                    this.$toast.open({
                        message: "Actualizado Correctamente",
                        type: "success",
                        duration: 2000,
                        dismissible: true
                    })
                })
            },

        },
        computed:{
            activar:function(){
                if(this.dato.voto!='' && this.dato.apfuturo!='' && this.dato.aprevision!='')
                { return false;
                }else{
                    return true;
                }
            }
        }
    }
</script>
