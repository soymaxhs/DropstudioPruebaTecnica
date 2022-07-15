<template>
  <div class="card my-2" :id="this.producto.id">
    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        <img :src="this.producto.imagen" class="img-responsive img-thumbnail rounded-4" alt="Image">

      </div>

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="card-body">
          <h5 class="card-title">SKU: {{ this.producto.sku }}</h5>
          <h2 class="card-title text-primary">
            <strong>{{ this.producto.nombre }}</strong>
          </h2>
          <h6 class="card-subtitle mb-2 text-muted">
            Categorias:
            <code v-for="(categoria, index) in categorias" :key="index">{{ categoria.nombre }},
            </code>
          </h6>
          <p class="card-text">
            <span :class="!lowStock ? 'text-success' : 'text-danger'">
              <strong>
                {{ !lowStock ? "In Stock" : "Low Stock" }} </strong>
            </span>
          </p>

          <div class="row">

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <label for="stock">Stock:</label>
              <input id="stock" class="form-control form-control-sm" type="number" :value="this.producto.cantidad"
                readonly />
            </div>

          </div>

        </div>
      </div>

      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="card">
          <div class="card-body">
            <blockquote class="blockquote">
              <p>{{ money(this.producto.precio) }}</p>
              <p>
                <span :class="this.producto.estado ? 'text-success' : 'text-danger'">
                  <strong>
                    {{ this.producto.estado ? "Disponible" : "No Disponible" }}
                  </strong>
                </span>
              </p>
              <footer class="card-blockquote row">
                <button type="button" name="" id="" class="btn btn-info btn-xs btn-block mt-1"
                  @click="showDetails"><strong>Detalle</strong></button>
                <router-link class="btn btn-primary btn-xs btn-block mt-1"
                  :to="{ name: 'editarProducto', params: { id: this.producto.id } }">
                  Editar
                </router-link>
                <button type="button" name="" id="" class="btn btn-danger btn-xs btn-block mt-1"
                  @click="deleteProduct">Eliminar</button>
                <button type="button" name="" id="" class="btn btn-success btn-xs btn-block mt-1"
                  @click="alert">Calificar</button>
              </footer>
            </blockquote>
          </div>
        </div>
      </div>
    </div>

    <div class="row">

    </div>

  </div>
</template>

<script>
export default {
  props: ["producto"],
  data: function () {
    return {
      categorias: [],
    };
  },
  mounted() {
    this.axios
      .get(`http://127.0.0.1:8000/productos/${this.producto.id}/categorias/`)
      .then((response) => (this.categorias = response.data));
  },
  methods: {
    money(value) {
      if (typeof value !== "number") {
        return value;
      }
      var formatter = new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "USD",
      });
      return formatter.format(value);
    },
    alert() {
      alert('Funcionalidad en desarrollo');
    },
    deleteProduct(){
      this.axios
        .delete(`http://127.0.0.1:8000/productos/${this.producto.id}`)
        .then((response) => {
          console.log(response);
          document.getElementById(this.producto.id).classList.add("d-none");
        });
    },
    showDetails(){
      this.$swal({
        title: this.producto.nombre,
        html: `
        <h6>SKU: ${this.producto.sku}</h6>
        <p>Descripcion:${this.producto.descripcion}</p>
        <p clas='text-primary'>Existencias: ${this.producto.cantidad}</p>
        `,
        imageUrl: this.producto.imagen,
        imageWidth: 720,
        imageAlt: this.producto.nombre,
        confirmButtonText: 'Cerrar',
      })
    },
  },
  computed: {
    lowStock() {
      return this.producto.cantidad < 10000 ? true : false;
    }
  }
};
</script>

<style></style>
