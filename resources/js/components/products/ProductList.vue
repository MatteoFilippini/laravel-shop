<template>
  <div>
    <h2>list</h2>
    <ul>
      <li v-for="product in products" :key="product.id">
        {{ product.name }}
      </li>
    </ul>
    <h2>Brands</h2>
    <select name="" id="" v-model="selectedBrand">
      <option value="">-</option>
      <option
        :value="brand.id"
        v-for="brand in brands"
        :key="brand.id"
        @change="getBrands"
      >
        {{ brand.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  name: "ProductList",
  data() {
    return {
      products: [],
      brands: [],
      selectedBrand: null,
    };
  },
  methods: {
    getProducts() {
      axios
        .get("http://127.0.0.1:8000/api/products")
        .then((res) => {
          this.products = res.data.products;
          this.brands = res.data.brands;
        })
        .catch((err) => {
          console.log("errore");
        })
        .then(() => {
          console.log("api terminata");
        });
    },
    getBrands() {
      axios
        .get("http://127.0.0.1:8000/api/products?brand=" + this.selectedBrand)
        .then((res) => {
          this.brands = res.data;
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
    this.getBrands();
  },
};
</script>

<style>
</style>