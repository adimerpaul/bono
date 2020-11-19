<template>
    <div class="row">
        <blockquote class="blockquote text-center">
            <p class="mb-0">DECLARACION JURADA</p>
            <footer class="blockquote-footer">
                PARA LA RECEPCION DE RECURSOS DEL APOYO SOLIDARIO EXCEPCIONAL
                A MADRES DE FAMILIA POR LA EMERGENCIA SANITARIA COVID-19
                Ley N° 089/2020
            </footer>
        </blockquote>
        <form @submit.prevent="guardar">
            <p class="blockquote">DATOS BENEFICIARIA</p>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="Apellido Paterno">Apellido Paterno</label>
                    <input type="text" class="form-control" v-bind:class="dato.paterno==null?'':dato.paterno==''?'is-invalid':'is-valid'" v-model="dato.paterno" id="Apellido Paterno" placeholder="Apellido Paterno" required>
                    <div class="valid-feedback">
                        Bien!
                    </div>
                    <div class="invalid-feedback">
                        Dato necesario!
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Apellido Materno">Apellido Materno</label>
                    <input type="text" class="form-control" v-bind:class="dato.materno==null?'':dato.materno==''?'':'is-valid'" v-model="dato.materno" id="Apellido Materno" placeholder="Apellido Materno" >
                    <div class="valid-feedback">
                        Bien!
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Apellido Conyugue">Apellido Conyugue</label>
                    <input type="text" class="form-control" v-bind:class="dato.conyugue==null?'':dato.conyugue==''?'':'is-valid'" v-model="dato.conyugue" id="Apellido Conyugue" placeholder="Apellido Conyugue" >
                    <div class="valid-feedback">
                        Bien!
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Nombres">Nombres</label>
                    <input type="text" class="form-control" v-bind:class="dato.nombres==null?'':dato.nombres==''?'is-invalid':'is-valid'" v-model="dato.nombres" id="Nombres" placeholder="Nombres" required>
                    <div class="valid-feedback">
                        Bien!
                    </div>
                    <div class="invalid-feedback">
                        Dato necesario!
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Fecha Nacimiento">Fecha Nacimiento</label>
                    <input type="date" class="form-control" v-bind:class="dato.fechanac==null?'':dato.fechanac==''?'is-invalid':'is-valid'" v-model="dato.fechanac" id="Fecha Nacimiento" placeholder="Fecha Nacimiento" required>
                    <div class="valid-feedback">
                        Bien!
                    </div>
                    <div class="invalid-feedback">
                        Dato necesario!
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Carnet Identidad">Carnet Identidad</label>
                    <input type="text" class="form-control" v-bind:class="dato.ci==null?'':dato.ci==''?'is-invalid':'is-valid'" v-model="dato.ci" id="Carnet Identidad" placeholder="Carnet Identidad" required>
                    <div class="valid-feedback">
                        Bien!
                    </div>
                    <div class="invalid-feedback">
                        Dato necesario!
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Telefono fijo">Telefono fijo</label>
                    <input type="text" class="form-control" v-bind:class="dato.fijo==null?'':dato.fijo==''?'':'is-valid'" v-model="dato.fijo" id="Telefono fijo" placeholder="Telefono fijo" >
                    <div class="valid-feedback">
                        Bien!
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="Celular">Celular</label>
                    <input type="text" class="form-control" v-bind:class="dato.celular==null?'':dato.celular==''?'is-invalid':'is-valid'" v-model="dato.celular" id="Celular" placeholder="Celular" required>
                    <div class="valid-feedback">
                        Bien!
                    </div>
                    <div class="invalid-feedback">
                        Dato necesario!
                    </div>
                </div>
                <blockquote class="blockquote">
                    <p class="mb-0">INFORMACION FAMILIAR</p>
                    <footer class="blockquote-footer">
                        Información de los hijos
                    </footer>
                </blockquote>
                <p class="blockquote"></p>
                <div class="col-md-12 mb-12">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(i,index) in dato.hijos" :key="index">
                            <th scope="row">{{index+1}}</th>
                            <td><input type="text" class="form-control" v-model="i.nombres"></td>
                            <td><input type="text" class="form-control" v-model="i.apellidos"></td>
                            <td>
                                <div @click="mas"  class="btn btn-success btn-sm"><i class="fa fa-plus"></i></div>
                                <div @click="menos(index)" v-if="index!=0" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <blockquote class="blockquote">
                        <p class="mb-0">PERCEPCION DE INGRESOS</p>
                    </blockquote>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="Celular">Percibe ingresos por concepto de sueldos y/o salarios?</label>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="salario" id="salario1" value="SI" v-model="dato.salario" checked>
                        <label class="form-check-label" for="salario1">
                            SI
                        </label>
                    </div>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="salario" id="salario2" value="NO" v-model="dato.salario">
                        <label class="form-check-label" for="salario2">
                            NO
                        </label>
                    </div>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="Celular">Es aportante activo de las AFP's?</label>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="afp" id="afp1" value="SI" v-model="dato.afp" checked>
                        <label class="form-check-label" for="afp1">
                            SI
                        </label>
                    </div>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="afp" id="afp2" value="NO" v-model="dato.afp">
                        <label class="form-check-label" for="afp2">
                            NO
                        </label>
                    </div>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="Celular">Es rentista?</label>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="rentista" id="rentista1" value="SI" v-model="dato.rentista" checked>
                        <label class="form-check-label" for="rentista1">
                            SI
                        </label>
                    </div>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="rentista" id="rentista2" value="NO" v-model="dato.rentista">
                        <label class="form-check-label" for="rentista2">
                            NO
                        </label>
                    </div>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="Celular">Percibe Bono Juana Azurduy?</label>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="juana" id="juana1" value="SI" v-model="dato.juana" checked>
                        <label class="form-check-label" for="juana1">
                            SI
                        </label>
                    </div>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="juana" id="juana2" value="NO" v-model="dato.juana">
                        <label class="form-check-label" for="juana2">
                            NO
                        </label>
                    </div>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="Celular">Percibe Bono de discapacidad?</label>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="discapacidad" id="discapacidad1" value="SI" v-model="dato.discapacidad" checked>
                        <label class="form-check-label" for="discapacidad1">
                            SI
                        </label>
                    </div>
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="discapacidad" id="discapacidad2" value="NO" v-model="dato.discapacidad">
                        <label class="form-check-label" for="discapacidad2">
                            NO
                        </label>
                    </div>
                </div>
            </div>
            <blockquote class="blockquote">
                <p class="mb-0">DECLARACION JURADA</p>
                <footer class="blockquote-footer">
                    En mi calidad de beneficiaria, de acuerdo al codigo Civil Art. 1322, declaro expresarmente que los datos insertados en el presente formulario son veridicos y los respandlo con documentación, por lo que solicito a la secretaria de Desarrollo Humano procesar mi tramite de conformidad a la ley N° 089/2020 Apoyo Solidario a Madres de Familia por la emergencia sanitaria Covid-19.
                    En caso de advertirse falsedad de la informacion, me hago pasible a las sanciones establecidas en el Art. 198 (Falsedad Material ) y Art. 199 (Falsesas Ideologica) del Código Penal Boliviano.
                </footer>
            </blockquote>
            <button class="btn btn-success btn-block" type="submit" >
                <i class="fa fa-save"></i> Enviar informacion
            </button>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data:function(){
          return {
              dato:{hijos:[{nombres:'',apellidos:''}]},
          }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            mas(){
                this.dato.hijos.push({nombres:'',apellidos:''});
            },
            menos(index){
                this.dato.hijos.splice(index, 1);
            },
            guardar(){
                this.$fire({
                    title: 'Seguro?',
                    text: "De mandar informacion",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    if (result.value) {
                        // console.log('si');
                        // return false;
                        // Swal.fire(
                        //     'Enviado!',
                        //     'Correctamente',
                        //     'success'
                        // );
                        axios.post('/madre',this.dato).then(res=>{
                            console.log(res.data);
                        });
                        this.$toastr.s("Enviado correctamente");
                        this.dato={hijos:[{nombres:'',apellidos:''}]};
                    }
                })


            }

        }
    }
</script>
