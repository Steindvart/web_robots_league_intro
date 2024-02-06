<template>
  <div>
    <h2>Форма обратной связи</h2>
    <form @submit.prevent="submitData">
      <div class="form-group">
        <label for="name">ФИО:</label>
        <input type="text" id="name" v-model="name" placeholder="Обязательно для заполнения" required>
      </div>
      <div class="form-group">
        <label for="address">Адрес:</label>
        <input type="text" id="address" v-model="address">
      </div>
      <div class="form-group">
        <label for="phone">Мобильный телефон:</label>
        <input type="tel" id="phone" v-model="phone" placeholder="Обязательно для заполнения" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="email">
      </div>
      <div class="form-group">
        <label for="comment">Комментарий:</label>
        <textarea id="comment" v-model="comment"></textarea>
      </div>
      <button type="submit">Отправить</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      address: '',
      phone: '',
      email: '',
      comment: ''
    }
  },
  methods: {
    submitData() {
      console.log(this.name, this.address, this.email, this.phone, this.comment);
    }
  }
}
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  max-width: 400px;
  margin: 0 auto;
}

.form-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 0.5rem;
}

label {
  font-weight: bold;
  text-align: left;
  margin-right: 0.4rem;
}

input, textarea {
  padding: 0.5rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 6px;
}

button {
  padding: 0.5rem 1rem;
  font-size: 1rem;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}
</style>