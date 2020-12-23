<template>
<div class="container">
    <div class="row">
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
            <form @submit.prevent="modificar">
                <p class="blockquote">DATOS BENEFICIARIA <b>ID: {{dato.id}}</b></p>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="Apellido Paterno">Apellido Paterno</label>
                        <input type="text" class="form-control" v-bind:class="dato.paterno==null?'':dato.paterno==''?'is-invalid':'is-valid'" v-model="dato.paterno" id="Apellido Paterno" placeholder="Apellido Paterno" >
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
                        <label for="Apellido Conyugue">Apellido de Casada</label>
                        <input type="text" class="form-control" v-bind:class="dato.conyugue==null?'':dato.conyugue==''?'':'is-valid'" v-model="dato.conyugue" id="Apellido Conyugue" placeholder="Apellido de Casada" >
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
                        <input type="date" class="form-control" v-bind:class="dato.fechanac==null?'':dato.fechanac==''?'is-invalid':calcularedad(dato.fechanac)?'is-valid':'is-invalid'" v-model="dato.fechanac" id="Fecha Nacimiento" placeholder="Fecha Nacimiento"  required>
                        <div class="valid-feedback">
                            Bien!
                        </div>
                        <div class="invalid-feedback">
                            La edad no corresponde para el bono
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label >Sexo</label>
<!--                        <input type="date" class="form-control" v-bind:class="dato.sexo==null?'':dato.sexo==''?'is-invalid':'is-valid'" v-model="dato.sexo" id="Sexo" placeholder="Sexo" required>-->
                        <div class="form-check">
                            <input v-bind:class="dato.sexo==null?'':dato.sexo=='Masculino'?'is-invalid':'is-valid'" v-model="dato.sexo" class="form-check-input" type="radio" name="sexo" id="sexo1" value="Femenino" required>
                            <label class="form-check-label" for="sexo1">
                                Femenino
                            </label>
                        </div>
                        <div class="form-check">
                            <input v-bind:class="dato.sexo==null?'':dato.sexo=='Masculino'?'is-invalid':'is-valid'" v-model="dato.sexo" class="form-check-input" type="radio" name="sexo" id="sexo2" value="Masculino" required>
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
                            <option value="Oruro">Oruro</option>
                        </select>
