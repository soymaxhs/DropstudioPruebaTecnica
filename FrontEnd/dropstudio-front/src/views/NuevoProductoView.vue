<template>

    <div class="container">
        <div class="card mt-5">
            <div class="card-body">

                <form role="form">
                    <legend>Nuevo producto</legend>

                    <div class="form-group">
                        <label for="sku">sku</label>
                        <input type="text" class="form-control" id="sku">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                        <div class="col-sm-12">
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3"
                                required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" id="precio">
                    </div>
                    <div class="form-group">
                        <label for="cantidad">cantidad</label>
                        <input type="number" class="form-control" id="cantidad">
                    </div>
                    <div class="form-check">
                      <label class="form-check-label ">
                        <input type="checkbox" class="form-check-input" name="estado" id="estado" value="checkedValue" checked>
                        Estado
                      </label>
                    </div>
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">Imagen url</label>
                        <div class="col-sm-12">
                            <input type="url" name="imagen" id="imagen" class="form-control" value="" required="required" title="">
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-primary mt-3" @click="sendForm">Enviar</button>
                </form>

            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'NuevoProductoView',
    methods: {
        sendForm(){
            this.axios.post('http://127.0.0.1:8000/productos', {
                sku: document.getElementById('sku').value,
                nombre: document.getElementById('nombre').value,
                descripcion: document.getElementById('descripcion').value,
                precio: document.getElementById('precio').value,
                cantidad: document.getElementById('cantidad').value,
                estado: document.getElementById('estado').checked,
                imagen: document.getElementById('imagen').value,
            })
                .then(function (response) {
                    console.log(response);
                    window.location.href = '/';
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    },
}
</script>

<style>

</style>