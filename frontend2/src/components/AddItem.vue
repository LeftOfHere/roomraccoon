<template>
  <div class="add-card">
    <input
      placeholder="New Item"
      type="text"
      id="new-name"
      v-model="itemName"
    />
    <button v-on:click="addItem">
      <span class="material-icons">add</span>
    </button>
  </div>
</template>

<script>
import { addItem } from "../services/shoppingListService";

export default {
  name: "AddItem",
  methods: {
    addItem: function () {
      let el = document.getElementById("new-name");
      el.classList.remove("error");
      if (!this.itemName) {
        el.classList.add("error");
        return;
      }
      addItem({ name: this.itemName, checked: false }).then(() => {
        el.value = "";
        el.dispatchEvent(new Event("input"));
        this.$emit("itemAdded");
      });
    },
  },
};
</script>

<style scoped>
input[type="text"] {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type="text"]:focus {
  outline: none;
}

#new-name.error {
  border: 1px solid red;
}

button {
  height: 40px;
  background: transparent;
  border: unset;
  margin: 12px 0.5em 0 1em;
  border-radius: 4px;
}
button:hover {
  background: rgba(0, 0, 0, 0.1);
}
</style>