<!--                        <input type="text" class="form-control" v-bind:class="dato.recinto==null?'':dato.recinto==''?'is-invalid':'is-valid'" v-model="dato.recinto" id="Recinto de votacion" placeholder="Recinto de votacion" required>-->
                        <div class="valid-feedback">
                            Bien!
                        </div>
                        <div class="invalid-feedback">
                            Bono solo para el Provincia cercado municipio de oruro!
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="Carnet Identidad">CI o Pasaporte</label>
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
                        <input type="text" class="form-control" v-bind:class="dato.celular==null?'':dato.celular==''?'is-invalid':'is-valid'" v-model="dato.celular" id="Celular" placeholder="Celular" >
                        <div class="valid-feedback">
                            Bien!
                        </div>
                        <div class="invalid-feedback">
                            Dato necesario!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Dirección">Dirección Actual</label>
                        <input type="text" class="form-control" v-bind:class="dato.direccion==null?'':dato.direccion==''?'is-invalid':'is-valid'" v-model="dato.direccion" id="Dirección" placeholder="Dirección" required>
                        <div class="valid-feedback">
                            Bien!
                        </div>
                        <div class="invalid-feedback">
                            Dato necesario!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Recinto donde esta registrada para votar">Recinto donde realizo su voto</label>

                        <select  class="form-control" v-bind:class="dato.recinto==null?'':dato.recinto==''?'is-invalid':'is-valid'" v-model="dato.recinto"  name="Recinto donde esta registrada para votar" id="Recinto donde esta registrada para votar" required>
                            <option v-for="i in recintos" v-bind:value="i.recinto">
                                {{i.recinto}}
                            </option>
                            <option value="No Correponde">No Correponde</option>
                        </select>

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Celular">Tiene cuenta de banco?</label>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="tienebanco" id="tienebanco1" value="SI" v-bind:class="dato.tienebanco==null?'':dato.tienebanco==''?'is-invalid':'is-valid'" v-model="tienebanco" checked>
                            <label class="form-check-label" for="tienebanco1">
                                SI
                            </label>
                        </div>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="tienebanco" id="tienebanco2" value="NO" v-bind:class="dato.tienebanco==null?'':dato.tienebanco==''?'is-invalid':'is-valid'" v-model="tienebanco" @click="limpiabanco">
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
                    <template v-if="tienebanco=='SI'">
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
                                <td><input type="text" class="form-control" v-model="i.nombres"></td>
                                <td><input type="text" class="form-control" v-model="i.apellidos"></td>
                                <td>
                                    <div @click="mas"  class="btn btn-success btn-sm"><i class="fa fa-plus"></i></div>
                                    <div @click="menos(index)"  class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <blockquote class="blockquote">
                            <p class="mb-0">VERIFICACIONES</p>
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
                    <br>

                    <div class="col-md-6 mb-6">
                        <label for="estado">Habilitado para cobro</label>
                        <input type="text" readonly class="form-control-plaintext" id="estado1" v-model="dato.estado">

                    </div>
                        <div class="row col-12">
                            <table class="table table-bordered">
                                <tr><th>Voto municipio Oruro?</th>
                                <td>   
                                    <div class="form-check col-md-3">
                                        <label class="form-control-label" for="voto2">{{dato.voto}}</label>
                                    </div>
                                </td>
                       
                                </tr>
                                <tr>
                                    <th>Aportes AFP Prevision?</th>
                                    <td>
                                       <div class="form-check col-md-3">
                                            <label class="form-control-label" for="afprevision2">{{dato.aprevision}}</label>
                                        </div>
                                    </td>
    
                                </tr>
                                <tr>
                                    <th>Aportes AFP Futuro?</th>
                                    <td>
                                        <div class="form-check col-md-3">
                                            <label class="form-control-label" for="afpfuturo2">{{dato.apfuturo}}</label>
                                        </div>
                                    </td>

                                </tr>
                            </table>
                        </div>
  

                    <div class="col-md-6 mb-6">
                        <label for="ci1" class="col-sm-9 col-form-label">Datos Verificados</label>
                        <div class="col-sm-3">
                        <input type="text" readonly class="form-control-plaintext" id="ci1" v-model="dato.verificar">
                        </div>
                    </div>
                    <br>
                    <div class="col-md-6 mb-6">
                        <label class="" for="detalle">Detalle</label>
                        <textarea class="form-control" name="detalle" id="detalle" cols="30" rows="10" v-model="dato.detalle"></textarea>
                    </div>
                </div>
                                    <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>
                        <div class="form-check"><h3>
                            <input class="form-check-input" type="checkbox"   true-value="SI"  false-value="NO" id="docnac"  v-model="dato.docnac">
                            <label class="form-check-label" for="docnac">
                                Certificado de Nacimiento / Cedula Hij@
                            </label></h3>
                        </div></th>
                        </tr>
                        <tr><th>
                        <div class="form-check"><h3>
                            <input class="form-check-input" type="checkbox"  id="docbiomet" true-value="SI"  false-value="NO"  v-model="dato.docbiomet">
                            <label class="form-check-label" for="docbiomet">
                                Registro Biometrico / carnet de sufragio
                            </label></h3>
                        </div></th>
                        </tr>
                        <tr><th>
                        <div class="form-check"><h3>
                            <input class="form-check-input" type="checkbox" id="docfuturo" true-value="SI"  false-value="NO"  v-model="dato.docfuturo">
                            <label class="form-check-label" for="docfuturo">
                                Extracto o resumen de Aportes AFP Futuro 
                            </label></h3>
                        </div></th>
                        </tr>
                        <tr><th>
                        <div class="form-check"><h3>
                            <input class="form-check-input" type="checkbox"  id="docprevision" true-value="SI"  false-value="NO" v-model="dato.docprevision">
                            <label class="form-check-label" for="docprevision">
                                Extracto o resumen de aportes a AFP Previsiones
                            </label></h3>
                        </div></th>
                        </tr>
                        </table>
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
                <button class="btn btn-success btn-block" type="submit" :disabled="activar">
                    <i class="fa fa-save"></i> Actualizar informacion
                </button>
            </form>
        </div>


    </div>
