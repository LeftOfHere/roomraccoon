<template>
  <div class="card">    
    <div>
      <h1>Shopping List</h1>
      <AddItem @itemAdded="getItems" />
    </div>
    <ul>
      <li v-for="item in items" :key="item.message">
        <ShoppingItem :item="item" @itemRemoved="getItems" @itemUpdated="getItems"/>
      </li>
    </ul>
  </div>
</template>

<script>
import ShoppingItem from "./ShoppingItem.vue";
import AddItem from "./AddItem.vue";
import { getShoppingList } from "../services/shoppingListService";

export default {
  name: "ShoppingList",
  props: {
    msg: String,
  },
  created() {
    getShoppingList()
      .then((res) => (this.items = res))
      .catch((err) => console.log(err));
  },
  data() {
    return {
      items: [],
    };
  },
  components: {
    ShoppingItem,
    AddItem,
  },
  methods: {
    getItems: function () {
      getShoppingList()
        .then((res) => {
          this.items = [];
          console.log('items',res);
          this.items = res;
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>

<style scoped>
.card {
  border-radius: 4px;
  box-shadow: 3px 3px 10px lightslategray;
  padding: 0.1em 1em 1em;
}
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
</style>
