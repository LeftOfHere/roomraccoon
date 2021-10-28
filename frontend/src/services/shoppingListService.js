const URL = 'http://localhost:8080/api';

//only working with 1 list at the moment
const LIST_ID = 1;

export const getShoppingList = async () => {
  return fetch(`${URL}/lists/${LIST_ID}`)
    .then(res => res.json());
}

export const addItem = async (item) => {
  fetch(`${URL}/lists/${LIST_ID}/items`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(item)
  }).then(res => res.json()).then(data => console.log('data', data));
}

export const removeItem = async (id) => {
  return fetch(`${URL}/lists/${LIST_ID}/items/${id}`, {
    method: 'DELETE'
  }).then(res => res);
}

export const editItem = async (item) => {
  return fetch(`${URL}/lists/${LIST_ID}/items/${item.id}`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(item)
  }).then(res => res.json());
}