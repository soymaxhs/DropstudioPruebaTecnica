import { createRouter, createWebHistory } from "vue-router";
// import HomeView from "../views/HomeView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "productos",
      component: () => import("../views/ProductosView.vue"),
    },
    {
      path: "/nuevo-producto",
      name: "nuevoProducto",
      component: () => import("../views/NuevoProductoView.vue"),
    },
    {
      path: "/editar-producto/:id",
      name: "editarProducto",
      component: () => import("../views/EditarProductoView.vue"),
    },
  ],
});

export default router;
