
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
            </blockquote>
            <form @submit.prevent="guardar">
                <p class="blockquote">DATOS BENEFICIARIA</p>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="Apellido Paterno" >Apellido Paterno</label>
                        <input type="text" class="form-control mayuscula" v-bind:class="dato.paterno==null?'':dato.paterno==''?'is-invalid':'is-valid'" v-model="dato.paterno" id="Apellido Paterno" placeholder="Apellido Paterno" >
                        <div class="valid-feedback">
                            Bien!
                        </div>
                        <div class="invalid-feedback">
                            Dato necesario!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Apellido Materno">Apellido Materno</label>
                        <input type="text" class="form-control mayuscula" v-bind:class="dato.materno==null?'':dato.materno==''?'':'is-valid'" v-model="dato.materno" id="Apellido Materno" placeholder="Apellido Materno" >
                        <div class="valid-feedback">
                            Bien!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Apellido Conyugue">Apellido de Casada</label>
                        <input type="text" class="form-control mayuscula" v-bind:class="dato.conyugue==null?'':dato.conyugue==''?'':'is-valid'" v-model="dato.conyugue" id="Apellido Conyugue" placeholder="Apellido de Casada" >
                        <div class="valid-feedback">
                            Bien!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Nombres">Nombres</label>
                        <input type="text" class="form-control mayuscula" v-bind:class="dato.nombres==null?'':dato.nombres==''?'is-invalid':'is-valid'" v-model="dato.nombres" id="Nombres" placeholder="Nombres" required>
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
                           Debe Registrar la fecha nac
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label >Sexo</label>
                        <!--                        <input type="date" class="form-control" v-bind:class="dato.sexo==null?'':dato.sexo==''?'is-invalid':'is-valid'" v-model="dato.sexo" id="Sexo" placeholder="Sexo" required>-->
                        <div class="form-check">
                            <input v-bind:class="dato.sexo==null?'':dato.sexo==''?'is-invalid':'is-valid'" v-model="dato.sexo" class="form-check-input" type="radio" name="sexo" id="sexo1" value="Femenino" required>
                            <label class="form-check-label" for="sexo1">
                                Femenino
                            </label>
                        </div>
                        <div class="form-check">
                            <input v-bind:class="dato.sexo==null?'':dato.sexo==''?'is-invalid':'is-valid'" v-model="dato.sexo" class="form-check-input" type="radio" name="sexo" id="sexo2" value="Masculino" required>
                            <label class="form-check-label" for="sexo2">
                                Masculino
                            </label>
                            <div class="valid-feedback">
                                Bien!
                            </div>
                            <div class="invalid-feedback">
                                Bono solo habilitado para mujeres!
                            </div>
                        </div>

                    </div>
                    
                    <div class="col-md-6 mb-6">
                        <label for="Municipio">Municipio donde esta registrada para votar</label>
                        <select id="Municipio" class="form-control" v-bind:class="dato.municipio==null?'':dato.municipio!='Oruro'?'is-invalid':'is-valid'" v-model="dato.municipio" required>
                            <option value="Oruro" selected>Oruro</option>
                        </select>
                        <!--                        <input type="text" class="form-control" v-bind:class="dato.recinto==null?'':dato.recinto==''?'is-invalid':'is-valid'" v-model="dato.recinto" id="Recinto de votacion" placeholder="Recinto de votacion" required>-->
                        <div class="valid-feedback">
                            Bien!
                        </div>
                        <div class="invalid-feedback">
                            Bono solo para el Provincia cercado municipio de oruro!
                        </div>
                    </div>

                    <div class="col-md-6 mb-6 form-row" >
                        <label for="Carnet Identidad">CI o Pasaporte Expedido (- Complemento)</label>
                        <div class="col-5">
                            <input type="number" class="form-control" v-bind:class="dato.ci==null?'':dato.ci==''?'is-invalid':'is-valid'" v-model="dato.ci" id="Carnet Identidad" placeholder="Carnet Identidad" required >
                        </div>

                        <div class="col-3">
                            <select name="exp" id="exp" class="form-control">
                                <option value="OR" selected>OR</option>
                                <option value="LP"> LP</option>
                                <option value="PT" >PT</option>
                                <option value="PD" >PD</option>
                                <option value="BN" >BN</option>
                                <option value="CB" >CB</option>
                                <option value="CH" >CH</option>
                                <option value="SC" >SC</option>
                                <option value="TJ" >TJ</option>
                            </select>
                        </div>
                        <b>-</b>

                        <div class="col-3">
                            <input type="text" class="form-control mayuscula" v-model="dato.ext" id="ciext" placeholder="1X" value='' maxlength="2" >
                        </div>
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
                        <input type="text" class="form-control" v-bind:class="dato.celular==null?'':dato.celular==''?'':'is-valid'" v-model="dato.celular" id="Celular" placeholder="Celular" >
                        <div class="valid-feedback">
                            Bien!
                        </div>
                        <div class="invalid-feedback">
                            Dato necesario!
                        </div>
                    </div>
                    <div class="col-md-12 mb-12">
                        <label for="Dirección" >Dirección Actual</label>
                        <input type="text" class="form-control mayuscula" v-bind:class="dato.direccion==null?'':dato.direccion==''?'is-invalid':'is-valid'" v-model="dato.direccion" id="Dirección" placeholder="Dirección" required>
                        <div class="valid-feedback">
                            Bien!
                        </div>
                        <div class="invalid-feedback">
                            Dato necesario!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Recinto donde esta registrada para votar" style="display:flex;justify-content:space-between">
                            <div>Recinto donde realizo su voto</div>
                            <div hidden v-if="selec" @click="selec=false"><u>Escribir</u></div>
                            <div v-else @click="selec=true"><u>Selecionar</u></div>
                        </label>

                        <select  v-if="selec" class="form-control" v-bind:class="dato.recinto==null?'':dato.recinto==''?'is-invalid':'is-valid'" v-model="dato.recinto"  name="Recinto donde esta registrada para votar" id="Recinto donde esta registrada para votar" required>
                            <option v-for="i in recintos" v-bind:value="i.recinto">
                                {{i.recinto}}
                            </option>
                            <option value="No Corresponde">No Corresponde</option>
                        </select>
                        <div class="valid-feedback">
                            Bien!
                        </div>
                        <div class="invalid-feedback">
                            Dato necesario!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Celular">Tiene cuenta de banco?</label>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="tienebanco" id="tienebanco1" value="SI" v-bind:class="dato.tienebanco==null?'':dato.tienebanco==''?'is-invalid':'is-valid'" v-model="dato.tienebanco" checked>
                            <label class="form-check-label" for="tienebanco1">
                                SI
                            </label>
                        </div>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="tienebanco" id="tienebanco2" value="NO" v-bind:class="dato.tienebanco==null?'':dato.tienebanco==''?'is-invalid':'is-valid'" v-model="dato.tienebanco">
                            <label class="form-check-label" for="tienebanco2">
                                NO
                            </label>
                            <div class="valid-feedback">
                                Bien!
                            </div>
                            <div class="invalid-feedback">
                                Dato necesario!
                            </div>
                        </div>
                    </div>
                    <template v-if="dato.tienebanco=='SI'">
                        <div class="col-md-3 mb-3">
                            <label for="Recinto donde esta registrada para votar">Banco</label>
                            <select  v-if="dato.banco!='Otros'" class="form-control" v-bind:class="dato.banco==null?'':dato.banco==''?'is-invalid':'is-valid'" v-model="dato.banco"  name="Recinto donde esta registrada para votar" id="Recinto donde esta registrada para votar">
                                <option v-for="i in bancos" :value="i">
                                    {{i}}
                                </option>
                            </select>
                            <div class="valid-feedback">
                                Bien!
                            </div>
                            <div class="invalid-feedback">
                                Dato necesario!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="numerobanco">Numero de cuenta Banco</label>
                            <input type="text" class="form-control" v-bind:class="dato.numerobanco==null?'':dato.numerobanco==''?'is-invalid':'is-valid'" v-model="dato.numerobanco" id="numerobanco" placeholder="Numero de cuenta de banco" required>
                            <div class="valid-feedback">
                                Bien!
                            </div>
                            <div class="invalid-feedback">
                                Dato necesario!
                            </div>
                        </div>
                    </template>

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
                                <th scope="col">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(i,index) in dato.hijos" :key="index">
                                <th scope="row">{{index+1}}</th>
                                <td><input type="text" class="form-control" :name="i.nombres" v-model="i.nombres"></td>
                                <td><input type="text" class="form-control" :name="i.apellidos" v-model="i.apellidos"></td>
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
                        <label for="salario1">Percibe ingresos por concepto de sueldos y/o salarios?</label>
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
                        En mi calidad de beneficiaria, de acuerdo al codigo Civil Art. 1322, declaro que los datos insertados en el presente formulario son veridicos, por lo que solicito a la Secretaria de Desarrollo Humano procesar mi tramite de conformidad a la Ley Numero 089/2020 Apoyo Solidario a Madres de Familia por la emergencia sanitaria Covid-19.
                        <br>
                        En caso de advertirse falsedad de la informacion, me hago pasible a las sanciones establecidas en el Art. 198 (Falsedad Material ) y Art. 199 (Falsesas Ideologica) del Código Penal Boliviano.
                    </footer>
                </blockquote>
                <button :hidden="d" class="btn btn-success btn-block p-2 my-2" type="submit" :disabled="activar">
                    <i class="fa fa-save "></i> Enviar informacion
                </button>
                <button :hidden="!d" class="btn btn-success btn-block p-2 my-2" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </form>
        </div>


    </div>