</div>

</template>

<script>
    import VueHtml2pdf from 'vue-html2pdf'
    import axios from 'axios';
    import moment from 'moment';
    import Vue from 'vue';
    import { Datetime } from 'vue-datetime';
// You need a specific loader for CSS files
    import 'vue-datetime/dist/vue-datetime.css';

Vue.use(Datetime)

    export default {
        components: {
            VueHtml2pdf,
            datetime: Datetime
        },
        data:function(){

          return {
              dato:{hijos:[{nombres:'',apellidos:''}]},
              param:null,
              recintos:[],
              tienebanco:'SI',
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
            console.log('Component mounted.');
                axios.get('/recintos').then(res=>{
                this.recintos=res.data;
            }),
            this.dato;
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
            actualizar(){

              axios.get('/madre/'+this.param).then(res=>{
                  if(res.data=='')
                        this.dato={hijos:[{nombres:'',apellidos:''}]};
                  else{
                   console.log(res.data[0]);
                   this.dato=res.data[0];
                   if(this.dato.estado!='INHABILITADO')
                        this.dato={hijos:[{nombres:'',apellidos:''}]};
                   if(this.dato.banco!=null)
                        this.tienebanco='SI';
                   else
                        this.tienebanco='NO';
                    if(this.dato.hijos.length==0)
                        this.dato.hijos=[{nombres:'',apellidos:''}];
                    
                   //this.dato.hijos=data[0].hijo;
                   console.log(this.dato);
                  }
              });
            },
            modificar(){
                this.$fire({
                    title: 'Seguro?',
                    text: "De modificar informacion",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar'
                }).then((result) => {
                    if (result.value) {
                        // console.log('si');
                        // return false;
                        // Swal.fire(
                        //     'Enviado!',
                        //     'Correctamente',
                        //     'success'
                        // );


                        axios.put('/modifica/'+this.dato.id,this.dato).then(res=>{
                            console.log(res.data);

                        });
                        // this.$toastr.s("Enviado correctamente");
                        this.$toast.open({
                            message: "Modificado Correctamente",
                            type: "success",
                            duration: 2000,
                            dismissible: true
                        })
                        this.dato={hijos:[{nombres:'',apellidos:''}]};
                    }
                })


            },
            calcularedad(variable){
                    this.dato.fechanac=moment(variable).format('YYYY-MM-DD');
                	var a = moment('2020-12-31');
	                var b = moment(variable);

	                var years = a.diff(b, 'year');
                                b.add(years, 'years');
                                console.log(moment(variable).format('YYYY-MM-DD'));
                    if(years>17 && years<60)
                        return true;
                    else
                        return false;
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
                    {
                    this.dato.detalle='PENDIENTE DE VERIFICACION';}
                else               
                    this.dato.estado='INHABILITADO';
            },
        limpiabanco(){
            this.dato.banco=null;
            this.dato.numerobanco='';
        }
        },
        computed:{
            activar(){
                // console.log(this.dato.sexo=='Femenino' &&   this.dato.municipo=='Oruro');
                if (this.dato.sexo=='Femenino' &&  this.dato.municipio=='Oruro' && this.calcularedad(this.dato.fechanac)){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }
</script>
