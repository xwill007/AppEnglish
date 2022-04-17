AFRAME.registerComponent('change-site',{
    schema:{
        img:{type:'string'}
    },

    init: function(){
        var data = this.data; //informacion q trae
        var el = this.el; //elemento

        el.addEventListener("mouseenter",function(){ 
            window.location="/AppEnglish/inicio.php";
        });
    }

});