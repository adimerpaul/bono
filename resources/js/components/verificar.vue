<template>
    <div class="conteiner">
        <div class="row p-2">
            <div class="col-sm-3">
                <div class="card " >
                    <div class="card-header bg-dark text-white">DATOS PERSONALES</div>
                    <div class="card-body py-0">
                        <p class="card-text">
                           <form @submit.prevent="verificar">
                            <div class="form-group">
                                <label for="ci">Carnet de Identidad</label>
                                <input type="text" class="form-control" id="ci" placeholder="Carnet de Identidad" required v-model="param">
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha" required v-model="fecha">
                            </div>
                                <button type="submit" class="btn btn-dark btn-block" >
                                    <i class="fa fa-cog"></i> Verificar
                                </button>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card " >
                    <div class="card-header bg-dark text-white">INFORMACION</div>
                    <div class="card-body py-0">
                        <p class="card-text">
                           <form>
                                 <div class="form-group row">
                                    <label for="nombre" class="col-sm-3 col-form-label">NOMBRE COMPLETO</label>
                                    <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="nombre" v-bind:value="dato.nombres+' '+dato.paterno +' '+dato.materno+' '+dato.conyugue">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ci1" class="col-sm-3 col-form-label">CARNET DE IDENTIDAD</label>
                                    <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="ci1" v-model="dato.ci">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="estado" class="col-sm-3 col-form-label">ESTADO</label>
                                    <div class="col-sm-9">
                                        <h2><div class="badge " :class="dato.estado=='SI'||dato.estado=='HABILITADO'?'badge-success':dato.estado=='INHABILITADO'?'badge-danger':dato.estado=='En Proceso'?'badge-warning':''">
                                            {{dato.estado}}
                                        </div></h2>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="detalle" class="col-sm-3 col-form-label">OBSERVACION</label>
                                    <div class="col-sm-9">
                                        <div class="alert alert-primary" role="alert">
                                            <textarea type="text" readonly class="form-control-plaintext" id="detalle" v-model="dato.detalle"></textarea>
                                        </div>
                                        <div class="" >
                                            <b class="text-danger">{{men2}}</b>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card " >
                    <div class="card-header bg-dark text-white"> <i class="fa fa-phone"></i> Consultas</div>
                    <div class="card-body py-0">
                        <p class="card-text">
                        <form @submit.prevent="verificar">
                            <div class="form-group">
                                <label for="num1">Celular</label>
<!--                                <input type="text" class="form-control" id="num1" placeholder="Carnet de Identidad" required v-model="param">-->
                                <div>
                                    <a target="_black" href="https://wa.me/+59175717388?text=Tuvieras dudas sobre el bono madres" >
                                    <i class="fa fa-phone-alt" aria-hidden="true"></i>
                                        75717388
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="num2">Telefono</label>
                                <div><a > <i class="fa fa-phone-alt" aria-hidden="true"></i> 52-83646</a></div>
                            </div>
                        </form>
                        </p>
                    </div>
                </div>
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
              dato:{paterno:'',materno:'',nombres:'',conyugue:''},
              param:"",
              fecha:"",
              men:'',
              fechacobro:'',
              men2:'',
          }
        },
        mounted() {
            console.log('Component mounted.');
        },
        methods:{

            verifmama(){
                axios.get('/verifma/'+this.param).then(res2=>{
                           console.log(res2.data);
                            if(res2.data=='')
                               this.men= 'NO ESTA REGISTRADA COMO MAMÀ EN SERECI';
                            else
                                this.men= 'NO SE ENCUENTRA REGISTRADO POR FAVOR, REGISTRESE PARA PODER VERFICAR SUS DATOS';
                        console.log(this.dato.detalle);
                            //
                        });

            },
            calculodias(){

            },
            verificar(){
              this.verifmama();
              this.dato={paterno:'',materno:'',nombres:''};
                   this.men2='';
              axios.get('/verificar/'+this.param+"/"+this.fecha).then(res=>{
                  console.log(res.data);
                  if(res.data==''){
                        this.dato={};
                        this.dato.detalle=this.men;
                        console.log(this.dato.detalle);

                        if (this.dato.paterno==undefined||this.dato.paterno==null){
                            this.dato.paterno='';
                        }
                        if (this.dato.materno==undefined||this.dato.materno==null){
                            this.dato.materno='';
                        }
                        if (this.dato.nombres==undefined||this.dato.nombres==null){
                            this.dato.nombres='';
                        }
                      if (this.dato.conyugue==undefined||this.dato.conyugue==null){
                          this.dato.conyugue='';
                      }



                  }else{
                   this.dato=res.data[0];
                   if (this.dato.estado=='HABILITADO'){
                   this.fechacobro=moment(this.dato.updated_at).add(14,'d');
                   this.men2='USTED PUEDE COBRAR A PARTIR DE LA FECHA: '+moment(this.fechacobro).format('DD/MM/yyyy');
                   }
                        if (this.dato.paterno==undefined||this.dato.paterno==null){
                            this.dato.paterno='';
                        }
                        if (this.dato.materno==undefined||this.dato.materno==null){
                            this.dato.materno='';
                        }
                        if (this.dato.nombres==undefined||this.dato.nombres==null){
                            this.dato.nombres='';
                        }
                      if (this.dato.conyugue==undefined||this.dato.conyugue==null){
                          this.dato.conyugue='';
                      }
                        if(this.dato.estado=='NO')
                            this.dato.estado='En Proceso';
                   //this.dato.hijos=data[0].hijo;
                  }
              });
            },
        },
}
</script>
