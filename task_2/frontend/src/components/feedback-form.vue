<template>
  <h2>Форма обратной связи</h2>
  <form @submit.prevent="submitData">
    <div class="form-group">
      <label for="name">ФИО:</label>
      <dadata-suggestions
        :model-value="name"
        @update:model-value="name = $event"
        token="212e4b10cdd231d52c3d37ffb0d16efc4e75c6fd"
        type="NAME"
        fieldValue="value"
        placeholder="Обязательно для заполнения"
        required
      />
    </div>
    <div class="form-group">
      <label for="address">Адрес:</label>
      <dadata-suggestions
        :model-value="address"
        @update:model-value="address = $event"
        token="212e4b10cdd231d52c3d37ffb0d16efc4e75c6fd"
        type="ADDRESS"
        fieldValue="value"
      />
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
</template>

<script>
  import DadataSuggestions from './dadata-suggestions';
  import axios from 'axios';

  export default {
    name: 'feedback-form',
    components: {
      DadataSuggestions
    },
    data() {
      return {
        name: '',
        address: '',
        phone: '',
        email: '',
        comment: ''
      };
    },
    methods: {
      submitData() {
        const formData = {
          name: this.name,
          address: this.address,
          email: this.email,
          phone: this.phone,
          comment: this.comment
        };

        console.log("Send feedback form data: ", formData);

        axios.post('/api/feedback-form.php', formData)
            .then(response => {
              console.log(response.data);
            })
            .catch(error => {
              console.error(error);
            });
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