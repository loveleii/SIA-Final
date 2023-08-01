<template>
    <AppLayout>
      <template #header>
        <div class="flex items-center">
          <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">Create Customer</h2>
          <Link class="button-back mb-2" as="button" href="/customers">Back</Link>
        </div>
      </template>

      <div class="py-6 bg-green-50">
        <div class="bg-white max-w-4xl p-4 mx-auto rounded-lg border">
          <form @submit.prevent="submit">
            <h4 class="text-2xl mb-4 font-semibold text-green-800">Personal Details</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="form-field">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" v-model="form.name" class="input-field" required>
              </div>

              <div class="form-field">
                <label for="location" class="form-label">Location:</label>
                <input type="text" id="location" v-model="form.location" class="input-field" required>
              </div>

              <div class="form-field">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" id="phone" v-model="form.phone" class="input-field" required>
              </div>

              <div class="form-field">
                <label for="stylist" class="form-label">Stylist:</label>
                <input type="text" id="stylist" v-model="form.stylist" class="input-field">
              </div>

              <div class="form-field">
                <label for="price" class="form-label">Price:</label>
                <input type="text" id="price" v-model="form.price" class="input-field">
              </div>

              <div class="form-field">
                <label for="adate" class="form-label">Date:</label>
                <input type="date" id="adate" v-model="form.adate" class="input-field" required>
              </div>

              <div class="form-field">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" v-model="form.email" class="input-field" required>
              </div>

              <div class="form-field">
                <label for="pic" class="form-label">Add profile picture</label>
                <input type="file" id="pic" @input="form.pic = $event.target.files[0]" class="input-field">
              </div>
            </div>

            <div class="flex items-center justify-end">
              <button class="button-create mt-2" type="submit">Create Customer</button>
            </div>
          </form>
        </div>
      </div>
    </AppLayout>
  </template>

  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import { Head, Link, useForm } from '@inertiajs/vue3';

  const form = useForm({
    name: '',
    location: '',
    phone: '',
    stylist: '',
    price: '',
    adate: '',
    email: '',
    pic: null,
  });

  function submit() {
    form.post('/customers');
  }
  </script>

  <style>
  .form-field {
    margin-bottom: 1.5rem;
  }

  .form-label {
    font-size: 1.125rem;
    font-weight: 600;
    color: #4a5568;
  }

  .input-field {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #d1d5db;
    border-radius: 0.25rem;
    font-size: 1rem;
  }

  .button-back {
    background-color: #707470;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
  }

  .button-back:hover {
    background-color: #383b38;
  }

  .button-create {
    background-color: #48bb78;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
  }

  .button-create:hover {
    background-color: #38a169;
  }

  @media (max-width: 640px) {
    .md\:grid-cols-2 {
      grid-template-columns: 1fr;
    }
  }

  .bg-green-50 {
  background-color: #38a169;
}

.text-green-800 {
  color: #38a169;
}
  </style>
