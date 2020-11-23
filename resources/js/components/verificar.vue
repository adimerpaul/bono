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
                                <button type="submit" class="btn btn-dark btn-block">Verificar</button>
                            </form> 
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="card " >
                    <div class="card-header bg-dark text-white">INFORMACION</div>
                    <div class="card-body py-0">
                        <p class="card-text">
                           <form>
                                 <div class="form-group row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo</label>
                                    <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="nombre" v-bind:value="dato.paterno +' '+dato.materno+' '+dato.nombres">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ci1" class="col-sm-2 col-form-label">Carnet de Identidad</label>
                                    <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="ci1" v-model="dato.ci">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="estado" class="col-sm-2 col-form-label">Habilitado</label>
                                    <div class="col-sm-10">
                                        <div class="badge " :class="dato.estado=='SI'?'badge-success':'badge-danger'">
                                            {{dato.estado}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="detalle" class="col-sm-2 col-form-label">Detalle</label>
                                    <div class="col-sm-10">
                                        <div class="alert alert-primary" role="alert">
                                            <textarea type="text" readonly class="form-control-plaintext" id="detalle" v-model="dato.detalle"></textarea>
                                        </div>
                                    </div>
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
export default {
           data:function(){
            
          return {
              dato:{paterno:'',materno:'',nombres:''},
              param:"",
              fecha:""
          }
        },
        mounted() {
            console.log('Component mounted.');
        },
        methods:{
            verificar(){
              axios.get('/verificar/'+this.param+"/"+this.fecha).then(res=>{
                  if(res.data==''){
                        this.dato={};
                        if (this.dato.paterno==undefined||this.dato.paterno==null){
                            this.dato.paterno='';
                        } 
                        if (this.dato.materno==undefined||this.dato.materno==null){
                            this.dato.materno='';
                        } 
                        if (this.dato.nombres==undefined||this.dato.nombres==null){
                            this.dato.nombres='';
                        } 

                        this.dato.detalle='NO SE ENCUENTRA REGITRADO POR FAVOR, REGISTRESE PARA PODER VERFICAR SUS DATOS';
                  }else{
                   this.dato=res.data[0];
                        if (this.dato.paterno==undefined||this.dato.paterno==null){
                            this.dato.paterno='';
                        } 
                        if (this.dato.materno==undefined||this.dato.materno==null){
                            this.dato.materno='';
                        } 
                        if (this.dato.nombres==undefined||this.dato.nombres==null){
                            this.dato.nombres='';
                        } 
                   //this.dato.hijos=data[0].hijo;
                  }
              });  
            },
        },
}
</script>