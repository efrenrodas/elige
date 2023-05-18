const app = Vue.createApp({
data() {
    return {
        cantidad:0,
        carreraSelected:'',
        nombreCarrera:''
    }
},
methods: {
    escuchaCambio(event){
      //  console.log(this.carreraSelected);
        // console.log('El valor seleccionado es: ' + this.carreraSelected);
        this.nombreCarrera=event.target.options[event.target.selectedIndex].text;
        axios.get('https://sanisidro.edu.ec/api2/',{
        params:{
            op:'cantidad',
            id:this.carreraSelected
        }
    })
    .then(response=>{
       // console.log('Respuesta',response.data.cantidad);
        this.cantidad=response.data.cantidad
    })
    .catch(error=>{
        console.log('Error',error);
    })
    }
},
})

app.mount('#app');