</template>

<script>
    // import VueHtml2pdf from 'vue-html2pdf'
    import axios from 'axios';
    import moment from 'moment';
    export default {
        // components: {
        //     VueHtml2pdf
        // },
        data:function(){
            return {
                selec:true,
                d:false,
                men:'',
                cedula:'',
                dato:{hijos:[{nombres:'',apellidos:''}]},
                recintos:[],
                bancos:[
                    'BANCO DE CREDITO DE BOLIVIA',
                    'BANCO GANADERO',
                    'BANCO MERCANTIL SANTA CRUZ',
                    'BANCO NACIONAL DE BOLIVIA',
                    'BANCO SOL',
                    'BANCO UNION',
                    'BANCO BISA',
                    'CIDRE IFD',
                    'ECOFUTURO',
                    'LOS ANDES BANCA PYMES',
                    'BANCO FIE',
                    'BANCO PRODEM',
                ]
            }
        },
        mounted() {
            // console.log('Component mounted.');
            axios.get('/recintos').then(res=>{
                this.recintos=res.data;
            })
        },
        methods:{
            generateReport () {
                this.$refs.html2Pdf.generatePdf()
            },
            mas(){
                this.dato.hijos.push({nombres:'',apellidos:''});
            },
            menos(index){
                this.dato.hijos.splice(index, 1);
            },
            guardar(){
                if(this.dato.hijos[0].nombres=='' && this.dato.hijos[0].apellidos==''){
                    this.$fire({
                    title: 'NO!!!',
                    text: "Debe agregar al menos 1 hijo ",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
                return false;
                }
                this.$fire({
                    title: 'Seguro?',
                    text: "De mandar informacion",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar'
                }).then((result) => {
                    if (result.value) {
                        //this.d=true;
                        // console.log('si');
                        // return false;
                        // Swal.fire(
                        //     'Enviado!',
                        //     'Correctamente',
                        //     'success'
                        // );
                        // this.dato.recinto=this.dato.recintos2;
                        axios.post('/education',this.dato).then(res=>{
                            this.d=false;
                            if (res.data=='CORRECTO'){
                                // this.$toast.open({
                                //     message: "Guardado Correctamente",
                                //     type: "success",
                                //     duration: 2000,
                                //     dismissible: true
                                // });
                                this.$fire({
                                    title: "Registrado correctamente!",
                                    text: res.data,
                                    type: 'info'
                                }).then(r => {
                                    // console.log(r.value);
                                    //location.href="https://www.google.com.bo";
                                });
                                this.dato={hijos:[{nombres:'',apellidos:''}]};
                            }else{
                                this.d=false;
                                this.$fire({
                                    title: res.data,
                                    text: res.data,
                                    type: 'info'
                                }).then(r => { this.dato={hijos:[{nombres:'',apellidos:''}]};
                                    // console.log(r.value);
                                    //location.href="https://www.google.com.bo";
                                });
                            }
                        });
                        // this.$toastr.s("Enviado correctamente");
                    }
                })


            },
            

        },
        computed:{
            activar(){
                // console.log(this.dato.sexo=='Femenino' &&   this.dato.municipo=='Oruro');
                if ( this.dato.municipio=='Oruro'){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }
</script>

<style>
.mayuscula{
    text-transform: uppercase;
}
</style>
