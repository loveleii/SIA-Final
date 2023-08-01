<template>
    <div>
      <Head title="Customers" />

      <AppLayout>
        <template #header>
          <div class="flex justify-between items-center mb-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Customers</h2>
            <div class="flex items-center">
              <input
                type="text"
                name="search"
                id="search"
                placeholder="Search..."
                class="px-7 py-3 rounded-full text-sm border border-gray-300 focus:ring-2 focus:ring-blue-500 text-center"
                @keydown.enter="search($event)"
              />
              <Link href="/customers/create" class="ml-4 button1">Create</Link>
            </div>
          </div>
        </template>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
          <CustomerCard
            v-for="customer in customers"
            :key="customer.id"
            :customer="customer"
            class="card"
          />
        </div>
      </AppLayout>
    </div>
  </template>

  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import CustomerCard from '@/Components/CustomerCard.vue';
  import { Head, Link, router } from '@inertiajs/vue3';

  const props = defineProps({
    customers: Array,
  });

  const search = (ev) => {
    router.visit('/customers/search/' + ev.target.value);
  };
  </script>

  <style>
  /* Button styles */
  .button1 {
    background-color: #48bb78;
    padding: 12px;
    color: white;
    transition: background-color 0.2s ease-in-out;
    border-radius: 4px;
    cursor: pointer;
    display: flex;
    align-items: center;
  }

  .button1:hover {
    background-color: #38a169;
  }

  /* Card styles */
  .card {
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
  }

  .card:hover {
    transform: translateY(-2px);
  }

  .card-image {
    width: 100%;
    height: 200px;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    object-fit: cover;
  }

  .card-info {
    padding: 1.5rem;
  }

  .card-name {
    font-size: 1.125rem;
    font-weight: 600;
    color: #4a5568;
  }

  .card-meta {
    margin-top: 0.5rem;
    font-size: 0.875rem;
    color: #718096;
  }

  .card-location {
    margin-top: 0.5rem;
    font-size: 0.875rem;
    color: #4a5568;
  }

  </style>
