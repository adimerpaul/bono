<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <pre>{{dato}}</pre>
                                    </div>
                                    <div class="col-md-6">
                                        <form @submit.prevent="daralta">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label >Permir bono?</label>
<!--                                                    <input type="text" class="form-control" id="estado" placeholder="estado">-->
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="estado1" name="estado" value="SI" class="custom-control-input" v-model="dato.estado" required>
                                                        <label class="custom-control-label" for="estado1">SI</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="estado2" name="estado" value="NO" class="custom-control-input" v-model="dato.estado" required>
                                                        <label class="custom-control-label" for="estado2">NO</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="detalle">Detalle</label>
<!--                                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">-->
                                                    <textarea name="" class="form-control" id="detalle" cols="15" rows="10" v-model="dato.detalle"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-trash"></i> Cerrar</button>
                                                <button type="submit"  class="btn btn-success"><i class="fa fa-save"></i> Actualizar</button>
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
                                    <label for="f1">Fecha inicio</label>
                                    <input type="date" class="form-control" id="f1" v-model="f1">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="f1">Fecha final</label>
                                    <input type="date" class="form-control" id="f2" v-model="f2">
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
                                    <th scope="col">#</th>
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
                                    <th scope="row">{{index+1}}</th>
                                    <td>{{i.paterno}} {{i.materno}} {{i.nombres}}</td>
                                    <td>{{i.ci}}</td>
<!--                                    <td>{{i.salario}}</td>-->
<!--                                    <td>{{i.afp}}</td>-->
<!--                                    <td>{{i.rentista}}</td>-->
<!--                                    <td>{{i.juana}}</td>-->
<!--                                    <td>{{i.discapacidad}}</td>-->
                                    <td><div class="badge badge-danger">{{i.estado}}</div></td>
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
                f1:moment().format('YYYY-MM-DD'),
                f2:moment().format('YYYY-MM-DD'),
                d:false,
            }
        },
        mounted() {
            // console.log('Component mounted.')
            this.misdatos();
        },
        methods:{
            hola(){
              console.log('a');
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
                    // console.log(res);
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
            guardar(){
                axios.post('/user',this.dato).then(res=>{
                    this.misdatos();
                    $('#exampleModal').modal('hide');
                })
            },update(){
                axios.put('/user/'+this.dato.id,this.dato).then(res=>{
                    this.misdatos();
                    $('#update').modal('hide');
                })
            },
            passact(){
                axios.post('/pass/'+this.dato.id,this.dato).then(res=>{
                    // this.misdatos();
                    $('#pass').modal('hide');
                })
            },
            eliminar(i){
                this.$fire({
                    // title: 'Seguro ?',
                    text: "Seguro de eliminar?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'SI'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/user/'+i.id).then(res=>{
                            this.$fire({
                                title: "Eliminado",
                                text: "Correcto",
                                type: "success",
                                timer: 3000
                            })
                            this.misdatos();
                            this.dato={};
                        })
                    }
                })
            }
        },
        computed:{
            activado:function(){
                if(this.dato.password==this.dato.password2){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }
</script>
