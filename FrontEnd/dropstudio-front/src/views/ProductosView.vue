<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Maximiliano Heredia Santoyo | maxheredia95@gmail.com</h3>
                        <h6 class="card-subtitle mb-2 text-muted">Desarrollo centrado en funcional, no en diseño :)
                        </h6>
                        <h4 class="card-subtitle mb-2 text-muted">Listado de productos</h4>

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <router-link class="btn btn-success btn-lg btn-block" :to="{name: 'nuevoProducto'}">
                                    Nuevo producto</router-link>
                            </div>

                        </div>

                        <div v-for="(producto, index) in productos" :key="index">
                            <ProductoItem :producto="producto" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProductoItem from "@/components/ProductoItem.vue";

export default {
  name: "ProductosView",
  components: {
    ProductoItem,
  },
  data: function () {
    return {
      productos: null,
    };
  },
  mounted() {
    this.axios
      .get("http://127.0.0.1:8000/productos")
      .then((response) => (this.productos = response.data));
  },
};
</script>

<style></style>
