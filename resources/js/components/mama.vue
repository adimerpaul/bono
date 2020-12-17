<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card  mb-3" >
                    <div class="card-header text-white bg-dark">Registro para mamas en sereci</div>
                    <div class="card-body">
<!--                        <h5 class="card-title">Dark card title</h5>-->
                            <form @submit.prevent="insertar">
                                <div class="form-group row">
                                    <label for="ci" class="col-sm-3 col-form-label">Carnet de identidad</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ci" v-model="dato.ci" placeholder="Carnet de identidad" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ci" class="col-sm-3 col-form-label">Nombre completo</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nombre" v-model="dato.nombre" placeholder="Nombre completo" required>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Registrar como mama</button>
                                    </div>
                                </div>
                            </form>
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
            dato:{}
        }
    },
    methods:{
        insertar(){
            this.$fire({
                title: "CI "+this.dato.ci,
                text: "Nombre "+this.dato.nombre,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.value) {
                    axios.post('/storemama',this.dato).then(res=>{
                        this.dato={};
                       this.$fire({
                           title: "Guardado",
                           text: "Exitoso",
                           type: "success",
                           timer: 3000
                       });
                    });
                }
            });
        }
    }
}
</script>

