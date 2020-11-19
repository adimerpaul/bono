<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">Panel de usuarios</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" @click="crear" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-user"></i> Crear Usuario
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="guardar">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" v-model="dato.name" class="form-control" id="name" placeholder="Nombre" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">Correo</label>
                                                <div class="col-sm-9">
                                                    <input type="text" v-model="dato.email" class="form-control" id="email" placeholder="Nombre" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" v-model="dato.password" class="form-control" id="password" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password2" class="col-sm-3 col-form-label">Repetir password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" v-model="dato.password2" class="form-control" id="password2" placeholder="Repetir password" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tipo" class="col-sm-3 col-form-label">Tipo User</label>
                                                <div class="col-sm-9">
<!--                                                    <input type="text" v-model="dato.password2" class="form-control" id="password2" placeholder="Repetir password">-->
                                                    <select name="tipo" v-model="dato.tipo" id="tipo" class="form-control" required>
                                                        <option value="SECRETARIA">SECRETARIA</option>
                                                        <option value="ADMIN">ADMIN</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Cancelar</button>
                                                <button type="submit" :disabled="activado" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" >Modificar usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="update">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" v-model="dato.name" class="form-control" id="name" placeholder="Nombre" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">Correo</label>
                                                <div class="col-sm-9">
                                                    <input type="text" v-model="dato.email" class="form-control" id="email" placeholder="Nombre" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="tipo" class="col-sm-3 col-form-label">Tipo User</label>
                                                <div class="col-sm-9">
                                                    <!--                                                    <input type="text" v-model="dato.password2" class="form-control" id="password2" placeholder="Repetir password">-->
                                                    <select name="tipo" v-model="dato.tipo" id="tipo" class="form-control" required>
                                                        <option value="SECRETARIA">SECRETARIA</option>
                                                        <option value="ADMIN">ADMIN</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Cancelar</button>
                                                <button type="submit"  class="btn btn-warning"><i class="fa fa-save"></i> Modificar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" >Modificar password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="passact">
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" v-model="dato.password" class="form-control" id="password" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password2" class="col-sm-3 col-form-label">Repetir password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" v-model="dato.password2" class="form-control" id="password2" placeholder="Repetir password" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Cancelar</button>
                                                <button type="submit" :disabled="activado" class="btn btn-warning"><i class="fa fa-save"></i> Modificar password</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(i,index) in datos " :key="index">
                                <th scope="row">{{index+1}}</th>
                                <td>{{i.name}}</td>
                                <td>{{i.tipo}}</td>
                                <td>
                                    <button @click="modificar(i)" class="btn btn-warning btn-sm p-1"><i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <button @click="pass(i)" class="btn btn-dark btn-sm p-1"><i class="fa fa-key"></i></button>
                                    <button @click="eliminar(i)" class="btn btn-danger btn-sm p-1"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
          return {
              datos:[],
              dato:{}
          }
        },
        mounted() {
            // console.log('Component mounted.')
            this.misdatos();
        },
        methods:{
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
                axios.get('/user').then(res=>{
                    // console.log(res);
                    this.datos=res.data;
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
