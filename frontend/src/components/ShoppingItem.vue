<template>
  <div class="shopping-item">
    <label class="container"
      >
      <input
        type="checkbox"
        :id="itemData.id"
        v-model="itemData.checked"
        @change="editItem(itemData)"
      />
      <span class="checkmark"></span>
    </label>
    <input type="text" id="new-name" v-model="itemData.name" />
    <button v-on:click="editItem(itemData)">
      <span class="material-icons">save</span>
    </button>
    <button v-on:click="removeItem(itemData.id)">
      <span class="material-icons">delete_forever</span>
    </button>
  </div>
</template>

<script>
import { removeItem, editItem } from "../services/shoppingListService";

export default {
  name: "ShoppingItem",
  props: {
    item: Object,
  },
  created: function () {
    this.itemData = { ...this.item, checked: !!this.item.checked };
  },
  updated: function () {
    this.itemData = { ...this.item, checked: !!this.item.checked };
  },
  methods: {
    removeItem: function (id) {
      //TODO: Confirmation message
      removeItem(id).then(() => {
        this.$emit("itemRemoved");
      });
    },

    editItem: function (item) {
      editItem(item).then(() => this.$emit("itemUpdated"));
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.shopping-item {
  margin-top: 1em;
}

input[type="text"] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 0 solid #ccc;
  border-bottom: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type="text"]:focus {
  outline: none;
}

button {
  background: transparent;
  border: unset;
  margin: 0.5em 0.5em 0 1em;
  border-radius: 4px;
}
button:hover {
  background: rgba(0, 0, 0, 0.1);
}
/* The container */
.container {
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196f3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
