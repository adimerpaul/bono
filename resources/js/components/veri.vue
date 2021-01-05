<template>
    <div class="row ">
        <div class="col-12">
            holas
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';
export default {
    // components: {
    //     VueHtml2pdf
    // },
    data:function(){
        return {
            selec:true,

        }
    },
    mounted() {
        // console.log('Component mounted.');
        axios.get('/madres').then(res=>{
            // console.log(res.data);
            res.data.forEach(async r=>{
                // await console.log(r);
                await axios.get('/corte/'+r.civalido+'/'+r.fechanac+'').then(async res=>{
                    // this.recintos=res.data;
                    let token=res.data;
                    // console.log(res.data);
                    let datos={
                        signature:token,
                        client_id:'53iEkRduUGrSBCrNSScJizIyyADgdz3',
                        client_secret:'hEUgAAABgAAAAYCAYAAADgdz3CrNSSc'
                    };
                    axios.post('https://servicios.oep.org.bo:443/api/referendum/people/perform/',datos).then( async re=>{
                        console.log(re.data);
                        // axios.put('/madresupdate/'+r.id,{voto:'SI'})
                        if(re.data.localidad=="Cercado, Oruro"){
                            await axios.put('/madresupdate/'+r.id,{voto:'SI'})
                            // await setTimeout(() => { console.log("World!"); },100);

                        }else{
                            await axios.put('/madresupdate/'+r.id,{voto:'NO'})
                        }
                    }).catch(async error=>{
                        console.log('No encontrado');
                        await axios.put('/madresupdate/'+r.id,{voto:'NO'})
                        // await setTimeout(() => { console.log("World!"); },100);
                    });
                })
            })

        });

    },
    methods:{
        generateReport () {
            this.$refs.html2Pdf.generatePdf()
        },
    },
    computed:{
    }
}
</script>
