<template>
    <div class="max-w-md mx-auto mt-5">
      <div class="rounded-lg p-6 border-2 border-green-500 bg-green-50 shadow-md flex hover:bg-green-100">
        <div class="cursor-pointer flex flex-1" @click="open(customer)">
          <div class="w-24 h-24 border rounded-full overflow-hidden bg-gray-300">
            <img :src="props.customer.pic_url" alt="Customer Image" class="w-full h-full object-cover">
          </div>
          <div class="ml-6 flex-1">
            <h3 class="font-semibold text-lg mb-2 text-black-800">{{ customer.name }}</h3>
            <div class="text-sm text-green-600">Stylist: {{ customer.stylist }}</div>
            <div class="text-sm text-green-600">Price: ${{ customer.price }}</div>
            <div class="text-sm text-green-600">Appointment Date: {{ customer.formattedADate }}</div>
            <div class="mt-3 flex justify-end items-center">
              <label class="toggle-slider-label cursor-pointer">
                <input type="checkbox" :checked="customer.available" @change="toggleActive(customer)" class="toggle-slider-input" />
                <span class="toggle-slider"></span>
              </label>
              <span class="ml-2 text-sm font-medium text-white-400 dark:text-green-300">{{ customer.available ? 'Available' : 'Booked' }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { router } from '@inertiajs/vue3';

  const props = defineProps({
    customer: Object,
  });

  function open(customer) {
    router.visit('/customers/' + customer.id);
  }

  const toggleActive = (customer) => {
    router.visit('/customers/toggle/' + customer.id, {
      method: 'post',
      preserveScroll: true,
    });
  };
  </script>

  <style>
  /* Your custom styles for the card go here */

  /* Updated styles for the card */
  .rounded-lg {
    border-radius: 12px;
  }

  .p-6 {
    padding: 1.5rem;
  }

  .border-green-500 {
    border-color: #38a169;
  }

  .bg-green-50 {
    background-color: #f0fff4;
  }

  .shadow-md {
    box-shadow: 0 4px 10px rgba(56, 161, 105, 0.2);
  }

  .hover\:bg-green-100:hover {
    background-color: #c6f6d5;
  }

  .w-24,
  .h-24 {
    width: 6rem;
    height: 6rem;
  }

  .border {
    border-width: 2px;
  }

  .overflow-hidden {
    overflow: hidden;
  }

  .bg-gray-300 {
    background-color: #d1d5db;
  }

  .object-cover {
    object-fit: cover;
  }

  .ml-6 {
    margin-left: 1.5rem;
  }

  .flex-1 {
    flex: 1;
  }

  .text-lg {
    font-size: 1.125rem;
  }

  .mb-2 {
    margin-bottom: 0.5rem;
  }

  .text-green-800 {
    color: #38a169;
  }

  .font-semibold {
    font-weight: 600;
  }

  .text-sm {
    font-size: 0.875rem;
  }

  .text-green-600 {
    color: #4a5568;
  }

  .text-green-300 {
    color: #68d391;
  }

  .dark\:text-green-300 {
    color: #a78bfa;
  }

  /* Toggle slider styles */
  .toggle-slider-label {
    position: relative;
    display: inline-block;
    width: 42px;
    height: 22px;
  }

  .toggle-slider-input {
    display: none;
  }

  .toggle-slider {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    border-radius: 15px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .toggle-slider:before {
    position: absolute;
    content: '';
    height: 16px;
    width: 16px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    border-radius: 50%;
    transition: transform 0.3s;
  }

  .toggle-slider-input:checked + .toggle-slider {
    background-color: #38a169;
  }

  .toggle-slider-input:checked + .toggle-slider:before {
    transform: translateX(20px);
  }

  /* Adjustments for responsiveness */
  @media (max-width: 480px) {
    .w-24,
    .h-24 {
      width: 4rem;
      height: 4rem;
    }

    .text-lg {
      font-size: 1rem;
    }
  }
  </style>
v
