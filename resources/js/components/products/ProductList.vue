<template>
  <div>
    <h2>list</h2>
    <ul>
      <li v-for="product in products" :key="product.id">
        {{ product.name }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "ProductList",
  data() {
    return {
      products: [],
    };
  },
  methods: {
    getProducts() {
      axios
        .get("http://127.0.0.1:8000/api/products")
        .then((res) => {
          this.products = res.data;
        })
        .catch((err) => {
          console.log("errore");
        })
        .then(() => {
          console.log("api terminata");
        });
    },
  },
  mounted() {
    this.getProducts();
  },
};
</script>

<style>
</style>