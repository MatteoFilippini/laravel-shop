<template>
  <div>
    <h2>list</h2>
    <ul>
      <li v-for="product in products" :key="product.id">
        {{ product.name }}
      </li>
    </ul>
    <h2>Brands</h2>
    <select name="" id="" v-model="selectedBrand" @change="getBrandOfProduct()">
      <option value="">----</option>
      <option :value="brand.id" v-for="brand in brands" :key="brand.id">
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
    getProductsAndBrands() {
      axios
        .get("http://127.0.0.1:8000/api/products")
        .then((res) => {
          this.products = res.data["products"];
          this.brands = res.data["brands"];
        })
        .catch((err) => {
          console.log("errore");
        })
        .then(() => {
          console.log("api terminata");
        });
    },
    getBrandOfProduct() {
      axios
        .get("http://127.0.0.1:8000/api/products?brands=" + this.selectedBrand)
        .then((res) => {
          this.products = res.data.products;
          console.log("brands");
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
    this.getProductsAndBrands();
  },
};
</script>

<style>
</style>